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
		<?php require 'ShopComponents/bags/_web_bags_comp.php'; ?>


		<div class="_cart_left payment_info">
			<?php require 'ShopComponents/bags/_bag_information_comp.php'; ?>
			<dib class="web_clear_content"></dib>
		</div>
		<dib class="web_clear_content"></dib>
	</div>

<?php } ?>