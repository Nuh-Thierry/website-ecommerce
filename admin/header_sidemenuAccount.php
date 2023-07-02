<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style1.css">

	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<!--<i class='bx bxs-smile'></i>-->
			<span class="text">GABI Company lmt</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="dashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
            <li >
				<a href="orders.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Orders</span>
				</a>
			</li>
			<li >
				<a href="products.php">
					<i class='bx bxs-tag' ></i>
					<span class="text">Products</span>
				</a>
			</li>
			<!--<li>
				<a href="#">
					<i class='bx bxs-user' ></i>
					<span class="text">Customers</span>
				</a>
			</li>-->
			<li >
				<a href="add_product.php">
					<i class='bx bx-plus-circle'></i>
					<span data_feature="user">Create Product</span>
				</a>
			</li>
			<li class="active">
				<a href="account.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Account</span>
				</a>
			</li>
            <li>
				<a href="help.php">
					<i class='bx bxs-help-circle' ></i>
					<span class="text">help</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<!--<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>-->
			<li>
				<a href="logout.php?logout=1" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<!--<input type="search" placeholder="Search...">-->
					<button type="submit" class="search-btn"><i class='bx' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<span>Your Name</span>
			</a>
		</nav>
		<!-- NAVBAR -->