<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    public function showRegistrationForm()
    {
        return view('customer_registration');
    }

    public function register(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string',
        'phone_number' => 'required|string',
        'email' => 'required|email|unique:customers',
        'test_drive_date' => 'required|date|after_or_equal:today',
        'test_drive_time' => ['required', 'regex:/^(0?[1-9]|1[0-2]):[0-5][0-9] (AM|PM)$/'],
        'down_payment_amount' => 'required|numeric',
        'purchase_status' => 'required|in:pending,completed', 
        'loan_amount' => 'nullable|numeric' 
    ]);
    
    

    // Create a new customer instance
    $customer = Customer::create($validatedData);

    if ($customer) {
        return Redirect::back()->with('success', 'Customer registered successfully');
    } else {
        return Redirect::back()->with('error', 'Failed to register the customer');
    }
    // $customer->save();

    // return Redirect::back()->with('success', 'Customer registered successfully');
}

public function edit($id)
    {
        // Retrieve customer by ID
        $customer = Customer::findOrFail($id);
        return view('update_customer', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        // Retrieve customer by ID
        $customer = Customer::findOrFail($id);

        // Validate input
        $validatedData = $request->validate([
            'down_payment_amount' => 'required|numeric',
            'purchase_status' => 'required|in:pending,completed',
            // 'loan_amount' => 'nullable|numeric|min:0',
        ]);

        // Update customer information
        $customer->update($validatedData);

        // Redirect back with success message
        return redirect()->route('dashboard', $customer->id)->with('success', 'Customer information updated successfully.');
    }

    

}

