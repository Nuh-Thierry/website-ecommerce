<?php include('layouts/header.php'); ?>

<?php 

include('server/connection.php');

// using search section
if(isset($_POST['search'])){

    // ALSO APPLY PAGINATION HERE NOT TO CONFUSE BETWEEN PAGINATION OF SEARCH SECTION WITH NORMAL PAGE PAGINATION CUZ YOU MIGHT SEARCH A PRODUCT THAT IS IN ANOTHER PAGE PAGINATION
     //1. determining page number
     if(isset($_GET['page_no']) && $_GET['page_no'] != ""){

        //if user already got in so page number will be the one they select
        $page_no = $_GET['page_no'];

    }else{
            // if user just got into page. Default page is 1
            $page_no = 1;
        }

        $category = $_POST['category'];
        $price = $_POST['price'];

        //2. returning number of products
        $stmt1 = $conn->prepare("SELECT COUNT(*) AS total_records FROM products WHERE product_category=? AND product_price<=?");
        $stmt1->bind_param('si',$category,$price);
        $stmt1->execute();
        $stmt1->bind_result($total_records);
        $stmt1->store_result();
        $stmt1->fetch();

        //3. Number of products per page
        $total_records_per_page = 8;
        $offset = ($page_no-1) * $total_records_per_page;
        
        $previous_page = $page_no - 1;
        $next_page = $page_no + 1;

        $adjacents = "2";

        $total_no_of_pages = ceil($total_records/$total_records_per_page);

        //4. getting all products
        $stmt2 = $conn->prepare("SELECT * FROM products WHERE product_category=? AND  product_price<=? LIMIT $offset,$total_records_per_page");
        $stmt2->bind_param('si',$category,$price);
        $stmt2->execute();
        $products = $stmt2->get_result();

     

// in case he just wants to see all products important to insert pagination for page.
}else{


    //1. determining page number
    if(isset($_GET['page_no']) && $_GET['page_no'] != ""){

        //if user already got in so page number will be the one they select
        $page_no = $_GET['page_no'];

    }else{
        // if user just got into page. Default page is 1
        $page_no = 1;
    }

    //2. returning number of products
    $stmt1 = $conn->prepare("SELECT COUNT(*) AS total_records FROM products");
    $stmt1->execute();
    $stmt1->bind_result($total_records);
    $stmt1->store_result();
    $stmt1->fetch();

    //3. Number of products per page
    $total_records_per_page = 8;
    $offset = ($page_no-1) * $total_records_per_page;
    
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;

    $adjacents = "2";

    $total_no_of_pages = ceil($total_records/$total_records_per_page);

    //4. getting all products
    $stmt2 = $conn->prepare("SELECT * FROM products LIMIT $offset,$total_records_per_page");
    $stmt2->execute();
    $products = $stmt2->get_result();

}



?>


      <!-- placing section on left and wright -->
    <section  id="page_div" >
        <div class="left-section">

        <!-- search -->
        <!-- shop page products -->
        <section id="search" class="">
            <div class="container mt-3 py-3">
                <p> Search Products</p>
                <hr>

            </div>
            
            <form action="shop.php" method="POST">
            <div class="row mx-auto container">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <p>Category</p>
                    <div class="form-check">
                        <input class="form-check-input" value="lights" type="radio" name="category" category="category_light" <?php if(isset($category) && $category=='lights') {echo 'checked';} ?>/>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Lights
                        </label> 

                    </div>

                    <div class="form-check">
                        <input class="form-check-input" value="breaks" type="radio" name="category" id="category_break" <?php if(isset($category) && $category=='breaks') {echo 'checked';} ?>/>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Breaks
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" value="shocks" type="radio" name="category" id="category_shock" <?php if(isset($category) && $category=='shocks') {echo 'checked';} ?>/>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Shocks
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" value="drums" type="radio" name="category" id="category_drums" <?php if(isset($category) && $category=='drums') {echo 'checked';} ?>/>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Drums
                        </label>
                    </div>
                </div>
            </div>

                <div class="row mx-auto container mt-5">
                    <div col-lg-12 col-md-12 col-sm-12>
                        <p>Price</p>
                        <input type="range" class="form-range w-50" name="price" value="<?php if(isset($price)){echo $price;} else{echo "100";} ?>" min="1" max="100000" id="customRange2"/>
                        <div class="w-50">
                            <span style="float: left;">1</span>
                            <span style="float: right;">100000</span>
                        </div>
                    </div>
                </div>

                <div class="form-group my-3 mx-3">
                    <input type="submit" name="search" value="Search" class="btn btn-primary"/>
                </div>

            </form> 
        </section>

        </div>

         <div class="right-section">

            <section id="home_shop" >
                <div class="container">
                <h5>NEW ARRIVALS</h5> 
                <h1><span>Best Prices</span>This Season</h1> 
                <p>Gshop offers best products for the most affordable prices</p>
                <button>Shop Now</button>
                </div>
            </section>

        </div>

    </section>

        <!-- shop -->
        <section  id="featured" class="">
        <div class="container mt-5 py-5 text-center">
            <h3> Our Products</h3>
            <hr class="mx-auto">
            <p>You can check out our products here</p>
        </div>

        <div class="row mx-auto container">

        <?php while($row = $products->fetch_assoc()) { ?>
            <!--when you click on product on this page it should take you to the detailled section on another page-->
            <div onclick="window.location.href='single_product.html';" class="product text-center col-lg-3 col-md-4 col-sm-12">
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
                <a class="btn shop-buy-btn" href="<?php echo "single_product.php?product_id=".$row['product_id']; ?>">Buy Now</a> 
            </div>

            <?php } ?>

           
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
    </section> 

<?php include('layouts/footer.php'); ?>