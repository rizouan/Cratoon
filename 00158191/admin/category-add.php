<?php 
require_once("../library/function.php"); 

if (isset($_SESSION['type'])){
    $type = $_SESSION['type'];
    if($type == 'admin'){
        require_once("../template/header.php");
        if (isset($_SESSION['message'])){$msg = $_SESSION['message'];    if($msg != NULL){ echo '<div class="col-md-12"><ul class="breadcrumb"><center>'.$msg.'</center></ul></div>'; unset($_SESSION['message']); } }
        require_once("../admin/admin-nav.php"); ?>

        <?php 
        if(isset($_POST['name'])) {
            if ($_POST['name']=='') {
                echo '<div class="alert alert-danger" role="alert">Enter Invalid</div>';
            }
            else{
                $name=MS($_POST['name']);
                $name=strtolower($name);
                $tagQuery=$db->query("SELECT id FROM category WHERE name='$name'");
                if($tagQuery->num_rows<1){
                    $sql="INSERT INTO category (name) VALUES ('$name')";
                    if ($db->query($sql)) { 
                        echo '<div class="alert alert-success" role="alert">Save Done</div>';
                    }
                } 
            }
        }

        ?>


        <div class="row">
            <div class="col-md-6"> 
                <div class="panel panel-default">
                  <!-- Default panel contents -->
                    <div class="panel-heading">Add Category</div>
                    <div class="panel-body">
                        <form  method="post" action="">
                            <div class="form-group">
                                <label for="email">Name</label>
                                <input type="text" class="form-control" id="email" name="name">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box">
                Category List
                <ol>
                <?php
                $sql="SELECT id,name FROM category order by name asc";
                $sql = $db->query($sql);
                while($sql2 = $sql->fetch_assoc()){
                    echo '<li><h5 class="name">'.ucfirst($sql2['name']).'<br></h5></li>'.'<a href="'.BASE_URL.'admin/category-edit.php?id='.$sql2['id'].'">Edit   <br></a>';
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