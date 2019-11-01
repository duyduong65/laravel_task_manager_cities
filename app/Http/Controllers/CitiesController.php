<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Http\services\CityServiceInterface;


class CitiesController extends Controller
{
    protected $cityService;

    public function __construct(CityServiceInterface $cityService)
    {
        $this->middleware('auth');
        $this->cityService = $cityService;
    }

    public function index()
    {
        $cities = $this->cityService->getAll();
        return view('cities.list_city', compact('cities'));
    }

    public function create()
    {
        return view('cities.create_city');
    }


    public function store(CreateCityRequest $request)
    {
        $this->cityService->store($request);
        return redirect()->route('cities.index');
    }

    public function show($id)
    {
        $listCustomer = $this->cityService->show($id);
        return view('cities.list_customer', compact('listCustomer'));
    }

    public function edit($id)
    {
        $city = $this->cityService->edit($id);
        return view('cities.edit_city', compact('city'));
    }

    public function update(UpdateCityRequest $request, $id)
    {
        $this->cityService->update($id, $request);
        return redirect()->route('cities.index');
    }

    public function destroy($id)
    {
        $this->cityService->destroy($id);
        return redirect()->route('cities.index');
    }


}
