<?php

namespace App\Jobs\Section;

use App\Entities\Section;
use App\Http\Requests\Section\DeleteSectionRequest;

class DeleteSection
{
    public function __construct(Section $section)
    {
        $this->section = $section;
    }

    public static function fromRequest(Section $section, DeleteSectionRequest $request)
    {
        return new self($section);
    }

    public function handle()
    {

        return $this->section->delete();
    }
}
