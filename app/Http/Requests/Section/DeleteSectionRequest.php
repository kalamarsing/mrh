<?php

namespace App\Http\Requests\Section;

use Illuminate\Foundation\Http\FormRequest;

class DeleteSectionRequest extends FormRequest
{

    public function rules()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }
}
