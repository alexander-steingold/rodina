<?php

namespace App\Services;

use App\Http\Requests\UserRequest;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class UserService
{
    public function index()
    {
        $users = User::editor()->latest()->paginate(10);
        $users->appends(request()->query());
        return $users;
    }

    public function store(UserRequest $request)
    {
        try {
            DB::beginTransaction();
            User::create($request->validated());
            DB::commit();
            return true;
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }
    }

    public function update(UserRequest $request, User $user)
    {
        try {
            DB::beginTransaction();
            $user->update($request->validated());
            DB::commit();
            return true;
        } catch (\Exception $e) {
            logger('error', [$e->getMessage()]);
            DB::rollBack();
            return false;
        }
    }

    public function lastCustomer()
    {
        $customer = Customer::lastCustomer()->withCount('orders')->get();
        return $customer;
    }

}
