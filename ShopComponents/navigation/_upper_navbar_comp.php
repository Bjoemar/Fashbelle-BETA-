<div class="_nav_upper">
	<div class="_web_left_content">
		<img src="assets/images/icons/PH_Flags.png" class="_web_icons">
	</div>

	<div class="_web_right_content _inner_right_content">
		<a href="#" id="_web_searchBtn" class="_text_black nav_bar_icons" data-toggle="tooltip" data-placement="bottom" title="검색" ><i class="fas fa-search"></i></a>
		<a href="cart.php" id="shopping_icon_bag" class="_text_black nav_bar_icons" data-toggle="tooltip" data-placement="bottom" title="장바구니" ><i class="fas fa-shopping-bag"></i></a>
		<?php if (isset($_SESSION['fashbelle_access'])): ?>
			<a href="accountinformation.php" class="_text_black nav_bar_icons"><i class="fas fa-user"></i></a>
			<a href="logout.php" class="_text_black nav_bar_icons" data-toggle="tooltip" data-placement="bottom" title="로그아웃" ><i class="fas fa-door-open"></i></a>	
			<?php else: ?>
			<a href="createAccount.php" class="_text_black nav_bar_icons" id="nav_account_btn"><i class="fas fa-user"></i></a>
		<?php endif ?>
		
		
	</div>


	<div class="_web_nav_overlay_login">

		<div class="_web_log_reg_form">
			<h2>계정 만들기</h2>
			<small>귀하의 이메일 주소로 premier 계정을 만드십시오</small>
			<button>계정 만들기</button>
			<?php require 'ShopComponents/account/_web_login_comp.php'; ?>
		</div>
	</div>


	<div class="_web_nav_overlay_shopping_cart" style="display: block;">
		<div class="nav_cart_item">
			<table>
				<th class="image_col_th"><img src="assets/images/sampleImage/sample1.jpg"></th>
				<th style="padding: 10px;">
					<p>Cece Extra-Small Beaded Logo Crossbody Bag</p>
					<label>BLACK</label>
					<label>500 PESOS</label>
				</th>
			</table>
		</div>
		<button>CLOSE</button>
	</div>


	<div class="web_clear_content"></div>
</div>

