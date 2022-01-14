<?php
namespace App\Services;

use App\Models\Administrator;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdministratorEditService
{
    public function update(LoginRequest $request,Administrator $administrator)
    {

        $administrator->name = $request->name;
        $administrator->email = $request->email;
        $administrator->password = Hash::make($request->password);
        $administrator->save();

    }
}
