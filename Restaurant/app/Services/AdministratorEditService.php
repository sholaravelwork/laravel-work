<?php
namespace App\Services;

use App\Models\Administrator;
use App\Http\Requests\LoginRequest;

class AdministratorEditService
{
    public function update(LoginRequest $request,Administrator $administrator)
    {

        $administrator->name = $request->name;
        $administrator->email = $request->email;
        $administrator->password = $request->password;
        $administrator->save();

    }
}
