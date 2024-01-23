<?php

namespace App\Jobs;

use App\Http\Requests\CreateContactRequest;
use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;

class CreateContact
{
    private $attributes;

    public function __construct($attributes)
    {
        $this->attributes = array_only($attributes, [
            'name',
            'surname',
            'email',
            'comment',
        ]);
    }

    public static function fromRequest(CreateContactRequest $request)
    {
        return new self($request->all());
    }

    public function handle()
    {
        $objContact = new \stdClass();
        $objContact->name = $this->attributes['name'];
        $objContact->surname = $this->attributes['surname'];
        $objContact->email = $this->attributes['email'];
        $objContact->comment = $this->attributes['comment'];

        Mail::to('museutorreballdovina@gramenet.cat')->send(new ContactEmail($objContact));

        return true;
    }
}
