<?php
/**
 * latest post single classic style
 *
 * @since 1.0.0
 *
 * @package magazine art
 */



 if ( !class_exists( 'magazineart_post_classic' ) ) {

    class magazineart_post_classic extends WP_Widget {

      public function __construct() {
        $widget_ops = array(
          'classname' => 'magazineart_post_classic',
          'description' => __( '(blog classic ) Displays latest posts or posts from a choosen category', 'magazine-art' ),
          'customize_selective_refresh' => true,
        );
        parent::__construct( 'latest-post-classic', __( '&hearts; Magazineart - Blog classic', 'magazine-art' ), $widget_ops );
        $this->alt_option_name = 'magazineart_post_classic';

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
        $social_share_icons = isset( $instance['social_share_icons'] ) ? $instance['social_share_icons'] : false;
        $category = ( isset( $instance['category'] ) ) ? absint( $instance['category'] ) : '';
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
            'ignore_sticky_posts' => 0,
            )
        );

        echo $before_widget;
        ?>

        <div class="post-classic-2-widgets post-classic-2 ">
          <?php if( !empty($instance['title']) ): ?>
                <div class="block-title widget-title">
                  <h3 class=" blog-title"><?php echo apply_filters('widget_title', $instance['title']); ?></h3>
            </div>
          <?php endif;?>
          <div class="grid-x ">
            <div class="large-auto small-24 cell ">
            <?php if ( $latest_bloglist_posts -> have_posts() ) :
              while ( $latest_bloglist_posts -> have_posts() ) : $latest_bloglist_posts -> the_post(); ?>
              <div class="post-classic-2-warp" >
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
               if (has_post_thumbnail()) {
                  echo '<div class="post-thumb">';
              the_post_thumbnail('magazineart-large', array('class' => 'img','link_thumbnail' =>TRUE,));
              echo '</div>';

              } elseif (! empty( $audio )  && has_post_format('audio') ) {
                    echo '<div class="post-thumb ">';
                      echo '<div class="entry-audio ">';
                      echo $audio[0]; // WPCS xss ok.
                      echo '</div><!-- .entry-audio -->';
                    echo '</div>';
                    // If not a single post, highlight the video file.
                  } elseif (! empty( $video )  && has_post_format('video') ) {
                    echo '<div class="post-thumb ">';
                    foreach ( $video as $video_html ) {
                      echo '<div class="entry-video responsive-embed widescreen">';
                      echo $video_html;
                      echo '</div>';
                    }
                    echo '</div>';
                  } elseif (has_post_format('gallery')) {
                  // If not a single post, highlight the gallery.
                  if ( ! empty( $gallery_attachment_ids ) ) :
                    echo '<div class="entry-gallery slick-slider">';
                    foreach ( $gallery_attachment_ids as $gallery_attachment_id ) :
                    echo wp_get_attachment_image( $gallery_attachment_id, $thumbnail_size );
                    endforeach;
                    echo '</div>';
                  endif;
                };?>
                <div class="post-body <?php if (! has_post_thumbnail()) {?> no-topmargin <?php }?>">
                  <?php magazineart_category_list();?>
                  <?php the_title(sprintf('<h3 class="post-title"><a class="post-title-link" href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>
                  <div class="post-excerpt">
                    <?php the_excerpt(); ?>
                  </div>
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
            <?php endwhile;?>
            <?php wp_reset_postdata(); ?>
          <?php endif;?>
        </div>
      </div>
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
  $number_posts    = isset( $instance['number_posts'] ) ? absint( $instance['number_posts'] ) : 5;
 $sticky_posts = isset( $instance['sticky_posts'] ) ? (bool) $instance['sticky_posts'] : false;
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


function magazineart_latest_post_classic() {
    register_widget( 'magazineart_post_classic' );
}
add_action( 'widgets_init', 'magazineart_latest_post_classic' );
