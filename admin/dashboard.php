<?php include('header_sidemenu.php'); ?>

<?php include('../server/connection.php'); ?>

<?php
//protecting this page
	if(!isset($_SESSION['admin_logged_in'])){
		header('location: login.php');
		exite();
	}

?>

<?php

	//get orders from database
	//1. determining page number
	if(isset($_GET['page_no']) && $_GET['page_no'] != ""){

		//if user already got in so page number will be the one they select
		$page_no = $_GET['page_no'];

	}else{
		// if user just got into page. Default page is 1
		$page_no = 1;
	}

	//2. returning number of products
	$stmt1 = $conn->prepare("SELECT COUNT(*) AS total_records FROM orders");
	$stmt1->execute();
	$stmt1->bind_result($total_records);
	$stmt1->store_result();
	$stmt1->fetch();

	//3. Number of products per page
	$total_records_per_page = 10;
	$offset = ($page_no-1) * $total_records_per_page;

	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;

	$adjacents = "2";

	$total_no_of_pages = ceil($total_records/$total_records_per_page);

	//4. getting all products
	$stmt2 = $conn->prepare("SELECT * FROM orders LIMIT $offset,$total_records_per_page");
	$stmt2->execute();
	$products = $stmt2->get_result();





?>


		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>1020</h3>
						<p>New Order</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
						<p>Visitors</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>$2543</h3>
						<p>Total Sales</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Orders</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>User</th>
								<th>Date Order</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status process">Process</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
						</tbody>
					</table>


				<!-- pagination -->
					<!--<nav aria-label="Page navigation example ">
						<ul class="pagination mt-5 mx-auto">

							<li class="page-item <//?php if($page_no <=1) {echo 'disabled';} ?>">
								<a class="page-link" href="<//?php if($page_no <= 1) {echo '#';}else{echo "?page_no=".($page_no-1);} ?>">Previous</a>
							</li>
							<li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
							<li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>

							<//?php if($page_no >=3) { ?>
								<li class="page-item"><a class="page-link" href="#">...</a></li>
								<li class="page-item"><a class="page-link" href="<//?php echo "?page_no=".$page_no; ?>"><//?php echo $page_no; ?></a></li>
							<//?php } ?>

							<li class="page-item <//?php if($page_no>= $total_no_of_pages){echo 'disabled';} ?>">
								<a class="page-link" href="<//?php if($page_no >= $total_no_of_pages){echo '#';} else{ echo "?page_no=".($page_no+1);} ?>">Next</a>
							</li>
						</ul>
         		 </nav> -->




				</div>
				<div class="todo">
					<div class="head">
						<h3>Todos</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<ul class="todo-list">
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
					</ul>
				</div>
			</div>
		</main>
		<!-- MAIN -->

	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>