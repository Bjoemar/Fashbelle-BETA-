<div class="addProduct">
	<h2>Add Product</h2>
	<div class="product_form">

		<form id="form_product" enctype="multipart/form-data" method="POST" action="lib/save_product.php">
			<label>About Product</label>
			<div class="inputHolder">
				<input  id="product_title" class="input_about" name="product_title" type="text" placeholder="Product Name / Title*">
				<input  id="product_price" class="input_about" name="product_subtitle" type="text" placeholder="Product Sub-title">
				<input  id="input_price" class="input_about"  name="product_price" type="text" name="" placeholder="Product Price*">
				<select id="product_category" class="input_about" name="product_category">
					<option>PRODUCT CATEGORY</option>
					<option value="1">WOMEN</option>
					<option value="2">MEN</option>
					<option value="3">COLLECTION</option>
					<option value="4">HANDBAGS</option>
					<option value="5">SHOES</option>
					<option value="6">WATCHES</option>
					<option value="7">ACCESORIES</option>
					<option value="8">GIFTS</option>
				</select>

				<div class="color_picker">
					<label>Product Color</label>
					<ul>
						<li>
							<div class="item_color silver"></div>
							<input type="checkbox" name="colors[]" value="Silver">
							<small>Silver</small>
						</li>
						<li>
							<div class="item_color black"></div>
							<input type="checkbox" name="colors[]" value="black">
							<small>Black</small>
						</li>
						<li>
							<div class="item_color white"></div>
							<input type="checkbox" name="colors[]" value="white">
							<small>White</small>
						</li>
						<li>
							<div class="item_color gray"></div>
							<input type="checkbox" name="colors[]" value="gray">
							<small>Dirty White</small>
						</li>
						<li>
							<div class="item_color blue"></div>
							<input type="checkbox" name="colors[]" value="blue">
							<small>Blue</small>
						</li>
						<li>
							<div class="item_color yellow"></div>
							<input type="checkbox" name="colors[]" value="yellow">
							<small>Yellow</small>
						</li>
						<li>
							<div class="item_color brown"></div>
							<input type="checkbox" name="colors[]" value="brown">
							<small>Brown</small>
						</li>
						<li>
							<div class="item_color pink"></div>
							<input type="checkbox" name="colors[]" value="pink">
							<small>Pink</small>
						</li>
						<li>
							<div class="item_color maroon"></div>
							<input type="checkbox" name="colors[]" value="maroon">
							<small>Maroon</small>
						</li>
						<li>
							<div class="item_color red"></div>
							<input type="checkbox" name="colors[]" value="red">
							<small>Red</small>
						</li>
					</ul>

				</div>
				<!-- End Color Picker -->

				<hr>
				<div class="desc_holder">
					<label>Product Description</label>
					<textarea id="add_editor" name="product_description"></textarea>
				</div>
				<div class="details_holder">
					<label>Product Details</label>
					<textarea id="details_editor" name="product_details"></textarea>
				</div>

				<div class="clear"></div>
				<hr>
			</div>
			<label>Product Image</label>
			<div class="product_image">

				<input class="prod_upload_img" type="file" name="image1">
				<div class="image_input">
					<img src="assets/images/icons/upload_placeholder.png">
				</div>

				<input class="prod_upload_img" type="file" name="image2">
				<div class="image_input">
					<img src="assets/images/icons/upload_placeholder.png">
				</div>

				<input class="prod_upload_img" type="file" name="image3">
				<div class="image_input">
					<img src="assets/images/icons/upload_placeholder.png">
				</div>
				
				<input class="prod_upload_img" type="file" name="image4">
				<div class="image_input">
					<img src="assets/images/icons/upload_placeholder.png">
				</div>

			</div>
			
		</div>

		<button id="process_product">Add Product</button>
	</form>
</div>