<?php

namespace App\Http\Services;

use App\Http\Repositories\UserRepository;
use App\Models\User;

class UserService implements ServiceInterFace
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    function getAll()
    {
       return $this->userRepository->getAll();
    }

    function findById($id)
    {
        return $this->userRepository->findById($id);
    }

    function add($request, $obj = null)
    {
        $obj = new User();
        $obj->name = $request->name;
        $obj->gender = $request->gender;
        $obj->birth = $request->birth;
        $obj->phoneNumber = $request->phoneNumber;
        $obj->cmnd = $request->cmnd;
        $obj->email = $request->email;
        $obj->address = $request->address;
        $obj->role_id = $request->role_id;
        $this->userRepository->save($obj);
        return redirect()->route('users.index');

    }

    function delete($obj)
    {
        // TODO: Implement delete() method.
    }

    function update($request, $obj = null)
    {
        $obj->fillable($request->all());
        $this->userRepository->save($obj);
    }
}
