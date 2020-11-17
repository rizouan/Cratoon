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
<div class="col-md-8">
<div class="box">
                        

                        <p class="lead">Add Product</p>
                        

                        <hr>
                         <?php 
                        if(
  isset($_POST['catid'])
  && isset($_POST['name'])
  && isset($_POST['minimum'])
  && isset($_POST['price'])
  && isset($_POST['des'])


  && isset($_POST['dtime'])

  ) {

        if ($_POST['catid']=='' || $_POST['name']=='' ||  $_POST['minimum']=='' || $_POST['price']=='' || $_POST['des']=='' || $_POST['dtime']=='' ) {
               echo '<div class="alert alert-danger" role="alert">Enter Invalid</div>';
            }
else{



            $catid=$_POST['catid'];
            
            $name=MS($_POST['name']);
            $minimum=$_POST['minimum'];
            $price=$_POST['price'];            
            $details=MS($_POST['des']);
            $prodid=$_POST['prodid'];


            $delivery=$_POST['dtime'];

            $catfull = explode(',', $catid);
            $categoryid =  $catfull[0];
            $subcategoryid =  $catfull[1];
            $sscategoryid = $catfull[2];



      

    $sql="UPDATE product SET title='$name'    , pid='$prodid'     , delivery='$delivery', price='$price' , newprice='$price' , stock='0', minimum='$minimum' , categoryid='$categoryid'
 , subcategoryid='$subcategoryid' , sscategoryid='$sscategoryid' , details='$details'     WHERE id='$posteid'";



      if ($db->query($sql)) { 





 echo '<div class="alert alert-success" role="alert">Save Done</div>';

}




        
        
      

      

      //var_dump($sql);
    }
}

 $pssql="SELECT * FROM product where id='$posteid' limit 1";
      $pssql = $db->query($pssql);
      $oldpost = $pssql->fetch_assoc();


 ?>

                        <form  method="post" action="" enctype="multipart/form-data" accept-charset="utf-8">

                                        <div class="form-group">
                                            <label for="country">Choose Category</label>
                                            <select class="form-control" id="" name="catid">
                                              <?php 

                                    $nsql ="SELECT id,name FROM category order by name";
                                    $nsql = $db->query($nsql);
                                    while($nsql2 = $nsql->fetch_assoc()){
                                        $nnsql ="SELECT id,name FROM subcategory where categoryid={$nsql2['id']} order by name";
                                            $nnsql = $db->query($nnsql);
                                            while($nnsql2 = $nnsql->fetch_assoc()){

                                               $nnnsql ="SELECT id,name FROM sscategory where subcategoryid={$nnsql2['id']} order by name";
                                            $nnnsql = $db->query($nnnsql);
                                            while($nnnsql2 = $nnnsql->fetch_assoc()){
           echo '<option';
           if ($nnnsql2['id']==$oldpost['sscategoryid']) {
echo " selected ";
           }
           echo ' value="'.$nsql2['id'].','.$nnsql2['id'].','.$nnnsql2['id'].'">'.ucfirst($nsql2['name']).'-->'.ucfirst($nnsql2['name']).'-->'.ucfirst($nnnsql2['name']).'</option>';



                                            }

                                    }
                                  }
                                  ?>
                                              
                                            </select>
                                        </div>
                                        
                                        
                                    
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="email" name="name" value="<?php echo $oldpost['title'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="price">Productid</label>
                                <input type="text" class="form-control" id="price" value="<?php echo $oldpost['pid'] ?>" name="prodid">
                            </div>
                            <div class="form-group">
                                            <label for="unitid">Minimum Quantity</label>
                                            
                                      <input type="number" value="<?php echo $oldpost['minimum'] ?>" class="form-control" id="email" name="minimum">
                                        </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" value="<?php echo $oldpost['price'] ?>" class="form-control" id="price" name="price">
                            </div>

                            




                            <div class="form-group">
                                <label for="description">Description</label>
                                

                                <textarea class="form-control" name="des" >
                                  
                               <?php echo $oldpost['details'] ?>

                                </textarea>
                            </div>


                                        





                            <div class="form-group">
                                <label for="dtime">Delivery Days</label>
                                <input type="number" class="form-control" id="dtime" value="1" name="dtime">
                            </div>




                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Save</button>
                            </div>
                        </form>
                       
                    </div>
</div>

<div class="col-md-4">
  <div class="box">
    Product Name
<ol>

<?php
 $sql="SELECT id,title FROM product order by id desc";
      $sql = $db->query($sql);
      while($sql2 = $sql->fetch_assoc()){
        echo '<li><h5 class="name">'.ucfirst($sql2['title']).'<br></h5></li>'.'<a href="'.BASE_URL.'admin/product-edit.php?id='.$sql2['id'].'">Edit   <br></a>';
        echo '<a href="'.BASE_URL.'admin/product-delete.php?id='.$sql2['id'].'">  Delete</a>';
  
      }
?>

</ol>
  </div>

</div>

</div>






<script type="text/javascript" src="https://tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script type="text/javascript">

        tinymce.init({
            selector: "textarea",
            theme: "modern",
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            },
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            toolbar2: "print preview media | forecolor backcolor emoticons",
            image_advtab: false,
            templates: [
                {title: 'Test template 1', content: 'Test 1'},
                {title: 'Test template 2', content: 'Test 2'}
            ],
            image_title: false,
            convert_urls: false,
            content_css: ""
        });
    </script>
            







<?php 
require_once("../admin/last-order.php");
require_once("../template/footer.php"); 
}
else { header("Location: ".BASE_URL); } } else{ header("Location: ".BASE_URL); }

?>