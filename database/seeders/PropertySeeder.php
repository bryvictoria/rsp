<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		try{
			$filepath = storage_path('app/public/property-data.csv');
			$filehandle = @fopen($filepath,"r");
			$ctr = 0;
			if($filehandle){
				while(! feof($filehandle)){
					$property = fgetcsv($filehandle);
					if($ctr > 0 && $property && count($property) == 6){
						DB::table('properties')->insert([
							'name' => $property[0],
							'price' => floatval($property[1]),
							'bedrooms' => intval($property[2]),
							'bathrooms' => intval($property[3]),
							'storeys' => intval($property[4]),
							'garages' => intval($property[5])
						]);
					}
					$ctr++;
				}

				fclose($filehandle);
			}else{
				throw new \Exception("Csv file not found '$filepath'.");
			}
		}catch(Exception $e){
			print_r($e);
		}
    }
}
