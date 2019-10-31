<?php


namespace App\Http\repositories\eloquent;


use App\Customer;
use App\Http\repositories\CustomerRepositoryInterface;
use App\Http\Requests\CreateCustomerRequest;
use Illuminate\Support\Facades\Request;
use phpDocumentor\Reflection\Types\This;


class CustomerEloquentRepository implements CustomerRepositoryInterface
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    function getAll()
    {
        return $this->customer->all();
    }

    function save($obj)
    {
        $obj->save();
    }

    function findById($id)
    {
      return  $this->customer->findOrFail($id);
    }

    function delete($obj)
    {
        $obj->delete();
    }
}
