<?php

namespace App\Http\Controllers;

//use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class Permissioncontroller extends Controller
{
    public function list()
    {
        $permissions = Permission::all();
    return view('permissions.list', compact('permissions'));
    }


    public function create()
    {

        return view('permissions.create');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions|min:3',

        ]);

        if ($validator->fails()) {
            return redirect('create')
                ->withErrors($validator)
                ->withInput();
        }

        Permission::create([
            'name' => $request->name
        ]);

        return redirect('list')
            ->with('success', 'Permission added successfully');
    }

    public function edit() {}


    public function update() {}

    public function destroy() {}
}
