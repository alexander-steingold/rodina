<?php

namespace App\Http\Controllers\Backend;

use App\Enums\UserStatuses;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\City;
use App\Models\User;
use App\Services\CustomerService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $statuses;

    public function __construct(private UserService $userService)
    {
        $this->statuses = UserStatuses::keyLabels();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);
        $users = $this->userService->index();
        return view('backend.user.index',
            [
                'users' => $users,
                'statuses' => $this->statuses
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', User::class);
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $this->authorize('create', User::class);
        if ($this->userService->store($request) === true) {
            return redirect()->route('user.index')->with('success', __('general.user.alerts.user_successfully_created'));
        } else {
            return redirect()->route('user.index')->with('error', __('general.alerts.operation_failed'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('edit', $user);
        return view('backend.user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        if ($this->userService->update($request, $user) === true) {
            return redirect()->route('user.index')->with('success', __('general.user.alerts.user_successfully_updated'));
        } else {
            return redirect()->route('user.index')->with('error', __('general.alerts.operation_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
