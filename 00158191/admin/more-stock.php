<?php 
require_once("../library/function.php"); 

if (isset($_SESSION['type'])){
    $type = $_SESSION['type'];
            if($type == 'admin'){
require_once("../template/header.php");
if (isset($_SESSION['message'])){$msg = $_SESSION['message'];    if($msg != NULL){ echo '<div class="col-md-12"><ul class="breadcrumb"><center>'.$msg.'</center></ul></div>'; unset($_SESSION['message']); } }
require_once("../admin/admin-nav.php"); ?>




<div class="row">
<div class="col-md-6">
<div class="box">
                        

                        <p class="lead">Add Subsategory</p>
                        

                        <hr>
                         <?php 
                        if(isset($_POST['pid'])) {

            $pid=$_POST['pid'];

            $catfull = explode(',', $pid);
            $pid =  $catfull[0];
            $stock =  $_POST['stock']+$catfull[1];

    $sql="UPDATE productcolorstock SET stock='$stock' WHERE id='$pid'";

 
      if ($db->query($sql)) { 
        echo '<div class="alert alert-success" role="alert">Save Done</div>';
      }







      //var_dump($sql);
    }

 ?>

                        <form  method="post" action="">

                                        <div class="form-group">
                                            <label for="country">Product name</label>
                                            <select class="form-control" id="" name="pid">


                                                  <?php
 $sql="SELECT id,productid,stock,colorid FROM productcolorstock";
      $sql = $db->query($sql);
      while($sql2 = $sql->fetch_assoc()){

        $sql4="SELECT name FROM color where id={$sql2['colorid']}";
        $sql4 = $db->query($sql4);
        $sql5 = $sql4->fetch_assoc();

        $sssql4="SELECT title FROM product where id={$sql2['productid']}";
        $sssql4 = $db->query($sssql4);
        $sssql5 = $sssql4->fetch_assoc();


        echo '<option value="'.$sql2['id'].','.$sql2['stock'].'">'.ucfirst($sssql5['title']).'-->'.ucfirst($sql5['name']).'-->'.ucfirst($sql2['stock']).'</option>';
      }
?>


                                             
                                              
                                            </select>
                                        </div>


                                    
                            <div class="form-group">
                                <label for="email">New Stock</label>

                                <input type="number" class="form-control" id="email" name="stock">
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Save</button>
                            </div>
                        </form>
                       
                    </div>
</div>

<div class="col-md-6">
  <div class="box">
    Product->color->stock
<ol>

    <?php
 $sql="SELECT productid,stock,colorid FROM productcolorstock";
      $sql = $db->query($sql);
      while($sql2 = $sql->fetch_assoc()){

        $sql4="SELECT name FROM color where id={$sql2['colorid']}";
        $sql4 = $db->query($sql4);
        $sql5 = $sql4->fetch_assoc();

        $sssql4="SELECT title FROM product where id={$sql2['productid']}";
        $sssql4 = $db->query($sssql4);
        $sssql5 = $sssql4->fetch_assoc();

        echo '<li><h5 class="name">'.ucfirst($sssql5['title']).'-->'.ucfirst($sql5['name']).'-->'.ucfirst($sql2['stock']).'<br></h5></li>';
      }
?>

</ol>
  </div>

</div>

</div>







            







<?php 
require_once("../admin/last-order.php");
require_once("../template/footer.php"); 
}
else { header("Location: ".BASE_URL); } } else{ header("Location: ".BASE_URL); }

?>