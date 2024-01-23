<?php

namespace App\Jobs\Section;

use App\Entities\Section;
use App\Http\Requests\Section\UpdateSectionRequest;
use App\Http\Requests\Section\CreateSectionRequest;

use Hash;

class CreateSection
{

    private $attributes;

    public function __construct($attributes)
    {
        $this->attributes = array_only($attributes, [
            'title', 
            'identifier', 
            'description', 
            'has_slide',
            'position'
        ]);
    }

    public static function fromRequest(CreateSectionRequest $request)
    {
        return new self($request->all());
    }

    public function handle()
    {
        $section = Section::create($this->attributes);
        //it must come from form, value for admin section. there's no front sectionr in this project
        $this->attributes['role_id'] = 1; 
        if(isset($this->attributes['role_id'])) {
            $section->roles()->sync($this->attributes['role_id']);
        }

        return $section;
    }
}
