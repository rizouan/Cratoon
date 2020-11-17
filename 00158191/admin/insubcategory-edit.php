<?php 
require_once("../library/function.php"); 

if (isset($_SESSION['type'])){
    $type = $_SESSION['type'];
            if($type == 'admin'){

            	$posteid=$_GET['id'];


require_once("../template/header.php");
if (isset($_SESSION['message'])){$msg = $_SESSION['message'];    if($msg != NULL){ echo '<div class="col-md-12"><ul class="breadcrumb"><center>'.$msg.'</center></ul></div>'; unset($_SESSION['message']); } }
require_once("../admin/admin-nav.php"); ?>




<div class="row">
<div class="col-md-6">
<div class="box">
                        

                        <p class="lead">Edit SubsubCategory</p>
                        

                        <hr>
                         <?php 
                        if(isset($_POST['name'])) {if ($_POST['name']=='') {
        echo '<div class="alert alert-danger" role="alert">Enter Invalid</div>';
    }
    else{
						$name=MS($_POST['name']);
						$name=strtolower($name);


						   $sql="UPDATE sscategory SET name='$name'       WHERE id='$posteid'";



      if ($db->query($sql)) { 



				echo '<div class="alert alert-success" role="alert">Save Done</div>';
			
			//var_dump($sql);
		}

	}}


		 $pssql="SELECT * FROM sscategory where id='$posteid' limit 1";
      $pssql = $db->query($pssql);
      $oldpost = $pssql->fetch_assoc();


 ?>

                        <form  method="post" action="">
                            <div class="form-group">
                                <label for="email">Name</label>
                                <input type="text" class="form-control" id="email" name="name" value="<?php echo $oldpost['name'] ?>">
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Save</button>
                            </div>
                        </form>
                       
                    </div>
</div>

<div class="col-md-6">
	<div class="box">
			Subsubcatgory--> Subcategory --> Category 
<ol>




	<?php
   $xsql="SELECT id,name,subcategoryid FROM sscategory";
      $xsql = $db->query($xsql);
      while($xsql2 = $xsql->fetch_assoc()){

 $sql="SELECT name,categoryid FROM subcategory where id={$xsql2['subcategoryid']}";
      $sql = $db->query($sql);
      while($sql2 = $sql->fetch_assoc()){

        $sql4="SELECT id,name FROM category where id={$sql2['categoryid']}";
        $sql4 = $db->query($sql4);
        $sql5 = $sql4->fetch_assoc();

      	echo '<li><h5 class="name">'.ucfirst($xsql2['name']).'-->'.ucfirst($sql2['name']).'-->'.ucfirst($sql5['name']).'<br></h5></li>'.'<a href="'.BASE_URL.'admin/insubcategory-edit.php?id='.$xsql2['id'].'">Edit   <br></a>';
      }

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