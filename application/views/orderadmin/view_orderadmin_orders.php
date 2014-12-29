<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../assets/ico/favicon.ico">

    <title><?php echo $page_title ?></title>

    <!-- Bootstrap core CSS -->

    <!-- css-->
    <?php include 'includes/view_css.php'; ?>

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/dashboard.css');?>" rel="stylesheet">

  </head>

  <body>

    <?php include 'includes/view_orderadmin_navbar.php'; ?>
  
    <?php include 'includes/view_orderadmin_sidebar.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <!-- ORDERS  -->
          

			<div class="panel-body" style="background-color: #fff; padding-top: 10px; padding-bottom: 10px; padding-left: 30px">
                <div class='row'><h5> Color Legends:</h5></div>
                <div class='row'>
                    <div class="col-md-3">
                        <div class='col-md-3' style='background-color: #fcf8e3; height: 20px'></div>
                        <div class='col-md-9'> Approved Orders</div>
                    </div>
                    <div class="col-md-3">
                        <div class='col-md-3' style='background-color: #dff0d8; height: 20px'></div>
                        <div class='col-md-9'> Waiting Confirmation</div>
                    </div>
                    <div class="col-md-3">
                        <div class='col-md-3' style='background-color: #f2dede; height: 20px'></div>
                        <div class='col-md-9'> Closed Orders</div>
                    </div>
                    <div class="col-md-3">
                        <div class='col-md-3' style='background-color: whitesmoke; height: 20px;'></div>
                        <div class='col-md-9'> Delivered Orders</div>
                    </div>
                    
                </div>

                <hr>

                <div class='row'>
                    <div class="col-md-2">Filter Result:</div>
                    <div class="col-md-4"> 
                    <select name="status"  class="form-control">
                        <option value="">View All</option>
                        <option value="0">Approved Orders</option>    
                        <option value="1">Waiting Confirmation</option>
                        <option value="2">Closed Orders</option>
                        <option value="2">Delivered Orders</option>
                    </select>
                    </div>

                    <div class="col-md-2">Sort:</div>
                    <div class="col-md-4"> 
                    <select name="status"  class="form-control">
                        <option value="">View All</option>
                        <option value="0">Approved Orders</option>    
                        <option value="1">Waiting Confirmation</option>
                        <option value="2">Closed Orders</option>
                        <option value="2">Delivered Orders</option>
                    </select>
                    </div>
                </div>
            </div>
            
            <hr>


            <div class="panel panel-default">
                <div class="panel-heading"  style="background-color: white">Orders</div>
                	<div class="panel-body"  style=" margin-bottom: -20px;">
                    	<table class="table" cellpadding="5" align="center">
                    		<tr>
                                <th>Order #</th>
                                <th>Payment Method</th>
                                <th>Checkout Date</th>
                                <th>Deposit Slip</th>
                                <th>Total</th>
                            </tr>

                            <?php
                                if(!empty($orders)){
                                    foreach($orders as $p):
                                        if($p->order_status == 'Pending Approval'){
                                            $bgcolor = '#dff0d8';
                                            $color = '#468847';
                                        }else if($p->order_status == 'Order Approved'){
                                            $bgcolor = '#fcf8e3';
                                            $color = '#c09853';
                                        }else if($p->order_status == 'Order Closed'){
                                            $bgcolor = '#f2dede';
                                            $color = '#b94a48';
                                        }else if($p->order_status == 'Order Delivered'){
                                            $bgcolor = 'whitesmoke';
                                            $color = 'gray';
                                        }?>

                                        <tr style="background-color:<?echo $bgcolor?> ; color:<?echo $color?>">
                                            <td><a href="<?echo site_url('orderadmin/view_order/'.$p->order_id)?>"><?echo $p->order_id?></a></td>
                                            <td><?echo $p->payment_title?></td>
                                            <td><?echo date('d M Y h.i.s A', strtotime($p->order_date_checkout))?></td>
                                            <td>
                                                <?if($p->confirm_order_number != ""){
                                                    echo "Deposit sent";
                                                }else{
                                                    if($p->payment_title != "Cash On Delivery"){
                                                        echo "None";
                                                    }else{
                                                        echo "N/A";
                                                    }
                                                }
                                                ?>

                                            </td>
                                            <td>PHP <?php echo number_format($p->order_total, 2)?></td>
                                        </tr>

                                    <?
                                    endforeach;
                                }else{?>
                                    <tr>
                                        <td colspan=7>
                                            <center><font style="color:red">There are no orders available</font></center>
                                        </td>
                                    </tr>
                                <?
                                }
                            ?>
                                          
                        </table>
                    </div>
                </div>
                
               
        <!-- END OF ORDERS  -->
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
