<?php

 require_once 'template.php';
 if (!isset($_SESSION['fashbelle_access'])):
 	echo "<script>window.location.href = 'index.php'</script>";
 endif;
  ?>

<?php 
	function get_Description_Value(){
		echo "TEST";
	}

	function get_keyword_value(){
		echo "TEST";
	}

	function getTitle(){
		echo "PREMIERE KOR";
	}

?>


<?php function getContent() { ?>

	<div class="_web_account_info">
		<div class="_web_mid_container _web_content_container">
			
			<div class="left_account">
				<?php require 'ShopComponents/account/_web_account_nav.php'; ?>

			</div>

			<div class="right_account">
				<div class="profile_col_right" data-id="1" style="display: block;">
					<?php require 'ShopComponents/account/_web_profile.php'; ?> 
				</div>

				<div class="profile_col_right" data-id="2">
					<?php require 'ShopComponents/account/_web_address_book.php'; ?>
				</div>

				<div class="profile_col_right" data-id="4">
					<?php require 'ShopComponents/account/_web_favorites.php' ?>
				</div>

			</div>
		<div class="web_clear_content"></div>
	</div>

<?php } ?>