<?php session_start(); require_once 'template.php'; ?>

<?php 
	
	function get_Description_Value(){
		echo "HOME";
	}

	function get_keyword_value(){
		echo "HOME";
		
	}

	function getTitle(){
		echo "PRIMIERE KOR";
	}
 ?>


<?php function getContent() { ?>
	<!-- Home Content -->
	<div class="_web_mid_container _web_content_container">
		<?php require 'ShopComponents/Home/_show_case.php'?>
	</div>

<?php } ?>