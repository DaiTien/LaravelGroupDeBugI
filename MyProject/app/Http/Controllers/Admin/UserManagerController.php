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
        $data = UserManager::with('user_group')->paginate(10)->fragment('data');

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
            'name'     => 'required|min:3',
            'phone'    => 'required|unique:users|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email'    => 'required',
            'password' => 'required',
            'address'  => 'required'
        ], [
            'name.required'     => trans('validation.required'),
            'name.min'          => trans('validation.min'),
            'phone.required'    => trans('validation.required'),
            'phone.unique'      => trans('validation.unique'),
            'phone.regex'       => trans('validation.regex'),
            'phone.min'         => trans('validation.min'),
            'email.required'    => trans('validation.required'),
            'password.required' => trans('validation.required'),
            'address.required'  => trans('validation.required'),
        ]);

        UserManager::create([
            'name'      => $request->name,
            'group_id'  => $request->group_id,
            'lastname'  => $request->lastname,
            'firstname' => $request->firstname,
            'phone'     => $request->phone,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'address'   => $request->address,

        ]);
        Alert::success('Create successfully!');

        return redirect()->route('usermanager.index');
    }

    public function edit($id)
    {
        $user       = UserManager::find($id);
        $user_group = UserGroup::all();

        return view('admin.usermanager.update', compact('user', 'user_group'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|min:3',
            'phone'    => 'required|unique:users|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email'    => 'required',
            'password' => 'required',
            'address'  => 'required'
        ], [
            'name.required'    => trans('validation.required'),
            'name.min'         => trans('validation.min'),
            'phone.required'   => trans('validation.required'),
            'phone.regex'      => trans('validation.regex'),
            'phone.unique'     => trans('validation.unique'),
            'phone.min'        => trans('validation.min'),
            'email.required'   => trans('validation.required'),
            'address.required' => trans('validation.required'),
        ]);
        $user      = UserManager::all()->find($request->id);
        $user->update([
            'name'      => $request->name,
            'group_id'  => $request->group_id,
            'lastname'  => $request->lastname,
            'firstname' => $request->firstname,
            'phone'     => $request->phone,
            'email'     => $request->email,
            'address'   => $request->address,

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
