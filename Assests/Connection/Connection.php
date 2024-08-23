<?php

		$servername="localhost";
		$username="root";
		$password="";
		$databasename="db_worky-fi";
		
		$con=mysqli_connect($servername,$username,$password,$databasename);
		if(!$con)
		{
			echo "Error in Conncetion";
		}


?>