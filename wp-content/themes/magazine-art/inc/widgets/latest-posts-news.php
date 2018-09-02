<?php
/**
 * latest post single Widget
 *
 * @since 1.0.0
 *
 * @package magazine-art
 */



 if ( !class_exists( 'magazineart_latest_post_news' ) ) {

    class magazineart_latest_post_news extends WP_Widget {

        public function __construct() {
          $widget_ops = array(
            'classname' => 'magazineart_latest_post_news',
            'description' => __( 'blog post News', 'magazine-art' ),
            'customize_selective_refresh' => true,
          );
          parent::__construct( 'magazineart_latest_post_news', __( '&hearts; Magazineart - News', 'magazine-art' ), $widget_ops );
          $this->alt_option_name = 'magazineart_latest_post_news';

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
        // Latest Posts 1
        if (true == $sticky_posts ) :
        $sticky = get_option( 'sticky_posts' );
        else:
          $sticky ='';
        endif;
        $latest_news_posts = new WP_Query(
          array(
            'cat'	                => $category,
            'posts_per_page'	    => 1,
            'post_status'           => 'publish',
            'post__not_in' => $sticky,
            'ignore_sticky_posts'   => 1,

                    )
        );

        echo $before_widget;
    ?>

    <?php if( !empty($instance['title']) ): ?>
        <div class="widgets-title widget-title">
          <h3><?php echo apply_filters('widget_title', $instance['title']); ?></h3>
        </div>
    <?php endif;?>

    <div class="news-content-wrap">
      <?php if ( $latest_news_posts -> have_posts() ) :
        while ( $latest_news_posts -> have_posts() ) : $latest_news_posts -> the_post(); ?>
        <?php  $postid = get_the_ID();
        $firstPosts[] = $postid;?>
        <article class="post-wrap-big ">
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
            echo '<div class="post-thumb">';
                      the_post_thumbnail( 'magazineart-news-big',array('class' => 'img','link_thumbnail' =>TRUE)  );
            echo '  <div class="post-thumb-overlay"></div>  </div>';

          } elseif (! empty( $audio )  && has_post_format('audio') ) {

            // If not a single post, highlight the audio file.
                echo '<div class="post-thumb">';
                echo '<div class="entry-audio responsive-embed">';
                echo $audio[0]; // WPCS xss ok.
                echo '</div><!-- .entry-audio -->';
                echo '<div class="post-thumb-overlay"></div> </div>';

            // If not a single post, highlight the video file.
          } elseif (! empty( $video )  && has_post_format('video') ) {
                echo '<div class="post-thumb video">';
              foreach ( $video as $video_html ) {
                echo '<div class="entry-video responsive-embed ">';
                echo $video_html;
                echo '</div>';
              }
              echo '<div class="post-thumb-overlay"></div> </div>';
              // If not a single post, highlight the gallery.
          } elseif (has_post_format('gallery')) {
            if ( ! empty( $gallery_attachment_ids ) ) :
              echo '<div class="post-thumb video">';
              echo '<div class="entry-gallery slick-slider">';
              foreach ( $gallery_attachment_ids as $gallery_attachment_id ) :
              echo wp_get_attachment_image( $gallery_attachment_id, $thumbnail_size );
              endforeach;
              echo '<div class="post-thumb-overlay"></div></div></div>';
            endif;
          } elseif (! has_post_thumbnail()) {?>
            <div class="post-thumb">
            <img class="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/370x370.png" />
            </div>
          <?php };?>
          <div class="post-header-absolute">
            <div class="post-head">
              <?php magazineart_category_slider(); ?>
              <?php the_title( sprintf( '<h3 class="post-title"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
              <?php echo magazineart_time_link(); ?>
            </div>
          </div>
        </article>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
    <!-- list start -->
    <?php
    $latest_list_posts = new WP_Query(
      array(
        'cat'	                => $category,
        'posts_per_page'	    => $number_posts,
        'post_status'           => 'publish',
        'ignore_sticky_posts'   => 1,
        'post__not_in' => $firstPosts,
      )
    );
    ?>
    <?php if ( $latest_list_posts -> have_posts() ) :
      while ( $latest_list_posts -> have_posts() ) : $latest_list_posts -> the_post(); ?>
      <article class="post-list">
        <div class="media-object">
          <div class="media-object-section">
            <div class="post-thumb-outer">
              <?php the_post_thumbnail( 'magazineart-small' ,array('link_thumbnail' =>TRUE)); ?>
            </div>
          </div>
          <div class="media-object-section main-section">
            <div class="post-body">
              <?php the_title( sprintf( '<h3 class="post-title"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
              <div class="post-meta-info ">
                <i class="fa fa-clock-o"></i>
                  <span>
                    <?php echo magazineart_time_ago(); ?>
                  </span>
              </div>
            </div>
          </div>
        </div>
      </article>
    <?php endwhile; ?>
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

  return $instance;
}

function form($instance) {
  /* Set up some default widget settings. */
 $defaults = array(

 'category' => 'show_option_all',
 'title' => 'Latest News',

 );
 $sticky_posts = isset( $instance['sticky_posts'] ) ? (bool) $instance['sticky_posts'] : false;
 $number_posts    = isset( $instance['number_posts'] ) ? absint( $instance['number_posts'] ) : 5;
 $instance = wp_parse_args( (array) $instance, $defaults ); ?>
  <!-- Form for category 1 -->
  <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'magazine-art' ); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr($instance['title']); ?>"/>
  </p>
  <p>
    <label><?php esc_html_e( 'Select a post category', 'magazine-art' ); ?></label>
      <?php $args = array(
	       'show_option_all'    => 'Show all posts',
	       'orderby'            => 'ID',
	       'order'              => 'ASC',
	       'show_count'         => 1,
	       'hide_empty'         => 1,
	       'selected'           => $instance['category'],
	       'hierarchical'       => 0,
	       'name'               => $this->get_field_name('category'),
	       'taxonomy'           => 'category',
	       'value_field'	     => 'term_id',
       );?>
    <?php wp_dropdown_categories( $args ); ?>
  </p>
  <p><input class="checkbox" type="checkbox"<?php checked( $sticky_posts ); ?> id="<?php echo $this->get_field_id( 'sticky_posts' ); ?>" name="<?php echo $this->get_field_name( 'sticky_posts' ); ?>" />
  <label for="<?php echo $this->get_field_id( 'sticky_posts' ); ?>"><?php _e( 'Hide sticky posts.', 'magazine-art' ); ?></label></p>

  <p><label for="<?php echo $this->get_field_id( 'number_posts' ); ?>"><?php _e( 'Number of posts to show:' , 'magazine-art'); ?></label>
  <input class="tiny-text" id="<?php echo $this->get_field_id( 'number_posts' ); ?>" name="<?php echo $this->get_field_name( 'number_posts' ); ?>" type="number" step="1" min="1" value="<?php echo $number_posts; ?>" size="3" /></p>

  <?php
    }
  }
}
// register news posts widget
function magazineart_latest_post_news_blog() {
    register_widget( 'magazineart_latest_post_news' );
}
add_action( 'widgets_init', 'magazineart_latest_post_news_blog' );
