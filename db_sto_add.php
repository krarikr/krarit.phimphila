<?php
    
    include_once('connect_db.php');

    if (isset($_GET['pa_id'])) {
        $id = $_GET['pa_id'];
        print_r($id);

        $select_stmt = $db->prepare("SELECT * FROM material WHERE id = :id");
        $select_stmt->bindParam(':id', $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        
        $od_mname = $row["mat_name"];
        $od_mserail = $row["mat_serail"];
        $od_mtype = $row["type_id"];
        $od_mbrand = $row["mat_brand"];
        
        // Update status record from db
       $odl_stmt = $db->prepare("INSERT INTO order_list(od_mat_type_id, od_mat_serail, od_mat_brand, od_mat_name) 
                                VALUES (:od_mat_type_id_up, :od_mat_serail_up, :od_mat_brand_up, :od_mat_name_up)
                               ");
         
         $odl_stmt->bindParam(':od_mat_serail_up', $od_mserail);
         $odl_stmt->bindParam(':od_mat_type_id_up', $od_mtype);
         $odl_stmt->bindParam(':od_mat_brand_up', $od_mbrand);
         $odl_stmt->bindParam(':od_mat_name_up', $od_mname);

        $odl_stmt->execute();

     header('Location:user_stockout.php');

       
    }


?>