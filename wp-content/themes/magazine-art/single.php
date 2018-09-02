<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 *
 * @subpackage magazineart
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

  <div class="content-wrapper-single">
    <div class="grid-container">
      <div class="grid-x grid-padding-x align-center">
        <!-- End of the loop. -->
        <?php
        /**
        * magazineart_metasidebar_loop hook
        */
        do_action( 'magazineart_metasidebar_content_loop' ); ?>

        <div class="padding-0 cell small-24  large-auto large-order-1 small-order-1">

        <?php
        /* Start the Loop */
        while ( have_posts() ) :
          the_post();

          get_template_part( 'template-parts/post/content', 'single');

          if (true == get_theme_mod('checkbox_author_boxsingle', true)) {
          get_template_part('template-parts/post/box', 'author');
          }
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
            <?php }
                  }
                  if (true == get_theme_mod('show_single_related', true)) {
                    get_template_part('template-parts/post/related', 'post');
             }?>
          </div>
        <?php endwhile ?>

      </div>
    </div>
  </div>

<?php get_footer(); ?>
