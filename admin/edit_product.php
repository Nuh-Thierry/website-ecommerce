<?php include('header_sidemenu.php'); ?>
<?php include('../server/connection.php'); ?>

<?php

if(isset($_GET['product_id'])){
    $products_id = $_GET['product_id'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id=? ");
    $stmt->bind_param('i',$products_id);
    $stmt->execute();
    $products = $stmt->get_result();

}else if(isset($_POST['edit_btn'])){

    $products_id = $_POST['product_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $offer = $_POST['offer'];
    $color = $_POST['color'];
    $category = $_POST['category'];

    $stmt = $conn->prepare("UPDATE products SET product_name=?,product_description=?,product_price=?,
    product_special_offer=?,product_color=?,product_category=? WHERE product_id=?");

    $stmt->bind_param('ssssssi',$title,$description,$price,$offer,$color,$category,$products_id);

    if($stmt->execute()){
        header('location: products.php?edit_success_message=Product Updated Successfully');
    }else{
        header('location: products.php?edit_error_message=Error occured, try again');
    }

}else{
    header('location: products.php');
    exit;
}



?>



		<!-- MAIN -->
		<main>
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Edit Product</h3> 
					</div> 
                    
                    <div class="mx-auto container">
                            <form id="edit-form" method="POST" action="edit_product.php">
                                <p style="color:red"><?php if(isset($_GET['error'])){ echo  $_GET['error']; }?></p>
                                <div class="form-group mt-2">

                                <?php foreach($products as $product) {?>

                                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>"/>
                                    <label>Title</label>
                                    <input type="text" class="form-control" id="product-name" value="<?php echo $product['product_name'] ?>" name="title" placeholder="Title" required/>
                                </div>
                                <div class="form-group mt-2">
                                    <label>Description</label>
                                    <input type="text" class="form-control" id="product-desc" value="<?php echo $product['product_description'] ?>" name="description" placeholder="Description" required/>
                                </div>
                                <div class="form-group mt-2">
                                    <label>Price</label>
                                    <input type="text" class="form-control" id="product-price" value="<?php echo $product['product_price'] ?>" name="price" placeholder="Price" required/>
                                </div>
                                <div class="form-group mt-2">
                                    <label>Category</label>
                                    <select class="form-select" required name="category">
                                        <option value="lights">Lights</option>
                                        <option value="breaks">Breaks</option>
                                        <option value="shocks">Shocks</option>
                                        <option value="drums">Drums</option>
                                    </select>
                                </div>
                                <div class="form-group mt-2">
                                    <label>Color</label>
                                    <input type="text" class="form-control" id="product-color" value="<?php echo $product['product_color'] ?>" name="color" placeholder="Color" required/>
                                </div>
                                <div class="form-group mt-2">
                                    <label>Special Offer/Sale</label>
                                    <input type="text" class="form-control" id="product-sales" value="<?php echo $product['product_special_offer'] ?>" name="sales" placeholder="Sale %" required/>
                                </div>
                                <div class="form-group mt-2">
                                    <input type="submit" class="btn-edit" id="edit-btn" name="edit_btn" value="Edit" />
                                </div>

                                <?php  }?>
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