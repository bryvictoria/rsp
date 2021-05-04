<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Services\PropertyService;

class PropertyController extends Controller
{

    protected $propertyService;

    public function __construct(PropertyService $propertyService){
        $this->propertyService = $propertyService;
    }

    public function search(Request $request){

        $queryparams = $request->query();
        $properties = $this->propertyService->search($queryparams);


        return $properties;
    }

}
