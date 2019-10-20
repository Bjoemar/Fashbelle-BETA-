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

	<div class="_web_mid_container _web_content_container">

		<!-- Bread Crumbs Web Function Syntax -->
		<?php 
			// Bread Crumbs Content Container
			$breadCrumbsContent = [];
			
			// Puting data in the breadcrumbs
			// eg) array_push($breadCrumbsContent, "TEST DATA")

			if (count($breadCrumbsContent) == 0) {
				// Default Value
				$bread_obj = ["Home","index.php"];
				array_push($breadCrumbsContent, $bread_obj);
			}
			
			require 'ShopComponents/breadCrumbs/breadCrumbs.php';
		?>
		<!-- End of Bread Crumbs Web Function  -->


		<div class="row shop_content_holder">
			<!-- Category Side	 -->
			<div class="col-md-3 col-sm-12">
				<?php 
					// Shop Category Content Container
					$shopCategory = [];
					
					// Puting data in the shopCategory
					// eg) array_push($shopCategory, "TEST DATA")

					if (count($shopCategory) == 0) {
						// Default Value
						$category_obj = array(
							["VIEW ALL HANDBAGS","#"],
							["CROSSBODIES","#"],
							["TOTES","#"],
							["SHOLDER BAGS","#"],
							["MINI BAGS","#"],
							["BACKPACKS & BELT BAGS","#"],
							["SATCHELS","#"],
							["WALLETS","#"],
							["CLUTCHES & WRISTLETS","#"],
							["DUFFELS, LUGGAGE & TRAVELS","#"],
						);
						array_push($shopCategory, $category_obj);
					}
				 ?>

				<?php require 'ShopComponents/category/_web_category_comp.php'; ?>
			</div>
			<!-- Item View -->
			<div class="col-md-9 col-sm-12">
				<?php require 'ShopComponents/shopItem/_web_item_comp.php'; ?>
			</div>
		</div>
	</div>

<?php } ?>