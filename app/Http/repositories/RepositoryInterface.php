<?php


namespace App\Http\repositories;


interface RepositoryInterface
{
    function getAll();

    function save($obj);

    function findById($id);

    function delete($obj);

}
