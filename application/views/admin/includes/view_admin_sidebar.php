        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="<?php echo base_url('admin/main_categories')?>">Main Categories</a></li>
            <li><a href="<?php echo base_url('admin/sub_categories')?>">Sub-Categories</a></li>
            <li><a href="<?php echo base_url('admin/specific_categories')?>">Specific Categories</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="<?php echo base_url('admin/brands')?>">Manage Brands</a></li>
            <li><a href="<?php echo base_url('admin/sizes')?>">Manage Sizes</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="<?php echo base_url('admin/products')?>">Manage Product Info</a></li>
            <li><a href="<?php echo base_url('admin/colors')?>">Add Colors and Sizes</a></li>
            <li><a href="<?php echo base_url('admin/items')?>">Manage Stocks</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="<?php echo base_url('admin/content_management')?>">Content Management</a></li>
            <li><a href="<?php echo base_url('admin/articles')?>">Articles</a></li>
            <li><a href="<?php echo base_url('admin/featurette')?>">Home Page Featurette</a></li>
            <li><a href="<?php echo base_url('admin/payment')?>">Payment Method</a></li>
            <li><a href="<?php echo base_url('admin/paypal_facilitator')?>">Paypal Account</a></li>
            <!--<li><a href="<?php echo base_url('admin/bank')?>">Banks</a></li>-->
          </ul>
          
         </div>





        <script>
            $(document).ready(function(){
             var url = window.location;
              // Will only work if string in href matches with location
              $('ul.nav a[href="'+ url +'"]').parent().addClass('active');

              // Will also work for relative and absolute hrefs
              $('ul.nav a').filter(function() {
                  return this.href == url;
              }).parent().addClass('active');
            });
        </script>
