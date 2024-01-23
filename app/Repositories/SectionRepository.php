<?php

namespace App\Repositories;

use App\Role;
use App\Entities\Section;
use Prettus\Repository\Eloquent\BaseRepository;
use DB;
use Datatables;
//use Lang;

class SectionRepository extends BaseRepository
{
    public function model()
    {
        return 'App\\Entities\\Section';
    }

    public function getDatatable()
    {
        $sections = Section::select([
            'sections.*'
        ]);

        return Datatables::of($sections)
            ->addColumn('title', function ($item) {
                return $item->title;
            })
            ->addColumn('description', function ($item) {
                return $item->description;
            })
            ->addColumn('action', function ($item) {
                return '
                <a href="' . route('images', $item->id) . '" class="btn btn-link text-success" data-toogle="edit" data-id="'.$item->id.'"><i class="fa fa-image"></i> Images</a> &nbsp;

                <a href="' . route('sections.show', $item) . '" class="btn btn-link" data-toogle="edit" data-id="'.$item->id.'"><i class="fa fa-pencil"></i> Editar</a> &nbsp;
                ';
            })
            ->rawColumns(['description','action'])
            ->make(true);
    }
}
