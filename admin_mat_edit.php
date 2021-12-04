<?php
    
    include_once('connect_db.php');

    if (isset($_REQUEST['mat_update_id'])) {
        try {
            $id = $_REQUEST['mat_update_id'];
            $select_stmt = $db->prepare("SELECT * FROM material WHERE id = :id");
            $select_stmt->bindParam(':id', $id);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
        } catch(PDOException $e) {
            $e->getMessage();
        }
    }

    if (isset($_REQUEST['btn_mat_update'])) { 
        $mat_ser_up = $_REQUEST['txt_mat_ser_up'];
        $mat_ty_up = $_REQUEST['txt_mat_ty_up'];
        $mat_nam_up = $_REQUEST['txt_mat_nam_up'];
        $mat_bra_up = $_REQUEST['txt_mat_bra_up'];
        $mat_qt_up = $_REQUEST['txt_mat_qt_up'];

        if (empty($mat_ser_up)) {
            $errorMsg = "กรุณาใส่ข้อมูล รหัส วัสดุ/อุปกรณ์";
        }else if (empty($mat_ty_up)) {
            $errorMsg = "กรุณาใส่ข้อมูล ประเภท วัสดุ/อุปกรณ์";
        }else if (empty($mat_nam_up)) {
            $errorMsg = "กรุณาใส่ข้อมูล ชื่อ วัสดุ/อุปกรณ์";
        }else if (empty($mat_bra_up)) {
            $errorMsg = "กรุณาใส่ข้อมูล แบนรด์ วัสดุ/อุปกรณ์";
        }else {
            try {
                if (!isset($errorMsg)) {
                    $mat_update = $db->prepare("UPDATE material SET type_id = :mtyp_up, mat_serail = :mserail_up, mat_brand = :mbrand_up, mat_name = :mname_up, mat_amount = :mqty_up WHERE id = :id");
                    $mat_update->bindParam(':mtyp_up', $mat_ty_up);
                    $mat_update->bindParam(':mserail_up', $mat_ser_up);
                    $mat_update->bindParam(':mbrand_up', $mat_bra_up);
                    $mat_update->bindParam(':mname_up', $mat_nam_up);
                    $mat_update->bindParam(':mqty_up', $mat_qt_up);
                    $mat_update->bindParam(':id', $id);

                    if ($mat_update->execute()) {
                        $updateMsg = "กำลังอัพเดตข้อมูล สักครู่...";
                        header("refresh:2;admin_mat.php");
                    }
                }
            } catch(PDOException $e) {
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
    <title>ptksystem_user_profile </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <!-- Datatable -->
    <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/h3head.css" rel="stylesheet">



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
            <a href="admin_pro.php" class="brand-logo">
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
                           
                        </div> 

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="./index.php" class="dropdown-item">
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
                    <li><a href="admin_pro.php" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">จัดการข้อมูลโฟร์แมน</span></a>
                    </li>
                    <li><a href="admin_mat.php" aria-expanded="false"><i
                                class="icon icon-layout-25"></i><span class="nav-text">แก้ไขข้อมูลวัสดุอุปกรณ์</span></a>
                    </li>
                    <li><a  href="admin_site.php" aria-expanded="false"><i
                                class="icon icon-world-2"></i><span class="nav-text">แก้ไข้ข้อมูลไซต์งาน</span></a>
                        
                    </li>
                    <li><a  href="admin_comelist.php" aria-expanded="false"><i
                                class="icon icon-form"></i><span class="nav-text">รายการจากโฟร์แมน</span></a>
                        
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">ตารางการดำเนินงาน</span></a>
                        <ul aria-expanded="false">
                            <li><a href="admin_list_sto.php">ข้อมูลการเบิกถอน</a></li>
                            <li><a href="admin_list_sti.php">ข้อมูลการจัดเก็บ</a></li>
                            <li><a href="admin_list_po.php">ข้อมูลการสั่งซื้อ</a></li>
                        </ul>
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
                            <h3>แก้ไขข้อมูลวัสดุอุปกรณ์</h3>
                            <span class="ml-1">แก้ไข้ข้อมูลวัสดุ/อุปกรณ์ในปัจจุบัน</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                                <h4 class="card-title">แก้ไขข้อมูลที่เลือก</h4>
                                
                            </div>   
                            
                                    <form method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control mt-5" name="txt_mat_ser_up"  id="comment" value="<?php echo $mat_serail; ?>" ></input>              
                                        </div>
                                        <div class="form-group">

                                            <input type="text" class="form-control mt-5" name="txt_mat_ty_up"  id="comment" value="<?php echo $type_id; ?>" ></input>              
                                        </div>
                                        <div class="form-group">

                                            <input type="text" class="form-control mt-5" name="txt_mat_nam_up"  id="comment" value="<?php echo $mat_name; ?>" ></input>              
                                        </div>
                                        <div class="form-group">

                                            <input type="text" class="form-control mt-5" name="txt_mat_bra_up"  id="comment" value="<?php echo $mat_brand; ?>" ></input>              
                                        </div>
                                        <div class="form-group">

                                            <input type="text" class="form-control mt-5" name="txt_mat_qt_up"  id="comment" value="<?php echo $mat_amount; ?>" ></input>              
                                        </div>
                                        <div class="form-group text-center">

                                            <div class="col-md-12 mt-3">
                                                <input type="submit" name="btn_mat_update" class="btn btn-success" value="เพิ่ม">
                                                <a href="admin_mat.php" class="btn btn-danger">กลับ</a>

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
         if (isset($updateMsg)) {
    ?>
        <div class="alert alert-success">
            <strong>สำเร็จ! <?php echo $updateMsg; ?></strong>
        </div>
    <?php } ?>

                    </div>
                    </div>
                </div>


            </div>
        </div> <!-- /# ส่วนปิดคอนเทนเนอร์ -->

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
     <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>



    <!-- Datatable -->
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./js/plugins-init/datatables.init.js"></script>

</body>

</html>