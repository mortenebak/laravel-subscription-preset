<?php


namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(UpdatePasswordRequest $request)
    {
        $request->validated();

        auth()->user()->update([
            'password'=> Hash::make($request->new_password)
        ]);

        return redirect()->back()->with('success', 'Your password was changed!');
    }

}
