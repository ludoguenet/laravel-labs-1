<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'users_data.*' => Rule::forEach(
                fn (array $value) => Str::contains(Str::before($value['email'], '@'), 'admin') ? [ 'password' => 'min:20' ] : [],
            ),
        ])->validate();
    }
}
