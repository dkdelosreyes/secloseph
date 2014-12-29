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
          


            <div class="panel panel-default">
                <div class="panel-body" >
                    Order #<?echo $order_id?>

                    

                    <div class="row" style="padding: 30px;">
                        <div class="col-md-4">
                            Customer: <br>
                            <?
                                if(!empty($customer_info)){
                                    foreach($customer_info as $p):
                                        echo $p->cust_fname.' '.$p->cust_lname.br();
                                        echo $p->cust_email.br();
                                        echo $p->cust_gender.br();
                                        echo "Member since ".date('M d, Y', strtotime($p->cust_date_created)).br();
                                    endforeach;
                                }
                            ?>    
                        </div>

                        <?php
                            if(!empty($orders)){
                                foreach($orders as $p):?>
                                    <div class="col-md-4">
                                        Shipping Address: <br>
                                        <?
                                            echo $p->order_ship_to.br();
                                            echo $p->order_ship_contact.br();
                                            echo $p->order_ship_address_number.br();
                                            echo $p->order_ship_address_baranggay.', '.$p->order_ship_address_municipal.', '.$p->order_ship_address_province.br();
                                            echo $p->order_ship_message.br();
                                        ?>
                                    </div>
                                    <div class="col-md-4">
                                        Billing Address: <br>
                                        <?
                                            echo $p->order_bill_to.br();
                                            echo $p->order_bill_contact.br();
                                            echo $p->order_bill_address_number.br();
                                            echo $p->order_bill_address_baranggay.', '.$p->order_bill_address_municipal.', '.$p->order_bill_address_province.br();
                                            echo $p->order_bill_message.br();
                                        ?>
                                    </div>
                                    
                                <?endforeach;
                            }?>

                            


                            <div class="row">
                                <div class="col-md-6">
                                    Payment Method: <br>
                                        <?
                                            echo $p->payment_title.br(2);
                                        ?>
                                </div>
                                <div class="col-md-6">
                                    Order Status: <br>
                                        <span id="orderStatus"><?echo $p->order_status?></span>
                                </div>
                            </div>



                            <?php
                            if(!empty($confirmed_payments)){
                                foreach($confirmed_payments as $p):?>
                                    <div class="row">
                                        Payment Confirmation <br>
                                        <?
                                            echo "Bank - ".$p->confirm_bank.br();
                                            echo "Branch - ".$p->confirm_branch.br();
                                            echo "Name - ".$p->confirm_name.br();
                                            echo "Amount - ".$p->confirm_amount.br();
                                            echo "Date - ".$p->confirm_date.br();
                                            echo "Message - ".$p->confirm_message.br();
                                            echo "Deposit Slip - ".$p->confirm_deposit_slip.br();

                                        ?>
                                    </div>
                                    <br><br>
                                    
                                <?endforeach;
                            }else{
                                echo "Payment not yet confirmed".br(2);
                            }
                            ?>

                            <div id="orderForm">
                                <?php include 'view_orderadmin_each_order_form.php'; ?>
                            </div>


                            <!-- <form id="formOrderDetails" action="<?php echo base_url('orderadmin/approve_order')?>" method="post">
                            
                            <input type="hidden" id="orderId" name="orderId" value="<?php echo $order_id?>">
                            
                            <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Price</th>
                                    <th>Stocks Left</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count = 0;
                                    if(!empty($orders_details)){
                                        foreach($orders_details as $p):?>
                                            <input type="hidden" name="product[<?php echo $count?>]" id="product[<?php echo $count++?>]" value="<?echo $p->or_det_id?>">
                                            
                                            <tr>
                                            <td><img src="<?php echo base_url('assets/products').'/'.$p->color_photo_url?>" style="width:100px"></td>
                                            <td>
                                                Name: <?echo $p->prod_name.br(1)?>
                                                Quantity: <?echo $p->or_det_quantity.br(1)?>
                                                Size: <?echo $p->or_det_size.br(1)?>
                                            </td>
                                            <td>Order verification in progress</td>
                                            <td><?echo $p->or_det_price.br(3)?></td>
                                            <td><?echo $p->item_stock?></td>
                                            </tr>
                                            <?
                                            endforeach;
                                        }

                                ?>
                                </tbody>
                            </table>

                            
                            
                            <?php
                                if(!empty($orders)){
                                    foreach($orders as $p):?>
                                        Total: <?echo $p->order_total.br(3)?>
                                    <? endforeach;
                                }

                                $approve_btn_state = $p->order_status == 'Order Approved' || $p->order_status == 'Order Closed' || $p->order_status == 'Order Delivered' ? 'disabled' : '';
                                $reject_btn_state = $p->order_status == 'Order Approved' || $p->order_status == 'Order Closed' || $p->order_status == 'Order Delivered' ? 'disabled' : '';
                                $delivered_btn_state = $p->order_status == 'Order Closed' || $p->order_status == 'Order Delivered' ? 'disabled' : '';

                            ?>

                            
                            <input type="submit" class="btn btn-danger btn-lg" id="btnApproveOrder" data-loading-text="Processing..." value="Approve" style="width:120px" <?php echo $approve_btn_state?>>
                            <input type="reset" class="btn btn-danger btn-lg" id="btnRejectOrder" data-loading-text="Processing..." value="Reject" style="width:120px" <?php echo $reject_btn_state?>>
                            <input type="button" class="btn btn-danger btn-lg" id="btnDeliveredOrder" data-loading-text="Processing..." value="Delivered" style="width:120px" <?php echo $delivered_btn_state?>>
                            
                            </form>  -->

                             

                                              
                    </div>
                </div>
            </div>
                
               
        <!-- END OF ORDERS  -->
        </div>
      </div>
    </div>


<!-- SCRIPTS SECTION ======================================================================================================= -->
        
    <!-- scripts-->
    <?php include 'includes/view_scripts.php'; ?>
    

    <script type="text/javascript">
    $(document).ready(function(){
        var base_url = "<?php echo base_url()?>";

        $('#formOrderDetails').submit(function(){
        $.post($('#formOrderDetails').attr('action'), $('#formOrderDetails').serialize(), function( data ) {
            if(data.err == 0){
                 console.log("failed");
            }
                
            if(data.err == 1){
                $("#orderStatus").text(data.status);
                location.reload(); // temporary
            }
        }, 'json');

        // $.getJSON($('#formOrderDetails').attr('action'), {
        //         $('#formOrderDetails').serialize()
        //     }, function (response) { 
        //      if(response.success){
        //         var html = response.ShoppingCartHtml; 
        //         orderForm.update(html);
        //         orderForm.close();
        //       }
        // });

        return false;     
      });

        $("#btnRejectOrder").click(function(){
            $.post( base_url+"orderadmin/reject_order", {orderId: $("#orderId").val()}, function(data){
                console.log(data);
                $("#orderStatus").text(data.status);
                location.reload(); // temporary
            },'json');
        });

        $("#btnDeliveredOrder").click(function(){
            $.post( base_url+"orderadmin/delivered_order", {orderId: $("#orderId").val()}, function(data){
                $("#orderStatus").text(data.status);
                location.reload(); // temporary
            },'json');
        });
    });
    </script>

  </body>
</html>
