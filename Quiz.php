<!-- Example from pages 362 - 364 -->

<!DOCTYPE html>
<html>
<head>
	<title> PHP Form Quiz </title>
</head>
<body>
	<?php
		// Associative array of the questions and answers
	$StateCapitals = array(
		"Connecticut" => "Hartford", "Maine" => "Augusta",
		"Massachusetts" => "Boston",
		"New Hampshire" => "Concord",
		"Rhode Island" => "Providence",
		"Vermont" => "Montpelier");

	// Determine if the submit button was clicked
	if(isset($_POST["submit"])) {
		// Create an array out of the array of the user-submitted data
		$Answers = $_POST["answers"];

		// Accumulator variable for the scoring
		$Score = 0;

		if(is_array($Answers)) {
			// We checked $Answers and it is in an array
			foreach ($Answers as $State => $Response) {
				// $Answers is the array. $State is the key, $Response is the value.

				$Response = stripslashes($Response);

				// Check this response to see if it was left empty
				if (strlen($Response) > 0) {
					if(strcasecmp($StateCapitals[$State], $Response) == 0 ) {
						echo "<p> Correct! The capital of $State is " . $StateCapitals[$State] . ".</p>\n";
						++$Score;

					}
					else {
						// We have an incorrect answer
						echo "<p> Sorry, the capital of $State is not $Response. </p> \n";

					}
				}
				else {
					// This answer was left empty

					echo "<p> You did not enter a value for the capital of $State! </p> \n";
				}

			} // End of foreach statement
		}
		echo "<p> You got $Score correct! </p>\n";
		echo "<p><a href = 'Quiz.php'> Try Again? </a></p>\n";
	}
	else { 
		echo "<form action = 'Quiz.php'method='post'>\n";
		foreach ($StateCapitals as $State => $Response) {
			echo "The capital of $State is: <input type='text' name = 'answers[" . $State . "]' /><br/>\n";
		} // End of foreach loop
		echo "<input type='submit' name='submit' value='Check Answers'/>";
		echo "<input type='reset' name='reset' value='Reset Form'/>";
		echo "<form/>\n";
	}

	?>

</body>
</html>