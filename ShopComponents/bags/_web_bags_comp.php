<div class="_web_bag">
	<div class="_cart_left">
		<div class="_cart_header">
				
			<div class="_web_left_content m_web_full_content">
				<h2>
					<?php if ($cart_count > 1): ?>
						YOUR BAG (<?php echo $cart_count; ?>)
					<?php else: ?>
						YOUR BAG IS EMPTY
					<?php endif; ?>		
				</h2>
				<small><a href="shop.php" style="color: black;">Continue Shopping</a></small>
			</div>

			<div class="_web_right_content _inner_right_content m_web_full_content">
				<h2>SUBTOTAL &#8369;<?php echo $total ?></h2>
			</div>

			<div class="web_clear_content"></div>
		</div>
		<!-- End cart header -->

		<div class="_cart_item">
			<div class="header_cart">
				<div class="_prod_desc">
					<label>Product Description</label>
				</div>
				<div class="_prod_price">
					<label>Price</label>
				</div>
				<div class="_prod_quantity">
					<label>Quantity</label>
				</div>
				<div class="_prod_subtotal">
					<label><strong>Subtotal</strong></label>
				</div>
				<div class="web_clear_content"></div>

			</div>
			<!-- End header cart -->

			<?php for ($i=0; $i < count($item_n_cart); $i++): ?>	
				<?php 
					$item_information = $item_n_cart[$i];
					$row_color = $i % 2;
					if ($row_color == 0) {
						$bg = '#fafafa';
					} else {
						$bg = 'transparent';
					}
				 ?>
				<div class="_cart_item_list" style="background-color: <?php echo $bg; ?>">
					<div class="_prod_desc">
						<div class="_cart_item_img">
							<img style="min-height: 231.063px; object-fit: cover;" src="<?php echo $item_information['product_image'] ?>">
						</div>

						<div class="_cart_item_desc">
							<h5><?php echo $item_information['title'] ?></h5>
							<p>Style # 32F9S0EC0U</p>
							<p>Colour:  <?php echo $item_information['color'] ?></p>
							<p>SIZE:  <?php echo $item_information['size'] ?></p>


							<div class="_option_btn pc_option_btn">
								<button class="_item_cart_fav">ADD TO FAVORITES</button>
								<button class="_item_cart_edit">UPDATE</button>
								<button class="_item_cart_rem">REMOVE</button>
								
							</div>
							<!-- Mobile option -->
							<div class="mobile_option">
								<div class="_prod_price">
									<div class="_web_left_content _inner_left_content">
										<label class="_cart_text">Price</label>
									</div>

									<div class="_web_right_content _inner_right_content">
										<label class="_cart_text">&#8369; <?php echo $item_information['price'] ?></label>
									</div>
									
								</div>
								<div class="_prod_quantity">
									<div class="_web_left_content _inner_left_content">
										<label class="_cart_text">Quanity</label>
									</div>

									<div class="_web_right_content _inner_right_content">
										<!-- <label class="_cart_text"> -->
											<input type="number" name="" min="1" class="quantity_input" value="<?php echo $item_information['quantity'] ?>">
										<!-- </label> -->
									</div>

								</div>
								<div class="_prod_subtotal">
									<div class="_web_left_content _inner_left_content">
										<label class="_cart_text">Sub Total</label>
									</div>

									<div class="_web_right_content _inner_right_content">
										<label class="_cart_text"><strong>&#8369;44,250.00</strong></label>
									</div>
									
									
								</div>


								<div class="web_clear_content"></div>
							</div>
							<!-- End mobile option -->
						</div>

					</div>
					<!-- End prod description -->
					<div class="_prod_price">
						<label class="_cart_text">&#8369; <?php echo $item_information['price'] ?></label>
					</div>
					<div class="_prod_quantity">
						<label class="_cart_text">
							<input type="number" name="" min="1" class="quantity_input" value="<?php echo $item_information['quantity'] ?>">
						</label>
					</div>
					<div class="_prod_subtotal">
						<label class="_cart_text"><strong>&#8369; <?php echo $item_information['subtotal'] ?></strong></label>
					</div>

					<div class="_option_btn m_option_btn">
						<button class="_item_cart_fav">ADD TO FAVORITES</button>
						<button class="_item_cart_edit">UPDATE</button>
						<button class="_item_cart_rem">REMOVE</button>
						
					</div>

					<div class="web_clear_content"></div>
				</div>
			<?php endfor; ?>



			<!-- End cart item list -->
		</div>


	</div>
	<!-- End cart left -->


	<div class="_cart_right">
		<div class="_web_order_summary">
			<div class="_web_inner_os">
				<h2>ORDER SUMMARY</h2>
				<div class="_web_left_content _inner_left_content">
					<label>SUBTOTAL</label>
				</div>
				<div class="_web_right_content _inner_right_content">
					 <label>&#8369;<?php echo $total; ?></label>
				</div>
				<div class="_web_left_content _inner_left_content">
					<label>Shipping</label>
				</div>
				<div class="_web_right_content _inner_right_content">
					<label>FROM FREE</label>
				</div>

				<div class="web_clear_content"></div>
				<hr>
				<div class="_web_left_content _inner_left_content">
					<label><strong>TOTAL</strong><br>(Before Shipping)</label>
				</div>
				<div class="_web_right_content _inner_right_content">
					<label>&#8369;<?php echo $total; ?></label>
				</div>
				<div class="web_clear_content"></div>

			</div>

			<a href="checkout.php"><button id="buy_d_items" data-id="<?php echo $_SESSION['fashbelle_access']; ?>" >CHECKOUT</button></a>
			<!-- end web inner order summary -->

		</div>

	</div>
	<!-- End Cart right -->

	<div class="web_clear_content"></div>
</div>