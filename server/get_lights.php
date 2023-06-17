<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='lights' LIMIT 4");

$stmt->execute();

$lights_products = $stmt->get_result();


?>