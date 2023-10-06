<?php

namespace App\Http\Repository;

use App\Models\ImageModel;

class ImageRepository
{
    public function save(array $param)
    {
        return ImageModel::create($param);
    }
}
