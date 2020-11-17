<?php 
require_once("../library/function.php"); 

if (isset($_SESSION['type'])){
    $type = $_SESSION['type'];
    if($type == 'admin'){
       $posteid=$_GET['id'];
       $sqld="DELETE  FROM product WHERE id=$posteid";
       if ($db->query($sqld)) { 
        echo 'Product Deleted';
        }
    }
}
?>
