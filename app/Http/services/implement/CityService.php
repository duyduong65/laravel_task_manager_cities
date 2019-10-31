<?php


namespace App\Http\services\implement;


use App\City;
use App\Http\repositories\eloquent\CityEloquentRepository;
use App\Http\services\CityServiceInterface;

class CityService extends BaseService implements CityServiceInterface
{
    protected $cityService;

    public function __construct(CityEloquentRepository $cityEloquentRepository)
    {
        $this->cityService = $cityEloquentRepository;
    }


    function getAll()
    {
        return $this->cityService->getAll();
    }

    function store($request)
    {
        $city = new City();
        $city->cityName = $request->city;
        $this->cityService->save($city);
    }

    function edit($id)
    {
        return $this->cityService->findById($id);
    }

    function update($id, $request)
    {
        $city = $this->cityService->findById($id);
        $city->cityName = $request->city;
        $this->cityService->save($city);
    }

    function destroy($id)
    {
        $city = $this->cityService->findById($id);
        $this->cityService->delete($city);
    }

    function show($id)
    {
        $city = $this->cityService->findById($id);
        $listCustomer = $city->customers()->get();
        return $listCustomer;
    }
}
