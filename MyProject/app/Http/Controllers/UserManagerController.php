<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserManagerController extends Controller
{
    //
    function getAll()
    {
        $data = User::paginate(10);
        return view('UserManager.Index', compact('data'));
    }

    function CreateUser()
    {
        return view('UserManager.Create');
    }

    function SaveCreate(Request $request)
    {
        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'dob' => $request->dob,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
//        return response()->json([
//            'code' => \Illuminate\Http\Response::HTTP_CREATED,
//            'message' => 'Successfully'
//        ]);
        Alert::alert()->success('Thêm tài khoản thành công!', '');
        return redirect(route('list-user'));
        // hoặc có thể dùng alert('Post Created','Successfully', 'success');s
    }

    function UpdateUser($id)
    {
        $user = User::find($id);
        return view('UserManager.Update', compact('user'));
    }

    function SaveUpdate(Request $request)
    {
        $user = User::find($request->id);
        $validated = Validator::make(
            $request->all(),
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'dob' => 'required',
                'phone' => 'required',
            ],
            [
                'required' => ':attribute không được để trống!',
//                'lastname' => 'The lastname field is required',
//                'dob' => 'The dob field is required',
//                'phone' => 'The phone field is required',
            ],
            [
                'firstname' => 'Họ',
                'lastname' => 'Tên',
                'dob' => 'Ngày sinh',
                'phone' => 'Điện thoại',
            ]
        );
        if ($validated->fails()) {
            return response()->json([
                'errors' => true,
                'firstname' => $validated->errors()->first('firstname'),
                'lastname' => $validated->errors()->first('lastname'),
                'dob' => $validated->errors()->first('dob'),
                'phone' => $validated->errors()->first('phone'),
            ]);
        }
        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'dob' => $request->dob,
            'phone' => $request->phone,
        ]);
        return response()->json(['success' => true]);
    }

    function DeleteUser($id)
    {
        $user = User::find($id);
        if ($user->delete())
            return response()->json(['success' => true]);
        else
            return response()->json(['success' => false]);
    }

    // restfull API
    function index()
    {
        $user = User::all();
        return response()->json($user, 200);
    }

    function show($id)
    {
        if ($user = User::find($id))
            return response()->json($user, 200);
        else
            return response()->json('user not found', 200);
    }

    function store(Request $request)
    {
        if (User::create($request->all()))
            return response()->json('User has been created', 201);
        else
            return response()->json('can not create');
    }
    // function edit($id)
    // {
    //     if ($user = User::find($id)) {
    //         return response()->json($user);
    //     } else
    //         return response()->json('can not find data');
    // }
    function update(Request $request, $id)
    {
        if (User::find($id)->update($request->all())) {
            $user = User::find($id);
            return response()->json($user, 201);
        } else
            return response()->json('can not update');
    }

    function delete($id)
    {
        if (User::find($id)->delete())
            return response()->json('Deleted succsessfully', 200);
        else
            return response()->json('Can not delete data');
    }
}
