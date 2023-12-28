<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(3);

        return view('customer.index', compact('customers'));
    }
    public function login()
    {

        return view('customer.login');
    }
    public function checklogin(LoginRequest $request)
    {
        // dd(123);
        $arr = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::guard('customers')->attempt($arr)) {
            return redirect()->route('cart');
        } else {
            return redirect()->route('customer.login');
        }
    }
    public function register()
    {

        return view('customer.register');
    }
    public function checkRegister(RegisterRequest $request)
    {

        $validated = $request->validate([
            'email' => 'required|unique:customers|email',
            ]);

        $notifications = [
            'ok' => 'ok',
        ];
        $notification = [
            'message' => 'error',
        ];
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address =  $request->address;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->psw);

        if ($request->psw == $request->psw_repeat) {
            $customer->save();
            return redirect()->route('customer.login');
        } else {
            return redirect()->route('customer.register')->with($notification);

        }
    }
    public function list()
    {
        $customers = Customer::paginate(3);

        return view('customer.list', compact('customers'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('customer.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->password = $request->password;
        $customer->save();
        return redirect()->route('customer.index');
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customer.edit', compact('customers'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->save();

        return redirect()->route('customer.index');
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customer.index');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $customers = Customer::where('name', 'LIKE', "%$keyword%")
            ->orWhere('address', 'LIKE', "%$keyword%")
            ->orWhere('email', 'LIKE', "%$keyword%")
            ->orWhere('phone', 'LIKE', "%$keyword%")
            ->paginate(3);

        return view('customer.index', compact('customers'));
    }
}
