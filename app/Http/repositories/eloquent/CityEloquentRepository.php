<?php


namespace App\Http\repositories\eloquent;


use App\City;

use App\Http\repositories\CityRepositoryInterface;

class CityEloquentRepository implements CityRepositoryInterface
{
    protected $city;

    public function __construct(City $city)
    {
        $this->city = $city;
    }

    function getAll()
    {
        return $this->city->all();
    }

    function save($obj)
    {
        $obj->save();
    }

    function findById($id)
    {
        return  $this->city->findOrFail($id);
    }

    function delete($obj)
    {
        $obj->delete();
    }
}
