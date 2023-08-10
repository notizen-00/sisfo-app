<?php 

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Fortify;

class CustomAuthenticator
{
    public function __invoke(Request $request)
    {
        $user = User::where('name', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            return $user;
        }
    }
}