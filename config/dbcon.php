<?php
class DBConnection{
		private $con;
		
		public function connect(){
			$this->con = new mysqli("localhost","root","","andromeda_db");
			if(!$this->con){
				die("Could not connect to database ! Error no.".mysqli_errno($this->con));	
			}
			return $this->con;
		}


	}

?>