<?php

namespace Model;

spl_autoload_register(function ($class) {
    include '../' . $class . '.php';
});

use Model\Dbh;



class UserVerification extends Dbh
{   
    private $dbh;

    public function __construct(){
        $this->dbh = new Dbh("wims");
    }
    public function searchUser($username,$area,$store){
   
        $connection = $this->dbh->connectdb_otherServer("localhost","root","");

        $sql = "SELECT empLog.id,empLog.emp_id,empDetails.first_name,empLog.password,branchEmp.deployment_status FROM employee_logincreds AS empLog JOIN branchpersonnel_history AS branchEmp ON empLog.id= branchEmp.employee_id JOIN employee_details AS empDetails ON empLog.id=empDetails.id WHERE (empLog.emp_id = '".$username."')AND(branchEmp.deployment_status = 'Active') AND(branchEmp.store_area = '".$area."' AND branchEmp.store_num = '".$store."') ORDER BY empLog.id DESC";
        $result = $connection->query($sql);

        $data = [];
        if ($result){
            while ($row = $result->fetch_assoc()){
                array_push($data,$row);
            } 

            return $data;
            exit();
        }
        else{
            http_response_code(500);
            exit();
        }

   }

   
}
//$test = new StoreDetails("BUL","0001");
//print_r($test->storePersonnels);
