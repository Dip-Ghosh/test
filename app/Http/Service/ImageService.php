<?php

namespace App\Http\Service;

use App\Http\Repository\ImageRepository;

class ImageService
{
    private $imageRepository;

    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function save(array $params)
    {
        $imageName = time() . '.' . $params['image']->extension();
        $params['image']->move(public_path('images'), $imageName);
        $this->imageRepository->save([
            'image_path' => $imageName
        ]);
        return $imageName;
    }
}
