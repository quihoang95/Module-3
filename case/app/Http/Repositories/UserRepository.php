<?php
namespace App\Http\Repositories;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    protected $userModel;

    public function __construct(User $user)
    {
        $this->userModel = $user;
    }
    function save($user, $roles = null)
    {
//        dd($user);
        DB::beginTransaction();
        try {
            $user->save();
            $user->roles()->attach($roles);
            DB::commit();
        }catch (\Exception $exception)
        {
            DB::rollBack();
            return dd($exception->getMessage());
        }
    }
    function  attachRole($user, $roles = null){
        $user->roles()->attach($roles);
    }
    function getAll()
    {
        return $this->userModel->all();
    }
    function getPagination()
    {
        return $this->userModel::paginate(5);
    }
    public function getUserById($id)
    {
        return $this->userModel->findOrFail($id);
    }
}
