<?php 
  
  session_start();
  require_once('../vendor/stripe/stripe-php/init.php' );
  \Stripe\Stripe::setApiKey('sk_test_KmBQrMPFD3i0LbBeYd9f1rfD00nlSDVPp4');

  require '../connection.php';
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
  $product_info_arr = [];
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


  $_POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

  $token = $_POST['stripeToken'];
  $email = $_POST['email'];
  $re_title = $_POST['address_rep_title'];
  $rep_first_name = $_POST['address_rep_name'];
  $rep_last_name = $_POST['address_rep_last_name'];
  $rep_phone_number = $_POST['address_rep_phone_number'];
  $address_country = $_POST['address_country'];
  $address_line_1 = $_POST['address_line_1'];
  $address_line_2 = $_POST['address_line_2'];
  $address_town = $_POST['address_town'];
  $address_province = $_POST['address_province'];
  $address_zipcode = $_POST['address_zipcode'];


  echo $total;

  $customer = \Stripe\Customer::create(array(
    "email" => $email,
    "source" => $token,
  ));


  $item_c = count($item_n_cart);
  $charge = \Stripe\Charge::create(array(
    "amount" => $total.'00',
    "currency" => "php",
    "description" => "Payment For Product of fashbelle",
    "customer" => $customer->id
  ));



