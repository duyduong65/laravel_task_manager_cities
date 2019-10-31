<?php


namespace App\Http\services;


interface ServiceInterface
{
    function getAll();

    function store($request);

    function edit($id);

    function update($id, $request);

    function destroy($id);
}
