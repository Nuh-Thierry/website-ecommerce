<?php include('header_sidemenu.php'); ?>
<?php include('../server/connection.php'); ?>

<?php
    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
        $stmt = $conn->prepare("SELECT * FROM orders WHERE order_id=? ");
        $stmt->bind_param('i',$order_id);
        $stmt->execute();
        $order = $stmt->get_result();

    }else if(isset($_POST['edit_order'])){

        $order_status = $_POST['order_status'];
        $order_id = $_POST['order_id'];

        $stmt = $conn->prepare("UPDATE orders SET order_status=? WHERE order_id=?");
    
        $stmt->bind_param('si',$order_status,$order_id);
    
        if($stmt->execute()){
            header('location: orders.php?order_updated=Order Updated Successfully');
        }else{
            header('location: orders.php?order_failed=Error occured, try again');
        }

    }else{
        header('location: orders.php');
        exit;
    }

?>

		<!-- MAIN -->
		<main>
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Edit Order</h3> 
					</div> 
                    
                    <div class="mx-auto container">
                            <form id="edit-form" method="POST" action="edit_order.php">
                                <p style="color:red"><?php if(isset($_GET['error'])){ echo  $_GET['error']; }?></p>


                                <?php foreach($order as $r) {?>

                                <div class="form-group mt-3">
                                    <label>OrderId</label> 
                                    <p class="my-4"><?php echo $r['order_id']; ?></p>
                                </div>
                                <div class="form-group my-3">
                                    <label>OrderPrice</label>
                                    <p class="my-4"><?php echo $r['order_cost']; ?></p>
                                </div>

                                    <input type="hidden" name="order_id" value="<?php echo $r['order_id']; ?>"/>

                                <div class="form-group my-3">
                                    <label>Order Status</label>
                                    <p><select class="form-select" required name="order_status">
                                        <option value="not paid" <?php if($r['order_status'] == 'not paid'){echo "selected"; } ?> >Not Paid</option>
                                        <option value="paid" <?php if($r['order_status'] == 'paid'){echo "selected"; } ?>>Paid</option>
                                        <option value="delivered" <?php if($r['order_status'] == 'delivered'){echo "selected" ;} ?>>Delivered</option>
                                    </select></p>
                                </div>
                                <div class="form-group my-3">
                                    <label>OrderDate</label>
                                    <p class="my-4"><?php echo $r['order_date']; ?></p>
                                </div>
                                <div class="form-group my-3">
                                    <input type="submit" class="btn-edit" id="edit-btn" name="edit_order" value="Edit" />
                                </div>

                                <?php } ?>
                               

                            </form>
                    </div>


				</div>
			</div>
		</main>
		<!-- MAIN -->

	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>