<?php


namespace App\Http\repositories;


use App\Http\Requests\CreateCustomerRequest;


interface CustomerRepositoryInterface extends RepositoryInterface
{
    function index();
    function store($obj);
}
