<?php 
/*
Template Name: Demo
*/
get_header(); ?>

<?php if(have_rows('content')):?>
    <?php while(have_rows('content')):the_row();?>

    <?php if(get_row_layout()=='columns_section'):
            $columns = get_sub_field('columns');?>
            <div class="row">
        <?php  foreach($columns as $column):?>
            <div class="col-lg-4">


            <h3><?php echo $column['title'];?></h3>
            <p style="color:black;"><?php echo $column['content'];?>
            </p>

    </div>
        <?php endforeach;?>
        </div>
    <?php endif;?>


    <?php endwhile;?>
<?php endif;?>
<?php
get_footer();
