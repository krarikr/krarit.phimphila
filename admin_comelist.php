<?php
    include('connect_db.php');


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
                            <h3>ตารางการดำเนินงาน</h3>
                            <span class="ml-1">ตารางรายการที่ถูกส่งเข้ามาอนุมัติ</span>
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
                                <h4 class="card-title">ตารางรายการดำเนินงานที่ถูกส่งเข้ามาอนุมัติ</h4>
                                
                            </div>    

                            <div class="card-body">
                                <div class="table-responsive">
                                <table id="example2" class="display table" style="width:100%">

                                        <thead class="thead-primary">
                                            <tr>
                                                <th>ประเภท</th>
                                                <th>รหัสรายการ</th>
                                                <th>ชื่อ</th>
                                                <th>ไซต์งาน</th>
                                                <th>รายละเอียด</th>
                                                <th>รูปภาพ</th>
                                                <th>อนุมัติ</th>
                                                <th>ไม่อนุมัติ</th>
                                                
                                                
                                            </tr>
                                        </thead>

                                        <form>
                                        <tbody>
                                        <?php 
                                             $select_material = $db->prepare("SELECT * FROM  order_status");
                                             $select_material->execute();

                                            while ($row = $select_material->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            
                                                <tr>
                                                    <td><?php  
                                                            if ($row["ors_type"] == '1'){
                                                            ?>
                                                            <span class="badge badge-dark">เบิกถอน</span>

                                                            <?php }if($row["ors_type"] == '2'){?>

                                                                <span class="badge badge-primary">จัดเก็บ</span>

                                                            <?php }if($row["ors_type"] == '3'){ ?>
                                                                <span class="badge badge-dark">สั่งซื้อ</span>
                                                            
                                                            <?php } ?></td>

                                                    <td><?php echo $row["ors_code"]; ?></td>
                                                    <td><?php echo $row["ors_user"]; ?></td>
                                                    <td><?php echo $row["ors_site"]; ?></td>
                                                    <td><?php echo $row["ors_detail"]; ?></td>
                                                    <td><?php echo $row["ors_img"]; ?></td>  
                                                    
                                                    <td><a href="appprov.php?apr_id<?php echo $row["ors_id"]; ?>" class="btn btn-outline-success">อนุมัติ</a></td>
                                                    <td><a href="dissapprov.php?apr_id<?php echo $row["ors_id"]; ?>" class="btn btn-outline-danger">ไม่อนุมัติ</a></td>                                            
                                                </tr>



                                             <?php } ?>
                                          
                                        </tbody>
                                        </form>
                                        
                                        <tfoot>
                                            <tr>
                                                <th>ประเภท</th>
                                                <th>รหัสรายการ</th>
                                                <th>ชื่อ</th>
                                                <th>ไซต์งาน</th>
                                                <th>รายละเอียด</th>
                                                <th>รูปภาพ</th>
                                                <th>อนุมัติ</th>
                                                <th>ไม่อนุมัติ</th>
                                                
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                            </div>
                            
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