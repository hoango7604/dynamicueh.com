<?php
/**
 * Handles slider layout
 * adding or removing laout to certain page
 * will be controlled from this file
 *
 * @package Reve Themes
 * @subpackage magazine-art
 * @since  1.0.0
 */
 function magazineart_slider_style() {
$slider_style = get_theme_mod('slider_style', 'style2');
$category_show = get_theme_mod( 'category_show_slider');
$post_order_by = get_theme_mod( 'slider_post_order_by','date' );
$value = get_theme_mod( 'onof_auto_play', true );
if ( true == get_theme_mod( 'sticky_checkbox_slider', false ) ) :
  $sticky = get_option( 'sticky_posts' );
else:
  $sticky ='';
endif;
  $args=array(
    'post_type' => 'post',
    'posts_per_page'=>4,
    'cat' => $category_show,
    'orderby' => $post_order_by,
    'post__not_in' => $sticky,
    );
  $main_slider = new WP_Query($args);
?>
<?php if( $slider_style == 'style1' ):?>
  <div class="grid-x">
    <div class="cell large-auto small-24" >
      <div id="slider" class="slick-slider slider-post-wrap" data-slick='{"autoplay":<?php echo ( $value ) ? 'true' : 'false'; ?>}' >
        <?php if ( $main_slider->have_posts() ) : ?>
          <?php /* Start the Loop */ ?>
          <?php while ( $main_slider->have_posts() ) : $main_slider->the_post(); ?>
            <article class="wrap-slider">
              <div class="slider-thum" >
                <?php
                if ( has_post_thumbnail() ) {?>
                  <?php the_post_thumbnail( 'magazineart-slider',array('class' => 'img-slider','link_thumbnail' =>TRUE)  ); ?>
                <?php  } else {?>
                  <img class="img-slider" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slide.jpg" />
                <?php }?>
              </div>
              <div class="slider-content" >
                <?php magazineart_category_slider(); ?>
                <?php the_title( sprintf( '<h3 class="slider-title"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
              </div>
            </article >
          <?php endwhile; ?>
        <?php else : ?>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>
    </div>
</div>
<?php else:?>
  <div class="grid-x">
    <div class="cell large-auto small-24" >
      <div id="slider" class="slick-slider slider-post-wrap <?php if ( 'style2' == get_theme_mod( 'slider_style', 'style2' ) ) : ?> slider2 <?php endif; ?>" data-slick='{<?php if ( 'style2' == get_theme_mod( 'slider_style', 'style2' ) ) : ?>"slidesToShow": <?php echo get_theme_mod( 'slide_to_show', '3' ); ?> , "slidesToScroll": <?php echo get_theme_mod( 'slide_to_show', '3' ); ?> ,<?php endif; ?>"autoplay":<?php echo ( $value ) ? 'true' : 'false'; ?>}' >
        <?php if ( $main_slider->have_posts() ) : ?>
          <?php /* Start the Loop */ ?>
          <?php while ( $main_slider->have_posts() ) : $main_slider->the_post(); ?>
            <article class="wrap-slider">
              <div class="slider-thum" >
                <?php
                if ( has_post_thumbnail() ) {?>
                  <?php the_post_thumbnail( 'magazineart-slider2',array('class' => 'img-slider','link_thumbnail' =>TRUE)  ); ?>
                <?php  } else {?>
                  <img class="img-slider" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slide.jpg" />
                <?php }?>
              </div>
              <div class="slider-content2" >
                <div class="entry-meta">
                  <?php magazineart_category_slider(); ?>
                  <?php the_title( sprintf( '<h3 class="slider-title"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                </div>
              </div>
            </article >
          <?php endwhile; ?>
        <?php else : ?>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>
    </div>
</div>
<?php endif; ?>
<?php }
