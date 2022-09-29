<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Session;
use Cart;

class CheckoutController extends Controller
{
    private $customer;
    private $order;
    private $orderDetail;
    private $cartProducts;
    public function index()
    {
        if(Session::get('customer_id'))
        {
            $this->customer = Customer::find(Session::get('customer_id'));
        }
        else
        {
            $this->customer = '';
        }
        return view('website.checkout.index', ['customer' => $this->customer]);
    }

    public function newOrder(Request $request)
    {
        if(Session::get('customer_id'))
        {
            $this->customer = Customer::find(Session::get('customer_id'));
        }
        else
        {
            $request->validate([
                'name'              => 'required',
                'email'             => 'required|unique:customers',
                'mobile'            => 'required',
                'delivery_address'  => 'required',
            ]);

            $this->customer = Customer::newCustomer($request);

            Session::put('customer_id', $this->customer->id);
            Session::put('customer_name', $this->customer->name);
        }


        $this->order        = Order::newOrder($this->customer, $request);
        $this->orderDetail  = OrderDetails::newOrderDetail($this->order);

        $this->cartProducts = Cart::getContent();
        foreach ($this->cartProducts as $cartProduct)
        {
            Cart::remove($cartProduct->id);
        }
        return redirect('/complete-order')->with('message', 'Your Order Successfully post. Please wait we will contact with you soon.');

    }

    public function completeOrder()
    {
        return view('website.checkout.complete-order');
    }
}
