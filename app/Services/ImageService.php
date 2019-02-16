<?php

namespace App\Services;

use App;
use App\Models\User;
use App\Models\Image;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class ImageService
 *
 * @package App\Services
 */
class ImageService
{
    public function getById(int $id)
    {
        return Image::findOrFail($id);
    }

    public function getAllByUsername(string $username)
    {
        $user = User::where('username', $username)->first();

        if ($user === null) {
            throw new NotFoundHttpException();
        }

        return $user->images;
    }
}
