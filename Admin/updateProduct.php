<?php

require('../Settings/core.php');
require('../Controllers/product_controller.php');

check_login();
if (check_permission() != 1) {

  echo 'you are not an admin';

  //redirect to index.php
  header('Location: ../Login/login.php');
}

$product = select_one_product_controller($_GET['id']);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>


        <!-- Preloader start -->
  
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
        <!-- Preloader end -->
        <!-- Main wrapper start -->
    <div id="main-wrapper">
            <!-- Nav header start -->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="images/logo-text.png" alt="">
                    </span>
                </a>
            </div>
        </div>
            <!-- Nav header end -->
            <!-- Header start -->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down   d-md-none">
							<form action="#">
								<input type="text" class="form-control" placeholder="Search">
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php include('sidebar.php'); ?>  
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide"  enctype="multipart/form-data" action="../Actions/Update_product.php" method="post">
                                        <div class="form-group row">

                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <input type="hidden" class="form-control"  name="product_id" value="<?php echo $_GET['id'] ?>" >
                                            </div>
                                        </div>
                                            
                                            <label class="col-lg-4 col-form-label" for="category">Categories <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="product_cat" required="required">
                                                    <option value= "<?php echo $product['product_cat'] ?>"><?php echo $product['cat_name'] ?></option>
                                                    <?php 
                                                        $products = select_all_categories_controller();
                                                        foreach($products as $x){

                                                    ?>
                                                    <option value="<?php echo $x['cat_id']; ?>"> <?php echo $x['cat_name'];?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="brand">Brand <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="product_brand" required="required">
                                                <option value="<?php echo $product['product_brand'] ?>"><?php echo $product['brand_name'] ?></option>
                                                    <?php 
                                                        $products = select_all_brands_controller();
                                                        foreach($products as $x){

                                                    ?>
                                                    <option value="<?php echo $x['brand_id']; ?>"> <?php echo $x['brand_name'];?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="product_title">Product Title <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control"  name="product_title" placeholder="Product title" value="<?php echo $product['product_title'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="product_price">Product price <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control"  name="product_price" placeholder="Product price" value="<?php echo $product['product_price'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="product_desc">Product description <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea class="form-control"  name="product_desc" rows="5" placeholder="Product description" > <?php echo $product['product_desc'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="product_image">Product image </label>
                                            <div class="col-lg-6">
                                            <img src="../images/products/<?php echo($product['product_image']);?>" width="200" height="200">
                                                <input type="file" class="form-control"  name="product_image" placeholder="Product image">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="product_keywords">Product keywords <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control"  name="product_keywords" placeholder="Product keywords" value="<?php echo $product['product_keywords'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary" name="updateProductButton">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright  2018</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <script src="./plugins/validation/jquery.validate.min.js"></script>
    <script src="./plugins/validation/jquery.validate-init.js"></script>

</body>

</html>