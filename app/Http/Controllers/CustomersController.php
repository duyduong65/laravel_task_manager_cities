<?php

namespace App\Http\Controllers;

use App\City;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CustomersController extends Controller
{
    protected $customer;
    protected $city;

    public function __construct(Customer $customer, City $city)
    {
        $this->middleware('auth');
        $this->customer = $customer;
        $this->city = $city;
    }

    public function index()
    {
        $customers = $this->customer->all();
        return view('customers.list_customer', compact('customers'));
    }

    public function create()
    {
        $listCity = $this->city->all();
        return view('customers.create_customer', compact('listCity'));
    }

    public function store(Request $request)
    {
        $image = $request->image;
        $destinationPath = 'public/upload';
        $fileName = date('ymdhisa') . "." . $image->getClientOriginalExtension();

        $this->customer->create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'phone' => $request->phone,
            'address' => $request->address,
            'image' => $fileName,
            'city_id' => $request->city_id,
        ]);

        $image->storeAs($destinationPath, $fileName);

        return redirect()->route('customers.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $customer = $this->customer->findOrFail($id);
        $listCity = $this->city->all();
        return view('customers.edit_customer', compact(['customer', 'listCity']));
    }

    public function update(Request $request, $id)
    {
        $customer = $this->customer->findOrFail($id);
        $customer->update([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'phone' => $request->phone,
            'address' => $request->address,
            'city_id' => $request->city_id,
        ]);
        return redirect()->route('customers.index');
    }

    public function destroy($id)
    {
        $customer = $this->customer->findOrFail($id);

        if (file_exists(storage_path("/app/public/upload/$customer->image"))){
            File::delete(storage_path("/app/public/upload/$customer->image"));
        }
        $customer->delete();

        return redirect()->route('customers.index');
    }
}
