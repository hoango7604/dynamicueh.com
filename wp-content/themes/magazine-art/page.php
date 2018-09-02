<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Reve Themes
 * @subpackage magazine-art
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<!--Page Header-->
<div id="sub_banner_page" class=" callout  border-none">
  <?php if (has_post_thumbnail($post->ID)) : ?>
    <div class="single-page-thumb-outer">
      <div class="page-thumb">
        <?php the_post_thumbnail( ); ?>
        <div class="heade-content">
          <?php the_title( '<h1 class="text-center entry-title">', '</h1>' ); ?>
        </div>
      </div>
    </div>
  <?php else:?>
    <div class="heade-page-nothumb">
      <?php the_title( '<h1 class="text-center entry-title">', '</h1>' ); ?>
    </div>
  <?php endif;?>
</div>

<!--Content-->
<div  class="content-page">
  <div class="grid-container">
    <div class="grid-x grid-margin-x align-center">
      <div class="cell small-24 large-auto large-order-2">
        <div class="page_content">
            <?php while(have_posts()): ?>
              <?php the_post();?>
              <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                <?php magazineart_edit_link( get_the_ID() ); ?>
              <div class="page_content_wrap">
                <?php
            			the_content();

            			wp_link_pages(
            				array(
            					'before' => '<div class="page-links">' . __( 'Pages:', 'magazine-art' ),
            					'after'  => '</div>',
            				)
            			);
            		?>
              </div>
              <?php
              // If comments are open or we have at least one comment, load up the comment template.
              if (comments_open() || get_comments_number()) {?>
                <div class="box-comment-content " >
                  <?php comments_template();?>
                </div>
                <?php if (comments_open()) {?>
                  <div class="box-comment-btn-wrap ">
                    <a class="box-comment-btn box-comment-active">
                      <i class="fa fa-comments"></i>
                      <?php echo esc_html__('add a comment','magazine-art'); ?>
                    </a>
                  </div>
                <?php }?>
                <?php }?>
              <?php endwhile ?>
          </div>
        </div>
  </div>
  <!--PAGE END-->
  <?php
  /**
  * magazineart_metasidebar_loop hook
  */
  do_action( 'magazineart_metasidebar_content_loop' ); ?>
    </div>
    </div>
  </div>
<?php get_footer(); ?>
