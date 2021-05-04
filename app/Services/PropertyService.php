<?php
namespace App\Services;
use App\Repositories\Interfaces\PropertyRepositoryInterface;

class PropertyService
{

    protected $properties;

    public function __construct(PropertyRepositoryInterface $properties){
        $this->properties = $properties;
    }



    function search($criterias){
        $conditions = []; //[COLUMN, OPERATOR, VALUE]


        if(isset($criterias['name'])){
            $conditions[] = ['name','like','%'.$criterias['name'].'%'];
        }
        if(isset($criterias['price_range_min'])){
            $conditions[] = ['price','>=',$criterias['price_range_min']];
        }
        if(isset($criterias['price_range_max'])){
            $conditions[] = ['price','<=',$criterias['price_range_max']];
        }
        if(isset($criterias['bedroooms'])){
            $conditions[] = ['bedroooms','=',$criterias['bedroooms']];
        }
        if(isset($criterias['bathrooms'])){
            $conditions[] = ['bathrooms','=',$criterias['bathrooms']];
        }
        if(isset($criterias['storeys'])){
            $conditions[] = ['storeys','=',$criterias['storeys']];
        }
        if(isset($criterias['garages'])){
            $conditions[] = ['garages','=',$criterias['garages']];
        }
        if(count($conditions)>0)
            $properties = $this->properties->search($conditions);
        else
            $properties = $this->properties->all();
        return $properties;
    }
}
?>
