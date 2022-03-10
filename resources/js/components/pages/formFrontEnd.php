<?php
  
  if($_GET){
    dump($_GET);
    $name = $_GET['name'];
    $lastname = $_GET['lastname'];
    $address = $_GET['address'];
    $cap = $_GET['cap'];
    $city = $_GET['city'];
    $province = $_GET['province'];
    $phone = $_GET['phone'];
    $doorbell = $_GET['doorbell'];
    $email = $_GET['email'];
    $note = $_GET['note'];
    // $product = $_GET['product'];
    // $quantity = $_GET['quantity'];
    $totalPrice = $_GET['total'];
  
    echo $name . $lastname . 'è felice';
  }

  
  if($_POST){
    dump($_POST);
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $cap = $_POST['cap'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $phone = $_POST['phone'];
    $doorbell = $_POST['doorbell'];
    $email = $_POST['email'];
    $note = $_POST['note'];
    // $product = $_POST['product'];
    // $quantity = $_POST['quantity'];
    $totalPrice = $_POST['total'];
  
    echo $name . $lastname . 'è felice';
  }


// https://www.codersitalia.it/interagire-php-javascript/

// http://127.0.0.1:8000/payment/formFrontEnd.php?Name=Francesco&Lastname=Lucco&Address=&City=Belfiore&Cap=37050&Province=Belfiore&Email=luccowebdeveloper%40gmail.com&Note=Ciao&Total=

// https://axios-http.com/docs/post_example