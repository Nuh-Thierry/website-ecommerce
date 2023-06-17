<?php include('header_sidemenu.php'); ?>




		<!-- MAIN -->
		<main>
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Create Product</h3> 
					</div> 
                    
                    <div class="mx-auto container">
                            <form id="create-form" enctype="multipart/form-data" method="POST" action="create_product.php">
                                <p style="color:red"><?php if(isset($_GET['error'])){ echo  $_GET['error']; }?></p>
                                <div class="form-group mt-2">

                                <//?php foreach($products as $product) {?>

                                    <label>Title</label>
                                    <input type="text" class="form-control" id="product-name" name="name" placeholder="Title" required/>
                                </div>
                                <div class="form-group mt-2">
                                    <label>Description</label>
                                    <input type="text" class="form-control" id="product-desc"  name="description" placeholder="Description" required/>
                                </div>
                                <div class="form-group mt-2">
                                    <label>Price</label>
                                    <input type="text" class="form-control" id="product-price" name="price" placeholder="Price" required/>
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
                                    <input type="text" class="form-control" id="product-color" name="color" placeholder="Color" required/>
                                </div>
                                <div class="form-group mt-2">
                                    <label>Special Offer/Sale</label>
                                    <input type="text" class="form-control" id="product-sales" name="offer" placeholder="Sale %" required/>
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
                                    <input type="submit" class="btn-edit"name="create_product" value="Create" />
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