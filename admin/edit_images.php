<?php include('header_sidemenu.php'); ?>

<?php


    if(isset($_GET['product_id'])){

        $product_id = $_GET['product_id'];
        $product_name = $_GET['product_name'];

    }else{
        header('locaton: products.php');
    }

?>




		<!-- MAIN -->
		<main>
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Update Product Image</h3> 
					</div> 
                    
                    <div class="mx-auto container">
                            <form id="create-form" enctype="multipart/form-data" method="POST" action="update_images.php">
                                <p style="color:red"><?php if(isset($_GET['error'])){ echo  $_GET['error']; }?></p>
                                <div class="form-group mt-2">

                                <//?php foreach($products as $product) {?>

                                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>"/>
                                    <input type="hidden" name="product_name" value="<?php echo $product_name; ?>"/>
                                </div>
                               
                                <div class="form-group mt-2">
                                    <label>Image 1</label>
                                    <input type="file" class="form-control" id="image1"  name="image1" placeholder="Image 1" required/>
                                </div>
                                <div class="form-group mt-2">
                                    <label>Image 2</label>
                                    <input type="file" class="form-control" id="image2" name="image2" placeholder="Image 2" required/>
                                </div>
                                <div class="form-group mt-2">
                                    <label>Image 3</label>
                                    <input type="file" class="form-control" id="image3" name="image3" placeholder="Image 3" required/>
                                </div>
                                <div class="form-group mt-2">
                                    <label>Image 4</label>
                                    <input type="file" class="form-control" id="image4" name="image4" placeholder="Image 4" required/>
                                </div>
                                <div class="form-group mt-2">
                                    <input type="submit" class="btn edit-btn"name="update_images" value="Update" />
                                </div>

                                <//?php  }?>
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