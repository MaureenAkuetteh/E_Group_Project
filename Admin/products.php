<?php
require('../Settings/core.php');
require('../Controllers/product_controller.php');
// var_dump($_SESSION['user_role']);
// var_dump($_SESSION['user_id']);
check_login();
if (check_permission() != 1) {

    echo 'you are not an admin';
  
    //redirect to login.php
    header('Location: ../Login/login.php');
  
  }
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
    <link href="./plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
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
            <!-- Sidebar start  -->
       <?php include('sidebar.php'); ?>       
            <!-- Sidebar end  -->
            <!-- Content body start -->
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Products</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Category</th>
                                                <th>Brand</th>
                                                <th>Title</th>
                                                <th>Price ($)</th>
                                                <th>Description</th>
                                                <th>Image</th>
                                                <th>Keywords</th>
                                                <th> Action </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $products = select_all_products_controller();
                                            foreach($products as $x){
                                                echo 
                                                    "
                                                    <tr>
                                                        <td>{$x['product_id']}</td>
                                                        <td>{$x['cat_name']}</td>
                                                        <td>{$x['brand_name']}</td>
                                                        <td>{$x['product_title']}</td>
                                                        <td>{$x['product_price']}</td>
                                                        <td>{$x['product_desc']}</td>
                                                        <td><img src='../images/products/{$x["product_image"]}' alt='...' width='200' height='200'></td>
                                                        <td>{$x['product_keywords']}</td>
                                                        <td><a href='../Admin/updateProduct.php?id={$x['product_id']}'>Update</a></td>
                                                        <td><a href='../Actions/Delete_product.php?id={$x['product_id']}'>Delete</a></td>

                                                    
                                                
                                                    </tr>
                                                    ";
                                                }

                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
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

    <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

</body>

</html>