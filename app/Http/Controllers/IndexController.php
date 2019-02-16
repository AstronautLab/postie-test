<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Vinkla\Instagram\Instagram;
use GuzzleHttp\Client;
use Artisan;

/**
 * Class IndexController
 *
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{
    public function index()
    {
        Artisan::call("pull:instagram",['accessToken' => '197746277.1677ed0.bae8edaf706c47c0959abe9442297e86']);
    }
}