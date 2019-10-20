<div class="_web_register">
	<h2>CREATE YOUR ACCOUNT</h2>
	<div class="_web_reg_form">
		<small>* Required</small>
		<ul>
			<li>
				<label>COUNTRY *</label>
				<select>
					<option>PHILIPHINES</option>
				</select>
			</li>

			<li>
				<label>EMAIL ADDRESS *</label>
				<input type="text" name="">
			</li>

			<li>
				<label>CONFIRM EMAIL ADDRESS *</label>
				<input type="text" name="">
			</li>


			<li>
				<label>FIRST NAME *</label>
				<input type="text" name="">
			</li>


			<li>
				<label>LAST NAME *</label>
				<input type="text" name="">
			</li>


			<li>
				<label>PHONE NUMBER</label>
				<input type="text" name="">
			</li>

			<li>
				<label>ZIP/POSTAL CODE</label>
				<br>
				<input type="text" name="" style="width: 48%;">
			</li>


			<li>
				<label>BIRTHDATE</label>
				<br>
				<div class="_web_left_content">
					<select>
						<option>MM</option>
						<option>01 - January</option>
						<option>02 - Febuary</option>
						<option>03 - March</option>
						<option>04 - April</option>
						<option>05 - May</option>
						<option>06 - June</option>
						<option>07 - July</option>
						<option>08 - August</option>
						<option>09 - September</option>
						<option>10 - October</option>
						<option>11 - November</option>
						<option>12 - December</option>
					</select>
				</div>
				<div class="_web_right_content">
					<select>
						<?php for ($i = 1; $i < 32; $i++) { 
							echo "<option>".$i."</option>";
						} ?>
						
					</select>
				</div>
			</li>

			<p>Your password should contain 6-20 case sensitive characters, at least one numeral, at least one alphabet,special characters allowed .</p>

			<li>
				<label>PASSWORD *</label>
				<input type="password" name="">
			</li>

			<li>
				<label>CONFIRM PASSWORD *</label>
				<input type="password" name="">
			</li>

			<div class="_web_terms_condition">
				<input type="checkbox" >
				<p>By checking this box and clicking "Register" below, I acknowledge that I have read and agree to the Terms & Conditions and Privacy Policy .</p>
				<div class="web_clear_content"></div>
			</div>

			

			<div class="_web_terms_condition">
				<input type="checkbox">
				<p>Yes, sign me up! By checking this box, I agree I want to receive news, offers, style tips and other promotional materials from and about Michael Kors, including by email, phone and mail to the contact information I am submitting. I consent to Michael Kors, its affiliates and service providers processing my personal data for these purposes and as described in the privacy policy. I understand that I can withdraw my consent at any time.</p>
				<div class="web_clear_content"></div>
			</div>

			

			<!-- End of registraion form -->
		</ul>

		<button>REGISTER</button>
	</div>
</div>

