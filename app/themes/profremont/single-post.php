<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="content single-text">

<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

<h1><?php if (get_field('seo_h1', get_queried_object_id())) 
          echo get_field('seo_h1', get_queried_object_id());
        else
          the_title();
      ?>
</h1>
<div class="content-subtitle"><?php echo get_field('post_subtitle', get_the_ID()); ?></div>

 <div class="single-text_wrapper container">

   <div class="single-text_advantages">
     <h4><?php echo get_field('post_title_advantages', get_the_ID()); ?></h4>
     <?php if( have_rows('post_advantages') ): 
        $count = 0;
     ?>
     <ol>
        <?php while( have_rows('post_advantages') ): the_row(); 
          // vars
          $advName = get_sub_field('advantages_name');
          $advText = get_sub_field('advantages_field');
          $count++;
          ?>
          <li class="single-text-list list-<?php echo $count; ?>">
            <?php if( $advName ): ?>
              <span><?php echo $advName; ?> </span>
            <?php endif; ?>
            <?php if( $advText ) echo $advText; ?>
          </li>

        <?php endwhile; ?>
     </ol>
     <?php endif; ?>
   </div>

   <div class="single-text_images">
    <?php $imgBefore = get_field('post_img_before', get_the_ID()); ?>
    <?php if ($imgBefore) { ?>
     <figure class="left">
       <img src="<?php echo $imgBefore['url']; ?>" alt="image">
     </figure>
    <?php } ?>

    <?php $imgAfter = get_field('post_img_after', get_the_ID()); ?>
    <?php if ($imgAfter) { ?>
     <figure class="right">
        <img src="<?php echo $imgAfter['url']; ?>" alt="image">
     </figure>
     <?php } ?>
   </div>
    
    <div class="single-text_home micro-container container">
      <?php the_content(); ?>
    </div>

    <figure class="micro-container container">
      <?php $imgFix = get_field('post_img_fix', get_the_ID()); ?>
      <?php if ($imgFix) { ?>
        <img src="<?php echo $imgFix['url']; ?>" alt="image">
        <?php if ($imgFix['caption']) { ?>
        <p class="image-description"><?php echo $imgFix['caption']; ?></p>
        <?php } ?>
      <?php } ?>
    </figure>

    <?php if( have_rows('post_job_list') ): ?>
    <table class="micro-container container">
      <tbody>
        <tr>
          <th>Название</th>
          <th>Количество</th>
          <th>Размеры</th>
          <th>Цена</th>
        </tr>
        
     <?php while( have_rows('post_job_list') ): the_row(); 
       // vars
       $jName = get_sub_field('job_name');
       $jQuantity = get_sub_field('job_quantity');
       $jSize = get_sub_field('job_size');
       $jPrice = get_sub_field('job_price');
       ?>
       <tr>
         <td><?php echo $jName; ?></td>
         <td><?php echo $jQuantity; ?></td>
         <td><?php echo $jSize; ?></td>
         <td><?php echo $jPrice; ?></td>
       </tr>
     <?php endwhile; ?>
        
      </tbody>
    </table>
    <?php endif; ?>

    <div class="single-text_marker micro-container container">
      <?php echo get_field('post_services', get_the_ID()); ?>
    </div>

  </div> 

</div>

<?php endwhile; // End of the loop. ?>
<?php get_footer(); ?>