</div>

<div class="col-md-12" style="margin-top: 50px">
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Last Payment</div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <th>Bkash Number</th>
                    <th>Price</th>
                    <th>TRXID</th>
                    <th>Refernce</th>
                    <th>Action</th>
                </tr>
                <?php 
                if(isset($_POST['payid'])) {
                    $pid=$_POST['payid'];
                    $refkey=$_POST['refkey'];
                   $sql="UPDATE payment SET verify='1'  WHERE id='$pid'";
                    $xx=$db->query($sql);


                    $sql2="SELECT id FROM cart WHERE refkey = '$refkey'";

                    //var_dump($sql2);

                    $sql2= $db->query($sql2);
                    while($cartup = $sql2->fetch_assoc()){


                        $cartupid=$cartup['id'];
                    $updatecart="UPDATE cart SET status='1'  WHERE id='$cartupid'";
                    $yy=$db->query($updatecart);
                    echo "Update Done";

}
                }





                $ptsql="SELECT * FROM payment where verify='2' order by id desc ";
                $ptsql = $db->query($ptsql);
                while($ptsql2 = $ptsql->fetch_assoc()){ ?>
                    <tr>
                        <td>
                            <?php echo $ptsql2['bkash']; ?>
                        </td>
                        <td>
                            <?php echo $ptsql2['price']; ?>
                        </td>
                        <td>
                            <?php echo $ptsql2['trxid']; ?>
                        </td>
                        <td>
                            <?php echo $ptsql2['refkey']; ?>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="payid" value="<?php echo $ptsql2['id']; ?>">

                                <input type="hidden" name="refkey" value="<?php echo $ptsql2['refkey']; ?>">

                                <input type="submit" name="" value="confirm payment">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
</div>
</div>