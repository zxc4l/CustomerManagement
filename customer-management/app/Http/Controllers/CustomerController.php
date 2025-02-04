<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index()
    {
        $customers = \App\Models\Customer::paginate(10); 
        return view('customers.index', compact('customers'));
    }

    //
    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:6',
            'account_type' => 'required|in:basic,premium,enterprise',
            'status' => 'required|in:active,inactive,banned',
        ]);

        \App\Models\Customer::create([
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'account_type' => $validated['account_type'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer added successfully!');
    }
    //
    public function edit(\App\Models\Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, \App\Models\Customer $customer)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'password' => 'nullable|min:6',
            'account_type' => 'required|in:basic,premium,enterprise',
            'status' => 'required|in:active,inactive,banned',
        ]);

        $customer->fill($validated);

        if (!empty($validated['password'])) {
            $customer->password = bcrypt($validated['password']);
        } else {
            unset($customer->password);
        }

        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }

    //
    public function destroy(\App\Models\Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }

}
