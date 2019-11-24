 <?php require_once 'template.php'; ?>

<?php 
	function get_Description_Value(){
		echo "TEST";
	}

	function get_keyword_value(){
		echo "TEST";
	}

	function getTitle(){
		echo "Fashbelle PH";
	}

?>


<?php function getContent() { ?>

	<!-- Home Content -->
	<div class="_web_mid_container _web_content_container">
		<?php require 'connection.php';
			if (!isset($_SESSION['fashbelle_access'])) {
				ob_start(); // Turn on output buffering
				system('ipconfig /all'); //Execute external program to display output
				$mycom=ob_get_contents(); // Capture the output into a variable
				ob_clean(); // Clean the output buffer

				$find_word = "Physical";
				$pmac = strpos($mycom, $find_word); // Find the position of Physical text in array
				$mac=substr($mycom,($pmac+36),17); // Get Physical Address
				$client_id = $mac;
				
			} else {

				$client_id = $_SESSION['fashbelle_access']; 
			}
			$get_cart_item = "SELECT * FROM cart_item WHERE customer_id = '$client_id'";
			$result = mysqli_query($conn,$get_cart_item);
			$cart_count = mysqli_num_rows($result);
			setlocale(LC_MONETARY, 'en_PH');
			$total = 0;
			$item_n_cart = [];
			$c = 0;
			// echo money_format('%i', $total) . "\n";
		
			while($row_item = mysqli_fetch_assoc($result)):
				$product_info = "SELECT * FROM products WHERE product_id = ".$row_item['product_id'];
				$product_result = mysqli_query($conn,$product_info);
				$product_result = mysqli_fetch_assoc($product_result);
				$total += $product_result['product_price'];
				$total *= $row_item['quantity'];

				$product_info_arr['title'] = $product_result['product_name'];
				$product_info_arr['price'] = $product_result['product_price'];
				$product_info_arr['quantity'] = $row_item['quantity'];
				$product_info_arr['color'] = $row_item['color'];
				$product_info_arr['size'] = $row_item['size'];
				$product_info_arr['subtotal'] = $product_result['product_price'] *  $row_item['quantity'];

				$prod_id = $row_item['product_id'];
				$get_image = "SELECT * FROM products_image WHERE product_id = $prod_id AND image_sequence = 1";
				$img_result = mysqli_query($conn,$get_image) or die(mysqli_error($conn));
				$img_res = mysqli_fetch_assoc($img_result);
				$product_info_arr['product_image'] = $img_res['product_image'];
				$item_n_cart[$c] = $product_info_arr;
				$c++;
			endwhile;

		 ?>

		<?php require 'ShopComponents/bags/_web_bags_comp.php'; ?>


		<div class="_cart_left payment_info">
			<?php require 'ShopComponents/bags/_bag_information_comp.php'; ?>
			<dib class="web_clear_content"></dib>
		</div>
		<dib class="web_clear_content"></dib>
	</div>

<?php } ?>