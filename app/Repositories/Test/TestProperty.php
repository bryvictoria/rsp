<?php
namespace App\Repositories\Test;

use App\Repositories\Interfaces\PropertyRepositoryInterface;

class TestProperty implements PropertyRepositoryInterface{

    public function all(){
        return [];
    }

    public function search($conditions = []){

        $property = new \stdClass;
        $property->name='TestName';
        $property->price=120000;
        $property->bedrooms=1;
        $property->garages=1;
        $property->bathrooms=1;
        $property->storeys=1;

        $properties = [
            $property
        ];
        return $properties;

    }

}
