<?php

namespace App\Jobs\Image;

use App\Entities\Image;
use App\Http\Requests\Image\UpdateImageRequest;
use App\Http\Requests\Image\CreateImageRequest;

use Hash;

class CreateImage
{

    private $attributes;

    public function __construct($attributes)
    {
        $this->attributes = array_only($attributes, [
            'title',
            'author',
            'description', 
            'section_id',
            'filename'
        ]);
    }

    public static function fromRequest(CreateImageRequest $request)
    {
        return new self($request->all());
    }

    public function handle()
    {
        $lastImage = Image::latest('position')->first();
        if($lastImage){
            $this->attributes['position'] = $lastImage->position + 1;
        }else{
            $this->attributes['position'] = 1;
        }

        return Image::create($this->attributes);
    }
}
