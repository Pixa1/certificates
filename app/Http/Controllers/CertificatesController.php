<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;


class CertificatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $name = $request->file('file')->getClientOriginalName();
        $certpath = $request->file->storeAs('public',$name);
        //$path = $request->file->path();
        //$extension = $request->file->extension();
        $path = '/storage/'.$name;

        //dd($certpath);
        $request->request->add(['certpath' => $path]);
        Data::create(request(['name','lastname','vendor','shorttitle','certname','certver','examid','dateofach','datevalid','certpath','deprecated']));
        // $model->update(['image' => $file_name]);
        // dd($file_name);

        return redirect('/')->with('success','Certificate added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $id)
    {
        //
       // dd($id);
        return View('edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        Data::where('id',$id)
        ->update ($request->except('_token','MAX_FILE_SIZE'));

        return redirect('/')->with('success','Certificate updated successfully!');
    
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    

       // Alert::warning('Are you sure ?', 'You want be able to revert this')->showConfirmButton('Yes Delete it','#d33')->showCancelButton();

      $data = Data::find($id);

      //dd($data);
      $data->delete();

      return back()->with('success','Certificate with id ' . $id .' deleted successfully!');


    }
}
