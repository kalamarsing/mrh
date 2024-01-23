<?php

namespace App\Jobs\Section;

use App\Entities\Section;
use App\Http\Requests\Section\UpdateSectionRequest;
//use App\Jobs\Email\SendMailTemplate;
use Hash;


class UpdateSection
{
    private $attributes;

    public function __construct(Section $section, $attributes)
    {
        $this->attributes = array_only($attributes, [
            'title', 
            'identifier', 
            'description', 
            'has_slide',
            'position'
        ]);

        $this->section = $section;
    }

    public static function fromRequest(Section $section, UpdateSectionRequest $request)
    {
        return new self($section, $request->all());
    }

    public function handle()
    {
        
        $this->attributes['has_slide'] = isset($this->attributes['has_slide']) ? $this->attributes['has_slide'] : 0;
       // $this->section->roles()->sync($this->attributes['role_id']); there's no other sections than admin

        return $this->section->update($this->attributes);
    }
}
