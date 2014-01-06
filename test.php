<?php 
            	echo $_SERVER['PHP_SELF']."?";
				$params="";
            	foreach ($_GET as $var=>$val){
					if ($var != 'sort') {
						$params=$params.$var."=".$val."&&";
					}
					else{
						$val='mr';
						$params=$params.$var."=".$val."&&";
					}
				}	
				echo $params."<br>";
			
				
				
				echo $_SERVER['PHP_SELF']."?";
				$params="";
				foreach ($_GET as $var=>$val){
						if ($var != 'sort') {
							$params=$params.$var."=".$val."&&";
						}
						else{
							$val='tr';
							$params=$params.$var."=".$val."&&";
						}
				}
				echo $params."<br>";
				
				
				
				echo $_SERVER['PHP_SELF']."?";
				$params="";
				foreach ($_GET as $var=>$val){
					if ($var != 'sort') {
						$params=$params.$var."=".$val."&&";
					}
					else{
						$val='mv';
						$params=$params.$var."=".$val."&&";
					}
				}
				echo $params."<br>";
              
              ?>