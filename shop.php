<?php require_once 'template.php'; ?>

<?php 
	function get_Description_Value(){
		echo "TEST";
	}

	function get_keyword_value(){
		echo "TEST";
	}

	function getTitle(){
		echo "PRIMIERE KOR";
	}

?>

<?php function getContent() { ?>

	<div class="_web_mid_container _web_content_container">

		<!-- End of Bread Crumbs Web Function  -->


		<div class="row shop_content_holder">

			<!-- Item View -->
			<div class="col-md-12 col-sm-12">
				<?php require 'ShopComponents/shopItem/_web_item_comp.php'; ?>
			</div>
		</div>


	</div>

	


<?php } ?>