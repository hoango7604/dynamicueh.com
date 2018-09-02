<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Reve Themes
 * @subpackage magazine-art
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<?php $onoff_latestpost_home = get_theme_mod( 'onoff_latestpost_home', true );?>

 <?php if ( is_front_page() && is_home() &&  $onoff_latestpost_home):?>
<div id="blog-content" >
  <div class="grid-container">
    <div class="grid-x grid-margin-x align-center ">
      <div class="cell  small-24 <?php echo esc_attr(magazineart_sidebar_layout_fontblog());?>  large-order-2 ">
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
        <?php $sidbar_positionmn = get_theme_mod( 'sidbar_position_fontpost', 'right' );
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
<?php elseif (! is_front_page() && ! is_home()) : ?>
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
<?php endif; ?>
<?php get_footer(); ?>
