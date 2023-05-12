<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerFormRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index', compact('customers'));
    }
    public function create()
    {
        return view('admin.customers.create');
    }
    public function store(CustomerFormRequest $request)
    {
        $validatedData = $request->validated();

        $customer = new Customer();
        $customer->name = $validatedData['name'];
        $customer->phone = $validatedData['phone'];
        $customer->address = $validatedData['address'];
        $customer->status = $request->status == true ? '1' : '0';

        $customer->save();
        return redirect('admin/customers')->with('message', 'Customer Has Added');
    }
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }
    public function update(CustomerFormRequest $request, $customer)
    {
        $validatedData = $request->validated();
        $customer = Customer::findOrFail($customer);

        $customer->name = $validatedData['name'];
        $customer->phone = $validatedData['phone'];
        $customer->address = $validatedData['address'];
        $customer->status = $request->status == true ? '1' : '0';

        $customer->update();
        return redirect('admin/customers')->with('message', 'Customer update Succesfully');
    }
    public function destroy(int $customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $customer->delete();
        return redirect()->back()->with('message', 'Customer has ben Deleted!');
    }
}
