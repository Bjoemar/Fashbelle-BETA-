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
	<div class="_web_mid_container _web_content_container _web_log_reg_form">
		<div class="_web_left_content m_web_full_content">
			<?php require 'ShopComponents/account/_web_login_comp.php'; ?>

		</div>

		<div class="web_clear_content"></div>
		<div class="_web_right_content m_web_full_content">
			<?php require 'ShopComponents/account/_web_register_comp.php'; ?>
		</div>
		<dib class="web_clear_content"></dib>
	</div>

<?php } ?>