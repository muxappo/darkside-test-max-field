<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CustomerController extends Controller
{
    public function index() {
        return Inertia::render("Customers");
    }

    public function create() {
        return Inertia::render("Customers/Create");
    }

    public function update() {

    }

    public function view() {

    }

    public function delete() {

    }
}
