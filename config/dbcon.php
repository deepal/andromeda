<?php
class DBConnection{
		private $con;
		
		public function connect(){
			$this->con = new mysqli("localhost","root","","projectportal-bootstrap");
			if(!$this->con){
				die("Could not connect to database ! Error no.".mysqli_errno($this->con));	
			}
			return $this->con;
		}


	}

?>