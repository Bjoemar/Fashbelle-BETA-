<div class="web_account_nav">
	<div class="_web_inner_account">
		<?php if (isset($_SESSION['fashbelle_access'])): ?>
				<h2>WELCOME</h2>
				<label><?php echo $_SESSION['customer_lastname'] ?> <?php echo $_SESSION['customer_name'] ?></label>	
		<?php endif; ?>
		
	</div>

	<div class="_web_inner_account">
		<p><button class="prodile_button_nav" data-id="1">Profile</button></p>
		<p><button class="prodile_button_nav" data-id="2">Address Book</button></p>
		<p><button class="prodile_button_nav" data-id="3">Order Hisotry</button></p>
		<p><button class="prodile_button_nav" data-id="4">Favorites</button></p>
	</div>
</div>