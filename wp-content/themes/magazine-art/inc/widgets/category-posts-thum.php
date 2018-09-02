<?php
/**
 * @since 1.0.0
 *
 * @package magazine art
 */



 if ( !class_exists( 'magazineart_category_thum' ) ) {

    class magazineart_category_thum extends WP_Widget {

      public function __construct() {
        $widget_ops = array(
          'classname' => 'magazineart_category_thum',
          'description' => __( 'Displays Selected Categroy', 'magazine-art' ),
          'customize_selective_refresh' => true,
        );
        parent::__construct( 'magazineart_category_thum', __( '&hearts; Magazineart - Category', 'magazine-art' ), $widget_ops );
        $this->alt_option_name = 'magazineart_category_thum';
        add_action( 'admin_enqueue_scripts', array( $this, 'register_magazineart_admin_scripts' ) );

        $defaults = apply_filters('magazineart_category_thum_modify_defaults', array(
          'category' => 1,
          'category_img1'=> get_template_directory_uri(). "/images/360x360.jpg",
          'label' => 'News',
          'category2' => 1,
          'category_img2'=> get_template_directory_uri(). "/images/360x360.jpg",
          'label2' => 'News',
          'category3' => 1,
          'category_img3'=> get_template_directory_uri(). "/images/360x360.jpg",
          'label3' => 'News',
  				));

  			$this->defaults = $defaults;


      }

      /**
       * Registers and enqueues admin-specific JavaScript.
       */
      public function register_magazineart_admin_scripts() {
        wp_enqueue_script('magazinear_widget_scripts', get_template_directory_uri() . '/assets/js/widgets.min.js', false, '1.0', true);
        wp_enqueue_style('magazinear_widget_style', get_template_directory_uri() . '/assets/css/widgets_admin.css');
      }
      /**
      * Display Widget
      *
      * @param $args
      * @param $instance
      */
      function widget($args, $instance) {
        extract($args);
        $category = ( isset( $instance['category'] ) ) ? absint( $instance['category'] ) : '';
        $category_img1 = isset( $instance['category_img1'] ) ? $instance['category_img1'] : '';
        $label = ( ! empty( $instance['label'] ) ) ? sanitize_text_field($instance['label']) : '';

        $category2 = ( isset( $instance['category2'] ) ) ? absint( $instance['category2'] ) : '';
        $category_img2 = isset( $instance['category_img2'] ) ? $instance['category_img2'] : '';
        $label2 = ( ! empty( $instance['label2'] ) ) ? sanitize_text_field($instance['label2']) : '';

        $category3 = ( isset( $instance['category3'] ) ) ? absint( $instance['category3'] ) : '';
        $category_img3 = isset( $instance['category_img3'] ) ? $instance['category_img3'] : '';
        $label3 = ( ! empty( $instance['label3'] ) ) ? sanitize_text_field($instance['label3']) : '';


        echo $before_widget;?>


        <div class="grid-x grid-padding-x grid-padding-y align-center " >

          <?php if( !empty($category_img1) ): ?>
          <?php $categories = get_categories( array(
            'orderby' => 'name',
            'show_count' => true,
            'title_li'     => '',
            'style'      => 'none',
            'include' => array( $category )
          ) );?>
        <section class="cell large-auto medium-12 small-24 wow animated fadeIn" >
            <a href="<?php foreach ( $categories as $cat ) { echo  esc_url( get_category_link( $cat->term_id ) ); } ?> ">
            <figure class="tilter__figure " >
              <img class="tilter__image" src="<?php echo esc_url($category_img1); ?>" />
              <div class="tilter__deco tilter__deco--shine"><div></div></div>
              <figcaption class="tilter__caption">
                  <?php
                  foreach ( $categories as $cat ) {
                        echo '<h3 class="tilter__title">'  .esc_html( $cat->name ). '</h3>';
                          echo  '<span>';
                        echo esc_html( $cat->count );
                          echo  '</span>';
                        echo  '<p>';
                        echo esc_html( $label );
                        echo  '</p>';
                  }
                  ?>
              </figcaption>
            </figure>
          </a>
        </section>
        <?php endif;?>

        <?php if( !empty($category_img2) ): ?>
        <?php $categories2 = get_categories( array(
          'orderby' => 'name',
          'show_count' => true,
          'title_li'     => '',
          'style'               => 'none',
          'include' => array( $category2 )
        ) );?>
      <section class="cell large-auto medium-12 small-24 wow animated fadeIn"  >
          <a href="<?php foreach ( $categories2 as $cat ) { echo  esc_url( get_category_link( $cat->term_id ) ); } ?> ">
          <figure class="tilter__figure">
            <img class="tilter__image" src="<?php echo esc_url($category_img2); ?>" />
            <div class="tilter__deco tilter__deco--shine"><div></div></div>
            <figcaption class="tilter__caption">
                <?php
                foreach ( $categories2 as $cat ) {
                      echo '<h3 class="tilter__title">'  .esc_html( $cat->name ). '</h3>';
                      echo  '<span>';
                    echo esc_html( $cat->count );
                      echo  '</span>';
                    echo  '<p>';
                      echo esc_html( $label2 );
                      echo  '</p>';
                }
                ?>
            </figcaption>
          </figure>
        </a>
      </section>
    <?php endif;?>

    <?php if( !empty($category_img3) ): ?>

      <?php $categories3 = get_categories( array(
        'orderby' => 'name',
        'show_count' => true,
        'title_li'     => '',
        'style'               => 'none',
        'include' => array( $category3 )
      ) );?>
    <section class="cell large-auto medium-12 small-24 wow animated fadeIn"  >
        <a href="<?php foreach ( $categories3 as $cat ) { echo  esc_url( get_category_link( $cat->term_id ) ); } ?> ">
        <figure class="tilter__figure">
          <img class="tilter__image" src="<?php echo esc_url($category_img3); ?>" />
          <div class="tilter__deco tilter__deco--shine"><div></div></div>
          <figcaption class="tilter__caption">
              <?php
              foreach ( $categories3 as $cat ) {
                    echo '<h3 class="tilter__title">'  .esc_html( $cat->name ). '</h3>';
                    echo  '<span>';
                  echo esc_html( $cat->count );
                    echo  '</span>';
                  echo  '<p>';
                    echo esc_html( $label3 );
                    echo  '</p>';
              }
              ?>
          </figcaption>
        </figure>
      </a>
    </section>
  <?php endif;?>

        </div>
  <?php
  echo $after_widget;
  }

public function update( $new_instance, $old_instance ) {
  $instance = $old_instance;
  $instance[ 'category' ]	= absint( $new_instance[ 'category' ] );
  $instance['category_img1'] = esc_url_raw($new_instance['category_img1']);
  $instance[ 'label' ] = sanitize_text_field( $new_instance[ 'label' ] );

// cat 2
$instance[ 'category2' ]	= absint( $new_instance[ 'category2' ] );
$instance['category_img2'] = esc_url_raw($new_instance['category_img2']);
$instance[ 'label2' ] = sanitize_text_field( $new_instance[ 'label2' ] );

// cat 3
$instance[ 'category3' ]	= absint( $new_instance[ 'category3' ] );
$instance['category_img3'] = esc_url_raw($new_instance['category_img3']);
$instance[ 'label3' ] = sanitize_text_field( $new_instance[ 'label3' ] );


  return $instance;
}

function form($instance) {

  $number_posts    = isset( $instance['number_posts'] ) ? absint( $instance['number_posts'] ) : 5;

        $instance = wp_parse_args((array) $instance, $this->defaults); ?>

 <h3> <?php esc_html_e('Image size should be 360 x 360 px', 'magazine-art' ) ?></h3>

  <h4 class="magart-widheading"> <?php esc_html_e('Category 1', 'magazine-art' ) ?></h4>

  <p>
    <label><?php esc_html_e( 'Select a post category (category 1)', 'magazine-art' ); ?></label>
      <?php $args = array(
	       'orderby'            => 'ID',
	       'order'              => 'ASC',
	       'show_count'         => 1,
	       'hide_empty'         => 1,
	       'selected'           => $instance['category'],
	       'hierarchical'       => 0,
	       'name'               => $this->get_field_name('category'),
	       'taxonomy'           => 'category',
	       'value_field'	     => 'term_id',
         'option_none_value' => -1,

       );?>
    <?php wp_dropdown_categories( $args ); ?>
  </p>

  <p>
    <div class="widget_input_wrap">
        <label for="<?php echo $this->get_field_id( 'category_img1' ); ?>"><?php _e('Background Image ', 'magazine-art') ?></label>
        <div class="media-picker-wrap">
        <?php if(!empty($instance['category_img1'])) { ?>
            <img style="max-width:100%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['category_img1']); ?>" />
            <i class="fa fa-times media-picker-remove"></i>
        <?php } ?>

        <input class="widefat media-picker" id="<?php echo $this->get_field_id( 'category_img1' ); ?>" name="<?php echo $this->get_field_name( 'category_img1' ); ?>" value="<?php if( !empty($instance['category_img1']) ): echo $instance['category_img1']; endif; ?>" type="hidden" />
        <a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'content_bgimage1' ).'mpick'; ?>"><?php _e('Select Image', 'magazine-art') ?></a>
        </div>
    </div>
  </p>
  <p>
    <label for="<?php echo $this->get_field_id( 'label' ); ?>"><?php esc_html_e( 'Label:', 'magazine-art' ); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'label' ); ?>" name="<?php echo $this->get_field_name( 'label' ); ?>" value="<?php echo esc_attr($instance['label']); ?>"/>
  </p>

  <h4 class="magart-widheading"> <?php _e('Category 2', 'magazine-art' ) ?></h4>

  <p>
    <label><?php esc_html_e( 'Select a post category (category 2)', 'magazine-art' ); ?></label>
      <?php $args = array(
        'show_option_none' => __( 'Select category', 'magazine-art' ),
         'orderby'            => 'ID',
         'order'              => 'ASC',
         'show_count'         => 1,
         'hide_empty'         => 1,
         'selected'           => $instance['category2'],
         'hierarchical'       => 0,
         'name'               => $this->get_field_name('category2'),
         'taxonomy'           => 'category',
         'value_field'	     => 'term_id',
       );?>
    <?php wp_dropdown_categories( $args ); ?>
  </p>

  <p>
    <div class="widget_input_wrap">
        <label for="<?php echo $this->get_field_id( 'category_img2' ); ?>"><?php _e('Background Image ', 'magazine-art') ?></label>
        <div class="media-picker-wrap">
        <?php if(!empty($instance['category_img2'])) { ?>
            <img style="max-width:100%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['category_img2']); ?>" />
            <i class="fa fa-times media-picker-remove"></i>
        <?php } ?>

        <input class="widefat media-picker" id="<?php echo $this->get_field_id( 'category_img2' ); ?>" name="<?php echo $this->get_field_name( 'category_img2' ); ?>" value="<?php if( !empty($instance['category_img2']) ): echo $instance['category_img2']; endif; ?>" type="hidden" />
        <a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'content_bgimage2' ).'mpick'; ?>"><?php _e('Select Image', 'magazine-art') ?></a>
        </div>
    </div>
  </p>
  <p>
    <label for="<?php echo $this->get_field_id( 'label2' ); ?>"><?php esc_html_e( 'Label:', 'magazine-art' ); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'label2' ); ?>" name="<?php echo $this->get_field_name( 'label2' ); ?>" value="<?php echo esc_attr($instance['label2']); ?>"/>
  </p>


  <h4 class="magart-widheading"> <?php _e('Category 3', 'magazine-art' ) ?></h4>

  <p>
    <label><?php esc_html_e( 'Select a post category (category 3)', 'magazine-art' ); ?></label>
      <?php $args = array(
        'show_option_none' => __( 'Select category', 'magazine-art' ),
         'orderby'            => 'ID',
         'order'              => 'ASC',
         'show_count'         => 1,
         'hide_empty'         => 1,
         'selected'           => $instance['category3'],
         'hierarchical'       => 0,
         'name'               => $this->get_field_name('category3'),
         'taxonomy'           => 'category',
         'value_field'	     => 'term_id',
       );?>
    <?php wp_dropdown_categories( $args ); ?>
  </p>

  <p>
    <div class="widget_input_wrap">
        <label for="<?php echo $this->get_field_id( 'category_img3' ); ?>"><?php _e('Background Image ', 'magazine-art') ?></label>
        <div class="media-picker-wrap">
        <?php if(!empty($instance['category_img3'])) { ?>
            <img style="max-width:100%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['category_img3']); ?>" />
            <i class="fa fa-times media-picker-remove"></i>
        <?php } ?>

        <input class="widefat media-picker" id="<?php echo $this->get_field_id( 'category_img3' ); ?>" name="<?php echo $this->get_field_name( 'category_img3' ); ?>" value="<?php if( !empty($instance['category_img3']) ): echo $instance['category_img3']; endif; ?>" type="hidden" />
        <a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'content_bgimage3' ).'mpick'; ?>"><?php _e('Select Image', 'magazine-art') ?></a>
        </div>
    </div>
  </p>
  <p>
    <label for="<?php echo $this->get_field_id( 'label3' ); ?>"><?php esc_html_e( 'Label:', 'magazine-art' ); ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'label3' ); ?>" name="<?php echo $this->get_field_name( 'label3' ); ?>" value="<?php echo esc_attr($instance['label3']); ?>"/>
  </p>
  <?php
    }
  }
}


function magazineart_latest_magazineart_category_thum() {
    register_widget( 'magazineart_category_thum' );
}
add_action( 'widgets_init', 'magazineart_latest_magazineart_category_thum' );
