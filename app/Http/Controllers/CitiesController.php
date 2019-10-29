<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitiesController extends Controller
{
    protected $city;

    public function __construct(City $city)
    {
        $this->middleware('auth');
        $this->city = $city;
    }

    public function index()
    {
        $cities = $this->city->all();
        return view('cities.list_city', compact('cities'));
    }

    public function create(Request $request)
    {
        return view('cities.create_city');
    }


    public function store(Request $request)
    {
        $this->city->create([
            'cityName' => $request->city
        ]);

        return redirect()->route('cities.index');
    }

    public function show($id)
    {
        $city = $this->city->findOrFail($id);
        $listCustomer = $city->customers()->get();
        return view('cities.list_customer', compact('listCustomer'));
    }

    public function edit($id)
    {
        $city = $this->city->findOrFail($id);
        return view('cities.edit_city', compact('city'));
    }

    public function update(Request $request, $id)
    {
        $city = $this->city->findOrFail($id);
        $city->update([
            'cityName' => $request->city
        ]);
        return redirect()->route('cities.index');
    }

    public function destroy($id)
    {
        $city = $this->city->findOrFail($id);
        $city->delete();
        return redirect()->route('cities.index');
    }


}
