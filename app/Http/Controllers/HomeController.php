<?php

namespace App\Http\Controllers;

use App\Entities\Property;
use App\Entities\PAck;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Images;
use Storage;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //ojoque tengo 2 coassa, una eselrol que solo sirve para Agentes, otra esel user-Ztype que es si es SuperUser, Administrador o Agente
        return view('front.index', [
           'packs' => Pack::all(),
           'properties' => Property::all()
        ]);
    }

    public function constructionPage()
    {
        return view('construction');
    }

    public function policies()
    {
        return view('front.policies');
    }

    public function resizeImages()
    {
        $years = Year::all();
        //  dd(Storage::disk('public'));
        // $image = Image::make( Storage::disk('public')->get($pathAndFileName) )->resize(320,320)->stream();
        foreach ($years as $year) {
            if ($year->picture && $year->picture !== '') {
                $image = Images::make(Storage::get('public/files/'.$year->picture))->resize(500, 500)->stream();
                $path = Storage::put('/public/files/thumbnails/'.$year->picture, $image);
            }
        }
    }
}
