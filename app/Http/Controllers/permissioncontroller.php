<?php

namespace App\Http\Controllers;

//use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class Permissioncontroller extends Controller
{


    public function list(Request $request)
    {
        $permissions = Permission::paginate(3);

        if (!empty($request->search)) {
            $data = $permissions->where('name', 'like', "%$request->search%");
        }
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

        if ($validator->passes()) {
            Permission::create(['name' => $request->name]);


            return redirect('list')->with('success', 'Permission Added');
        } else {
            return redirect('create')->withInput()->withErrors($validator);
        }
    }
  

    public function edit() {}


    public function update() {}

    public function destroy() {}
}








  //     if ($validator->fails()) {
    //         return redirect('create')
    //             ->withErrors($validator)
    //             ->withInput();
    //     }

    //     Permission::create([
    //         'name' => $request->name
    //     ]);

    //     return redirect('list')
    //         ->with('success', 'Permission added successfully');
    // }