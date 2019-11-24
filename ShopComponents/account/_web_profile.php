<div class="_web_profile">
	<h2>PROFILE</h2>

	<h3>Personal Information</h3>

	<div class="_profile_col">
		<label><?php echo $_SESSION['customer_lastname'] ?> <?php echo $_SESSION['customer_name'] ?></label>
		<small><?php echo $_SESSION['customer_email'] ?></small>
	</div>


	<div class="_profile_col">
		<label>EDIT</label>
		<small><strong>CHANGE PASSWORD</strong></small>
	</div>

	<div class="_profile_col">
		<h3>SUBSCRIPTIONS & DATA SUBJECT REQUESTS</h3>
		<p>If you would like to unsubscribe from all future FASHBELLE marketing emails, please use the link in the marketing email you received, or send your request to Europe.CustomerService@fashbelle.com. Additionally, if you would like to exercise any of your rights as a data subject (as outlined in our Privacy Policy), please send your specific request to EUDataSubjectRequests@fashbelle.com.</p>
	</div>

	<div class="_profile_col">
		<h3>ADDRESS BOOK</h3>

			<?php 
				require 'connection.php';
				$customer_id = $_SESSION['fashbelle_access'];
				$get_addres = "SELECT * FROM address_book WHERE credentials_id = '$customer_id'";
				$result_address = mysqli_query($conn,$get_addres) or die(mysqli_error($conn));
				
			 ?>

			 <?php if (mysqli_num_rows($result_address) == 0): ?>
		 		<p>You haven't added any shipping addresses.</p>
			 <?php 	else: ?>
			 	<?php while($row = mysqli_fetch_assoc($result_address)): ?>
	 				<div class="web_saved_add">
	 					<!-- <h4>SAVED ADDRESS</h4> -->
	 					<small><?php echo $row['rep_title'] ?> <?php echo $row['rep_name'] ?> <?php echo $row['rep_last'] ?></small>
	 					<small><?php echo $row['address_line_1'] ?> <?php echo $row['address_line_2'] ?></small>
	 					<small><?php echo $row['town'] ?></small>
	 					<small><?php echo $row['province'] ?></small>
	 					<small><?php echo $row['zip_code'] ?></small>
	 					<small><?php echo $row['rep_number'] ?></small>
	 					<a href="#">DELETE</a>
	 					<a href="#">EDIT</a>
	 				</div>
 				<?php endwhile; ?>
 	
			 <?php endif ?>


		<button>ADD NEW</button>
	</div>

	<div class="_profile_col">
		<h3>FAVORITES</h3>
		<p>You haven't added any Favorites.</p>
		<button>SHOP NOW</button>
	</div>

</div>