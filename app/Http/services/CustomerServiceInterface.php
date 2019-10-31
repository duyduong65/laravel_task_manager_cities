<?php


namespace App\Http\services;


use App\Http\Requests\CreateCustomerRequest;

interface CustomerServiceInterface extends ServiceInterface
{
    function getAll();

    function store($request);
}
