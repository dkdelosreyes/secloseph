      <?php 
        $fc_index = 0;
        if(!empty($waiting_order_count)){
          foreach($waiting_order_count as $p){
            $count = $p->order_count;
          } 
        }
      ?>


        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="<?php echo base_url('orderadmin/orders')?>">Orders <span style="background:#468847" class="badge pull-right"><?echo $count?></span> </a></li>
            <li><a href="<?php echo base_url('orderadmin/items')?>">Manage Stocks</a></li>
          </ul>
        </div>





        
