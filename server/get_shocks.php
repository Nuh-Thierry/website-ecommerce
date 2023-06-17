<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='shocks' LIMIT 4");

$stmt->execute();

$shocks = $stmt->get_result();


?>