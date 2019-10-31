<?php


namespace App\Http\services\implement;


use App\Customer;
use App\Http\repositories\CustomerRepositoryInterface;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\services\CustomerServiceInterface;

class CustomerService extends BaseService implements CustomerServiceInterface
{
    protected $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    function getAll()
    {
        return $this->customerRepository->index();
    }

    function store( $request)
    {
        $customer = new Customer();

        $customer->firstName = $request->firstName;
        $customer->lastName = $request->lastName;
        $customer->phone = $request->phone;
        $customer->address = $request->address;

        $image = $request->file('image');
        $path = $image->store('upload', 'public');
        $customer->image = $path;
        $customer->city_id = $request->city_id;

        $this->customerRepository->store($customer);
    }
}
