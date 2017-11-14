<?php
$args = array(
  'numberposts' => -1,
  'post_type'   => 'services'
);

$arrSrvices = get_posts( $args );
?>

<?php if ($arrSrvices) { ?>
<div class="content-also container">
  <h4>Все наши услуги</h4>
  <div class="content-also_wrapper">
      <div class="mobile-scroll">
        <?php foreach ($arrSrvices as $post) { 
          setup_postdata($post);
        ?>
        <a href="<?php the_permalink(); ?>" class="also-link"><?php echo strip_tags(get_the_title()); ?></a>
        <?php } 
        wp_reset_postdata();
        ?>
      </div>
  </div>
</div>
<?php } ?>