<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use GuzzleHttp\Client;
use Artisan;

/**
 * Class ImageController
 *
 * @package App\Http\Controllers
 */
class ImageController extends Controller
{
    /**
     * @param ImageService $imageService
     * @param string $username
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(ImageService $imageService, int $id)
    {
        $images = $imageService->getById($id);

        return response()->json($images);
    }

    /**
     * @param ImageService $imageService
     * @param string $username
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByUsername(ImageService $imageService, string $username)
    {
        $images = $imageService->getAllByUsername($username);

        return response()->json($images);
    }
}