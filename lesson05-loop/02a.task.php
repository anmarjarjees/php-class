<?php
$myExams = [ 90, 85, 72, 91, 83, 88 ]; // 5 elements (max index: 4)
// we can use this command to test our code
print_r( $myExams );

// Task: use for-loop to output all the array's values:

// Using PHP count() function
// to count how many elements 
for ($i=0; $i<count($myExams); $i++) {
	// we can use any of the following:

	// 1. using " with echo can output the value of the variable
	echo "$myExams[$i]<br>"; // 90
	
	// OR 2. using the . for concatenating:
	echo $myExams[$i]."<br>"; // 90
	
	// OR 3. using " with print to output the value of the variable:
	print "$myExams[$i]<br>"; // 90
}

$heading2="Welcome to Arrays in PHP!";
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Arrays and For loop</title>
</head>

<body>
	<h1>Exam Marks</h1>
	<h2><?php echo $heading2 ?></h2>
	<ul>
		<!-- 
	we need to insert the values of the exam array
	into these li elements
	-->
		<li>exam1:
			<?php echo $myExams[0] ?>
		</li>
		<li>exam2:
			<?php echo $myExams[1] ?>
		</li>
		<li>exam3:
			<?php echo $myExams[2] ?>
		</li>
		<li>exam4:
			<?php echo $myExams[3] ?>
		</li>
		<li>exam5:
			<?php echo $myExams[4] ?>
		</li>
	</ul>
</body>
</html>