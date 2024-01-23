<?php

namespace App\Repositories;

use App\Role;
use App\Entities\Image;
use Prettus\Repository\Eloquent\BaseRepository;
use DB;
use Datatables;
//use Lang;

class ImageRepository extends BaseRepository
{
    public function model()
    {
        return 'App\\Entities\\Image';
    }

    public function getDatatable($section)
    {
        $images = Image::select([
            'images.*',
        ])->where('section_id', $section->id);

        return Datatables::of($images)
            ->addColumn('position', function ($item) {
                return $item->position;
            })
            ->addColumn('filename', function ($item) {
                $url = asset('storage/medias/thumbnail/'.$item->filename);
                return '<img src="'.$url.'" class="datatable-img-preview" />';
            })
            ->addColumn('description', function ($item) {
                return $item->description;
            })
            ->addColumn('action', function ($item) {
                return '
                <a href="' . route('images.show', $item) . '" class="btn btn-link" data-toogle="edit" data-id="'.$item->id.'"><i class="fa fa-pencil"></i> Editar</a> &nbsp;
                <a href="#" class="btn btn-link text-danger" data-toogle="delete" data-ajax="' . route('images.delete', $item) . '" data-confirm-message="Estas segur/a?"><i class="fa fa-trash"></i> Esborrar</a> &nbsp;
                ';
            })
            ->orderColumn('position',  'ASC')
            ->rawColumns(['filename','description', 'action'])
            ->make(true);
    }

}
