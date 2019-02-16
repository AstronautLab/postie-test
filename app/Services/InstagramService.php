<?php

namespace App\Services;

use App\Models\User;
use App\Models\Image;
use App;
use GuzzleHttp\Client;

/**
 * Class InstagramService
 *
 * @package App\Services
 */
class InstagramService
{
    public const DEFAULT_NUMBER_MEDIA = 6;
    public const RECENT_MEDIA_URL = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=%s&count=%d';
    public const LIKES_MULTIPLIER = 1;
    public const COMMENTS_MULTIPLIER = 5;

    /**
     * @var Client
     */
    protected $guzzleClient;

    /**
     * @var FileService
     */
    protected $fileService;


    /**
     * InstagramService constructor.
     *
     * @param FileService $fileService
     */
    public function __construct(FileService $fileService)
    {
        $this->guzzleClient = new Client();
        $this->fileService = $fileService;
    }

    /**
     * @param string $token
     */
    public function handleImages(string $token)
    {
        $url = sprintf(self::RECENT_MEDIA_URL, $token, self::DEFAULT_NUMBER_MEDIA);
        $response = $this->guzzleClient->get($url);

        $content = json_decode($response->getBody()->getContents(), true);

        foreach ($content['data'] as $image) {
            $user = $this->getUser($image['user']['username']);

            $newName = $image['id'] . '.jpg';
            $this->fileService->saveAndCrop($newName, $image['images']['standard_resolution']['url']);

            $newImage = new Image();
            $newImage->user_id = $user->id;
            $newImage->instagram_id = $image['id'];
            $newImage->link = $image['link'];
            $newImage->likes = $image['likes']['count'];
            $newImage->comments = $image['comments']['count'];
            $newImage->path = $newName;
            $newImage->points = $newImage->likes * self::LIKES_MULTIPLIER + $newImage->comments * self::COMMENTS_MULTIPLIER;

            $newImage->save();
        }
    }

    /**
     * @param string $username
     * @return User
     */
    protected function getUser(string $username)
    {
        $user = User::where('username', $username)->first();

        if ($user !== null) {
            return $user;
        }

        $user = new User();
        $user->username = $username;
        $user->save();

        return $user;
    }
}
