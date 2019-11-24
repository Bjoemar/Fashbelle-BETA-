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


<link rel="stylesheet" type="text/css" href="assets/css/payment.css">

<?php function getContent(){ ?>

	<div class="_web_mid_container parent_payment">
		<div class="_web_left_content _web_mid_container item_to_pay">

			<h4 class="mt-4 mb-5">CART ITEM</h4>		
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


			 <?php for ($i=0; $i < count($item_n_cart); $i++): ?>
			 		<div class="card mb-3" >
			 			<div class="row no-gutters">
			 			    <div class="col-md-4">
			 			      	<img src="<?php echo $item_n_cart[$i]['product_image'] ?>" class="card-img" alt="..." style="height: 200px; object-fit: cover;">
			 			    </div>
			 			    <div class="col-md-8">
			 			      	<div class="card-body">
			 			        	<h5 class="card-title"><?php echo $item_n_cart[$i]['title']; ?></h5>
			 			        	<p class="card-text">COLOR : <?php echo $item_n_cart[$i]['color']; ?></p>
			 			        		<p class="card-text">Quantity : <?php echo $item_n_cart[$i]['quantity']; ?></p>
			 			        	<p class="card-text"><small class="text-muted">&#8369; <?php echo $item_n_cart[$i]['price']; ?></small></p>
			 			      	</div>
			 			    </div>
			 			</div>
			 		</div>
			  	
			  <?php endfor; ?>


			<hr>
			<h3>TOTAL : &#8369; <strong><?php echo $total; ?></strong></h3>




		</div>
		<div class="_web_right_content _web_mid_container payment_col web_address">
			<?php 

				if (isset($_SESSION['fashbelle_access'])):
					$get_user_address = "SELECT *  FROM address_book WHERE credentials_id = '$client_id' LIMIT 1";
					$address_result = mysqli_query($conn,$get_user_address) or die(mysqli_error($conn));

					$adrees_count = mysqli_num_rows($address_result);

					if ($adrees_count > 0):
						$address_data = mysqli_fetch_assoc($address_result); ?>
							<div class="billing_address" >
								<!-- <h4>SHIPPING ADDRESS</h4>		 -->
								<form action="lib/charge.php" method="post" id="payment-form">
										<div class="_web_register" style="padding: 20px;">				
											<ul>
												<li>
													<h4><strong>PAYMENT METHOD</strong></h4>
												</li>


												<li>
													<select name="payment_type">
														<option value="credit_card_payment">CREDIT / DEBIT CARD PAYMENTS</option>
														<option value="paypal_payment">PAYPAL</option>
														<option value="cod_payment">CASH ON DELIVERY</option>
													</select>
												</li>


												<li>
													<label>CUSTOMER EMAIL *</label>
													<input type="text" name="email" required>
												</li>


												<li>
													<label>Credit Card Information</label>
													<div id="card-element">
													  <!-- A Stripe Element will be inserted here. -->
													</div>
												</li>


												<li>
													<hr>
													<h4><strong>Recipient</strong></h4>
												</li>

												<li>
													<label>SELECT TITLE</label>
													<select name="address_rep_title">
														<option value="Miss." <?php if($address_data['rep_title'] == 'Miss.'){echo "selected";} ?>>Miss .</option>
														<option value="Ms." <?php if($address_data['rep_title'] == 'Ms.'){echo "selected";} ?>>Ms .</option>
														<option value="Mrs."  <?php if($address_data['rep_title'] == 'Mrs.'){echo "selected";} ?>>Mrs .</option>
														<option value="Mr." <?php if($address_data['rep_title'] == 'Mr.'){echo "selected";} ?>>Mr .</option>
														<option value="Dr." <?php if($address_data['rep_title'] == 'Dr.'){echo "selected";} ?>>Dr .</option>
													</select>
												</li>

												<li>
													<label>FIRST NAME*</label>
													<input type="text" name="address_rep_name" required value="<?php if($address_data){ echo $address_data['rep_name']; } ?>">
												</li>

												<li>
													<label>LAST NAME*</label>
													<input type="text" name="address_rep_last_name" required value="<?php if($address_data){ echo $address_data['rep_last'];} ?>">
												</li>


												<li>
													<label>PHONE NUMBER</label>
													<input type="text" name="address_rep_phone_number" required value="<?php if($address_data){ echo  $address_data['rep_number'];} ?>">
												</li>

												<li>
													<hr>
													<h4><strong>SHIPPING ADDRESS</strong></h4>
												</li>


												<li>
													<label>COUNTRY</label>
													<select name="address_country">
														<?php if($address_data){ echo  "<option value=".$address_data['country'].">".$address_data['country']."</option>";} ?>
													    <option value="Afghanistan">Afghanistan</option>
										                <option value="Åland Islands">Åland Islands</option>
										                <option value="Albania">Albania</option>
										                <option value="Algeria">Algeria</option>
										                <option value="American Samoa">American Samoa</option>
										                <option value="Andorra">Andorra</option>
										                <option value="Angola">Angola</option>
										                <option value="Anguilla">Anguilla</option>
										                <option value="Antarctica">Antarctica</option>
										                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
										                <option value="Argentina">Argentina</option>
										                <option value="Armenia">Armenia</option>
										                <option value="Aruba">Aruba</option>
										                <option value="Australia">Australia</option>
										                <option value="Austria">Austria</option>
										                <option value="Azerbaijan">Azerbaijan</option>
										                <option value="Bahamas">Bahamas</option>
										                <option value="Bahrain">Bahrain</option>
										                <option value="Bangladesh">Bangladesh</option>
										                <option value="Barbados">Barbados</option>
										                <option value="Belarus">Belarus</option>
										                <option value="Belgium">Belgium</option>
										                <option value="Belize">Belize</option>
										                <option value="Benin">Benin</option>
										                <option value="Bermuda">Bermuda</option>
										                <option value="Bhutan">Bhutan</option>
										                <option value="Bolivia">Bolivia</option>
										                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
										                <option value="Botswana">Botswana</option>
										                <option value="Bouvet Island">Bouvet Island</option>
										                <option value="Brazil">Brazil</option>
										                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
										                <option value="Brunei Darussalam">Brunei Darussalam</option>
										                <option value="Bulgaria">Bulgaria</option>
										                <option value="Burkina Faso">Burkina Faso</option>
										                <option value="Burundi">Burundi</option>
										                <option value="Cambodia">Cambodia</option>
										                <option value="Cameroon">Cameroon</option>
										                <option value="Canada">Canada</option>
										                <option value="Cape Verde">Cape Verde</option>
										                <option value="Cayman Islands">Cayman Islands</option>
										                <option value="Central African Republic">Central African Republic</option>
										                <option value="Chad">Chad</option>
										                <option value="Chile">Chile</option>
										                <option value="China">China</option>
										                <option value="Christmas Island">Christmas Island</option>
										                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
										                <option value="Colombia">Colombia</option>
										                <option value="Comoros">Comoros</option>
										                <option value="Congo">Congo</option>
										                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
										                <option value="Cook Islands">Cook Islands</option>
										                <option value="Costa Rica">Costa Rica</option>
										                <option value="Cote D'ivoire">Cote D'ivoire</option>
										                <option value="Croatia">Croatia</option>
										                <option value="Cuba">Cuba</option>
										                <option value="Cyprus">Cyprus</option>
										                <option value="Czech Republic">Czech Republic</option>
										                <option value="Denmark">Denmark</option>
										                <option value="Djibouti">Djibouti</option>
										                <option value="Dominica">Dominica</option>
										                <option value="Dominican Republic">Dominican Republic</option>
										                <option value="Ecuador">Ecuador</option>
										                <option value="Egypt">Egypt</option>
										                <option value="El Salvador">El Salvador</option>
										                <option value="Equatorial Guinea">Equatorial Guinea</option>
										                <option value="Eritrea">Eritrea</option>
										                <option value="Estonia">Estonia</option>
										                <option value="Ethiopia">Ethiopia</option>
										                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
										                <option value="Faroe Islands">Faroe Islands</option>
										                <option value="Fiji">Fiji</option>
										                <option value="Finland">Finland</option>
										                <option value="France">France</option>
										                <option value="French Guiana">French Guiana</option>
										                <option value="French Polynesia">French Polynesia</option>
										                <option value="French Southern Territories">French Southern Territories</option>
										                <option value="Gabon">Gabon</option>
										                <option value="Gambia">Gambia</option>
										                <option value="Georgia">Georgia</option>
										                <option value="Germany">Germany</option>
										                <option value="Ghana">Ghana</option>
										                <option value="Gibraltar">Gibraltar</option>
										                <option value="Greece">Greece</option>
										                <option value="Greenland">Greenland</option>
										                <option value="Grenada">Grenada</option>
										                <option value="Guadeloupe">Guadeloupe</option>
										                <option value="Guam">Guam</option>
										                <option value="Guatemala">Guatemala</option>
										                <option value="Guernsey">Guernsey</option>
										                <option value="Guinea">Guinea</option>
										                <option value="Guinea-bissau">Guinea-bissau</option>
										                <option value="Guyana">Guyana</option>
										                <option value="Haiti">Haiti</option>
										                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
										                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
										                <option value="Honduras">Honduras</option>
										                <option value="Hong Kong">Hong Kong</option>
										                <option value="Hungary">Hungary</option>
										                <option value="Iceland">Iceland</option>
										                <option value="India">India</option>
										                <option value="Indonesia">Indonesia</option>
										                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
										                <option value="Iraq">Iraq</option>
										                <option value="Ireland">Ireland</option>
										                <option value="Isle of Man">Isle of Man</option>
										                <option value="Israel">Israel</option>
										                <option value="Italy">Italy</option>
										                <option value="Jamaica">Jamaica</option>
										                <option value="Japan">Japan</option>
										                <option value="Jersey">Jersey</option>
										                <option value="Jordan">Jordan</option>
										                <option value="Kazakhstan">Kazakhstan</option>
										                <option value="Kenya">Kenya</option>
										                <option value="Kiribati">Kiribati</option>
										                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
										                <option value="Korea, Republic of">Korea, Republic of</option>
										                <option value="Kuwait">Kuwait</option>
										                <option value="Kyrgyzstan">Kyrgyzstan</option>
										                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
										                <option value="Latvia">Latvia</option>
										                <option value="Lebanon">Lebanon</option>
										                <option value="Lesotho">Lesotho</option>
										                <option value="Liberia">Liberia</option>
										                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
										                <option value="Liechtenstein">Liechtenstein</option>
										                <option value="Lithuania">Lithuania</option>
										                <option value="Luxembourg">Luxembourg</option>
										                <option value="Macao">Macao</option>
										                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
										                <option value="Madagascar">Madagascar</option>
										                <option value="Malawi">Malawi</option>
										                <option value="Malaysia">Malaysia</option>
										                <option value="Maldives">Maldives</option>
										                <option value="Mali">Mali</option>
										                <option value="Malta">Malta</option>
										                <option value="Marshall Islands">Marshall Islands</option>
										                <option value="Martinique">Martinique</option>
										                <option value="Mauritania">Mauritania</option>
										                <option value="Mauritius">Mauritius</option>
										                <option value="Mayotte">Mayotte</option>
										                <option value="Mexico">Mexico</option>
										                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
										                <option value="Moldova, Republic of">Moldova, Republic of</option>
										                <option value="Monaco">Monaco</option>
										                <option value="Mongolia">Mongolia</option>
										                <option value="Montenegro">Montenegro</option>
										                <option value="Montserrat">Montserrat</option>
										                <option value="Morocco">Morocco</option>
										                <option value="Mozambique">Mozambique</option>
										                <option value="Myanmar">Myanmar</option>
										                <option value="Namibia">Namibia</option>
										                <option value="Nauru">Nauru</option>
										                <option value="Nepal">Nepal</option>
										                <option value="Netherlands">Netherlands</option>
										                <option value="Netherlands Antilles">Netherlands Antilles</option>
										                <option value="New Caledonia">New Caledonia</option>
										                <option value="New Zealand">New Zealand</option>
										                <option value="Nicaragua">Nicaragua</option>
										                <option value="Niger">Niger</option>
										                <option value="Nigeria">Nigeria</option>
										                <option value="Niue">Niue</option>
										                <option value="Norfolk Island">Norfolk Island</option>
										                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
										                <option value="Norway">Norway</option>
										                <option value="Oman">Oman</option>
										                <option value="Pakistan">Pakistan</option>
										                <option value="Palau">Palau</option>
										                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
										                <option value="Panama">Panama</option>
										                <option value="Papua New Guinea">Papua New Guinea</option>
										                <option value="Paraguay">Paraguay</option>
										                <option value="Peru">Peru</option>
										                <option value="Philippines">Philippines</option>
										                <option value="Pitcairn">Pitcairn</option>
										                <option value="Poland">Poland</option>
										                <option value="Portugal">Portugal</option>
										                <option value="Puerto Rico">Puerto Rico</option>
										                <option value="Qatar">Qatar</option>
										                <option value="Reunion">Reunion</option>
										                <option value="Romania">Romania</option>
										                <option value="Russian Federation">Russian Federation</option>
										                <option value="Rwanda">Rwanda</option>
										                <option value="Saint Helena">Saint Helena</option>
										                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
										                <option value="Saint Lucia">Saint Lucia</option>
										                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
										                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
										                <option value="Samoa">Samoa</option>
										                <option value="San Marino">San Marino</option>
										                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
										                <option value="Saudi Arabia">Saudi Arabia</option>
										                <option value="Senegal">Senegal</option>
										                <option value="Serbia">Serbia</option>
										                <option value="Seychelles">Seychelles</option>
										                <option value="Sierra Leone">Sierra Leone</option>
										                <option value="Singapore">Singapore</option>
										                <option value="Slovakia">Slovakia</option>
										                <option value="Slovenia">Slovenia</option>
										                <option value="Solomon Islands">Solomon Islands</option>
										                <option value="Somalia">Somalia</option>
										                <option value="South Africa">South Africa</option>
										                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
										                <option value="Spain">Spain</option>
										                <option value="Sri Lanka">Sri Lanka</option>
										                <option value="Sudan">Sudan</option>
										                <option value="Suriname">Suriname</option>
										                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
										                <option value="Swaziland">Swaziland</option>
										                <option value="Sweden">Sweden</option>
										                <option value="Switzerland">Switzerland</option>
										                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
										                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
										                <option value="Tajikistan">Tajikistan</option>
										                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
										                <option value="Thailand">Thailand</option>
										                <option value="Timor-leste">Timor-leste</option>
										                <option value="Togo">Togo</option>
										                <option value="Tokelau">Tokelau</option>
										                <option value="Tonga">Tonga</option>
										                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
										                <option value="Tunisia">Tunisia</option>
										                <option value="Turkey">Turkey</option>
										                <option value="Turkmenistan">Turkmenistan</option>
										                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
										                <option value="Tuvalu">Tuvalu</option>
										                <option value="Uganda">Uganda</option>
										                <option value="Ukraine">Ukraine</option>
										                <option value="United Arab Emirates">United Arab Emirates</option>
										                <option value="United Kingdom">United Kingdom</option>
										                <option value="United States">United States</option>
										                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
										                <option value="Uruguay">Uruguay</option>
										                <option value="Uzbekistan">Uzbekistan</option>
										                <option value="Vanuatu">Vanuatu</option>
										                <option value="Venezuela">Venezuela</option>
										                <option value="Viet Nam">Viet Nam</option>
										                <option value="Virgin Islands, British">Virgin Islands, British</option>
										                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
										                <option value="Wallis and Futuna">Wallis and Futuna</option>
										                <option value="Western Sahara">Western Sahara</option>
										                <option value="Yemen">Yemen</option>
										                <option value="Zambia">Zambia</option>
										                <option value="Zimbabwe">Zimbabwe</option>
													</select>
												</li>

												<li>
													<label>ADDRESS LINE 1*</label>
													<input type="text" name="address_line_1" required value="<?php if($address_data){ echo  $address_data['address_line_1'];} ?>">
												</li>

												<li>
													<label>ADDRESS LINE 2*</label>
													<input type="text" name="address_line_2" required value="<?php if($address_data){ echo  $address_data['address_line_2'];} ?>">
												</li>

												<li>
													<label>TOWN OR CITY*</label>
													<input type="text" name="address_town" required value="<?php if($address_data){ echo  $address_data['town'];} ?>">
												</li>

												<li>
													<label>STATE / PROVINCE</label>
													<input type="text" name="address_province" required value="<?php if($address_data){ echo  $address_data['province'];} ?>">
												</li>

												<li>
													<label>ZIP / POSTCODE</label>
													<input type="text" name="address_zipcode" required value="<?php if($address_data){ echo  $address_data['zip_code'];} ?>">
												</li>



											</ul>

											<button type="submit">PROCCESS ORDER</button>
										</div>
								</form>	
							</div> <!-- End Billinf address -->
						<?php else: ?>
							<div class="billing_address" >
								<!-- <h4>SHIPPING ADDRESS</h4>		 -->
								<form action="lib/charge.php" method="post" id="payment-form">
										<div class="_web_register" style="padding: 20px;">				
											<ul>
												<li>
													<h4><strong>PAYMENT METHOD</strong></h4>
												</li>


												<li>
													<select name="payment_type">
														<option value="credit_card_payment">CREDIT / DEBIT CARD PAYMENTS</option>
														<option value="paypal_payment">PAYPAL</option>
														<option value="cod_payment">CASH ON DELIVERY</option>
													</select>
												</li>


												<li>
													<label>CUSTOMER EMAIL *</label>
													<input type="text" name="email" required>
												</li>


												<li>
													<label>Credit Card Information</label>
													<div id="card-element">
													  <!-- A Stripe Element will be inserted here. -->
													</div>
												</li>


												<li>
													<hr>
													<h4><strong>Recipient</strong></h4>
												</li>

												<li>
													<label>SELECT TITLE</label><
													<select name="address_rep_title">
														<option value="Miss.">Miss .</option>
														<option value="Ms.">Ms .</option>
														<option value="Mrs.">Mrs .</option>
														<option value="Mr.">Mr .</option>
														<option value="Dr.">Dr .</option>
													</select>
												</li>

												<li>
													<label>FIRST NAME*</label>
													<input type="text" name="address_rep_name" required value="<?php if($address_data){ echo $address_data['rep_name']; } ?>">
												</li>

												<li>
													<label>LAST NAME*</label>
													<input type="text" name="address_rep_last_name" required value="<?php if($address_data){ echo $address_data['rep_last'];} ?>">
												</li>


												<li>
													<label>PHONE NUMBER</label>
													<input type="text" name="address_rep_phone_number" required value="<?php if($address_data){ echo  $address_data['rep_number'];} ?>">
												</li>

												<li>
													<hr>
													<h4><strong>SHIPPING ADDRESS</strong></h4>
												</li>


												<li>
													<label>COUNTRY</label>
													<select name="address_country">
													    <option value="Afghanistan">Afghanistan</option>
										                <option value="Åland Islands">Åland Islands</option>
										                <option value="Albania">Albania</option>
										                <option value="Algeria">Algeria</option>
										                <option value="American Samoa">American Samoa</option>
										                <option value="Andorra">Andorra</option>
										                <option value="Angola">Angola</option>
										                <option value="Anguilla">Anguilla</option>
										                <option value="Antarctica">Antarctica</option>
										                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
										                <option value="Argentina">Argentina</option>
										                <option value="Armenia">Armenia</option>
										                <option value="Aruba">Aruba</option>
										                <option value="Australia">Australia</option>
										                <option value="Austria">Austria</option>
										                <option value="Azerbaijan">Azerbaijan</option>
										                <option value="Bahamas">Bahamas</option>
										                <option value="Bahrain">Bahrain</option>
										                <option value="Bangladesh">Bangladesh</option>
										                <option value="Barbados">Barbados</option>
										                <option value="Belarus">Belarus</option>
										                <option value="Belgium">Belgium</option>
										                <option value="Belize">Belize</option>
										                <option value="Benin">Benin</option>
										                <option value="Bermuda">Bermuda</option>
										                <option value="Bhutan">Bhutan</option>
										                <option value="Bolivia">Bolivia</option>
										                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
										                <option value="Botswana">Botswana</option>
										                <option value="Bouvet Island">Bouvet Island</option>
										                <option value="Brazil">Brazil</option>
										                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
										                <option value="Brunei Darussalam">Brunei Darussalam</option>
										                <option value="Bulgaria">Bulgaria</option>
										                <option value="Burkina Faso">Burkina Faso</option>
										                <option value="Burundi">Burundi</option>
										                <option value="Cambodia">Cambodia</option>
										                <option value="Cameroon">Cameroon</option>
										                <option value="Canada">Canada</option>
										                <option value="Cape Verde">Cape Verde</option>
										                <option value="Cayman Islands">Cayman Islands</option>
										                <option value="Central African Republic">Central African Republic</option>
										                <option value="Chad">Chad</option>
										                <option value="Chile">Chile</option>
										                <option value="China">China</option>
										                <option value="Christmas Island">Christmas Island</option>
										                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
										                <option value="Colombia">Colombia</option>
										                <option value="Comoros">Comoros</option>
										                <option value="Congo">Congo</option>
										                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
										                <option value="Cook Islands">Cook Islands</option>
										                <option value="Costa Rica">Costa Rica</option>
										                <option value="Cote D'ivoire">Cote D'ivoire</option>
										                <option value="Croatia">Croatia</option>
										                <option value="Cuba">Cuba</option>
										                <option value="Cyprus">Cyprus</option>
										                <option value="Czech Republic">Czech Republic</option>
										                <option value="Denmark">Denmark</option>
										                <option value="Djibouti">Djibouti</option>
										                <option value="Dominica">Dominica</option>
										                <option value="Dominican Republic">Dominican Republic</option>
										                <option value="Ecuador">Ecuador</option>
										                <option value="Egypt">Egypt</option>
										                <option value="El Salvador">El Salvador</option>
										                <option value="Equatorial Guinea">Equatorial Guinea</option>
										                <option value="Eritrea">Eritrea</option>
										                <option value="Estonia">Estonia</option>
										                <option value="Ethiopia">Ethiopia</option>
										                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
										                <option value="Faroe Islands">Faroe Islands</option>
										                <option value="Fiji">Fiji</option>
										                <option value="Finland">Finland</option>
										                <option value="France">France</option>
										                <option value="French Guiana">French Guiana</option>
										                <option value="French Polynesia">French Polynesia</option>
										                <option value="French Southern Territories">French Southern Territories</option>
										                <option value="Gabon">Gabon</option>
										                <option value="Gambia">Gambia</option>
										                <option value="Georgia">Georgia</option>
										                <option value="Germany">Germany</option>
										                <option value="Ghana">Ghana</option>
										                <option value="Gibraltar">Gibraltar</option>
										                <option value="Greece">Greece</option>
										                <option value="Greenland">Greenland</option>
										                <option value="Grenada">Grenada</option>
										                <option value="Guadeloupe">Guadeloupe</option>
										                <option value="Guam">Guam</option>
										                <option value="Guatemala">Guatemala</option>
										                <option value="Guernsey">Guernsey</option>
										                <option value="Guinea">Guinea</option>
										                <option value="Guinea-bissau">Guinea-bissau</option>
										                <option value="Guyana">Guyana</option>
										                <option value="Haiti">Haiti</option>
										                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
										                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
										                <option value="Honduras">Honduras</option>
										                <option value="Hong Kong">Hong Kong</option>
										                <option value="Hungary">Hungary</option>
										                <option value="Iceland">Iceland</option>
										                <option value="India">India</option>
										                <option value="Indonesia">Indonesia</option>
										                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
										                <option value="Iraq">Iraq</option>
										                <option value="Ireland">Ireland</option>
										                <option value="Isle of Man">Isle of Man</option>
										                <option value="Israel">Israel</option>
										                <option value="Italy">Italy</option>
										                <option value="Jamaica">Jamaica</option>
										                <option value="Japan">Japan</option>
										                <option value="Jersey">Jersey</option>
										                <option value="Jordan">Jordan</option>
										                <option value="Kazakhstan">Kazakhstan</option>
										                <option value="Kenya">Kenya</option>
										                <option value="Kiribati">Kiribati</option>
										                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
										                <option value="Korea, Republic of">Korea, Republic of</option>
										                <option value="Kuwait">Kuwait</option>
										                <option value="Kyrgyzstan">Kyrgyzstan</option>
										                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
										                <option value="Latvia">Latvia</option>
										                <option value="Lebanon">Lebanon</option>
										                <option value="Lesotho">Lesotho</option>
										                <option value="Liberia">Liberia</option>
										                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
										                <option value="Liechtenstein">Liechtenstein</option>
										                <option value="Lithuania">Lithuania</option>
										                <option value="Luxembourg">Luxembourg</option>
										                <option value="Macao">Macao</option>
										                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
										                <option value="Madagascar">Madagascar</option>
										                <option value="Malawi">Malawi</option>
										                <option value="Malaysia">Malaysia</option>
										                <option value="Maldives">Maldives</option>
										                <option value="Mali">Mali</option>
										                <option value="Malta">Malta</option>
										                <option value="Marshall Islands">Marshall Islands</option>
										                <option value="Martinique">Martinique</option>
										                <option value="Mauritania">Mauritania</option>
										                <option value="Mauritius">Mauritius</option>
										                <option value="Mayotte">Mayotte</option>
										                <option value="Mexico">Mexico</option>
										                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
										                <option value="Moldova, Republic of">Moldova, Republic of</option>
										                <option value="Monaco">Monaco</option>
										                <option value="Mongolia">Mongolia</option>
										                <option value="Montenegro">Montenegro</option>
										                <option value="Montserrat">Montserrat</option>
										                <option value="Morocco">Morocco</option>
										                <option value="Mozambique">Mozambique</option>
										                <option value="Myanmar">Myanmar</option>
										                <option value="Namibia">Namibia</option>
										                <option value="Nauru">Nauru</option>
										                <option value="Nepal">Nepal</option>
										                <option value="Netherlands">Netherlands</option>
										                <option value="Netherlands Antilles">Netherlands Antilles</option>
										                <option value="New Caledonia">New Caledonia</option>
										                <option value="New Zealand">New Zealand</option>
										                <option value="Nicaragua">Nicaragua</option>
										                <option value="Niger">Niger</option>
										                <option value="Nigeria">Nigeria</option>
										                <option value="Niue">Niue</option>
										                <option value="Norfolk Island">Norfolk Island</option>
										                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
										                <option value="Norway">Norway</option>
										                <option value="Oman">Oman</option>
										                <option value="Pakistan">Pakistan</option>
										                <option value="Palau">Palau</option>
										                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
										                <option value="Panama">Panama</option>
										                <option value="Papua New Guinea">Papua New Guinea</option>
										                <option value="Paraguay">Paraguay</option>
										                <option value="Peru">Peru</option>
										                <option value="Philippines">Philippines</option>
										                <option value="Pitcairn">Pitcairn</option>
										                <option value="Poland">Poland</option>
										                <option value="Portugal">Portugal</option>
										                <option value="Puerto Rico">Puerto Rico</option>
										                <option value="Qatar">Qatar</option>
										                <option value="Reunion">Reunion</option>
										                <option value="Romania">Romania</option>
										                <option value="Russian Federation">Russian Federation</option>
										                <option value="Rwanda">Rwanda</option>
										                <option value="Saint Helena">Saint Helena</option>
										                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
										                <option value="Saint Lucia">Saint Lucia</option>
										                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
										                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
										                <option value="Samoa">Samoa</option>
										                <option value="San Marino">San Marino</option>
										                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
										                <option value="Saudi Arabia">Saudi Arabia</option>
										                <option value="Senegal">Senegal</option>
										                <option value="Serbia">Serbia</option>
										                <option value="Seychelles">Seychelles</option>
										                <option value="Sierra Leone">Sierra Leone</option>
										                <option value="Singapore">Singapore</option>
										                <option value="Slovakia">Slovakia</option>
										                <option value="Slovenia">Slovenia</option>
										                <option value="Solomon Islands">Solomon Islands</option>
										                <option value="Somalia">Somalia</option>
										                <option value="South Africa">South Africa</option>
										                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
										                <option value="Spain">Spain</option>
										                <option value="Sri Lanka">Sri Lanka</option>
										                <option value="Sudan">Sudan</option>
										                <option value="Suriname">Suriname</option>
										                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
										                <option value="Swaziland">Swaziland</option>
										                <option value="Sweden">Sweden</option>
										                <option value="Switzerland">Switzerland</option>
										                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
										                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
										                <option value="Tajikistan">Tajikistan</option>
										                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
										                <option value="Thailand">Thailand</option>
										                <option value="Timor-leste">Timor-leste</option>
										                <option value="Togo">Togo</option>
										                <option value="Tokelau">Tokelau</option>
										                <option value="Tonga">Tonga</option>
										                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
										                <option value="Tunisia">Tunisia</option>
										                <option value="Turkey">Turkey</option>
										                <option value="Turkmenistan">Turkmenistan</option>
										                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
										                <option value="Tuvalu">Tuvalu</option>
										                <option value="Uganda">Uganda</option>
										                <option value="Ukraine">Ukraine</option>
										                <option value="United Arab Emirates">United Arab Emirates</option>
										                <option value="United Kingdom">United Kingdom</option>
										                <option value="United States">United States</option>
										                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
										                <option value="Uruguay">Uruguay</option>
										                <option value="Uzbekistan">Uzbekistan</option>
										                <option value="Vanuatu">Vanuatu</option>
										                <option value="Venezuela">Venezuela</option>
										                <option value="Viet Nam">Viet Nam</option>
										                <option value="Virgin Islands, British">Virgin Islands, British</option>
										                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
										                <option value="Wallis and Futuna">Wallis and Futuna</option>
										                <option value="Western Sahara">Western Sahara</option>
										                <option value="Yemen">Yemen</option>
										                <option value="Zambia">Zambia</option>
										                <option value="Zimbabwe">Zimbabwe</option>
													</select>
												</li>

												<li>
													<label>ADDRESS LINE 1*</label>
													<input type="text" name="address_line_1" required>
												</li>

												<li>
													<label>ADDRESS LINE 2*</label>
													<input type="text" name="address_line_2" required>
												</li>

												<li>
													<label>TOWN OR CITY*</label>
													<input type="text" name="address_town" required>
												</li>

												<li>
													<label>STATE / PROVINCE</label>
													<input type="text" name="address_province" required>
												</li>

												<li>
													<label>ZIP / POSTCODE</label>
													<input type="text" name="address_zipcode" required>
												</li>



											</ul>

											<button type="submit">PROCCESS ORDER</button>
										</div>
								</form>	
							</div> <!-- End Billinf address -->	
					<?php endif; ?>

				
				<?php else: ?> 
					<div class="billing_address" >
						<!-- <h4>SHIPPING ADDRESS</h4>		 -->
						<form action="lib/charge.php" method="post" id="payment-form">
								<div class="_web_register" style="padding: 20px;">				
									<ul>
										<li>
											<h4><strong>PAYMENT METHOD</strong></h4>
										</li>


										<li>
											<select name="payment_type">
												<option value="credit_card_payment">CREDIT / DEBIT CARD PAYMENTS</option>
												<option value="paypal_payment">PAYPAL</option>
												<option value="cod_payment">CASH ON DELIVERY</option>
											</select>
										</li>


										<li>
											<label>CUSTOMER EMAIL *</label>
											<input type="text" name="email" required>
										</li>


										<li>
											<label>Credit Card Information</label>
											<div id="card-element">
											  <!-- A Stripe Element will be inserted here. -->
											</div>
										</li>


										<li>
											<hr>
											<h4><strong>Recipient</strong></h4>
										</li>

										<li>
											<label>SELECT TITLE</label>
											<select name="address_rep_title">
												<option value="Miss.">Miss .</option>
												<option value="Ms.">Ms .</option>
												<option value="Mrs.">Mrs .</option>
												<option value="Mr.">Mr .</option>
												<option value="Dr.">Dr .</option>
											</select>
										</li>

										<li>
											<label>FIRST NAME*</label>
											<input type="text" name="address_rep_name" required >
										</li>

										<li>
											<label>LAST NAME*</label>
											<input type="text" name="address_rep_last_name" required>">
										</li>


										<li>
											<label>PHONE NUMBER</label>
											<input type="text" name="address_rep_phone_number" required>">
										</li>

										<li>
											<hr>
											<h4><strong>SHIPPING ADDRESS</strong></h4>
										</li>


										<li>
											<label>COUNTRY</label>
											<select name="address_country">
											    <option value="Afghanistan">Afghanistan</option>
								                <option value="Åland Islands">Åland Islands</option>
								                <option value="Albania">Albania</option>
								                <option value="Algeria">Algeria</option>
								                <option value="American Samoa">American Samoa</option>
								                <option value="Andorra">Andorra</option>
								                <option value="Angola">Angola</option>
								                <option value="Anguilla">Anguilla</option>
								                <option value="Antarctica">Antarctica</option>
								                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
								                <option value="Argentina">Argentina</option>
								                <option value="Armenia">Armenia</option>
								                <option value="Aruba">Aruba</option>
								                <option value="Australia">Australia</option>
								                <option value="Austria">Austria</option>
								                <option value="Azerbaijan">Azerbaijan</option>
								                <option value="Bahamas">Bahamas</option>
								                <option value="Bahrain">Bahrain</option>
								                <option value="Bangladesh">Bangladesh</option>
								                <option value="Barbados">Barbados</option>
								                <option value="Belarus">Belarus</option>
								                <option value="Belgium">Belgium</option>
								                <option value="Belize">Belize</option>
								                <option value="Benin">Benin</option>
								                <option value="Bermuda">Bermuda</option>
								                <option value="Bhutan">Bhutan</option>
								                <option value="Bolivia">Bolivia</option>
								                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
								                <option value="Botswana">Botswana</option>
								                <option value="Bouvet Island">Bouvet Island</option>
								                <option value="Brazil">Brazil</option>
								                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
								                <option value="Brunei Darussalam">Brunei Darussalam</option>
								                <option value="Bulgaria">Bulgaria</option>
								                <option value="Burkina Faso">Burkina Faso</option>
								                <option value="Burundi">Burundi</option>
								                <option value="Cambodia">Cambodia</option>
								                <option value="Cameroon">Cameroon</option>
								                <option value="Canada">Canada</option>
								                <option value="Cape Verde">Cape Verde</option>
								                <option value="Cayman Islands">Cayman Islands</option>
								                <option value="Central African Republic">Central African Republic</option>
								                <option value="Chad">Chad</option>
								                <option value="Chile">Chile</option>
								                <option value="China">China</option>
								                <option value="Christmas Island">Christmas Island</option>
								                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
								                <option value="Colombia">Colombia</option>
								                <option value="Comoros">Comoros</option>
								                <option value="Congo">Congo</option>
								                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
								                <option value="Cook Islands">Cook Islands</option>
								                <option value="Costa Rica">Costa Rica</option>
								                <option value="Cote D'ivoire">Cote D'ivoire</option>
								                <option value="Croatia">Croatia</option>
								                <option value="Cuba">Cuba</option>
								                <option value="Cyprus">Cyprus</option>
								                <option value="Czech Republic">Czech Republic</option>
								                <option value="Denmark">Denmark</option>
								                <option value="Djibouti">Djibouti</option>
								                <option value="Dominica">Dominica</option>
								                <option value="Dominican Republic">Dominican Republic</option>
								                <option value="Ecuador">Ecuador</option>
								                <option value="Egypt">Egypt</option>
								                <option value="El Salvador">El Salvador</option>
								                <option value="Equatorial Guinea">Equatorial Guinea</option>
								                <option value="Eritrea">Eritrea</option>
								                <option value="Estonia">Estonia</option>
								                <option value="Ethiopia">Ethiopia</option>
								                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
								                <option value="Faroe Islands">Faroe Islands</option>
								                <option value="Fiji">Fiji</option>
								                <option value="Finland">Finland</option>
								                <option value="France">France</option>
								                <option value="French Guiana">French Guiana</option>
								                <option value="French Polynesia">French Polynesia</option>
								                <option value="French Southern Territories">French Southern Territories</option>
								                <option value="Gabon">Gabon</option>
								                <option value="Gambia">Gambia</option>
								                <option value="Georgia">Georgia</option>
								                <option value="Germany">Germany</option>
								                <option value="Ghana">Ghana</option>
								                <option value="Gibraltar">Gibraltar</option>
								                <option value="Greece">Greece</option>
								                <option value="Greenland">Greenland</option>
								                <option value="Grenada">Grenada</option>
								                <option value="Guadeloupe">Guadeloupe</option>
								                <option value="Guam">Guam</option>
								                <option value="Guatemala">Guatemala</option>
								                <option value="Guernsey">Guernsey</option>
								                <option value="Guinea">Guinea</option>
								                <option value="Guinea-bissau">Guinea-bissau</option>
								                <option value="Guyana">Guyana</option>
								                <option value="Haiti">Haiti</option>
								                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
								                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
								                <option value="Honduras">Honduras</option>
								                <option value="Hong Kong">Hong Kong</option>
								                <option value="Hungary">Hungary</option>
								                <option value="Iceland">Iceland</option>
								                <option value="India">India</option>
								                <option value="Indonesia">Indonesia</option>
								                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
								                <option value="Iraq">Iraq</option>
								                <option value="Ireland">Ireland</option>
								                <option value="Isle of Man">Isle of Man</option>
								                <option value="Israel">Israel</option>
								                <option value="Italy">Italy</option>
								                <option value="Jamaica">Jamaica</option>
								                <option value="Japan">Japan</option>
								                <option value="Jersey">Jersey</option>
								                <option value="Jordan">Jordan</option>
								                <option value="Kazakhstan">Kazakhstan</option>
								                <option value="Kenya">Kenya</option>
								                <option value="Kiribati">Kiribati</option>
								                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
								                <option value="Korea, Republic of">Korea, Republic of</option>
								                <option value="Kuwait">Kuwait</option>
								                <option value="Kyrgyzstan">Kyrgyzstan</option>
								                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
								                <option value="Latvia">Latvia</option>
								                <option value="Lebanon">Lebanon</option>
								                <option value="Lesotho">Lesotho</option>
								                <option value="Liberia">Liberia</option>
								                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
								                <option value="Liechtenstein">Liechtenstein</option>
								                <option value="Lithuania">Lithuania</option>
								                <option value="Luxembourg">Luxembourg</option>
								                <option value="Macao">Macao</option>
								                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
								                <option value="Madagascar">Madagascar</option>
								                <option value="Malawi">Malawi</option>
								                <option value="Malaysia">Malaysia</option>
								                <option value="Maldives">Maldives</option>
								                <option value="Mali">Mali</option>
								                <option value="Malta">Malta</option>
								                <option value="Marshall Islands">Marshall Islands</option>
								                <option value="Martinique">Martinique</option>
								                <option value="Mauritania">Mauritania</option>
								                <option value="Mauritius">Mauritius</option>
								                <option value="Mayotte">Mayotte</option>
								                <option value="Mexico">Mexico</option>
								                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
								                <option value="Moldova, Republic of">Moldova, Republic of</option>
								                <option value="Monaco">Monaco</option>
								                <option value="Mongolia">Mongolia</option>
								                <option value="Montenegro">Montenegro</option>
								                <option value="Montserrat">Montserrat</option>
								                <option value="Morocco">Morocco</option>
								                <option value="Mozambique">Mozambique</option>
								                <option value="Myanmar">Myanmar</option>
								                <option value="Namibia">Namibia</option>
								                <option value="Nauru">Nauru</option>
								                <option value="Nepal">Nepal</option>
								                <option value="Netherlands">Netherlands</option>
								                <option value="Netherlands Antilles">Netherlands Antilles</option>
								                <option value="New Caledonia">New Caledonia</option>
								                <option value="New Zealand">New Zealand</option>
								                <option value="Nicaragua">Nicaragua</option>
								                <option value="Niger">Niger</option>
								                <option value="Nigeria">Nigeria</option>
								                <option value="Niue">Niue</option>
								                <option value="Norfolk Island">Norfolk Island</option>
								                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
								                <option value="Norway">Norway</option>
								                <option value="Oman">Oman</option>
								                <option value="Pakistan">Pakistan</option>
								                <option value="Palau">Palau</option>
								                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
								                <option value="Panama">Panama</option>
								                <option value="Papua New Guinea">Papua New Guinea</option>
								                <option value="Paraguay">Paraguay</option>
								                <option value="Peru">Peru</option>
								                <option value="Philippines">Philippines</option>
								                <option value="Pitcairn">Pitcairn</option>
								                <option value="Poland">Poland</option>
								                <option value="Portugal">Portugal</option>
								                <option value="Puerto Rico">Puerto Rico</option>
								                <option value="Qatar">Qatar</option>
								                <option value="Reunion">Reunion</option>
								                <option value="Romania">Romania</option>
								                <option value="Russian Federation">Russian Federation</option>
								                <option value="Rwanda">Rwanda</option>
								                <option value="Saint Helena">Saint Helena</option>
								                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
								                <option value="Saint Lucia">Saint Lucia</option>
								                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
								                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
								                <option value="Samoa">Samoa</option>
								                <option value="San Marino">San Marino</option>
								                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
								                <option value="Saudi Arabia">Saudi Arabia</option>
								                <option value="Senegal">Senegal</option>
								                <option value="Serbia">Serbia</option>
								                <option value="Seychelles">Seychelles</option>
								                <option value="Sierra Leone">Sierra Leone</option>
								                <option value="Singapore">Singapore</option>
								                <option value="Slovakia">Slovakia</option>
								                <option value="Slovenia">Slovenia</option>
								                <option value="Solomon Islands">Solomon Islands</option>
								                <option value="Somalia">Somalia</option>
								                <option value="South Africa">South Africa</option>
								                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
								                <option value="Spain">Spain</option>
								                <option value="Sri Lanka">Sri Lanka</option>
								                <option value="Sudan">Sudan</option>
								                <option value="Suriname">Suriname</option>
								                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
								                <option value="Swaziland">Swaziland</option>
								                <option value="Sweden">Sweden</option>
								                <option value="Switzerland">Switzerland</option>
								                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
								                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
								                <option value="Tajikistan">Tajikistan</option>
								                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
								                <option value="Thailand">Thailand</option>
								                <option value="Timor-leste">Timor-leste</option>
								                <option value="Togo">Togo</option>
								                <option value="Tokelau">Tokelau</option>
								                <option value="Tonga">Tonga</option>
								                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
								                <option value="Tunisia">Tunisia</option>
								                <option value="Turkey">Turkey</option>
								                <option value="Turkmenistan">Turkmenistan</option>
								                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
								                <option value="Tuvalu">Tuvalu</option>
								                <option value="Uganda">Uganda</option>
								                <option value="Ukraine">Ukraine</option>
								                <option value="United Arab Emirates">United Arab Emirates</option>
								                <option value="United Kingdom">United Kingdom</option>
								                <option value="United States">United States</option>
								                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
								                <option value="Uruguay">Uruguay</option>
								                <option value="Uzbekistan">Uzbekistan</option>
								                <option value="Vanuatu">Vanuatu</option>
								                <option value="Venezuela">Venezuela</option>
								                <option value="Viet Nam">Viet Nam</option>
								                <option value="Virgin Islands, British">Virgin Islands, British</option>
								                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
								                <option value="Wallis and Futuna">Wallis and Futuna</option>
								                <option value="Western Sahara">Western Sahara</option>
								                <option value="Yemen">Yemen</option>
								                <option value="Zambia">Zambia</option>
								                <option value="Zimbabwe">Zimbabwe</option>
											</select>
										</li>

										<li>
											<label>ADDRESS LINE 1*</label>
											<input type="text" name="address_line_1" required>
										</li>

										<li>
											<label>ADDRESS LINE 2*</label>
											<input type="text" name="address_line_2" required>
										</li>

										<li>
											<label>TOWN OR CITY*</label>
											<input type="text" name="address_town" required>
										</li>

										<li>
											<label>STATE / PROVINCE</label>
											<input type="text" name="address_province" required>
										</li>

										<li>
											<label>ZIP / POSTCODE</label>
											<input type="text" name="address_zipcode" required>
										</li>



									</ul>

									<button type="submit">PROCCESS ORDER</button>
								</div>
						</form>	
					</div> <!-- End Billinf address -->
				<?php endif;
			 ?>

		</div>

		<div class="web_clear_content"></div>
	</div>


<?php } ?>

<script src="http://js.stripe.com/v3/"></script>
<script type="text/javascript" src="scripts/charge.js"></script>


