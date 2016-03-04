<?php

	if(isset($_POST['key'])){

		// Maak connectie met de database
		//
			$conn = new mysqli("localhost", "les15", "", "demoles15");

			if ($conn->connect_error) {
				trigger_error('Kan geen verbinding maken:'.$conn->connect_error, E_USER_ERROR);
			}

		// Update de info van de provincie
		//
			$data = array(
				htmlspecialchars($conn->real_escape_string(trim($_POST['amount']))),
				htmlspecialchars($conn->real_escape_string(trim($_POST['gemeentebelasting']))),
				htmlspecialchars($conn->real_escape_string(trim($_POST['lname']))),
				htmlspecialchars($conn->real_escape_string(trim($_POST['fname']))),
				htmlspecialchars($conn->real_escape_string(trim($_POST['scholen']))),
				htmlspecialchars($conn->real_escape_string(trim($_POST['key']))),
			);
			$sql = "UPDATE states SET amount='".$data[0]."', gemeentebelasting='".$data[1]."', lname='".$data[2]."', fname='".$data[3]."', scholen='".$data[4]."' WHERE `key` = '".$data[5]."'";

			if ($conn->query($sql) === TRUE) {

				echo 'Aanpassingen opgeslagen.';
			}	

			mysqli_close($conn);
	}
	
?>