<?php 
require_once("../library/function.php"); 

if (isset($_SESSION['type'])){
  $type = $_SESSION['type'];
  if($type == 'admin'){
    require_once("../template/header.php");
    if (isset($_SESSION['message'])){$msg = $_SESSION['message'];    if($msg != NULL){ echo '<div class="col-md-12"><ul class="breadcrumb"><center>'.$msg.'</center></ul></div>'; unset($_SESSION['message']); } }
    require_once("../admin/admin-nav.php"); ?>




    <div class="row">
      <div class="col-md-8">
        <div class="box">


          <p class="lead">Add Product</p>


          <hr>
          <?php 
          if(  isset($_POST['catid'])  && isset($_POST['name'])  && isset($_POST['minimum'])  && isset($_POST['price'])  && isset($_POST['des'])  && isset($_POST['dtime'])  ) {

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
            $picd=get_ext($_FILES['pics']['name'][0]);

            $tagQuery=$db->query("SELECT id FROM product WHERE title='$name'");
            if($tagQuery->num_rows<1){
             $sql="INSERT INTO product (title,pid,delivery,pic,price,newprice,stock,minimum,categoryid,subcategoryid,sscategoryid,details,time) 
             VALUES ('$name','$prodid','$delivery','$picd','$price','$price','0','$minimum','$categoryid','$subcategoryid','$sscategoryid','$details',".time().")";
//var_dump($sql);

             if ($db->query($sql)) { 
              $post_id=$db->insert_id;



              echo '<div class="alert alert-success" role="alert">Save Done</div>';

            }








            foreach ($_FILES['pics']['name'] as $i=>$name) {
              $pic_ext=get_ext($name);
              $sql3="INSERT INTO productpic (productid,picid,ext) VALUES ($post_id,$i+1,'$pic_ext')";
              $db->query($sql3);
              $pic_id=$db->insert_id;
              $dir='../product/product'.$post_id.'-'.($i+1);
              $source=$_FILES['pics']['tmp_name'][$i];
              move_uploaded_file($source, $dir.'.'.$pic_ext);
              $source=$dir.'.'.$pic_ext;
              list($width, $height) = getimagesize($source);
              $max_width=($width>1000) ? 1000 : $width;
      ///upload img
              $new_img=$dir.'_resize.'.$pic_ext;
              $new_thumb=$dir.'_thumb.'.$pic_ext;
              upload_image('resize',$source, $new_img, $max_width, 0);
              upload_image('crop', $source, $new_thumb, 250,300,50);
              @unlink($source);
            }

          }
   
        }
}
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
                   echo '<option value="'.$nsql2['id'].','.$nnsql2['id'].','.$nnnsql2['id'].'">'.ucfirst($nsql2['name']).'-->'.ucfirst($nnsql2['name']).'-->'.ucfirst($nnnsql2['name']).'</option>';



                 }

               }
             }
             ?>

           </select>
         </div>



         <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="email" name="name">
        </div>
        <div class="form-group">
          <label for="price">Productid</label>
          <input type="text" class="form-control" id="price" name="prodid">
        </div>
        <div class="form-group">
          <label for="unitid">Minimum Quantity</label>

          <input type="number" class="form-control" id="email" name="minimum">
        </div>

        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" class="form-control" id="price" name="price">
        </div>


        <div class="form-group">


        </div>



        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" name="des" >
          </textarea>
        </div>
        <div class="form-group">
          <label for="dtime">Delivery Days</label>
          <input type="number" class="form-control" id="dtime" value="1" name="dtime">
        </div>

        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="pics[]" multiple="multiple" class="form-control">
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





<!--textarea-->
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