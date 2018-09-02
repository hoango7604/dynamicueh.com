<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package magazineart
 */

?>
<?php if ( is_front_page() && is_home() ):?>
	<?php	$blogpost_style = get_theme_mod('layout_font_post','content1');?>
  <?php else : ?>
	<?php	$blogpost_style = get_theme_mod('layout_page_gen','content1');?>
	<?php endif; ?>
 
		<?php if( $blogpost_style == 'content1' ):?>
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
			          <?php if ( true == get_theme_mod( 'checkbox_cat_box', true ) ) : ?>
			            <?php magazineart_category_list(); ?>
			          <?php endif; ?>
			          <?php the_title( sprintf( '<h3 class="post-title"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
			        </div>
			        <div class="post-excerpt">
			          <?php the_excerpt(); ?>
			        </div>
			        <?php if ( true == get_theme_mod( 'checkbox_date_au_box', true ) || true == get_theme_mod( 'checkbox_share_box', true )) : ?>
			          <div class="media-object  align-bottom">
			            <div class="post-meta-footer top-bar">
			              <?php if ( true == get_theme_mod( 'checkbox_date_au_box', true ) ) : ?>
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
			              <?php endif; ?>
			              <?php if ( true == get_theme_mod( 'checkbox_share_box', true ) ) : ?>
			                <div class="meta-right <?php if ( true == get_theme_mod( 'checkbox_date_au_box', true ) ) : ?>top-bar-right <?php endif; ?>">
			                  <div class="share">
			                    <div class="post-social-share">
			                      <?php echo magazineart_social_share_icons(); ?>
			                    </div>
			                  </div>
			                </div>
			              <?php endif; ?>
			            </div>
			          </div>
			        <?php endif; ?>
			      </div>
			    </div>
			  </div>
			</article>
		<?php else: ?>
			<div class="post-classic-2-warp ">
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
					<?php if ( true == get_theme_mod( 'checkbox_cat_box', true ) ) : ?>
						<?php magazineart_category_list(); ?>
					<?php endif; ?>
					<?php the_title(sprintf('<h3 class="post-title"><a class="post-title-link" href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>
					<div class="post-excerpt">
						<?php the_excerpt(); ?>
					</div>
					<?php if ( true == get_theme_mod( 'checkbox_date_au_box', true ) || true == get_theme_mod( 'checkbox_share_box', true )) : ?>
						<div class="post-meta-footer top-bar">
							<?php if ( true == get_theme_mod( 'checkbox_date_au_box', true ) ) : ?>
								<div class="meta-left top-bar-left">
									<span class="date">
										<span class="by">
											<?php echo magazineart_time_link(); ?>
										</span>
									</span>
									<span class="sep">•</span>
									<span class="author">
										<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr(get_the_author()); ?>">
											<span>
												<?php echo get_the_author();?>
											</span>
										</a>
									</span>
								</div>
							<?php endif; ?>
							<?php if ( true == get_theme_mod( 'checkbox_share_box', true ) ) : ?>
								<div class="meta-right <?php if ( true == get_theme_mod( 'checkbox_date_au_box', true ) ) : ?>top-bar-right <?php endif; ?>">
									<div class="share">
										<div class="post-social-share">
											<?php echo magazineart_social_share_icons(); ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
