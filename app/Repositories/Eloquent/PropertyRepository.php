<?php
namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\PropertyRepositoryInterface;
use App\Models\Property;

class PropertyRepository implements PropertyRepositoryInterface{

    public function all(){
        $properties = Property::all();
        return $properties;
    }

    public function search($conditions = []){

        $properties = Property::where($conditions)->get();

        return $properties;

    }

}
