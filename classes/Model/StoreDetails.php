<?php

namespace Model;

spl_autoload_register(function ($class) {
    include '../' . $class . '.php';
});

use Model\Dbh;



class StoreDetails extends Dbh
{   
    public $storeName;
    public $storePersonnels;

   public function __construct($storeArea,$storeNum){
    $this->store($storeArea,$storeNum);
    $this->personnels($storeArea,$storeNum);
   }

   public function store($Area,$Num){
    $dbh = new Dbh("wims");
    $connection = $dbh->connectdb_otherServer("localhost","root","");

    $sql = "SELECT * FROM store_masterlist WHERE store_area = '".$Area."' AND store_num = '".$Num."'";
    $result = $connection->query($sql);

    if ($result){

     
        
        while ($row = $result->fetch_assoc()){

            $this->storeName = $row['store_name'];
        }
        
    }
    else{
        echo "failed";
    }

   }

   public function personnels($Area,$Num){
    $dbh = new Dbh("wims");
    $connection = $dbh->connectdb_otherServer("localhost","root","");

    $sql = "SELECT employee_id FROM branchpersonnel_history WHERE store_area = '".$Area."' AND store_num = '".$Num."'";
    $result = $connection->query($sql);

    if ($result){
        $personnels = [];
        while ($row = $result->fetch_assoc()){
            array_push($personnels, $row['employee_id']);
        }
        
    }
    else{
        echo "failed";
    }

    $this->storePersonnels= json_encode($personnels);
   }
}
//$test = new StoreDetails("BUL","0001");
//print_r($test->storePersonnels);
