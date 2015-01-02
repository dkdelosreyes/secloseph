<form id="formOrderDetails" action="<?php echo base_url('orderadmin/approve_order')?>" method="post">
                            
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
                foreach($orders_details as $p):
                    $preview_photo_link  = $p->color_photo_url != '' ? base_url('assets/products/'.$p->color_photo_url) : base_url('assets/img/product_default.png');?>
                    
                    <input type="hidden" name="product[<?php echo $count?>]" id="product[<?php echo $count++?>]" value="<?echo $p->or_det_id?>">
                                            
                    <tr>
                        <td><img src="<?php echo $preview_photo_link ?>" style="width:100px"></td>
                        <td>
                            Name: <?echo $p->prod_name.br(1)?>
                            Quantity: <?echo $p->or_det_quantity.br(1)?>
                            Size: <?echo $p->or_det_size.br(1)?>
                        </td>
                        <td>Order verification in progress</td>
                        <td><?echo $p->or_det_price.br(3)?></td>
                        <td><?echo $p->item_stock?></td>
                    </tr>
                <?php endforeach;
            }

        ?>
        </tbody>
    </table>

                            
                            
    <?php
        if(!empty($orders)){
            foreach($orders as $p):?>
                Total: <?echo $p->order_total.br(3)?>
            <?php endforeach;
        }

        $approve_btn_state = $p->order_status == 'Order Approved' || $p->order_status == 'Order Closed' || $p->order_status == 'Order Delivered' ? 'disabled' : '';
        $reject_btn_state = $p->order_status == 'Order Approved' || $p->order_status == 'Order Closed' || $p->order_status == 'Order Delivered' ? 'disabled' : '';
        $delivered_btn_state = $p->order_status == 'Order Closed' || $p->order_status == 'Order Delivered' ? 'disabled' : '';
                                // $approve_btn_state = '';
                                // $reject_btn_state = '';
                                // $delivered_btn_state = '';
    ?>

                            
    <input type="submit" class="btn btn-danger btn-lg" id="btnApproveOrder" data-loading-text="Processing..." value="Approve" style="width:120px" <?php echo $approve_btn_state?>>
    <input type="reset" class="btn btn-danger btn-lg" id="btnRejectOrder" data-loading-text="Processing..." value="Reject" style="width:120px" <?php echo $reject_btn_state?>>
    <input type="button" class="btn btn-danger btn-lg" id="btnDeliveredOrder" data-loading-text="Processing..." value="Delivered" style="width:120px" <?php echo $delivered_btn_state?>>
                            
</form> 