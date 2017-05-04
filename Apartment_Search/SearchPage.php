<!--Assignment #4, Question #4-->
<!--Written by: Sagar Patel ID:40029417-->
<!--For SOEN 287-W - Winter 2017-->
<!--This page of the website is from previous assignments, with the addition of php to include a header and footer to the page, and login button, a welcome user field, and a working search button, this is used
as the Main Page for the apartment search form-->
<?php include('header.php'); 
		session_start();
		//session_destroy();
		if($_SESSION['loginuser'] != "") {
		echo('<p id="welcome">'. "Welcome, " . $_SESSION['loginuser'] . '</p>');}?>
		<input type="button" id="login" value="Login">
		<form action="search.php" method="post">
			<fieldset class="fs1">
				<legend class="l1">Renter(s) Information</legend>
				<label class ="label1">How many people wil live in the apartment?</label> <input type="number" min="0" name="numOfPeople">
				<br />
				<br />
				<label class="label1">Smoker?</label> <input type="radio" name="smoker" value="yes"> Yes <input type="radio" name="smoker" value="no"> No
				<br />
				<br />
				<label class="label1">Any pets?</label>
				<br />
				<input type="checkbox" name="pets[]" value="Cat(s)">Cat(s) <br  />
				<input type="checkbox" name="pets[]" value="Dog(s)">Dog(s) <br  />
				<input type="checkbox" name="pets[]" value="Other">Other <label class="label1">Specify:</label> <input type="text"> <br />
				<input type="checkbox" name="pets[]" value="No Pets">No Pets <br />
			
			</fieldset>
			<br />
			<fieldset class="fs2">
				<legend class="l2">What are you looking for?</legend>
				<label class="label2">Size of apartment:</label> <br />
				<input type="checkbox" class="size" name="sizes[]" value="Studio">Studio
				<input type="checkbox" class="size" name="sizes[]" value="3 1/2">3&frac12;
				<input type="checkbox" class="size" name="sizes[]" value="4 1/2">4&frac12;
				<input type="checkbox" class="size" name="sizes[]" value="5 1/2">5&frac12;
				<input type="checkbox" class="size" name="sizes[]" value="More than 5 1/2">More than 5&frac12;
				<br />
				<br />
				<label class="label2">Do you have preferred locations?</label> <br />
				<input type="checkbox" class="location" name="locations[]" value="West Island">West Island
				<input type="checkbox" class="location" id="dt" name="locations[]" value="Downtown">Downtown
				<input type="checkbox" class="location" name="locations[]" value="Lower Westmount">Lower Westmount
				<input type="checkbox" class="location" name="locations[]" value="NDG">NDG
				<input type="checkbox" class="location" name="locations[]" value="East end of Island">East end of Island
				<input type="checkbox" class="location" name="locations[]" value="DC">Don't care
				<br />
				<br />
				<label class="label2">Price Range/month</label> <br />
				<select id="dropdown" name="prices[]">
				<option class="price" value=1500>&lt;1500</option>
				<option class="price" value=1400>&lt;1400</option>
				<option class="price" value=900>&lt;900</option>
				<option class="price" value="No limit">No price limit</option>
				</select>
				<br />
				<br />
				<label class="label2">Would be nice to have</label> <br />
				<input type="checkbox" name="perks[]" value="Fire place">Fire place
				<input type="checkbox" name="perks[]" value="Laundromat">Laundromat in building
				<input type="checkbox" name="perks[]" value="Indoor Parking">Indoor Parking
				<input type="checkbox" name="perks[]" value="Outdoor Parking">Outdoor Parking
				<input type="checkbox" name="perks[]" value="Balcony">Balcony
			</fieldset>
			<br />
			<fieldset class="fs4">
			<legend class="l3">Expert Suggestions</legend>
			<p id="suggestion">
			</p>
			</fieldset>
		<br />
		Let's see what we can find... 
		<br />
		<br />
		<input type="submit" name="search" value="Search">
		<input type="reset" value="Start over">
		</form>
<?php include('footer.php'); ?>
		