<!DOCTYPE html>
<html lang="en">
<head>
	

	<meta charset="utf-8">
	<meta name="description" content="<?php get_Description_Value(); ?>">
	<meta name="keywords" content="<?php  get_keyword_value(); ?>">
	<meta name="author" content="FASHBELLE">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon Links -->
	<link rel="apple-touch-icon" sizes="57x57" href="assets/favicons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="assets/favicons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="assets/favicons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="assets/favicons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="assets/favicons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="assets/favicons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="assets/favicons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="assets/favicons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="assets/favicons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="assets/favicons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="assets/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/favicons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="assets/favicons/favicon-16x16.png">
	<link rel="manifest" href="assets/favicons/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">


	<!-- Style Links -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/mobile_style.css">

	<!-- Bootstrap & Jquery CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.js"integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


	<!-- Fontawesoem CDN -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

	<!-- Google Fonts CDN -->
	<link href="https://fonts.googleapis.com/css?family=Oswald|Raleway&display=swap" rel="stylesheet">


	<!-- Stipre JS -->

	<title><?php  getTitle(); ?></title>
</head>


<body>
	<?php session_start(); ?>
	<!-- Navbar -->
	<div class="web_navigation">
		
		<div id="fashbelle_navbar">			
			<div class="_web_mid_container">
				<?php require 'ShopComponents/navigation/_upper_navbar_comp.php' ?>
				<?php require 'ShopComponents/navigation/_middle_navbar_comp.php'?>

			</div>

			<div class="_web_full_container">
				<?php require 'ShopComponents/navigation/_bottom_navbar_comp.php'?>
			</div>
		</div> 

		<div id="fashbelle_mobile_navbar">
			<?php require 'ShopComponents/navigation/_mobile_navbar.php' ?>
			<?php require 'ShopComponents/navigation/_mobile_sidebar.php' ?>
		</div>
	</div>
	<?php require 'ShopComponents/Search/_web_search.php' ?>

	<?php getContent(); ?>

	<div class="_web_footer_container">
		<!-- Footer -->
		<?php require 'ShopComponents/Footer/_web_footer.php'?>
	</div>


	<div class="_web_quick_view_modal">
		<div class="quick_view">

			<button id="_modal_close_button">X</button>
			<div class="_view_thumbnail">
				<img src="assets/images/loader.gif" class="active_thumb">
				<img src="assets/images/loader.gif">
				<img src="assets/images/loader.gif">
				<img src="assets/images/loader.gif">
				<button><i class="fas fa-chevron-up"></i></button>
				<button><i class="fas fa-chevron-down"></i></button>
			</div>
			<div class="_product_image">
				<img src="assets/images/product/shoes/sample1.jpg">
			</div>

			<div class="_product_info">
				<h2>Cosmo Animal-Print Calf Hair Slip-On Trainer</h2>
				<p>STYLE # 43F9CSFP1H</p>
				<p><strong></strong></p>

				<div class="_web_color column">
					<div class="_item_color">
	
					</div>
<!-- 
					<h5>COLOR <span>Black/White</span></h5>
					<img src="assets/images/colors/colors_1.jpg" class="_item_color_active">
					<img src="assets/images/colors/colors_2.jpg"> -->
				</div>


				<div class="_web_size column">
					<h5>SIZE </h5>
					<button class="sizes" value="XS">US 6 / EU 36</button>
					<button class="sizes" value="S">US 7 / EU 37</button>
					<button class="sizes" value="M">US 8 / EU 38.5</button>
					<button class="sizes" value="L">US 9 / EU 9.5</button>
					<button class="sizes" value="XL">EU 9.5</button>
					<button class="sizes" value="XXL">US 10 / EU 41</button>
				</div>



				<div class="_web_quantity column">
					<h5>QUANTITY </h5>
					<select class="select_web_quantity">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
				</div>

				<button class="add_to_bag">ADD TO BAG</button>


				<a href="#">View Full Details</a>
				<button class="add_to_favorites"><i class="far fa-heart"></i> ADD TO FAVORITE</button>

			</div>

			<div class="web_clear_content"></div>
		</div>
	</div>

</body>


<script type="text/javascript">
	console.log(document.cookie)
</script>
<script type="text/javascript" src="scripts/script.js"></script>
</html>

