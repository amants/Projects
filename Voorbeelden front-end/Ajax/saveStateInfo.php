<?php

	if(isset($_POST['key'])){

		// Maak connectie met de database
		//
			$conn = new mysqli("localhost", "root", "", "demo_les15");

			if ($conn->connect_error) {
				trigger_error('Kan geen verbinding maken:'.$conn->connect_error, E_USER_ERROR);
			}

		// Update de info van de provincie
		//
			$sql = "UPDATE states SET amount='".trim($_POST['amount'])."', gemeentebelasting='".trim($_POST['gemeentebelasting'])."', lname='".trim($_POST['lname'])."', fname='".trim($_POST['fname'])."', scholen='".trim($_POST['scholen'])."' WHERE `key` = '".trim($_POST['key'])."'";

			if ($conn->query($sql) === TRUE) {

				echo 'Aanpassingen opgeslagen.';
			}	

			mysqli_close($conn);
	}
	
?>