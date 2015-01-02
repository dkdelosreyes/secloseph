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
