</div>
    <div id="footer">
    <?php if(have_rows('pages','option')):?>
     <ul>
          <?php while(have_rows('pages','option')):the_row();
          $link=get_sub_field('links','option');?>
            <li><a href="<?php echo $link['url'];?>"><?php echo $link['title'];?></a></li>
    <?php endwhile;?>
    </ul>
    <?php endif;?>
    <?php if(get_field('copyrights_text','option')): ?>
      <p style="padding-top:8px;border-top: 0.5px solid white;padding-top: 11px;
    margin-top: 20px;background:#A21FA2;margin-bottom:0px;"><?php echo get_field('copyrights_text','option'); ?></p>
    <?php endif;?>
    <p style="padding-top:8px;background:#A21FA2;margin-bottom:0px;padding-bottom:0px"> <?php echo get_theme_mod("set_copyright","Set your copyright text");?> </p>
    <p style="background:#A21FA2;"> <?php echo get_theme_mod("set_year_copyright","Set your copyright text");?> </p>
    </div>
  </div>
</div>
<?php wp_footer();?>
</body>
</html>