<?php
/**
 * latest post single blog style  Widget
 *
 * @since 1.0.0
 *
 * @package magazine art
 */



 if ( !class_exists( 'magazineart_latest_post_list' ) ) {

    class magazineart_latest_post_list extends WP_Widget {

        public function __construct() {
          $widget_ops = array(
            'classname' => 'magazineart_latest_post_list',
            'description' => __( 'blog List', 'magazine-art' ),
            'customize_selective_refresh' => true,
          );
          parent::__construct( 'latest-post-list', __( '&hearts; Magazineart - Blog List', 'magazine-art' ), $widget_ops );
          $this->alt_option_name = 'magazineart_latest_post_list';

      }

      /**
      * Display Widget
      *
      * @param $args
      * @param $instance
      */
      function widget($args, $instance) {
        extract($args);
        $number_posts = ( ! empty( $instance['number_posts'] ) ) ? absint( $instance['number_posts'] ) : 5;
        if ( ! $number_posts ) {
          $number_posts = 5;
        }
        $sticky_posts = isset( $instance['sticky_posts'] ) ? $instance['sticky_posts'] : false;
        $category = ( isset( $instance['category'] ) ) ? absint( $instance['category'] ) : '';
        $social_share_icons = isset( $instance['social_share_icons'] ) ? $instance['social_share_icons'] : false;

        // Latest Posts 1
        if ( $sticky_posts ) :
        $sticky = get_option( 'sticky_posts' );
        else:
          $sticky ='';
        endif;
        $latest_bloglist_posts = new WP_Query(
          array(
            'cat'	                => $category,
            'posts_per_page'	    => $number_posts,
            'post_status'           => 'publish',
            'post__not_in' => $sticky,
            'ignore_sticky_posts' => true,
            )
        );

        echo $before_widget;
        ?>

        <div class="post-list-widgets1"  >
          <?php if( !empty($instance['title']) ): ?>
                <div class="block-title widget-title">
                  <h3 class="blog-title margin-bottom-2"><?php echo apply_filters('widget_title', $instance['title']); ?></h3>
                </div>
            <?php endif;?>
          <?php if ( $latest_bloglist_posts -> have_posts() ) :
            while ( $latest_bloglist_posts -> have_posts() ) : $latest_bloglist_posts -> the_post(); ?>
            <article class="post-wrap-list-1 ">
              <div class="media-object stack-for-small">
                <?php
                $gallery                = get_post_gallery( get_the_ID(), false );
                $gallery_attachment_ids = explode( ',', $gallery['ids'] );
                $thumbnail_size         = 'post-thumbnail';
                $content = apply_filters( 'the_content', get_the_content() );
                $audio   = false;
                $video   = false;
                // Only get audio from the content if a playlist isn't present.
                if ( false === strpos( $content, 'wp-playlist-script' ) ) {
                  $audio = get_media_embedded_in_content( $content, array( 'audio', 'iframe' ) );
                  $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
                }


                if ( has_post_thumbnail() ) {
                  echo '<div class="media-object-section align-self-middle"><div class="thumbnail">';
                            the_post_thumbnail( 'magazineart-list-post',array('class' => 'img','link_thumbnail' =>TRUE)  );
                  echo '  </div>  </div>';

                } elseif (! empty( $audio )  && has_post_format('audio') ) {

                  // If not a single post, highlight the audio file.
                      echo '<div class="media-object-section video align-self-middle">';
                      echo '<div class="entry-audio responsive-embed">';
                      echo $audio[0]; // WPCS xss ok.
                      echo '</div><!-- .entry-audio -->';
                      echo '</div>';

                  // If not a single post, highlight the video file.
                } elseif (! empty( $video )  && has_post_format('video') ) {
                      echo '<div class="media-object-section video align-self-middle">';
                    foreach ( $video as $video_html ) {
                      echo '<div class="entry-video responsive-embed ">';
                      echo $video_html;
                      echo '</div>';
                    }
                    echo '</div>';
                    // If not a single post, highlight the gallery.
                } elseif (has_post_format('gallery')) {
                  if ( ! empty( $gallery_attachment_ids ) ) :
                    echo '<div class="media-object-section video align-self-middle">';
                    echo '<div class="entry-gallery slick-slider">';
                    foreach ( $gallery_attachment_ids as $gallery_attachment_id ) :
                    echo wp_get_attachment_image( $gallery_attachment_id, $thumbnail_size );
                    endforeach;
                    echo '</div></div>';
                  endif;
                };?>
                <div class="media-object-section main-section">
                      <div class="post-body">
                        <div class="post-head">
                          <?php magazineart_category_list(); ?>
                      <?php the_title( sprintf( '<h3 class="post-title"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                      </div>
                    <div class="post-excerpt">
                      <?php the_excerpt(); ?>
                    </div>
                </div>
              <div class="media-object  align-bottom">
              <div class="post-meta-footer top-bar">
                <div class="meta-left top-bar-left">
                  <span class="date">
                    <span class="by"><?php echo magazineart_time_link(); ?></span>
                  </span>
                  <span class="sep">•</span>
                  <span class="author">
                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr(get_the_author()); ?>">
                      <span><?php echo get_the_author();?></span>
                    </a>
                  </span>
                </div>
                <?php if ( ! $social_share_icons ) :?>
                <div class="meta-right top-bar-right">
                  <div class="share">
                      <div class="post-social-share">
                        <?php echo magazineart_social_share_icons(); ?>
                      </div>
                  </div>
                </div>
                <?php endif;?>
              </div>
            </div>
            </div>
          </div>
            </article>
          <?php endwhile;?>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>

  <?php
  echo $after_widget;
  }



public function update( $new_instance, $old_instance ) {
  $instance = $old_instance;
  $instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );
  $instance[ 'category' ]	= absint( $new_instance[ 'category' ] );
  $instance[ 'number_posts' ] = (int)$new_instance[ 'number_posts' ];
  $instance['sticky_posts'] = isset( $new_instance['sticky_posts'] ) ? (bool) $new_instance['sticky_posts'] : false;
  $instance['social_share_icons'] = isset( $new_instance['social_share_icons'] ) ? (bool) $new_instance['social_share_icons'] : false;

  return $instance;
}

function form($instance) {
  /* Set up some default widget settings. */
 $defaults = array(

 'category' => 'show_option_all',
 'title' => 'Latest Blog ',
 );
 $sticky_posts = isset( $instance['sticky_posts'] ) ? (bool) $instance['sticky_posts'] : false;
 $number_posts    = isset( $instance['number_posts'] ) ? absint( $instance['number_posts'] ) : 5;
 $social_share_icons = isset( $instance['social_share_icons'] ) ? (bool) $instance['social_share_icons'] : false;

 $instance = wp_parse_args( (array) $instance, $defaults ); ?>

  <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'magazine-art' ); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr($instance['title']); ?>"/>
  </p>
  <p>
    <label><?php esc_html_e( 'Select a post category', 'magazine-art' ); ?></label>
    <?php wp_dropdown_categories( array( 'name' => $this->get_field_name('category'), 'selected' => $instance['category'], 'show_option_all' => 'Show all posts' ) ); ?>
  </p>

  <p><input class="checkbox" type="checkbox"<?php checked( $sticky_posts ); ?> id="<?php echo $this->get_field_id( 'sticky_posts' ); ?>" name="<?php echo $this->get_field_name( 'sticky_posts' ); ?>" />
  <label for="<?php echo $this->get_field_id( 'sticky_posts' ); ?>"><?php _e( 'Hide sticky posts.', 'magazine-art' ); ?></label></p>

  <p><label for="<?php echo $this->get_field_id( 'number_posts' ); ?>"><?php _e( 'Number of posts to show:' , 'magazine-art'); ?></label>
  <input class="tiny-text" id="<?php echo $this->get_field_id( 'number_posts' ); ?>" name="<?php echo $this->get_field_name( 'number_posts' ); ?>" type="number" step="1" min="1" value="<?php echo $number_posts; ?>" size="3" /></p>

  <p><input class="checkbox" type="checkbox"<?php checked( $social_share_icons ); ?> id="<?php echo $this->get_field_id( 'social_share_icons' ); ?>" name="<?php echo $this->get_field_name( 'social_share_icons' ); ?>" />
  <label for="<?php echo $this->get_field_id( 'social_share_icons' ); ?>"><?php _e( 'Hide social share icons', 'magazine-art' ); ?></label></p>

  <?php
    }
  }
}


// register magazineart dual category posts widget
function magazineart_latest_post_list_blog() {
    register_widget( 'magazineart_latest_post_list' );
}
add_action( 'widgets_init', 'magazineart_latest_post_list_blog' );
