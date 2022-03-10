<?php
  
  if($_GET){
    dump($_GET);
    $name = $_GET['name'];
    $lastname = $_GET['lastname'];
    $address = $_GET['address'];
    $cap = $_GET['cap'];
    $city = $_GET['city'];
    $province = $_GET['province'];
    $email = $_GET['email'];
    $note = $_GET['note'];
    // $product = $_GET['product'];
    // $quantity = $_GET['quantity'];
    $totalPrice = $_GET['totalPrice'];
  
    echo $name . $lastname . 'è felice';
  }


// https://www.codersitalia.it/interagire-php-javascript/

// http://127.0.0.1:8000/payment/formFrontEnd.php?Name=Francesco&Lastname=Lucco&Address=&City=Belfiore&Cap=37050&Province=Belfiore&Email=luccowebdeveloper%40gmail.com&Note=Ciao&Total=

// https://axios-http.com/docs/post_example