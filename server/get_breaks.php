<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='breaks' LIMIT 4");

$stmt->execute();

$breaks = $stmt->get_result();


?>