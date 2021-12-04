<?php

    include_once('connect_db.php');
    session_start();

    if (isset($_REQUEST['btn_po_insert'])) {
        $po_auser = $_REQUEST['txt_po_user_add'];
        $po_adate = $_REQUEST['txt_po_date_add'];
        $po_asite = $_REQUEST['txt_po_site_add'];
        $po_aimg = $_REQUEST['txt_po_image_add'];
        


         if (empty($po_adate)) {
            $errorMsg = "กรุณาใส่ข้อมูล วันที่";
        }else if (empty($asite)) {
            $errorMsg = "กรุณาใส่ข้อมูล เลือกไซต์งาน";
        }else if (empty($po_aimg)) {
            $errorMsg = "กรุณาใส่ข้อมูล รูปภาพใบสั่งซื้อ";
        }else {
            try {
                if (!isset($errorMsg)) {
                    $insert_stmt = $db->prepare("INSERT INTO order_status(ors_type, ors_user, ors_date, , ors_site, ors_img ) VALUES ('3', :mus, :mda, :msi, :mim)");
                    $insert_stmt->bindParam(':mus', $po_auser);
                    $insert_stmt->bindParam(':mda', $po_adate);
                    $insert_stmt->bindParam(':msi', $po_asite);
                    $insert_stmt->bindParam(':mim', $po_aimg);
                    
                    
                    if ($insert_stmt->execute()) {
                        $insertMsg = "แจ้งการสั่งซื้อ สำเร็จ";
                        header("refresh:2;admin_mat.php");
                    }
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ptksystem user </title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <!-- Daterange picker -->
    <link href="./vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Clockpicker -->
    <link href="./vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
    <!-- asColorpicker -->
    <link href="./vendor/jquery-asColorPicker/css/asColorPicker.min.css" rel="stylesheet">
    <!-- Material color picker -->
    <link href="./vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="./vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="./vendor/pickadate/themes/default.date.css">
    <!-- Custom Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">



</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="user_profile.php" class="brand-logo">
                <img class="logo-abbr" src="./images/logo_ptk.png" height="40" alt="">
                <img class="logo-compact" src="./images/brand_name.png" alt=""> 
                <img class="brand-title" src="./images/brand_name.png" height="75%" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <!-- ส่วนค้นหา -->
                        <div class="header-left">
                        <h3 class="mt-2">โฟร์แมน : <?php echo $_SESSION['user_login']; ?></h3>
                        </div> 

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="logout.php" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li><a href="./user_profile.php" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">ข้อมูลผู้ใช้งาน</span></a>
                    </li>
                    <li><a href="user_list.php" aria-expanded="false"><i
                                class="icon icon-layout-25"></i><span class="nav-text">รายการวัสดุอุปกรณ์</span></a>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">จัดทำรายการต่างๆ</span></a>
                        <ul aria-expanded="false">
                            <li><a href="user_stockout.php">เบิกอุปกรณ์</a></li>
                            <li><a href="user_stockin.php">จัดเก็บอุปกรณ์</a></li>
                            <li><a href="user_po.php">สั่งซื้ออุปกรณ์</a></li>
                        </ul>
                    </li>
                    
                    <li><a  href="user_status.php" aria-expanded="false"><i
                                class="icon icon-single-copy-06"></i><span class="nav-text">สถานะรายการ</span></a>
                        
                    </li>
                                 
                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->

        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
            <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h3>เบิกวัสดุ/อุปกรณ์</h3>
                            <span class="ml-1">เบิกวัสดุ/อุปกรณ์สำหรับการใช้ในไซต์งาน</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                                <h4 class="card-title">สั่งซื้อ</h4>
                                
                            </div>   
                            
                                    <form method="post">
                                    <div class="form-group ">
                                    <div class="col-md-12 mt-4">
                                        <label>ชื่อ โฟร์แมน</label>
                                            <input type="text" class="form-control mt-3" name="txt_po_user_add"  id="comment" value="<?php echo $_SESSION['user_login']; ?>" ></input>
                                            </div>            
                                        </div>

                                        <div class="form-group ">
                                        <div class="col-md-12 mt-4">
                                        <label>วันที่คืนวัสดุ/อุปกรณ์</label>
                                        <input type="text" class="form-control" placeholder="ปี-เดือน-วัน" id="mdate" name="txt_po_date_add2">
                                            </div>            
                                        </div>
                                       
                                        
                                        <div class="form-group">
                                        <label for="type" class="col-sm-3 control-label">เลือกไซต์งาน</label>
                                            <div class="col-sm-12 mt-4">  
                                                
                                             <select name="txt_po_site_add" class="form-control">
                                             <?php 
                                             $select_material = $db->prepare("SELECT * FROM site ");
                                             $select_material->execute(); ?>
                                                <option value="" selected="selected">- เลือกไซต์งาน -</option>
                                    
                                             <?php 

                                            while ($row = $select_material->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                
                                                <?php  
                                                            if ($row["site_status"] != 'a'){
                                                            ?>

                                                 <option value="<?php echo $row["id"]; ?>"><?php echo $row["site_name"]; ?></option>       

                                                 <?php } ?>
                                                 <?php } ?>
                                                     </select>

                                         

                                             </div>
                                         </div>

                                        

                                        <div class="form-group text-center">

                                            <div class="col-md-12 mt-3">
                                                <input type="submit" name="btn_po_insert" class="btn btn-success" value="แจ้งการสั่งซื้อ">
                                                

                                            </div>
                                         </div>
                                    </form>

                                    
                                

                            <?php 
         if (isset($errorMsg)) {
    ?>
        <div class="alert alert-danger">
            <strong>ระวัง! <?php echo $errorMsg; ?></strong>
        </div>
    <?php } ?>
    

    <?php 
         if (isset($insertMsg)) {
    ?>
        <div class="alert alert-success">
            <strong>สำเร็จ! <?php echo $insertMsg; ?></strong>
        </div>
    <?php } ?>

                    </div>
                    </div>
                </div>


                

              
                    

            </div>
        </div>

        

         <!-- /# ส่วนปิดคอนเทนเนอร์ -->

        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>บริษัทพัฒการ กรุ็ป จำกัด  1968</p>
                <p>ออกแบบโดย <a href="#" target="_blank">Phimphila Karis</a></p> 
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    
    <!-- Required vendors -->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>
    


    <!-- Daterangepicker -->
    <!-- momment js is must -->
    <script src="./vendor/moment/moment.min.js"></script>
    <script src="./vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- clockpicker -->
    <script src="./vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <!-- asColorPicker -->
    <script src="./vendor/jquery-asColor/jquery-asColor.min.js"></script>
    <script src="./vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
    <script src="./vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
    <!-- Material color picker -->
    <script src="./vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- pickdate -->
    <script src="./vendor/pickadate/picker.js"></script>
    <script src="./vendor/pickadate/picker.time.js"></script>
    <script src="./vendor/pickadate/picker.date.js"></script>



    <!-- Daterangepicker -->
    <script src="./js/plugins-init/bs-daterange-picker-init.js"></script>
    <!-- Clockpicker init -->
    <script src="./js/plugins-init/clock-picker-init.js"></script>
    <!-- asColorPicker init -->
    <script src="./js/plugins-init/jquery-asColorPicker.init.js"></script>
    <!-- Material color picker init -->
    <script src="./js/plugins-init/material-date-picker-init.js"></script>
    <!-- Pickdate -->
    <script src="./js/plugins-init/pickadate-init.js"></script>

    
</body>

</html>