<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='others' LIMIT 4");

$stmt->execute();

$others = $stmt->get_result();


?>