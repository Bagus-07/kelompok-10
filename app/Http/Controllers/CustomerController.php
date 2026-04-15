<?php

namespace App\Http\Controllers;

class CustomerController extends Controller
{
    // FUNCTION 1: get data
    public function getData()
    {
        return [
            ['name' => 'Alice', 'email' => 'alice@gmail.com'],
            ['name' => 'Bob', 'email' => 'bob@gmail.com'],
        ];
    }

    // FUNCTION 2: send to view
    public function tampilkan()
{
    $data = $this->getData();
    return view('customer', compact('data'));
}
}