<?php include('header_sidemenuOrder.php'); ?>


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

	//2. returning number of products from two different tables
	$stmt1 = $conn->prepare("SELECT u.user_name, COUNT(*) AS total_records FROM users u 
    JOIN orders o ON u.user_id=o.user_id");

	$stmt1->execute();
	$stmt1->bind_result($user_name,$total_records);
	$stmt1->store_result();
	$stmt1->fetch();

	//3. Number of products per page
	$total_records_per_page = 8;
	$offset = ($page_no - 1) * $total_records_per_page;

	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;

	$adjacents = "2";

	$total_no_of_pages = ceil($total_records / $total_records_per_page);

	//4. getting all products from two different tables
	$stmt2 = $conn->prepare("SELECT u.user_name, o.* FROM orders o
    JOIN users u ON u.user_id=o.user_id
    LIMIT $offset,$total_records_per_page");
	$stmt2->execute();
	$orders = $stmt2->get_result();





?>


		<!-- MAIN -->
		<main>
			<div class="table-data">
				<div class="order">

					<?php if(isset($_GET['order_updated'])){?> 
                    <p class="text-center" style="color: green;"><?php echo $_GET['order_updated']; ?></p>
                    <?php } ?>

                    <?php if(isset($_GET['order_failed'])){?> 
                    <p class="text-center" style="color: red;"><?php echo $_GET['order_failed']; ?></p>
                    <?php } ?>

					<div class="head">
						<h3>All Orders</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
                                <th scope="col">Name</th>
							<!--	<th scope="col">Order Id</th> -->
								<th scope="col">Order Status</th>
							<!--	<th scope="col">User Id</th> -->
                                <th scope="col">Order Date</th>
                                <th scope="col">User Phone</th>
                                <th scope="col">User Address</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
							</tr>
						</thead>
						<tbody>

                            <?php  foreach($orders as $order) {?>

							<tr>
                                <td><?php echo $order['user_name']; ?></td>
							<!--	<td><?php echo $order['order_id']; ?></td> -->
								<td><span class="status completed"><?php echo $order['order_status']; ?></span></td>
                            <!--     <td><?php echo $order['user_id']; ?></td> -->
                                <td><?php echo $order['order_date']; ?></td>
                                <td><?php echo $order['user_phone']; ?></td>
                                <td><?php echo $order['user_address']; ?></td>
                                <td><a class="btn-edit" href="edit_order.php?order_id=<?php echo $order['order_id']; ?>">Edit</a></td>
                                <td><a class="btn-delete">Delete</a></td>
							</tr>

                            <?php }?>
							
						</tbody>
					</table>


                    <nav aria-label="Page navigation example">
                        <ul class="pagination mt-5 mx-auto">

                            <li class="page-item <?php if($page_no <=1) {echo 'disabled';} ?>">
                                <a class="page-link" href="<?php if($page_no <= 1) {echo '#';}else{echo "?page_no=".($page_no-1);} ?>">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
                            <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>

                            <?php if($page_no >=3) { ?>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="<?php echo "?page_no=".$page_no; ?>"><?php echo $page_no; ?></a></li>
                            <?php } ?>

                            <li class="page-item <?php if($page_no>= $total_no_of_pages){echo 'disabled';} ?>">
                                <a class="page-link" href="<?php if($page_no >= $total_no_of_pages){echo '#';} else{ echo "?page_no=".($page_no+1);} ?>">Next</a>
                            </li>
                        </ul>
                    </nav>    


				</div>
			</div>
		</main>
		<!-- MAIN -->

	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>