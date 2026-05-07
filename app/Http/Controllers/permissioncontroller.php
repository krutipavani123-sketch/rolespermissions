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


    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permissions.edit', compact('permission'));
    }


    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:permissions,name,' . $id

        ]);

        if ($validator->passes()) {
            // $permission->update(['name'=> $request->name]);
            $permission->name = $request->name;
            $permission->save();
            return redirect()->route('list', $id)
                ->with('success', 'Updated');
        } else {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
    }

    public function delete(Request $request, $id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        if ($permission) {

            return redirect()->route('list', $id)->with('success', 'Data Deleted');
        } else {
            return redirect()->route('list', $id)->with('Error', 'Data Not Deleted');
        }
    }
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