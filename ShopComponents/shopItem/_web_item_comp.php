
 <div class="_web_item">
	<h4>VIEL ALL HANDBAGS</h4>

	<?php 
		// Get Product in the products table;

		require 'connection.php';
		if (isset($_GET['category'])) :
			$sql = "SELECT * FROM products WHERE product_category = ".$_GET['category'];	
		else:

			$sql = "SELECT * FROM products";	
		endif;
		
		$result = mysqli_query($conn,$sql);
		$fetch_count = mysqli_num_rows($result);
		
	 ?>

	<div class="_web_left_content">
<!-- 		<div class="dropdown">
		  <button class="btn btn-sm btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		   	Sort by <strong>FEATURED</strong>
		  </button>
		  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		    <a class="dropdown-item" href="#">PRICE HIGH TO LOW</a>
		    <a class="dropdown-item" href="#">PRICE LOW TO HIGH</a>
		    <a class="dropdown-item" href="#">NEW ARRIVALS</a>
		  </div>
		</div> -->
	</div>

	<div class="_web_right_content">
		<label><?php echo $fetch_count; ?> Products</label>
	</div>
	<div class="web_clear_content"></div>

	<div class="_web_item_list">
		<?php


			if ($fetch_count > 0):

					while($row = mysqli_fetch_assoc($result)): ?>

						<div class="_item">
							<?php 
								//  Get Product image using product id form the product
								$p_id =  $row['product_id'];
								// Get the main image 
								$product_image = "SELECT * FROM products_image WHERE product_id = $p_id AND image_sequence = 1 LIMIT 1";
								$main_image = mysqli_query($conn,$product_image) or die(mysqli_error($conn));
								$main_image = mysqli_fetch_assoc($main_image);

								// Get the hover after image

								$product_image_2 = "SELECT * FROM products_image WHERE product_id = $p_id AND image_sequence = 2 LIMIT 1";
								$second_image = mysqli_query($conn,$product_image_2) or die(mysqli_error($conn));
								$second_image = mysqli_fetch_assoc($second_image);
							 ?>

							<img class="_item_main_img" src="<?php echo $main_image['product_image']; ?>">
							<div class="item_after_hover">

								<?php if ($second_image['product_image']): ?>
									<img src="<?php echo $second_image['product_image']; ?>">
								<?php else: ?>
									<img src="assets/images/no_image.png">	
								<?php endif; ?>
								
								<button class="_open_quick_view" value="<?php echo $p_id ?>">QUICK VIEW</button>
							</div>
							<div class="_item_description">
								<h5><?php echo $row['product_name']; ?></h5>
								<p>Cece Extra-Small Bearded Logo Crossbody Bag</p>
							</div>
							<div class="_item_price">
								<p>&#8369; <?php echo $row['product_price']; ?></p>
							</div>
							<div class="_item_color">
								<?php 
									// Get the color of the products
									$product_color = "SELECT * FROM product_color WHERE product_id = $p_id";
									$result_color = mysqli_query($conn,$product_color);
									while($color_row = mysqli_fetch_assoc($result_color)): ?>
										<div class="item_color <?php echo $color_row['color_name'] ?>">
											<?php echo $color_row['color_name']  ?>		
										</div>
								
								<?php endwhile; ?>
							</div>
						</div>

					<?php endwhile;	?>

					<hr>

				<?php else: ?>
					<div class="empty" style="height: 500px;">
			
						<h2 style="font-weight: 300;">NO PRODUCT AVAILABLE</h2>
					</div>
					 <hr>
			<?php endif; ?>




	</div>
	<!-- End web item list -->


<!-- End web item -->
</div>