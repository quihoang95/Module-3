<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        $users = User::all();
        return view('webapp.staffs.list',compact('users'));
    }
    public function create()
    {
        $users = User::all();
        $roles = Role::all();
        return view('webapp.staffs.add',compact('roles','users'));
    }
    public function store(Request $request)
    {
        $this->userService->add($request);
        $message = 'Thêm nhân viên thành công';
        return redirect()->route('users.index')->with('success',$message);
    }
    public function edit($id)
    {
        $roles = Role::all();
        $user = $this->userService->findById($id);
        return view('webapp.staffs.edit',compact('user','roles'));
    }
    public function update(Request $request, $id)
    {
        $roles = Role::all();
        $user = $this->userService->findById($id);
        $user->fill($request->all());
        $user->save();
        $message = 'Sửa thành công';
        return redirect()->route('users.index',compact('roles'))->with('success',$message);
    }
    public function destroy($id)
    {
        $user = $this->userService->findById($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
