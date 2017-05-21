<?php

	header('Content-Type: application/json');

	if(isset($_GET["key"]) && trim($_GET["key"]) != ""){

		

		// Maak connectie met de database
		//
			$conn = new mysqli("localhost", "les15", "", "demoles15");
			$state_key = $conn->real_escape_string(trim($_GET["key"]));
			if ($conn->connect_error) {
				trigger_error('Kan geen verbinding maken:'.$conn->connect_error, E_USER_ERROR);
			}

		// Haal info van de meegegeven provincie op
		//
			$sql = "SELECT * FROM states WHERE `key` = '".$state_key."'";
			$result = $conn->query($sql);

			if( $result->num_rows > 0 ){

				$json_response = array();

				while($row = $result->fetch_assoc()){
				    
				    $row_array['id'] = $row['id'];
				    $row_array['key'] = $row['key'];
				    $row_array['name'] = $row['name'];
				    $row_array['amount'] = $row['amount'];
				    $row_array['fname'] = $row['fname'];
					$row_array['lname'] = $row['lname'];
					$row_array['gemeentebelasting'] = $row['gemeentebelasting'];
					$row_array['scholen'] = $row['scholen'];
				    array_push($json_response,$row_array);
				}

				// Weergeven als json-formaat
				echo json_encode($json_response);
			}	

			mysqli_close($conn);
	}
?>