<?php

namespace App\Console\Commands;

use App\Services\InstagramService;
use Illuminate\Console\Command;

class PullInstagram extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pull:instagram {accessToken}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull Instagram recent media';

    /**
     * @var InstagramService
     */
    protected $instagramService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(InstagramService $instagramService)
    {
        parent::__construct();

        $this->instagramService = $instagramService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $token = $this->argument('accessToken');

        $this->instagramService->handleImages($token);
    }
}
