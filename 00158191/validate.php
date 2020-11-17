<?php

require_once 'library/function.php';



if(isset($_POST['user_login']) && isset($_POST['email']) && isset($_POST['pass'])) {
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$chk = "SELECT id,email,pass FROM customer where email='$email'";
	$chk= $db->query($chk);
	$chk= $chk->fetch_assoc();
	if (($chk['email']==$email) && ($chk['pass']==$pass) ) {
		$_SESSION['proid']=$chk['id'];
		$_SESSION['type']=2;
		$_SESSION['user_alert']= '<blockquote>Login Succesful  </blockquote>';
		if (isset($_POST['redirect_page'])) {
			$redirect_link=$_POST['redirect_page'];
			header("Location: ".BASE_URL.$redirect_link);
		}
		else{
			header("Location: ".BASE_URL);
		}
	}
	else{
		$_SESSION['user_alert']='<blockquote>Wrong Information  </blockquote>';
		header("Location: ".BASE_URL.'login.php');
	}
}


if(isset($_POST['admin-login']) && isset($_POST['uname']) && isset($_POST['psw'])) {
	$uname=MS($_POST['uname']);
	$psw=$_POST['psw'];
	$chk = "SELECT username,pass FROM admin";
	$chk= $db->query($chk);
	$chk= $chk->fetch_assoc();   
	if (($chk['username']==$uname) && ($chk['pass']==$psw) ) {
		$_SESSION["message"] = "Admin Login Succesfully";
		$_SESSION["type"] = "admin";
		header("Location: ".BASE_URL.'admin-dashboard');
	}
	else{
		$_SESSION['admin_alert']='<blockquote>Wrong Information  </blockquote>';
		header("Location: ".BASE_URL.'admin');
	}
}



if(isset($_POST['clr']) && isset($_POST['stk']) && isset($_POST['add_to_cart'])) {
	$redirectlink=$_POST['postlink'];
	$postid=$_POST['postid'];
	$color=$_POST['clr'];
	$stock=$_POST['stk'];
	$toprice=$_POST['price']*$stock;
	$tagQuery=$db->query("SELECT stock,colorid FROM productcolorstock WHERE colorid='$color'  && productid='$postid'");
	if($tagQuery->num_rows>0){
		$sqlxx = $tagQuery->fetch_assoc();
		if ($color<=$sqlxx['colorid'] && $stock<=$sqlxx['stock'] ) {
			$tagQuery1=$db->query("SELECT id FROM cart WHERE deviceid='$deviceid'  && productid='$postid' && colorid='$color' && porder=1");
			$sqlxp = $tagQuery1->fetch_assoc();
			if($tagQuery1->num_rows<1){
				$sql33="INSERT INTO cart (deviceid,productid,colorid,quantity,price) VALUES ('$deviceid','$postid','$color','$stock','$toprice')";
				if ($db->query($sql33)) { 
					$_SESSION['cart_alert']='<p style="color:green;font-size: initial;border: 1px green dotted;text-align: center;margin: 5px 0;">Add To Cart Succesfully</p>';
					header("Location: ".$redirectlink);

				}
			}
			else{
				$sqlxxf="UPDATE cart SET quantity='$stock',price='$toprice' WHERE id={$sqlxp['id']} && porder=1";
				if ($db->query($sqlxxf)) { 
					$_SESSION['cart_alert']='<p style="color:green;font-size: initial;border: 1px green dotted;text-align: center;margin: 5px 0;">Update Cart Succesfully</p>';
					header("Location: ".$redirectlink);


				}
			}
		}
		else{
			$_SESSION['cart_alert']=' <p style="color:red;font-size: initial;border: 1px red dotted;text-align: center;margin: 5px 0;">Wrong Information</p>';
			header("Location: ".$redirectlink);
		}
	}
}




if(isset($_POST['cart-edit']) && isset($_POST['edit'])	&& isset($_POST['quantity'])) {
	$id=$_POST['edit'];
	$quantity=$_POST['quantity'];
	$price=$_POST['price']*$quantity;
	$sqle="UPDATE cart SET quantity='$quantity',price='$price' WHERE id='$id'";
	if ($db->query($sqle)) { 
		header("Location: ".BASE_URL.'cart.php'); 
	}
}

if(isset($_POST['cart-delete']) && isset($_POST['delete'])) {
	$id=$_POST['delete'];
	$sqld="DELETE  FROM cart WHERE id=$id";
	if ($db->query($sqld)) { 
		header("Location: ".BASE_URL.'cart.php'); 
	}
}




if(isset($_POST['checkout'])) {
	if ($_POST['checkout']=='' || $_POST['name']=='' ||  $_POST['address']=='' || $_POST['areaid']=='' || $_POST['no']=='' ) {
		header("Location: ".BASE_URL.'checkout.php');
	}
	else{

		$id=$_SESSION['proid'];
		$no2="";
		$name=MS($_POST['name']);
		$no=MS($_POST['no']);
		$no2=MS($_POST['no2']);
		$areaid=MS($_POST['areaid']);
		$address=MS($_POST['address']);
		$refkey=rand(1111,9999);
		$sql="INSERT INTO checkout (userid,name,no,no2,areaid,address,refkey) VALUES ('$id','$name','$no','$no2','$areaid','$address','$refkey')";
		if ($db->query($sql)) { 
			$casql="SELECT * FROM cart where deviceid='$deviceid' && porder='1'";
			$casql = $db->query($casql);
			while($cart = $casql->fetch_assoc()){
				$sql="UPDATE cart SET refkey='$refkey' WHERE id={$cart['id']}";
				if ($db->query($sql)) { 
					header("Location: ".BASE_URL.'payment.php');
				}
			}
		}
	}
}



if(isset($_POST['payment']) && isset($_POST['bkash']) && isset($_POST['trxid'])) {
	$id=$_SESSION['proid'];
	var_dump($_POST);

	$bkash=MS($_POST['bkash']);
	$trx=MS($_POST['trxid']);
	$refkey=$_POST['refkey'];
	$totalprice=$_POST['totalprice'];
	$sql="INSERT INTO payment (userid,bkash,trxid,price,refkey,verify) VALUES ('$id','$bkash','$trx','$totalprice','$refkey','2')";
	if ($db->query($sql)) { 
		$casql="SELECT * FROM cart where deviceid='$deviceid' && porder='1'";
		$casql = $db->query($casql);
		while($cart = $casql->fetch_assoc()){
			$sql="UPDATE cart SET porder='2' WHERE id={$cart['id']} && porder='1'";
			if ($db->query($sql)) { 
				header("Location: ".BASE_URL.'thanks.php');
			}
		}
	}
}







if(	isset($_GET['orddne'])) {
	$refkey=$_GET['orddne'];
	$sql="SELECT * FROM cart where refkey=$refkey && status=1";
	$sql = $db->query($sql);
	while($cart = $sql->fetch_assoc()){
		$sql33="UPDATE cart SET status=2 WHERE refkey='$refkey'";
		if ($db->query($sql33)) { 
			echo '';
		}
		$sql2="SELECT * FROM productcolorstock where productid={$cart['productid']} && colorid={$cart['colorid']} ";
		$sql2 = $db->query($sql2);
		while($pcs = $sql2->fetch_assoc()){
			$newstock = $pcs['stock'] - $cart['quantity'];
			$pcsu="UPDATE productcolorstock SET stock='$newstock' WHERE productid={$cart['productid']} && colorid={$cart['colorid']}";
			$xxx= $db->query($pcsu);

			$sql23="SELECT tsell FROM product where id={$cart['productid']}";
			$sql23 = $db->query($sql23);
			$prod = $sql23->fetch_assoc();
			$totalsell = $cart['quantity'] + $prod['tsell'];


			$tsellu="UPDATE product SET tsell='$totalsell' WHERE id={$cart['productid']}";
			if ($db->query($tsellu)) { 
				header("Location: ".BASE_URL.'admin/success-paid.php'); 
			}
		}
	}
}

?>