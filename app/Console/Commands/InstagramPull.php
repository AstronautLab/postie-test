<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Image;
use Storage;
use App\InstagramUser;
use App\InstagramUserMedia;
use Illuminate\Support\Str;

class InstagramPull extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'instagram:pull';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this commands pulls from explore page recent items';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $ig = new \InstagramAPI\Instagram();
        
        try {
            $ig->login(config('instagram.instagram_username'), config('instagram.instagram_password'));
        } catch (\Exception $e) {
            echo 'Something went wrong: '.$e->getMessage()."\n";
            exit(0);
        }
        
        $exploreFeedItems = $ig->discover->getExploreFeed()->getItems();

        foreach ($exploreFeedItems as $item) {
            if ($item->isMedia()) {
                $media = $item->getMedia();
              
                DB::transaction(function () use ($media) {
                    $user = $this->createOrUpdateUser($media);
                    $this->createOrUpdateUserMedia($user, $media);
                });
            }
        }
    }


    private function createOrUpdateUser($media)
    {
        $user = $media->getUser();

        return InstagramUser::updateOrCreate(
            ['instagram_id' => $user->getPk()],
            [
                'instagram_id' => $user->getPk(),
                 'user_name' => $user->getUsername(),
                 'full_name' => $user->getFullName(),
                 'profile_pic_url' => $user->getProfilePicUrl(),
            ]
        );
    }

    private function createOrUpdateUserMedia($user, $media)
    {
        if (is_null($media->getImageVersions2())) {
            return null;
        }

        $imageUrl = $media->getImageVersions2()->getCandidates()[0]->getUrl();

        $img = Image::make($imageUrl);
        $img->crop(600, 600);

        $mime = $img->mime();
    
        if ($mime == 'image/jpeg') {
            $format = 'jpg';
        } elseif ($mime == 'image/png') {
            $format = 'png';
        } elseif ($mime == 'image/gif') {
            $format = 'gif';
        } else {
            $format = 'jpg';
        }
        
        $imageName = Str::random().'.'.$format;

        Storage::disk('public')->put($imageName, $img->encode($format));

        return InstagramUserMedia::updateOrCreate(
            ['instagram_id' => $media->getPk()],
            [
                'instagram_id' => $media->getPk(),
                'user_id' => $user->id,
                'media_url' => $media->getItemUrl(),
                'image' => $imageName,
                'likes' => $media->getLikeCount() ,
                'comments' => $media->getCommentCount(),
            ]
        );
    }
}
