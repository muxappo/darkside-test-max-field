<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index() {

        /*
        Customer index func to retrieve the list of customers in the db 
        and assign routes to view/delete the entry if required
        */

        $customers = Customer::orderBy('created_at', 'desc')->get();

        foreach($customers AS $customer) {
            $customer->viewUrl = route('customers.view', ['id' => $customer->id]);
            $customer->deleteUrl = route('customers.delete', ['id' => $customer->id]);
        }

        return Inertia::render("Customers", ['customers' => $customers]);
    }

    public function create() {
        // Func to make the csrf token available for new customer creation

        return Inertia::render("Customers/Create", [
            'csrfToken' => csrf_token(),
        ]);
    }


    public function store(Request $request)
    {
        // Func to add a customer to the database after details are saved from the creation form

        $customer = new Customer;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->save();

        // Redirect user to index page upon completion

        return redirect(route('customers.index'));
    }
    public function update(Request $request) {

        // Func to update customer details from view/edit page

        $customer = Customer::where('id', $request->id)->first();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->save();

        // Redirect user to index page upon completion

        return redirect(route('customers.index'));
    }

    public function view(int $id) {

        // Func to retrieve a customer's view route by db ID

        $customer = Customer::where('id', $id)->first();

        return Inertia::render("Customers/Edit", [
            'csrfToken' => csrf_token(),
            'customer' => $customer,
        ]);

    }

    public function delete(int $id) {
        // Func to retrive a customer's delete route by db ID

        Customer::where('id', $id)->delete();
        return redirect(route('customers.index'));
    }
}
