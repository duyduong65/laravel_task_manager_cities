<?php


namespace App\Http\services\implement;


use App\Customer;
use App\Http\repositories\CustomerRepositoryInterface;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\services\CustomerServiceInterface;
use Illuminate\Support\Facades\File;

class CustomerService extends BaseService implements CustomerServiceInterface
{
    protected $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    function getAll()
    {
        return $this->customerRepository->getAll();
    }

    function store($request)
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

        $this->customerRepository->save($customer);
    }

    function edit($id)
    {
        return $this->customerRepository->findById($id);
    }

    function update($id, $request)
    {
        $customer = $this->customerRepository->findById($id);
        $customer->firstName = $request->firstName;
        $customer->lastName = $request->lastName;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->city_id = $request->city_id;

        $this->customerRepository->save($customer);

    }

    function destroy($id)
    {
        $customer = $this->customerRepository->findById($id);
        if (file_exists(storage_path("/app/public/upload/$customer->image"))) {
            File::delete(storage_path("/app/public/upload/$customer->image"));
        }
        $this->customerRepository->delete($customer);
    }
}
