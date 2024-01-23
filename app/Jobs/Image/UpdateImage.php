<?php

namespace App\Jobs\Image;

use App\Entities\Image;
use App\Http\Requests\Image\UpdateImageRequest;
//use App\Jobs\Email\SendMailTemplate;


class UpdateImage
{
    private $attributes;

    public function __construct(Image $image, $attributes)
    {
        $this->attributes = array_only($attributes, [
            'title',
            'author',
            'description', 
            'section_id',
            'filename'
        ]);

        $this->image = $image;
    }

    public static function fromRequest(Image $image, UpdateImageRequest $request)
    {
        return new self($image, $request->all());
    }

    public function handle()
    {
        return $this->image->update($this->attributes);
    }
}
