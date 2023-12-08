<?php

namespace Model;

class Dbh{
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $db;
	private $conn;


	public function __construct($db){
		$this->db=$db;
	}


	protected function connectdb(){
		$this->conn = new \mysqli($this->host, $this->user, $this->password,$this->db);

		 if ($this->conn->connect_error) {
    		die("Connection failed: " . $this->conn->connect_error);
    		//echo 'errror connecting to '. $this->db;
    
  		}
  		else{
    	//echo 'connected to '. $this->db;
    	return $this->conn;
    	
  		}
	}
	protected function connectdb_otherServer($host,$user,$pass){

  		//connect to other server db
  		$this->host = $host;
		$this->user = $user;
		$this->password = $pass;

		$this->conn = new \mysqli($this->host, $this->user, $this->password,$this->db);

		if ($this->conn->connect_error) {
    		die("Connection failed: " . $this->conn->connect_error);
    		//echo 'errror connecting to '. $this->db;
    
  		}
  		else{
    		//echo 'connected to '. $this->db;
    		return $this->conn;
    	
  		}
	}
	
	
}


