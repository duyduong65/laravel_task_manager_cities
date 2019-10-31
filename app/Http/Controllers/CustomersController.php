<?php

namespace App\Http\Controllers;

use App\City;
use App\Customer;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\services\CustomerServiceInterface;
use Illuminate\Support\Facades\File;

class CustomersController extends Controller
{
    protected $customerService;
    protected $city;

    public function __construct(CustomerServiceInterface $customerService, City $city)
    {
        $this->middleware('auth');
        $this->customerService = $customerService;
        $this->city = $city;
    }

    public function index()
    {
        $customers = $this->customerService->getAll();
        return view('customers.list_customer', compact('customers'));
    }

    public function create()
    {
        $listCity = $this->city->all();
        return view('customers.create_customer', compact('listCity'));
    }

    public function store(CreateCustomerRequest $request)
    {
        $this->customerService->store($request);
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

    public function update(UpdateCustomerRequest $request, $id)
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

        if (file_exists(storage_path("/app/public/upload/$customer->image"))) {
            File::delete(storage_path("/app/public/upload/$customer->image"));
        }
        $customer->delete();

        return redirect()->route('customers.index');
    }
}
