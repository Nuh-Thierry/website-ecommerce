<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='drums' LIMIT 4");

$stmt->execute();

$drums = $stmt->get_result();


?>