<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserManager;
use App\Models\UserGroup;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserManagerController extends Controller
{
    public function index()
    {
        $data = UserManager::paginate(10)->fragment('data');

        return view('admin.UserManager.index', compact('data'));
    }

    public function create()
    {
        $user_group = UserGroup::all();

        return view('admin.UserManager.create', compact('user_group'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|min:3',
            'phone'     => 'required',
            'email'     => 'required',
            'password' => 'required',
            'address'  => 'required'
        ], [
            'name.required'         => trans('validation.required'),
            'name.min'              => trans('validation.min'),
            'phone.required'     => trans('validation.required'),
            'email.required'     => trans('validation.required'),
            'password.required' => trans('validation.required'),
            'address.required'  => trans('validation.required'),
        ]);
        
        UserManager::create([
            'name'              => $request->name,
            'group_id' => $request->group_id,
            'lastname'          => $request->lastname,
            'firstname'            => $request->firstname,
            'phone'          => $request->phone,
            'email'      => $request->email,
            'email_verified_at'           => $request->email_verified_at,
            'password'       => $request->password,
            'address'           => $request->address,
            'active'           => $request->active,
            
            
        ]);
        Alert::success('Create successfully!');

        return redirect()->route('usermanager.index');
    }

    public function edit($id)
    {
        $user         = UserManager::find($id);
        $user_group = UserGroup::where('status', 0)->get();

        return view('admin.usermanager.update', compact('user', 'user_group'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|min:3',
            'phone'     => 'required',
            'email'     => 'required',
            'password' => 'required',
            'address'  => 'required'
        ], [
            'name.required'         => trans('validation.required'),
            'name.min'              => trans('validation.min'),
            'phone.required'     => trans('validation.required'),
            'email.required'     => trans('validation.required'),
            'password.required' => trans('validation.required'),
            'address.required'  => trans('validation.required'),
        ]);
        $user     = UserManager::all()->find($request->id);

        $user->update([
            'name'              => $request->name,
            'group_id' => $request->group_id,
            'lastname'          => $request->lastname,
            'firstname'            => $request->firstname,
            'phone'          => $request->phone,
            'email'      => $request->email,
            'email_verified_at'           => $request->email_verified_at,
            'password'       => $request->password,
            'address'           => $request->address,
            'active'           => $request->active,
            
        ]);
        Alert::success('Update successfully!');

        return redirect()->route('usermanager.index');
    }

    public function delete($id)
    {
        $user = UserManager::all()->find($id);
        $user->delete();
    }
}
