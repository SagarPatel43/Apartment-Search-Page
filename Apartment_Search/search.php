<!--Assignment #3, Question #3-->
<!--Written by: Sagar Patel ID:40029417-->
<!--For SOEN 287-W - Winter 2017-->
<!--This code handles the search form values, it opens the file containing apartment records and checks every value to see if it matches with what the user input, the user's input is all ready through POST and corresponding
names to the fields in the Search Page, if the values are found to be equal, the values are read directly from the file at that line and printed to the screen, if the user is not signed in the information is shown 
without the address and instead with a login button next to each result that will redirect the user to the login page.-->
<?php
include('header.php'); 
session_start();?>
<fieldset class="fs1">
	<legend class="l1">Search Results</legend>
<?php
$file = fopen("apartments.txt", "r");
$nbr = 0;
	
	while($info = fgets($file)) {
		
	$info = trim($info);
	$temp = explode(';', $info);

	foreach($_POST['pets'] as $pet) {
		if($pet==$temp[2]) {
			$pet=1;
			break;
		}
	}
	foreach($_POST['sizes'] as $size) {
		if($size==$temp[3]) {
			$size=1;
			break;
		}
	}
	foreach($_POST['locations'] as $location) {
		if($location==$temp[4] || $location=="DC") {
			$location=1;
			break;
		}
	}
	foreach($_POST['prices'] as $price) {
		if($price > $temp[5]) {
			$price=1;
			break;
		}
	}
	foreach($_POST['perks'] as $perk) {
		if($perk == $temp[6]) {
			$perk=1;
			break;
		}
	}
	
	if($temp[0]==$_POST['numOfPeople'] && $temp[1]==$_POST['smoker'] && $pet==1 && $size==1 && $location==1 && $price==1 && $perk==1) {
			$nbr++;
			echo('<p id="time">' . "Apartment #" . $nbr . '</p>');
			if($_SESSION['loginuser'] != "") {
			echo("<b>Number of people: </b>" . $temp[0] . "<br><b> Smokers allowed: </b>" . $temp[1] . "<br><b> Pets allowed: </b>" . $temp[2] . "<br><b> Size of apartment: </b>" . $temp[3] . "<br><b> Location: </b>" . $temp[4] . "<br><b> Price: $</b>" . $temp[5] . "<br><b> Includes: </b>" . $temp[6] . "<br><b> Street Address: </b>" . $temp[7]);
			} else {
			echo('<b>Number of people: </b>' . $temp[0] . '<br><b> Smokers allowed: </b>' . $temp[1] . '<br><b> Pets allowed: </b>' . $temp[2] . '<br><b> Size of apartment: </b>' . $temp[3] . '<br><b> Location: </b>' . $temp[4] . '<br><b> Price: $</b>' . $temp[5] . '<br><b> Includes: </b>' . $temp[6]);
			echo '<p><input type="button" value="Login to see address" onclick="window.location =\'login.php\'" /></p>';
			}
		}	
	}
	
?>
</fieldset>
<?php
include('footer.php');
?>