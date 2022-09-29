<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Session;

use Illuminate\Http\Request;

class CustomerAuthController extends Controller
{
    private $customer;
    public function login()
    {
        return view('website.auth.login');
    }

    public function signIn(Request $request)
    {
        $this->customer = Customer::where('email', $request->email)->first();
        if($this->customer)
        {
            if(password_verify($request->password,$this->customer->password))
            {
                Session::put('customer_id', $this->customer->id);
                Session::put('customer_name', $this->customer->name);

                return redirect('/customer-dashboard');
            }
            else
            {
                return redirect()->back()->with('message', 'sorry you password is incorrect.');
            }

        }
        else
        {
            return redirect()->back()->with('message', 'sorry you email address is invalid.');
        }


    }

    public function logout()
    {
        Session::forget('customer_id');
        Session::forget('customer_name');
        return redirect('/');
    }

    public function register()
    {
        return view('website.auth.register');
    }

    public function newCustomer(Request $request)
    {
        $this->customer = Customer::newCustomerRegister($request);
        Session::put('customer_id', $this->customer->id);
        Session::put('customer_name', $this->customer->name);

        return redirect('/customer-dashboard');
    }
}
