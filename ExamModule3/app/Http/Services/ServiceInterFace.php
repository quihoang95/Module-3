<?php
namespace App\Http\Services;

interface ServiceInterFace
{
    function getAll();
    function findById($id);
    function add($request, $obj = null);
    function delete($obj);
    function update($request, $obj = null);
}
