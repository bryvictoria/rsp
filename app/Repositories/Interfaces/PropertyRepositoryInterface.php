<?php
namespace App\Repositories\Interfaces;

interface PropertyRepositoryInterface{

    public function search(array $conditions);

    public function all();

}

?>
