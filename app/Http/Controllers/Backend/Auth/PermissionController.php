<?php

namespace App\Http\Controllers\Backend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Session;

class PermissionController extends Controller {

    public function __construct() {

    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request) {
        $search = $request->search;

        if (isset($search)) {
          $permissions = Permission::where('name', 'like', '%' . $search . '%')
          ->paginate(5);
          }
          else {
          $permissions = Permission::paginate(5);
          }

          $roles = Role::get(); //Get all roles

        return view('backend.views.auth.permission', compact('search', 'roles', 'permissions'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);

        $name = $request['name'];
        $permission = new Permission();
        $permission->name = $name;

        $roles = $request['roles'];

        $permission->save();

        if (!empty($request['roles'])) { //If one or more role is selected
            foreach ($roles as $role) {
                $r = Role::where('id', '=', $role)->firstOrFail(); //Match input role to db record

                $permission = Permission::where('name', '=', $name)->first(); //Match input //permission to db record
                $r->givePermissionTo($permission);
            }
        }

        Session::flash('success', 'El permiso se ha creado correctamente.');

        return redirect('/permissions#add_new_permission');
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit(Permission $permission) {
        $roles = Role::get(); //Get all roles

        return view('backend.views.auth.editpermission', compact('permission', 'roles'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id) {
        $permission = Permission::findOrFail($id);
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);
        $input = $request->all();
        $permission->fill($input)->save();

        Session::flash('success', 'El permiso se ha actualizado correctamente.');

        return redirect('/permission/'.$permission->id);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id) {
        $permission = Permission::findOrFail($id);

    //Make it impossible to delete this specific permission
    if ($permission->name == "Administer roles & permissions") {
      Session::flash('success', 'No se ha podido eliminar el permiso, quizas hay roles y usuarios ligados a el.');

      return redirect('/permissions');

        }

        $permission->delete();

        Session::flash('success', 'El permiso se ha eliminado correctamente.');

        return redirect('/permissions');

    }

}
