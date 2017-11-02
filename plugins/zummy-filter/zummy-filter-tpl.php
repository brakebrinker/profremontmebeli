 <?php if ( have_posts() ) : ?>
   <div class="examples_wrapper container">
   <?php while ( have_posts() ) : the_post(); 
      $matImg = get_field('material_img', get_the_ID());
   ?>
     <a href="<?php the_permalink(); ?>" class="examples-item">
       <figure>
         <img src="<?php echo $matImg['sizes']['medium']; ?>" alt="image">
       </figure>
       <div class="examples-text">
         <h4><?php the_title(); ?></h4>
         <?php echo get_field('material_subtext', get_the_ID()); ?>
       </div>
     </a>
   <?php endwhile; // End of the loop. ?>
   </div>
   <div class="pagination-container container">
      <?php 
      the_posts_pagination( array(
         'end_size' => 1,
         'mid_size' => 1,
         'prev_text'    => __(''),
         'next_text'    => __(''),
      ) ); 
      ?>
   </div>
<?php else : ?>
    <div class="no-results"><p>Нет результатов по заданным критериям</p></div>
<?php endif; ?>