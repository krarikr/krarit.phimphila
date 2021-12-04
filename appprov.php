<?php 
       include('connect_db.php');

       if (isset($_REQUEST['apr_id'])) {
           $id = $_REQUEST['apr_id'];
   
           $select_stmt = $db->prepare("SELECT * FROM order_status WHERE ors_id = :id");
           $select_stmt->bindParam(':id', $id);
           $select_stmt->execute();
           $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
   
           // Update status record from db
           $site_end = $db->prepare("UPDATE order_status SET orf_conf = :stat WHERE ors_id = :id ");
           $site_end->bindParam(':id', $id);
           $site_end->bindParam(':stat', $site_stat);
           $site_stat = "1";
           $site_end->execute();
   
           header('Location:admin_comelist.php');
       }
    ?>