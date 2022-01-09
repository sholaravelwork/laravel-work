<?php
namespace App\Services;

use App\Models\Administrator;
use App\Http\Requests\AdminiRequest;


class AdministratorStoreService
{
    public function store(AdminiRequest $request)
    {
        $administrator =  new Administrator();

        $administrator->name = $request->name;
        $administrator->email = $request->email;
        $administrator->password = $request->password;
        $administrator->save();
    }
}
