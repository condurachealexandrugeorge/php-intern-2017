<?php

if(!empty($_FILES['imagine']['name'])){
	$name = $_FILES['imagine']['name'];
	$tmp_name = $_FILES['imagine']['tmp_name'];
	$size = $_FILES['imagine']['size'];
	if($size<=100000){
	move_uploaded_file($tmp_name, 'assets/images/products/'.$name);
	echo 'Imaginea a fost incarcata!';
}   else {
	echo 'Imaginea nu a fost incarcata!';
	}
}



$conectare = mysqli_connect('localhost','root','','eshop');
if(!$conectare){
	die('Conectarea la baza de date nu a reusit!');
}


$name = $_POST['product_name'];
$description = $_POST['product_decription'];
$favorite = ($_POST['favorite_product']);
$category = $_POST['user_job'];


$sql = "INSERT INTO products (Name, Description, Favorite, Category)  VALUES('$name','$description','$favorite','$category')";
$result = mysqli_query($conectare, $sql);

header("Location: add-product.php");
	

?>
