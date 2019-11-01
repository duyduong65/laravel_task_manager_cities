<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\services\CityServiceInterface;
use App\Http\services\CustomerServiceInterface;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    protected $customerService;
    protected $cityService;

    public function __construct(CustomerServiceInterface $customerService, CityServiceInterface $cityService)
    {
        $this->middleware('auth');
        $this->customerService = $customerService;
        $this->cityService = $cityService;
    }

    public function index()
    {
        $customers = $this->customerService->getAll();
        return view('customers.list_customer', compact('customers'));
    }

    public function create()
    {
        $listCity = $this->cityService->getAll();
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
        $customer = $this->customerService->edit($id);
        $listCity = $this->cityService->getAll();
        return view('customers.edit_customer', compact(['customer', 'listCity']));
    }

    public function update(UpdateCustomerRequest $request, $id)
    {
        $this->customerService->update($id, $request);

        return redirect()->route('customers.index');
    }

    public function destroy($id)
    {
        $this->customerService->destroy($id);
        return redirect()->route('customers.index');
    }

    public function search(Request $request)
    {
        $customers = $this->customerService->search($request);
        dd($customers);
    }
}
