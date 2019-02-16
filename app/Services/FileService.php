<?php

namespace App\Services;

use App;
use Storage;
use Image;

/**
 * Class FileService
 *
 * @package App\Services
 */
class FileService
{
    public const DEFAULT_CROP_WIDTH = 600;
    public const DEFAULT_CROP_HEIGHT = 600;

    /**
     * @param $name
     * @param $path
     */
    public function save($name, $path)
    {
        Storage::disk('local')->put($name, file_get_contents($path));
    }

    /**
     * @param $name
     * @param $path
     */
    public function saveAndCrop($name, $path)
    {
        Storage::disk('local')->put($name, file_get_contents($path));

        $image = Image::make(storage_path() . '/app/' . $name);
        $image->crop(self::DEFAULT_CROP_WIDTH, self::DEFAULT_CROP_HEIGHT);
        $image->save(storage_path() . '/app/' . $name);
    }

    /**
     * @param $path
     * @return mixed
     */
    public function retrieve($path)
    {
        return Storage::get($path);
    }
}
