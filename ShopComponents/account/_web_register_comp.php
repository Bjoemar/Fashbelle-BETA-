<form action="lib/customer_registration.php" method="POST" id="register_form">
	<div class="_web_register">
		<h2>계정 만들기</h2>
		<div class="_web_reg_form">
			<small id="error_message">* 필수</small>
			<ul>
				<li>
					<label>국가 *</label>
					<select id="country" name="customer_country">
						<option value="">SELECT COUNTRY</option>
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
					<label>이메일 주소 *</label>
					<input type="text" name="email">
				</li>

				<li>
					<label>이메일 주소 확인 *</label>
					<input type="text" name="confirm_email">
				</li>


				<li>
					<label>이름 *</label>
					<input type="text" name="firstname">
				</li>


				<li>
					<label>성 *</label>
					<input type="text" name="lastname">
				</li>


				<li>
					<label>연락처</label>
					<input type="text" name="phone_number">
				</li>

				<li>
					<label>주소</label>
					<br>
					<input type="text" name="postalcode" style="width: 48%;">
				</li>


				<li>
					<label>생일</label>
					<br>
					<div class="_web_left_content">
						<select name="reg_month" id="reg_month">
							<option value="">MM</option>
							<option value="1">01 - January</option>
							<option value="2">02 - Febuary</option>
							<option value="3">03 - March</option>
							<option value="4">04 - April</option>
							<option value="5">05 - May</option>
							<option value="6">06 - June</option>
							<option value="7">07 - July</option>
							<option value="8">08 - August</option>
							<option value="9">09 - September</option>
							<option value="10">10 - October</option>
							<option value="11">11 - November</option>
							<option value="12">12 - December</option>
						</select>
					</div>
					<div class="_web_right_content">
						<select name="reg_days">
							<?php for ($i = 1; $i < 32; $i++) { 
								echo "<option value='".$i."''>".$i."</option>";
							} ?>
							
						</select>
					</div>
				</li>

				<p>Your password should contain 6-20 case sensitive characters, at least one numeral, at least one alphabet,special characters allowed .</p>

				<li>
					<label>비밀번호 *</label>
					<input type="password" name="password">
				</li>

				<li>
					<label>비밀번호 확인 *</label>
					<input type="password" name="confirm_password">
				</li>

				<div class="_web_terms_condition">
					<input type="checkbox" class="req_checkbox">
					<p>이 확인란을 선택하고 아래의 "등록"을 클릭하면 이용 약관 및 개인 정보 보호 정책을 읽고 동의 함을 인정합니다..</p>
					<div class="web_clear_content"></div>
				</div>

				

				<div class="_web_terms_condition">
					<input type="checkbox" class="req_checkbox">
					<p>예, 가입하세요! 이 확인란을 선택하면 Michael Kors에 관한 뉴스, 제안, 스타일 팁 및 기타 홍보 자료를 전자 메일, 전화 및 우편으로 제출하는 연락처 정보로 받고 싶습니다. 본인은 개인 정보 취급 방침에 설명 된대로 이러한 목적으로 개인 정보를 처리하는 Michael Kors, 그 계열사 및 서비스 제공 업체에 동의합니다. 본인은 언제든지 동의를 철회 할 수 있음을 이해합니다..</p>
					<div class="web_clear_content"></div>
				</div>

			
				<!-- End of registraion form -->
			</ul>

			<button id="register" type="button">회원가입</button>
		</div>
	</div>
		
</form>

