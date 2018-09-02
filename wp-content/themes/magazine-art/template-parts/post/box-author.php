<?php
/**
 *
 * Displays Author Box
 *
 * @package magazineart
 *
 * @since magazineart 1.0.0
 */
;?>


  <div class="single-box-author text-center">
    <div class="author-thumb-wrap">
      <?php echo get_avatar(get_the_author_meta('ID'), '150'); ?>
    </div>
    <div class="author-content-wrap ">
      <div class="author-title">
        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>">
          <h3><?php echo get_the_author();?></h3>
        </a>
      </div>
      <div class="author-description">
        <?php the_author_meta( 'description' ); ?>
      </div>
        <a class="label-border red font-bold" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>">
          <?php printf( esc_html__( 'View all posts', 'magazine-art' ), esc_attr( get_the_author() ) ); ?>
        </a>
    </div>
  </div>
