<?php 

    session_start();

    include('../server/connection.php')

?>


<?php
//protecting this page
	if(!isset($_SESSION['admin_logged_in'])){
		header('location: login.php');
		exite();
	}

    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
        $stmt = $conn->prepare("DELETE FROM products WHERE product_id=?");
        $stmt->bind_param('i',$product_id);

        if($stmt->execute()){

             header('location: products.php?deleted_successfully=Product Removed Successfully');
        }else{
            header('location: products.php?deleted_failure=Could not delete product');   
        }
       
    }

?>