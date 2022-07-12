<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        echo "Dashboard";
    }

    public function show(User $user): View
    {

        return view('account.show', [
            'user' => $user,
        ]);
    }

    public function edit(): View
    {
        return view('account.edit', [
            'user' => auth()->user(),
        ]);
    }

    public function update(UpdateUserRequest $request): RedirectResponse
    {
        $request->validated();

        auth()->user()->update($request->all());

        return redirect()->back()->with('success', 'Your setting was updated!');
    }
}
