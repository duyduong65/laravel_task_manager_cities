<?php


namespace App\Http\repositories\eloquent;


use App\Customer;
use App\Http\repositories\CustomerRepositoryInterface;
use App\Http\Requests\CreateCustomerRequest;
use Illuminate\Support\Facades\Request;


class CustomerEloquentRepository implements CustomerRepositoryInterface
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    function index()
    {
        return Customer::all();
    }

    function store($obj)
    {
        $obj->save();
    }

}
