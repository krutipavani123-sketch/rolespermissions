<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Support\Facades\Validator;

class rolecontroller extends Controller
{
    public function create()
    {
        $permissions = Permission::all();
        return view("roles.create", compact("permissions"));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => 'required|unique:roles|min:3'
        ]);

        if ($validator->passes()) {
            $role = Role::create([
                'name' => $request->name
            ]);

            if (!empty($request->permission)) {
                foreach ($request->permission as $name) {
                    $role->givePermissionTo($name);
                }
            }
            return redirect()->route('roles.list')->with('success', 'Role Added');
        } else {
            return redirect()->route('roles.create')->with('error', 'Role Not Added');
        }
    }


    public function list(Request $request)
    {

        $roles = Role::paginate(3);

        if (!empty($request->search)) {
            $data = $roles->where('name', 'like', "%$request->search%");
        }
        return view('roles.list', compact('roles'));
        // return view("roles.list");
    }
}
