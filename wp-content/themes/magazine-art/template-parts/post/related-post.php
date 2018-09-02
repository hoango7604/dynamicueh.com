  <?php
  $orig_post = $post;
  global $post;
  $categories = get_the_category($post->ID);
  if ($categories) {
    $category_ids = array();
    foreach ($categories as $individual_category) {
      $category_ids[] = $individual_category->term_id;
    }
    $args=array(
      'category__in' => $category_ids,
      'post__not_in' => array($post->ID),
      'posts_per_page'=> 4, // Number of related posts that will be shown.
      'ignore_sticky_posts'   => true
    );
    $related_query = new wp_query($args);
    $related_post_title =  get_theme_mod('related_post_title',esc_attr__('You Might Also Like','magazine-art'));
    ?>
    <div class="single-post-box-related">
      <?php if ($related_query->have_posts() && !empty($related_post_title)) : ?>
      <div class="grid-x grid-margin-x grid-padding-y ">
        <div class="cell small-24 ">
          <div class="block-title">
            <h3 class="blog-title"><?php echo esc_html($related_post_title); ?></h3>
          </div>
        </div>
      </div>
    <?php endif;?>
      <div class="related-post-wrap">
        <div class="grid-x grid-padding-x  ">
          <?php if ($related_query->have_posts()) : ?>
            <?php /* Start the Loop */ ?>
            <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
              <div class="cell large-12 small-24 ">
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
               if (has_post_thumbnail()) {
                  echo '<div class="post-thumb">';
              the_post_thumbnail('magazineart-list-post', array('class' => 'img','link_thumbnail' =>TRUE,));
              echo '<div class="post-thumb-overlay"></div></div>';

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
                <div class="post-header-absolute <?php if (! has_post_thumbnail()) {?> no-thumimage <?php }?>">
                  <div class="post-head">
                    <?php magazineart_category_slider(); ?>
                    <?php the_title( sprintf( '<h3 class="post-title"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                    <?php echo magazineart_time_link(); ?>
                  </div>
                </div>
              </article>
              </div>
          <?php endwhile; ?>
          <?php else : ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  <?php }
