<?php 
require_once("../library/function.php"); 
if (isset($_SESSION['type'])){
	$type = $_SESSION['type'];
	if($type == 'admin'){
		require_once("../template/header.php");
		require_once("../admin/admin-nav.php"); ?>
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<p class="lead">Paid Order</p>
					<style>
					.part{
						border: 1px solid black;
					}
				</style>
				<?php
				$sqlss="SELECT * FROM payment where verify='1' ";
				$sqlss = $db->query($sqlss);
				if($sqlss->num_rows>0){
					echo '<div class="product-top"> <h4>Order List</h4> <div class="clearfix"> </div> </div>';
					while($sql2ssx = $sqlss->fetch_assoc()){
						$sqlpr="SELECT * FROM cart where refkey={$sql2ssx['refkey']}";
						$sqlpr = $db->query($sqlpr);
					//var_dump($sql2ssx['refkey']);
						echo '<tr>
						<td data-th="Product">
						<div class="row part" >';
						while($cart = $sqlpr->fetch_assoc()){
							$cartpid=$cart['productid'];
							$tsql="SELECT * FROM product where id='$cartpid'";
							$tsql = $db->query($tsql);
							$tsql2 = $tsql->fetch_assoc();
							$yxsql="SELECT name FROM category where id={$tsql2['categoryid']}";
							$yxsql = $db->query($yxsql);
							$yxsql2 = $yxsql->fetch_assoc();
							$rxsql="SELECT name FROM subcategory where id={$tsql2['subcategoryid']}";
							$rxsql = $db->query($rxsql);
							$rxsql2 = $rxsql->fetch_assoc();
							$wxsql="SELECT name FROM sscategory where id={$tsql2['sscategoryid']}";
							$wxsql = $db->query($wxsql);
							$wxsql2 = $wxsql->fetch_assoc();
							$pslink=BASE_URL.'details'.'/'.$cartpid.'/'.url_slug($yxsql2['name']).'/'.url_slug($rxsql2['name']).'/'.url_slug($wxsql2['name']).'/'.url_slug($tsql2['title']); ?>
							<div class="col-sm-6" style="margin: 10px">
								<?php 
								$ptsql="SELECT picid,ext FROM productpic where productid='$cartpid' && picid=1 ";
								$ptsql = $db->query($ptsql);
								while($ptsql2 = $ptsql->fetch_assoc()){
									?>
									<div class="col-sm-4"><img src="<?php echo BASE_URL ;?>product/product<?php echo $cartpid; ?>-<?php echo $ptsql2['picid']; ?>_thumb.<?php echo $ptsql2['ext']; ?>" width="100" alt="..." class="img-responsive"/></div>
								<?php } ?>
								<div class="col-sm-8">
									<h4 class="nomargin"><a href="<?php echo $pslink ?>"><?php echo $tsql2['title'] ?></a></h4>
									<p> Color :
										<?php 
										$crxsql="SELECT id,name FROM color where id={$cart['colorid']}";
										$crxsql = $db->query($crxsql);
										$crxsql2 = $crxsql->fetch_assoc();
										echo ucfirst($crxsql2['name']);
										?>
									</p>

									<p>
										Quantity = <?php echo $cart['quantity'] ?>
									</p>
									<p>
										Price = <?php echo $cart['price'] ?>/-
									</p>
								</div>
							</div>
							<?php
						}

						echo '<div class="col-sm-6" style="margin-bottom: 10px">'; ?>
						<?php $cst="SELECT * FROM checkout where refkey={$sql2ssx['refkey']}";
						$cst = $db->query($cst);
						$customer = $cst->fetch_assoc();
						$sqlprt="SELECT * FROM cart where refkey={$sql2ssx['refkey']}";
						$sqlprt = $db->query($sqlprt);
						$sqlprt2 = $sqlprt->fetch_assoc();
    				//var_dump($sqlprt2);
					//echo $sqlprt['status'];
						if ($sqlprt2['status']==1) {
   				 	# code...
							?>
							Customer Name :<?php echo $customer['name']; ?><br>
							Customer Number :<?php echo $customer['no']; ?> <br>
							Customer Optionl No  :<?php echo $customer['no2']; ?><br>
							Customer Address  :<?php echo $customer['address']; ?><br>
							Customer Area :<?php 
							$sqlprts="SELECT * FROM area where id={$customer['areaid']}";
							$sqlprts = $db->query($sqlprts);
							$sqlprt2s = $sqlprts->fetch_assoc();
							echo $sqlprt2s['name']; 
							?> <br>
							Customer District :<?php 
							$sqlprtsx="SELECT * FROM district where id={$sqlprt2s['district_id']}";
							$sqlprtsx = $db->query($sqlprtsx);
							$sqlprt2sx = $sqlprtsx->fetch_assoc();
							echo $sqlprt2sx['name']; 
							?> <br>
							<form action="<?php echo VALIDATE_URL ?>" method="get">
								<input type="hidden" name="orddne" value="<?php echo $sql2ssx['refkey'] ?>">
								<input type="submit" name="" value="Delivery done">
							</form>
							<?php
						}
						echo '</div>';
						echo '</div></td></tr>';
					}	} ?>
				</div>
			</div>
		</div>

		<?php 			require_once("../admin/last-order.php");
		require_once("../template/footer.php"); 
	}
	else { 
		header("Location: ".BASE_URL); 
	}
}
else { 
	header("Location: ".BASE_URL); 
}

?>