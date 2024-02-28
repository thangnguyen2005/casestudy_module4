<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->password = $request->password;
        $customer->save();
        return response()->json([
            'message' => 'ok',
            'customer' => $customer
        ], 201);
    }

}
