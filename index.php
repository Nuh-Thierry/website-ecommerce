
<?php include('layouts/header.php'); ?>


      <!-- Home -->
      <!-- container helps the image and body writing get displyad on same ligne cuz we also used container above-->
      <section id="home">
        <div class="container">
           <h5>NEW ARRIVALS</h5> 
           <h1><span>Best Prices</span>This Season</h1> 
           <p>Gshop offers best products for the most affordable prices</p>
           <button>Shop Now</button>
        </div>
      </section>

      <!-- Brands -->
      <!-- max number of images per row is 12 -->
      <!-- for large screens we have col-lg we have 4 images, 2for medium screens col_md and 1 for small screens col-sm -->
      <section id="brand" class="container">
        <div class="row"> 
            <img class="img-fluid col-lg-3 col-md-6 col-sm_12" src="assets/imgs/brand1.jpeg"/>
            <img class="img-fluid col-lg-3 col-md-6 col-sm_12" src="assets/imgs/brand5.jpeg"/>
            <img class="img-fluid col-lg-3 col-md-6 col-sm_12" src="assets/imgs/brand3.png"/>
            <img class="img-fluid col-lg-3 col-md-6 col-sm_12" src="assets/imgs/brand4.png"/>
        </div>
      </section>

      <!-- new section-->
      <section id="new" class="w-100">
        <div class="row p-0 m-0">
            <!-- first-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/1.jpg"/>
                <div class="details">
                    <h2> Extremely Awesome part</h2>
                    <button class="text-uppercase">Shop Now</button>
                </div>
            </div>
            <!-- second -->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/2.jpg"/>
                <div class="details">
                    <h2> Awesome BreakPart</h2>
                    <button class="text-uppercase">Shop Now</button>
                </div>
            </div>
            <!-- third -->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/3.jpg"/>
                <div class="details">
                    <h2> Some Discount </h2>
                    <button class="text-uppercase">Shop Now</button>
                </div>
            </div>
        </div>
      </section>

      <!-- Featured -->
     <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3> Our Featured</h3>
            <hr class="mx-auto">
            <p>You can check out our featured products here</p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php  include('server/get_featured_products.php'); ?>

        <?php while($row = $featured_products ->fetch_assoc()){ ?>

            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p_name"><?php echo $row['product_name']; ?></h5>
                <h4 class="p-price"><?php echo $row['product_price']; ?>frs</h4>
                <a href="<?php echo "single_product.php?product_id=". $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
            </div>

            <?php } ?>
        </div>
     </section> 

     <!--Banner-->
     <section id="banner" class="my-5 py-5">
        <div class="container"> 
            <h4>All Round Sale</h4>
           <h1>Most Collection <br> Up to 30% discount</h1> 
           <button class="text-uppercase">Shop Now</button>
        </div>
     </section>

     <!--Lights-->
     <section id="lights" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3> Various Light Types</h3>
            <hr class="mx-auto">
            <p>You can check out our Head and back lights</p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php  include('server/get_lights.php'); ?>

        <?php while($row = $lights_products ->fetch_assoc()){ ?>    

            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p_name"><?php echo $row['product_name']; ?></h5>
                <h4 class="p-price"><?php echo $row['product_price']; ?>frs</h4>
                <a href="<?php echo "single_product.php?product_id=". $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
            </div>

            <?php } ?>
        </div>
     </section> 

     <!--shocks-->
     <section id="shocks" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3> Quality Schocks</h3>
            <hr class="mx-auto">
            <p>Check out our quality shocks</p>
        </div>
        <div class="row mx-auto container-fluid">

       <?php  include('server/get_shocks.php'); ?>

        <?php while($row = $shocks->fetch_assoc()){ ?>    

            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p_name"><?php echo $row['product_name']; ?></h5>
                <h4 class="p-price"><?php echo $row['product_price']; ?>frs</h4>
                <a href="<?php echo "single_product.php?product_id=". $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
            </div>

            <?php } ?>
        </div>
     </section>

     <!--break parts-->
     <section id="break" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3> Break Part Models</h3>
            <hr class="mx-auto">
            <p>You can check out our various breakparts</p>
        </div>
        <div class="row mx-auto container-fluid">

        <?php  include('server/get_breaks.php'); ?>

        <?php while($row = $breaks->fetch_assoc()){ ?>    

            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" />
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p_name"><?php echo $row['product_name']; ?></h5>
                <h4 class="p-price"><?php echo $row['product_price']; ?>frs</h4>
                <a href="<?php echo "single_product.php?product_id=". $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
            </div>

        <?php } ?>
        </div>
     </section> 

<?php include('layouts/footer.php'); ?>

     