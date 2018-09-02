<?php get_header(); ?>

<div  class="sub_banner" >
  <div  class="top-bar" >
    <div class="top-bar-left top-bar-title">
      <?php
      echo sprintf(esc_html__('Search Results for : %s', 'magazine-art'), esc_html(get_search_query()));
      ?>
    </div>
    <div class="top-bar-right">
      <div class="breadcrumb-wrap">
        <?php echo magazineart_breadcrumb();?>
      </div>
    </div>
  </div>
</div>

<div id="blog-content" >
  <div class="grid-container">
    <div class="grid-x grid-margin-x align-center ">
      <div class="cell  small-24 <?php echo esc_attr(magazineart_sidebar_layout());?> large-order-2 ">
        <div class="blog-container post-classic-2 ">
          <?php if ( have_posts() ) : ?>
            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
              <?php
              /*
              * Include the Post-Format-specific template for the content.
              * If magazineart want to override this in a child theme, then include a file
              * called content-___.php (where ___ is the Post Format name) and that will be used instead.
              */
              get_template_part( 'template-parts/post/content', get_post_format() );
              ?>
            <?php endwhile; ?>
              <?php the_posts_pagination(); ?>
          <?php else : ?>
            <?php get_template_part( 'template-parts/post/content', 'none' ); ?>
          <?php endif; ?>
        </div>
        <!--POST END-->
      </div>
      <?php $sidbar_positionmn = get_theme_mod( 'sidbar_position_gen', 'right' );
      if (('full' == $sidbar_positionmn)) {
        echo '';  // nosidebar
      } elseif ( ('right' == $sidbar_positionmn)) {
        echo '<div class="cell small-24 medium-22 large-7 large-order-2">';   get_template_part('sidebar');   echo '</div>';
      } elseif ( ('left' == $sidbar_positionmn)) {
        echo '<div class="cell small-24 medium-22 large-7 large-order-1">';   get_template_part('sidebar');   echo '</div>';
      }
      ?>
      <!--sidebar END-->
    </div>
  </div>
 </div><!--container END-->

<?php get_footer(); ?>
