<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */

    public function __construct() {
        $this->middleware(['auth','isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    public function index()
    {
        //
        $permissions = Permission::All();
        return view('permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::get(); //Get all roles

        return view('permissions.create')->with('roles', $roles);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request);
        $this->validate($request,[
            'name'=>'required|max:40'
        ]);

        $name = $request['name'];
        $permission = new Permission();
        $permission->name=$name;

        $roles = $request['roles'];

        $permission -> save();

        if(!empty($request['roles'])){
         
            foreach ($roles as $role) {
                $r = Role::where('id','=',$role)->firstOrFail();

                $permission = Permission::where('name','=',$name)->first();
                $r->givePermissionTo($permission);
            }
        }
        return redirect()->route('permissions.index')->with('success','Permission '. $permission->name . ' added!');

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
    public function edit($id)
    {
        //
        $roles = Role::All();
        $permission = Permission::findOrFail($id);
        return view('permissions.edit',compact('permission','roles'));
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
        //test commit
        $permission = Permission::findOrFail($id);
        $input = $request->except('roles');

        $permission->fill($input)->save();

        return redirect()->route('permissions.index')->with('success','Permission updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $permission = Permission::findOrFail($id);

        //Make it impossible to delete this specific permission    
        if ($permission->name == "Administer roles & permissions") {
            return redirect()->route('permissions.index')
            ->with('error',
             'Cannot delete this Permission!');
        }

        $permission->delete();

        return redirect()->route('permissions.index')->with('success','Permission '.$permission->name.' deleted');
    }
}
