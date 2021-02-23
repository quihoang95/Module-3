<?php

namespace App\Http\Services;


use App\Http\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository=$userRepository;
    }
    function create($request){
        $user = new User();
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request ->email;
        $user->role=1;
        $user->birthday = $request->birthday;
        $roles = $request->roles;
        $this->userRepository->save($user,$roles);
    }
    function getAll(){
        return $this->userRepository->getAll();
    }
    function update($request,$id){
        $user = $this->userRepository->getUserById($id);
        $user->name = $request->name;
        $user->email=$request->email;

        $this->userRepository->save($user);
    }
}
