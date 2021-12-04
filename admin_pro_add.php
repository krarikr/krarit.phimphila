<?php
    
    include('connect_db.php');

    if (isset($_REQUEST['btn_user_insert'])) {
        $user_name_add = $_REQUEST['txt_user_name_add'];
        $user_fullname_add = $_REQUEST['txt_user_fullname_add'];
        $user_pass_add = $_REQUEST['txt_user_pass_add'];
        $user_role_add = $_REQUEST['txt_role'];


        if (empty($user_name_add)) {
            $errorMsg = "กรุณาใส่ ไอดี โฟร์แมน";
        }else if (empty($user_fullname_add)) {
            $errorMsg = "กรุณาใส่ ชื่อ โฟร์แมน";
        }else if (empty($user_pass_add)) {
            $errorMsg = "กรุณาใส่ รหัสผ่าน โฟร์แมน";
        }else if (empty($user_role_add)) {
            $errorMsg = "กรุณาเลือกประเภทผู้ใช้งาน";
        }else {
            try {
                if (!isset($errorMsg)) {
                    $useradd_stmt = $db->prepare("INSERT INTO user_ptk(user_name, user_fullname, user_password, user_role) VALUES (:uname_up, :ufullname_up, :upass_up, :urole_up)");
                    $useradd_stmt->bindParam(':uname_up', $user_name_add);
                    $useradd_stmt->bindParam(':ufullname_up', $user_fullname_add);
                    $useradd_stmt->bindParam(':upass_up', $user_pass_add);
                    $useradd_stmt->bindParam(':urole_up', $user_role_add);
                    

                  if ($useradd_stmt->execute()) {
                        $insertMsg = "เพิ่มข้อมูลสำเร็จ";
                        header("refresh:2;admin_pro.php");
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
                                class="icon icon-world-2"></i><span class="nav-text">แก้ไขข้อมูลไซต์งาน</span></a>
                        
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
                            <h3>เพิ่มข้อมูลโฟร์แมน</h3>
                            <span class="ml-1">เพิ่มข้อมูลโฟร์แมนใหม่</span>
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
                                <h4 class="card-title">เพิ่มข้อมูลโฟร์แมน</h4>
                                
                            </div>   
                            
                                    <form method="post">
                                    <div class="form-group ">
                                    <div class="col-md-12 mt-4">
                                        <label>ชื่อ โฟร์แมน</label>
                                            <input type="text" class="form-control mt-3" name="txt_user_fullname_add"  id="comment" placeholder="กรุณาใส่ ชื่อโฟร์แมน" ></input>
                                            </div>            
                                        </div>

                                        <div class="form-group">
                                        <div class="col-md-12 mt-4">
                                        <label>ไอดี</label>
                                            <input type="text" class="form-control mt-3" name="txt_user_name_add"  id="comment" placeholder="กรุณาใส่ ไอดี" ></input>
                                            </div>            
                                        </div>

                                        <div class="form-group ">
                                        <div class="col-md-12 mt-4">
                                        <label>รหัสผ่าน</label>
                                            <input type="text" class="form-control mt-3" name="txt_user_pass_add"  id="comment" placeholder="กรุณาใส่ รหัสผ่าน" ></input>
                                            </div>            
                                        </div>

                                        <div class="form-group">
                                        <label for="type" class="col-sm-3 control-label">ประเภทผู้ใช้งาน</label>
                                            <div class="col-sm-12 mt-4">  
                                             <select name="txt_role" class="form-control">
                                                <option value="" selected="selected">- เลือกประเภทผู้ใช้งาน -</option>
                                                 <option value="admin">ผู้ดูแลระบบ</option>                                               
                                                 <option value="user">โฟร์แมน</option>
                                                     </select>
                                             </div>
                                         </div>

                                        <div class="form-group text-center">

                                            <div class="col-md-12 mt-3">
                                                <input type="submit" name="btn_user_insert" class="btn btn-success" value="เพิ่ม">
                                                <a href="admin_pro.php" class="btn btn-danger">กลับ</a>

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