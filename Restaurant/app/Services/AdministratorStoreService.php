<?php
namespace App\Services;

use App\Models\Administrator;
use App\Http\Requests\AdminiRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdministratorStoreService
{
    public function store(AdminiRequest $request)
    {
        $administrator =  new Administrator();

        $administrator->name = $request->name;
        $administrator->email = $request->email;
        $administrator->password = Hash::make($request->password);
        $administrator->save();
    }
}
