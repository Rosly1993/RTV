<?php 
// Include the database config file  
include_once '../db/connect.php'; 
 
if(!empty($_POST["model_id"])){ 
    // Fetch Process data based on the specific Assy 
    $query = "SELECT * FROM tbl_item_code WHERE model_id = ".$_POST['model_id']." "; 
    $result = $conn->query($query); 
     
    // Generate HTML of Process options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select Item Code</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['item_code'].'">'.$row['item_code'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Code Not Available Please Update Item Code</option>'; 
    } 
}elseif(!empty($_POST["model_id"])){ 
    // Fetch Item Name data based on the specific state 
    $query = "SELECT * FROM tbl_item_code WHERE model_id = ".$_POST['model_id']." "; 
    $result = $conn->query($query); 
     
    // Generate HTML of Item Name options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select Item Name</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['letter_code'].'">'.$row['letter_code'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Item Name not available</option>'; 
    } 
} 
?>