<?php 

    include ('connect_db.php');

    session_start();

    if (isset($_POST['btn_login'])) {
        $username = $_POST['txt_username']; // textbox name 
        $password = $_POST['txt_password']; // password
        $role = $_POST['txt_role']; // select option role
  
        if (empty($username)) {
            $errorMsg[] = "กรุณาใส่ ไอดี";
        } else if (empty($password)) {
            $errorMsg[] = "กรุณาใส่ รหัสผ่าน";
        } else if (empty($role)) {
            $errorMsg[] = "กรุณา เลือกประเภทผู้ใช้งาน";
        } else if ($username AND $password AND $role) {
            try {
                $select_stmt = $db->prepare("SELECT * FROM user_ptk WHERE user_name = :uemail AND user_password = :upassword AND user_role = :urole");
                $select_stmt->bindParam(":uemail", $username);
                $select_stmt->bindParam(":upassword", $password);
                $select_stmt->bindParam(":urole", $role);
                $select_stmt->execute(); 

                while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                    $dbuser = $row['user_name'];
                    $dbpassword = $row['user_password'];
                    $dbrole = $row['user_role'];
                    $dfull = $row['user_fullname'];
                }
                if ($username != null AND $password != null AND $role != null) {
                    if ($select_stmt->rowCount() > 0) {
                        if ($username == $dbuser AND $password == $dbpassword AND $role == $dbrole) {
                            switch($dbrole) {
                                case 'admin':
                                    $_SESSION['admin_login'] = $dfull;
                                    
                                    header("location: admin_pro.php");
                                break;
                                case 'user':
                                    $_SESSION['user_login'] = $dfull;
                                   
                                    header("location: user_profile.php");
                                break;
                                default:
                                    $_SESSION['error'] = "แจ้งเตือน";
                                    header("location: index.php");
                            }
                        }
                    } else {
                        $_SESSION['error'] = "แจ้งเตือน";
                        header("location:index.php");
                    }
                }
            } catch(PDOException $e) {
                $e->getMessage();
            }
        }
    }

?>