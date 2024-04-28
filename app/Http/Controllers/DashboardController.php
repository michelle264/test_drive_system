<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $registrations = Customer::all(); // Fetch registrations from the database
    return view('dashboard', compact('registrations'));
}

public function checkEligibility($id)
    {
        // Find the customer by ID
        $customer = Customer::findOrFail($id);
        // $car_price =200000;

        $isFirstTenCustomer = Customer::count() < 11;

        // Check eligibility 
        $eligibleForDiscount = false;
        if ($isFirstTenCustomer && $customer->down_payment_amount >= 20000 && $customer->purchase_status=='completed') {
            $eligibleForDiscount = true;
            $message = 'Customer is eligible for a 15% discount.';
        } else {
            $message = 'Customer is not eligible for the discount.';
        }
    
        return redirect()->back()->with('eligibleForDiscount', $eligibleForDiscount)->with('message', $message);
    }

    
}
