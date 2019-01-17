<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;

class DataTableController extends Controller
{
    //

    public function anyData()
    {

        $cert = Data::select(['id','name','lastname','vendor','shorttitle','certname','certver','examid','dateofach','certpath']);
        
        if (Auth::user()){
            return Datatables::of($cert)
            ->editColumn('certpath','<a href="{!!$certpath!!}">Download</a>')        
            ->addColumn('action', 'partials.action')
            ->rawColumns(['certpath','action'])
            ->toJson();
        }else{
            return Datatables::of($cert)
            ->editColumn('certpath','<a href="{!!$certpath!!}">Download</a>')
            ->addColumn('action','')  
            ->rawColumns(['certpath','action'])
            ->make();

        }

    }
}
