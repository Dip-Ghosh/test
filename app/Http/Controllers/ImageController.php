<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageValidation;
use App\Http\Service\ImageService;
use Illuminate\Http\Request;
use Nette\Utils\Image;

class ImageController extends Controller
{
    private $image;

    public function __construct(ImageService $image)
    {
        $this->image = $image;
    }

    public function show()
    {
        return view('user-image');
    }

    public function store(ImageValidation $request)
    {
        $filename = $this->image->save($request->validated());

        return response()->json([
            'message' => 'Image uploaded successfully.',
            'image' => 'images/' . $filename
        ], 200);
    }
}
