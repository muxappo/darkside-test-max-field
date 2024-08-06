<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index() {

        $customers = Customer::orderBy('created_at', 'desc')->get();

        foreach($customers AS $customer) {
            $customer->viewUrl = route('customers.view', ['id' => $customer->id]);
            $customer->deleteUrl = route('customers.delete', ['id' => $customer->id]);
        }

        return Inertia::render("Customers", ['customers' => $customers]);
    }

    public function create() {
        return Inertia::render("Customers/Create", [
            'csrfToken' => csrf_token(),
        ]);
    }

    public function store(Request $request)
    {
        $customer = new Customer;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->save();

        return redirect(route('customers.index'));
    }

    public function update(Request $request) {

        $customer = Customer::where('id', $request->id)->first();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->save();

        return redirect(route('customers.index'));
    }

    public function view(int $id) {

        $customer = Customer::where('id', $id)->first();

        return Inertia::render("Customers/Edit", [
            'csrfToken' => csrf_token(),
            'customer' => $customer,
        ]);

    }

    public function delete(int $id) {
        Customer::where('id', $id)->delete();
        return redirect(route('customers.index'));
    }
}
