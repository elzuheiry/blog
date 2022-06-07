<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|user'])->only(['index', 'edit', 'store', 'destroy']);
        $this->middleware(['permission:admin_read'])->only('index');
        $this->middleware(['permission:admin_update'])->only('edit');
        $this->middleware(['permission:admin_delete'])->only('destroy');
    }

    public function index()
    {
        return view('admin.index', [
            'users' => User::whereRoleIs('user')->paginate(5)
        ]);
    }

    public function edit(User $user)
    {
        return view('admin.edit', [
            'user' => $user
        ]);
    }

    public function update(User $user)
    {
        $attributes = request()->all();
        $attributes['permissions'] = request()->permissions;

        $user->update($attributes);
        $user->syncPermissions(request()->permissions);
        return redirect()->back()->with('success', 'Author Was Updated Successfully!');

    }

    public function destroy(User $user)
    {
        if (! $user){
            throw new ModelNotFoundException();
        }

        $user->delete();
        return redirect()->back()->with('success', 'The Author Was Delete Successfully!');
    }
}