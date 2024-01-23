<?php

namespace App\Jobs\Image;

use App\Entities\Image;
use App\Http\Requests\Image\DeleteImageRequest;

class DeleteImage
{
    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    public static function fromRequest(Image $image, DeleteImageRequest $request)
    {
        return new self($image);
    }

    public function handle()
    {

        return $this->image->delete();
    }
}
