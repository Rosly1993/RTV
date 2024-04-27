<?php 
// Include the database config file  
include_once './db/connect.php'; 
 
if(!empty($_POST["id"])){ 
    // Fetch Process data based on the specific Assy 
    $query = "SELECT * FROM tbl_model WHERE model = ".$_POST['model']." "; 
    $result = $conn->query($query); 
     
    // Generate HTML of Process options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select Process</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['mold_number'].'">'.$row['mold_number'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Process not available</option>'; 
    } 
}elseif(!empty($_POST["process_id"])){ 
    // Fetch Item Name data based on the specific state 
    $query = "SELECT * FROM item_name WHERE process_id = ".$_POST['process_id']."  "; 
    $result = $conn->query($query); 
     
    // Generate HTML of Item Name options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select Item Name</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['item_id'].'">'.$row['item_name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Item Name not available</option>'; 
    } 
} 
?>