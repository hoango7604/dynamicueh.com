<?php
global $post;


/**
* Filter the except length to 20 characters.
*
* @param int $length Excerpt length.
* @return int (Maybe) modified excerpt length.
*/
function magazineart_custom_excerpt_length($length)
{
  if ( is_admin() ) {
    return $length;
  }

    return 40;
}
add_filter('excerpt_length', 'magazineart_custom_excerpt_length', 999);


/**
* Filter the excerpt "read more" string.
*
* @param string $more "Read more" excerpt string.
* @return string (Maybe) modified "read more" excerpt string.
*/
function magazineart_excerpt_more($more)
{
  if ( true == get_theme_mod( 'checkbox_button_readmore', false ) ) :
  if ( is_admin() ) {
    return $more;
    }
    return '<br /><a href="'.esc_url(get_permalink()).'" class="btn-read"> '.esc_html__('Read more','magazine-art').'</a>';
  else:
  if ( is_admin() ) {
    return $more;
    }
    return '...';
endif;
}
add_filter('excerpt_more', 'magazineart_excerpt_more');

/**
 * Link thumbnails to their posts based on attr
 *
 * @param $html
 * @param int $pid
 * @param int $post_thumbnail_id
 * @param int $size
 * @param array $attr
 *
 * @return string
 */

function magazineart_filter_post_thumbnail_html( $html, $pid, $post_thumbnail_id, $size, $attr ) {

     if ( ! empty( $attr[ 'link_thumbnail' ] ) ) {

        $html = sprintf(
            '<a class="img-link" href="%s" title="%s" rel="nofollow">%s</a>',
            esc_url(get_permalink( $pid )),
            esc_attr( get_the_title( $pid ) ),
            $html
        );
     }

    return $html;
}

add_filter( 'post_thumbnail_html', 'magazineart_filter_post_thumbnail_html', 10, 5 );


/**
* comments meta
*/
if (! function_exists('magazineart_meta_comment')) :
function magazineart_meta_comment()
{
    if (! post_password_required() && (comments_open() || get_comments_number())) {
        echo '<span class="comments-link">';
        /* translators: %s: post title */
        comments_popup_link(sprintf(wp_kses(__('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'magazine-art'), array( 'span' => array( 'class' => array() ) )), get_the_title()));
        echo '</span>';
    }
}
endif;


/**
* Use front-page.php when Front page displays is set to a static page.
*
* @since Magazine Art 1.0
*
* @param string $template front-page.php.
*
* @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
*/
function magazineart_front_page_template($template)
{
    return is_home() ? '' : $template;
}
add_filter('frontpage_template', 'magazineart_front_page_template');

/**
* Prints categories list.
*/
if (! function_exists('magazineart_category_list')) :
function magazineart_category_list()
{
    $categories = get_the_category();

    $output = '';
    if (is_single()) {
        $separator = '';
        if (! empty($categories)) {
            foreach ($categories as $category) {
                $output .=
                '<a class="post-single-cat" href="' . esc_url(get_category_link($category->term_id)) .
                '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'magazine-art'), $category->name)) . '">' . esc_html($category->name) . '</a>' . $separator;
            }
        }
    } else {
        $separator = '';
        if (! empty($categories)) {
            foreach ($categories as $category) {
                $output .=
                '<a class="label-border red " href="' . esc_url(get_category_link($category->term_id)) .
                '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'magazine-art'), $category->name)) . '">' . esc_html($category->name) . '</a>' . $separator;
            }
        }
    }
    echo trim($output, $separator);
}
endif;

// Print categories for slider_setup

if (! function_exists('magazineart_category_slider')) :
function magazineart_category_slider()
{
    $categories = get_the_category();

    $output = '';

        $separator = '';
        if (! empty($categories)) {
            foreach ($categories as $category) {
                $output .=
                '<a class="label" href="' . esc_url(get_category_link($category->term_id)) .
                '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'magazine-art'), $category->name)) . '">' . esc_html($category->name) . '</a>' . $separator;
            }
        }
    echo trim($output, $separator);
}
endif;




if (! function_exists('magazineart_meta_tag')) :
/**
* Prints HTML with meta information for the tags .
*/
function magazineart_meta_tag()
{

// Hide category and tag text for pages.
    if ('post' === get_post_type()) {
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list();
        if ($tags_list) {
            echo '<div class="single-tag-text">';
            _e('Tags:', 'magazine-art');
            echo '</div>';
            echo $tags_list;
        }
    }
}
endif;

if (! function_exists('magazineart_time_link')) :
/**
* Gets a nicely formatted string for the published date.
*/
function magazineart_time_link()
{
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    $time_string = sprintf(
      $time_string,
      get_the_date(DATE_W3C),
      get_the_date(),
      get_the_modified_date(DATE_W3C),
      get_the_modified_date()
    );
    $archive_year  = get_the_time('Y');
    $archive_month = get_the_time('m');


    // Wrap the time string in a link, and preface it with 'Posted on'.
    return sprintf(
      /* translators: %s: post date */
      __('<span class="screen-reader-text">Posted on</span> %s', 'magazine-art'),
      '<span class="meta-info-date"> <a href="' . esc_url(get_month_link($archive_year, $archive_month)) . '" rel="bookmark">' . $time_string . '</a></span>'
    );
}
endif;

/* Function which displays your post date in time ago format */
function magazineart_time_ago() {
	return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.esc_html__( 'ago','magazine-art' );
}

if (! function_exists('magazineart_author_bio')) :

function magazineart_author_bio()
{
    // Post meta author
    $author = sprintf(
      esc_html_x('Posts by: %s', 'post author', 'magazine-art'),
      esc_html(get_the_author())
    );
    echo  $author ;
}
endif;


if ( ! function_exists( 'magazineart_social_share_icons' ) ) :
	/**
	 * Social sharing icons for single view.
	 *
	 * @since magazine-art 1.0
	 */
	function magazineart_social_share_icons() {
    global $post;
		$post_link       = get_the_permalink();
		$post_title      = get_the_title();
    $img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );

		$social_links = '';
		$allowed_tags = array(
			'div' => array(
				'class' => array(),
			),
			'a'   => array(
				'href'                => array(),
				'target'              => array(),
				'title'               => array(),
				'type'                 => array(),
				'class'               => array(),
				'data-tooltip' => array(),
        'aria-haspopup'=> array(),
        'data-disable-hover'=> array(),
        'tabindex'=> array(),
        'data-positi'=> array(),
        'data-alignment'=> array(),
			),
			'i'   => array(
				'class' => array(),
			),
		);

			$social_links = '
			<div class="entry-social">
				<a target="_blank"  data-tooltip aria-haspopup="true"  data-disable-hover="false" tabindex="1" data-position="top" data-alignment="center" title="'. esc_attr( 'Share on Facebook', 'magazine-art' ) . '"   class="has-tip btn btn-round btn-just-icon btn-facebook"  href="https://www.facebook.com/sharer/sharer.php?u=' .esc_url( $post_link ) . '">
             <i class="fa fa-facebook"></i>
        </a>
				<a target="_blank" data-tooltip aria-haspopup="true"  data-disable-hover="false" tabindex="1" data-position="top" data-alignment="center"
				   title="' . esc_attr__( 'Share on Twitter', 'magazine-art' ) . '"
				   class="has-tip btn btn-round btn-just-icon btn-twitter"
				   href="https://twitter.com/home?status=' . wp_strip_all_tags( $post_title ) . ' - ' . esc_url( $post_link ) . '"><i
							class="fa fa-twitter">
            </i>
        </a>
				<a target="_blank" data-tooltip aria-haspopup="true"  data-disable-hover="false" tabindex="1" data-position="top" data-alignment="center"
				   title=" ' . esc_attr__( 'Share on Google+', 'magazine-art' ) . '"
				   class="has-tip btn btn-round btn-just-icon btn-round btn-google"
				   href="https://plus.google.com/share?url=' . esc_url( $post_link ) . '">
           <i class="fa fa-google"></i>
        </a>
        <a target="_blank" data-tooltip aria-haspopup="true"  data-disable-hover="false" tabindex="1" data-position="top" data-alignment="center"
           title=" ' . esc_attr__( 'Share on pinterest', 'magazine-art' ) . '"
           class="has-tip btn btn-round btn-just-icon btn-round btn-pinterest"
           href="http://pinterest.com/pin/create/button/?url=' . esc_url( $post_link ) . '&media='.$img_url[0].'">
           <i class="fa fa-pinterest"></i>
        </a>
        <a target="_blank" data-tooltip aria-haspopup="true"  data-disable-hover="false" tabindex="1" data-position="top" data-alignment="center"
				   title=" ' . esc_attr__( 'Share on LinkedIn', 'magazine-art' ) . '"
				   class="has-tip btn btn-round btn-just-icon btn-round btn-linkedin"
				   href="http://www.linkedin.com/shareArticle?mini=true&title='. wp_strip_all_tags( $post_title ) .'&url=' . esc_url( $post_link ) . '">
           <i class="fa fa-linkedin"></i>
        </a>


          </div>';


		echo apply_filters( 'magazineart_social_share_icons', wp_kses( $social_links, $allowed_tags ) );
	}
endif;

/**
 * Enable Foundation responsive embeds for WP video embeds
 */
if ( ! function_exists( 'magazineart_responsive_video_oembed_html' ) ) :
	function magazineart_responsive_video_oembed_html( $html, $url, $attr, $post_id ) {
		// Whitelist of oEmbed compatible sites that **ONLY** support video.
		// Cannot determine if embed is a video or not from sites that
		// support multiple embed types such as Facebook.
		// Official list can be found here https://codex.wordpress.org/Embeds
		$video_sites = array(
			'youtube', // first for performance
			'collegehumor',
			'dailymotion',
			'funnyordie',
			'ted',
			'videopress',
			'vimeo',
		);
		$is_video = false;
		// Determine if embed is a video
		foreach ( $video_sites as $site ) {
			// Match on `$html` instead of `$url` because of
			// shortened URLs like `youtu.be` will be missed
			if ( strpos( $html, $site ) ) {
				$is_video = true;
				break;
			}
		}
		// Process video embed
		if ( true == $is_video ) {
			// Find the `<iframe>`

			$class = 'responsive-embed widescreen'; // Foundation class
				// Wrap oEmbed markup in Foundation responsive embed
			return '<div class="' . esc_attr($class) . '">' . $html . '</div>';
		} else { // not a supported embed
			return $html;
		}
	}
	add_filter( 'embed_oembed_html', 'magazineart_responsive_video_oembed_html', 10, 4 );
endif;


if ( ! function_exists( 'magazineart_edit_link' ) ) :
	/**
	 * Returns an accessibility-friendly link to edit a post or page.
	 *
	 * This also gives us a little context about what exactly we're editing
	 * (post or page?) so that users understand a bit more where they are in terms
	 * of the template hierarchy and their content. Helpful when/if the single-page
	 * layout with multiple posts/pages shown gets confusing.
	 */
	function magazineart_edit_link() {
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'magazine-art' ),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

// filters for get_the_archive_title

function magazineart_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }

    return $title;
}

add_filter( 'get_the_archive_title', 'magazineart_archive_title' );
