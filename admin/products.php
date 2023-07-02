<?php include('header_sidemenuProduct.php'); ?>

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
	$stmt1 = $conn->prepare("SELECT COUNT(*) AS total_records FROM products");

	$stmt1->execute();
	$stmt1->bind_result($total_records);
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
	$stmt2 = $conn->prepare("SELECT * FROM products LIMIT $offset,$total_records_per_page");
	$stmt2->execute();
	$products = $stmt2->get_result();





?>


		<!-- MAIN -->
		<main>
			<div class="table-data">
				<div class="order">
					
					<?php if(isset($_GET['edit_success_message'])){?> 
                    <p class="text-center" style="color: green;"><?php echo $_GET['edit_success_message']; ?></p>
                    <?php } ?>

                    <?php if(isset($_GET['edit_error_message'])){?> 
                    <p class="text-center" style="color: red;"><?php echo $_GET['edit_error_message']; ?></p>
                    <?php } ?>


					<?php if(isset($_GET['deleted_successfully'])){?> 
                    <p class="text-center" style="color: green;"><?php echo $_GET['deleted_successfully']; ?></p>
                    <?php } ?>

                    <?php if(isset($_GET['deleted_failure'])){?> 
                    <p class="text-center" style="color: red;"><?php echo $_GET['deleted_failure']; ?></p>
                    <?php } ?>

					<?php if(isset($_GET['product_created'])){?> 
                    <p class="text-center" style="color: green;"><?php echo $_GET['product_created']; ?></p>
                    <?php } ?>

                    <?php if(isset($_GET['product_failed'])){?> 
                    <p class="text-center" style="color: red;"><?php echo $_GET['product_failed']; ?></p>
                    <?php } ?>

					<?php if(isset($_GET['images_updated'])){?> 
                    <p class="text-center" style="color: green;"><?php echo $_GET['images_updated']; ?></p>
                    <?php } ?>

                    <?php if(isset($_GET['images_failed'])){?> 
                    <p class="text-center" style="color: red;"><?php echo $_GET['images_failed']; ?></p>
                    <?php } ?>


					<div class="head">
						<h3>Products</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
                                <th scope="col">Product Id</th>
                                <th scope="col">Product Image</th>
							    <th scope="col">Product Name</th>
								<th scope="col">Product Price</th>
                                <th scope="col">Product Offer</th>
                                <th scope="col">Product Category</th>
                                <th scope="col">Product Color</th>
								<th scope="col">Edit Images</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
							</tr>
						</thead>
						<tbody>

                            <?php  foreach($products as $product) {?>

							<tr>
                                <td><?php echo $product['product_id']; ?></td>
							    <td><img src="<?php echo "../assets/imgs/". $product['product_image']; ?>" style="width: 70px height 70px"/></td> 
                                <td><?php echo $product['product_name']; ?></td> 
                                <td><?php echo $product['product_price']; ?>frs</td>
                                <td><?php echo $product['product_special_offer']; ?></td>
                                <td><?php echo $product['product_category']; ?></td>
                                <td><?php echo $product['product_color']; ?></td>
								<td><a class="img-edit" href="<?php echo "edit_images.php?product_id=".$product['product_id']."&product_name=".$product['product_name']; ?>">Edit</a></td>
                                <td><a class="btn-edit" href="edit_product.php?product_id=<?php echo $product['product_id']; ?>">Edit</a></td>
                                <td><a class="btn-delete" href="delete_product.php?product_id=<?php  echo $product['product_id']; ?>">Delete</a></td>
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