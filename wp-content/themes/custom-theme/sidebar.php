<?php $include_sidebar=get_field('include_sidebar','option');?>
<div id="sidebar_container" <?php if($include_sidebar=='No'):echo'style="display:none"'; endif; ?>>
  <div class="sidebar">
    <div class="sidebar_top"></div>
    <div class="sidebar_item">
      <!-- insert your sidebar items here -->
      <h5>Search Products</h5>
        <?php 
      get_search_form();
      ?> 
    </div>
    <div class="sidebar_base"></div>
  </div>
  <div class="sidebar">
    <div class="sidebar_top"></div>
    <div class="sidebar_item">
      <!-- insert your sidebar items here -->
      <h5>Product Categories</h5>
        <?php 
      $orderby = 'name';
      $order = 'asc';
      $hide_empty = false ;
      $cat_args = array(
          'orderby'    => $orderby,
          'order'      => $order,
          'hide_empty' => $hide_empty,
      );
       
      $product_categories = get_terms( 'product_cat', $cat_args );
       
      if( !empty($product_categories) ){
          echo '
       
      <ul>';
          foreach ($product_categories as $key => $category) {
              echo '
       
      <li>';
              echo '<a href="'.get_term_link($category).'" >';
              echo $category->name;
              echo '</a>';
              echo '</li>';
          }
          echo '</ul>
       
       
      ';
      }
    
      ?> 
    </div>
    <div class="sidebar_base"></div>
  </div>

  <div class="sidebar">
    <div class="sidebar_top"></div>
    <div class="sidebar_item">
      <h5>Filter Products</h5>

      
    </div>
  </div>


  <?php if(have_rows('useful_links','option')):?>
  <div class="sidebar">
    <div class="sidebar_top"></div>
    <div class="sidebar_item">
      <h5>Useful Links</h5>
      <ul>
          <?php while(have_rows('useful_links','option')):the_row();$link=get_sub_field('link');?>
        <li><a href="<?php echo $link['url'];?>"><?php echo $link['title'];?></a></li>
          <?php endwhile;?>
      </ul>
    </div>
  </div>
  <?php endif;?>
</div>