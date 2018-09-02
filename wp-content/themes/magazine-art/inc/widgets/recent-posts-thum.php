<?php
/**
 * latest post single Widget
 *
 * @since 1.0.0
 *
 * @package magazine-art
 */



 if ( !class_exists( 'magazineart_latest_post_thum' ) ) {

    class magazineart_latest_post_thum extends WP_Widget {

        public function __construct() {
          $widget_ops = array(
            'classname' => 'magazineart_latest_post_thum',
            'description' => __( 'Recent post(you can use it in sidebar)', 'magazine-art' ),
            'customize_selective_refresh' => true,
          );
          parent::__construct( 'latest-post-thum', __( '&hearts; Magazineart - Recent Post', 'magazine-art' ), $widget_ops );
          $this->alt_option_name = 'magazineart_latest_post_thum';

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

        echo $before_widget;
    ?>

    <?php if( !empty($instance['title']) ): ?>
        <div class="widget-title">
          <h3><?php echo apply_filters('widget_title', $instance['title']); ?></h3>
        </div>
    <?php endif;?>

    <div class="news-content-wrap recent-list">
    <?php
    $latest_list_posts = new WP_Query(
      array(
        'cat'	                => $category,
        'posts_per_page'	    => $number_posts,
        'post_status'           => 'publish',
        'ignore_sticky_posts'   => $sticky_posts,
      )
    );
    ?>
    <?php if ( $latest_list_posts -> have_posts() ) :
      while ( $latest_list_posts -> have_posts() ) : $latest_list_posts -> the_post(); ?>
      <article class="post-list">
        <div class="media-object">
          <div class="media-object-section">
            <div class="post-thumb-outer">
              <?php the_post_thumbnail( 'magazineart-small' ); ?>
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
function magazineart_latest_post_thum_blog() {
    register_widget( 'magazineart_latest_post_thum' );
}
add_action( 'widgets_init', 'magazineart_latest_post_thum_blog' );
