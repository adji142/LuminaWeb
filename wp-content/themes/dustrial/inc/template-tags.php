<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package dustrial
 */

if ( ! function_exists( 'dustrial_posts_navigation' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function dustrial_posts_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation next-prev" role="navigation">

		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
				<div class="nav-previous old-entries"><i class="fa fa-angle-left"></i><?php next_posts_link( esc_html__( 'Older posts', 'dustrial' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
				<div class="nav-next new-entries"><?php previous_posts_link( esc_html__( 'Newer posts', 'dustrial' ) ); ?> <i class="fa fa-angle-right"></i></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'dustrial_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function dustrial_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'dustrial' ); ?></h2>
		<div class="nav-links">
			<?php
			previous_post_link( '<div class="nav-previous">%link</div>', '%title' );
			next_post_link( '<div class="nav-next">%link</div>', '%title' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'dustrial_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function dustrial_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( ' %s', 'post date', 'dustrial' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( ' %s', 'post author', 'dustrial' ),
		'<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
	);

	echo '<li class="d-inline-block align-items-center"><i class="fa fa-clock-o" aria-hidden="true"></i> '. $posted_on .'</li>
          <li class="d-inline-block  align-items-center"><i class="fa fa-user-o" aria-hidden="true"></i> ' . $byline . '</li>';

}
endif;

/**  dustrial meta.
--------------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'dustrial_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function dustrial_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'dustrial' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><i class="fa fa-tags"></i> ' . esc_html__( ' %1$s', 'dustrial' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'dustrial' ), esc_html__( '1 Comment', 'dustrial' ), esc_html__( '% Comments', 'dustrial' ) );
		echo '</span>';
	}

	edit_post_link( esc_html__( 'Edit', 'dustrial' ), '<span class="edit-link">', '</span>' );
}
endif;


if ( ! function_exists( 'dustrial_archive_page_title' ) ) :
/**
 * Shim for `dustrial_archive_page_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function dustrial_archive_page_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( esc_html__( '%s', 'dustrial' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( esc_html__( '%s', 'dustrial' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( esc_html__( '%s', 'dustrial' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( esc_html__( '%s', 'dustrial' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'dustrial' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( esc_html__( '%s', 'dustrial' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'dustrial' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( esc_html__( '%s', 'dustrial' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'dustrial' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = esc_html_x( 'Asides', 'post format archive title', 'dustrial' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = esc_html_x( 'Galleries', 'post format archive title', 'dustrial' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = esc_html_x( 'Images', 'post format archive title', 'dustrial' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = esc_html_x( 'Videos', 'post format archive title', 'dustrial' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = esc_html_x( 'Quotes', 'post format archive title', 'dustrial' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = esc_html_x( 'Links', 'post format archive title', 'dustrial' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = esc_html_x( 'Statuses', 'post format archive title', 'dustrial' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = esc_html_x( 'Audio', 'post format archive title', 'dustrial' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = esc_html_x( 'Chats', 'post format archive title', 'dustrial' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( esc_html__( 'Archives: %s', 'dustrial' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( esc_html__( '%1$s: %2$s', 'dustrial' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = esc_html__( 'Archives', 'dustrial' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_dustrial_archive_page_title', $title );

	if ( ! empty( $title ) ) {
		echo wp_kses_stripslashes( $before . $title . $after );  // WPCS: XSS OK.
	}
}
endif;



if ( ! function_exists( 'dustrial_archive_title' ) ) :
/**
 * Shim for `dustrial_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function dustrial_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( esc_html__( 'Category: %s', 'dustrial' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( esc_html__( 'Tag: %s', 'dustrial' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( esc_html__( 'Author: %s', 'dustrial' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( esc_html__( 'Year: %s', 'dustrial' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'dustrial' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( esc_html__( 'Month: %s', 'dustrial' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'dustrial' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( esc_html__( 'Day: %s', 'dustrial' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'dustrial' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = esc_html_x( 'Asides', 'post format archive title', 'dustrial' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = esc_html_x( 'Galleries', 'post format archive title', 'dustrial' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = esc_html_x( 'Images', 'post format archive title', 'dustrial' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = esc_html_x( 'Videos', 'post format archive title', 'dustrial' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = esc_html_x( 'Quotes', 'post format archive title', 'dustrial' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = esc_html_x( 'Links', 'post format archive title', 'dustrial' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = esc_html_x( 'Statuses', 'post format archive title', 'dustrial' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = esc_html_x( 'Audio', 'post format archive title', 'dustrial' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = esc_html_x( 'Chats', 'post format archive title', 'dustrial' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( esc_html__( 'Archives: %s', 'dustrial' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( esc_html__( '%1$s: %2$s', 'dustrial' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = esc_html__( 'Archives', 'dustrial' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_dustrial_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo wp_kses_stripslashes( $before . $title . $after );  // WPCS: XSS OK.
	}
}
endif;


if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo wp_kses_stripslashes( $before . $description . $after );  // WPCS: XSS OK.
	}
}
endif;


/*------------------------------------------------------------------------------------------------------------------*/
/*  Beardcrumb Meta Setting
/*------------------------------------------------------------------------------------------------------------------*/ 

/*
 * WordPress Meta Breadcrumbs
 * author: Johanspond
 * version: 1.0.0
 * date: 12.08.2018
 * license: MIT Licence
*/
function dustrial_meta_breadcrumbs() {

    /* === OPTIONS === */
    $text['home']     = esc_html__( 'Home', 'dustrial' ); // text for the 'Home' link
    $text['category'] = esc_html__( 'Archive by Category: %s', 'dustrial' ); // text for a category page
    $text['search']   = esc_html__( 'Search Results for: %s', 'dustrial' ); // text for a search results page
    $text['tag']      = esc_html__( 'Posts Tagged: %s', 'dustrial' ); // text for a tag page
    $text['author']   = esc_html__( 'Posted by %s', 'dustrial' ); // text for an author page
    $text['404']      = esc_html__( 'Error 404', 'dustrial' ); // text for the 404 page
    $text['page']     = esc_html__( 'Page %s', 'dustrial' ); // text 'Page N'
    $text['cpage']    = esc_html__( 'Comment Page %s', 'dustrial' ); // text 'Comment Page N'

    $wrap_before    = '<div class="breadcrumbs">'; // the opening wrapper tag
    $wrap_after     = '</div><!-- .breadcrumbs -->'; // the closing wrapper tag
    $sep            = '<i class="fa fa-angle-right" aria-hidden="true"></i>'; // separator between crumbs
    $sep_before     = '<span class="sep">'; // tag before separator
    $sep_after      = '</span>'; // tag after separator
    $show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
    $show_on_home   = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $show_current   = 1; // 1 - show current page title, 0 - don't show
    $before         = '<span class="current">'; // tag before the current crumb
    $after          = '</span>'; // tag after the current crumb
    /* === END OF OPTIONS === */

    global $post;
    $home_url       = home_url('/');
    $link_before    = '<span class="breadcrumb-info">';
    $link_after     = '</span>';
    $link_attr      = ' ';
    $link_in_before = '<span class="name">';
    $link_in_after  = '</span>';
    $link           = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
    $frontpage_id   = get_option('page_on_front');
    $parent_id      = ($post) ? $post->post_parent : '';
    $sep            = ' ' . $sep_before . $sep . $sep_after . ' ';
    $home_link      = $link_before . '<a href="' . $home_url . '"' . $link_attr . ' class="home">' . $link_in_before . $text['home'] . $link_in_after . '</a>' . $link_after;

    if (is_home() || is_front_page()) {
		$page_for_posts_id = get_option('page_for_posts');
        if ( $page_for_posts_id ) {
            $post = get_page($page_for_posts_id);
            setup_postdata($post);
            the_title();
            rewind_posts();
        } else {
            echo get_bloginfo( 'name' );
        }

    } else {

        echo wp_kses_stripslashes($wrap_before);
        if ($show_home_link) echo wp_kses_stripslashes( $home_link );

        if ( is_category() ) {
            $cat = get_category(get_query_var('cat'), false);
            if ($cat->parent != 0) {
                $cats = get_category_parents($cat->parent, TRUE, $sep);
                $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
                if ($show_home_link) echo wp_kses_stripslashes( $sep );
                echo wp_kses_stripslashes( $cats );
            }
            if ( get_query_var('paged') ) {
                $cat = $cat->cat_ID;
                echo wp_kses_stripslashes( $sep ) . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_current) echo wp_kses_stripslashes( $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after );
            }

        } elseif ( is_search() ) {
            if (have_posts()) {
                if ($show_home_link && $show_current) echo wp_kses_stripslashes( $sep );
                if ($show_current) echo wp_kses_stripslashes( $before . sprintf($text['search'], get_search_query()) . $after );
            } else {
                if ($show_home_link) echo wp_kses_stripslashes( $sep );
                echo wp_kses_stripslashes( $before . sprintf($text['search'], get_search_query()) . $after );
            }

        } elseif ( is_day() ) {
            if ($show_home_link) echo wp_kses_stripslashes( $sep );
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
            echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
            if ($show_current) echo wp_kses_stripslashes( $sep . $before . get_the_time('d') . $after );

        } elseif ( is_month() ) {
            if ($show_home_link) echo wp_kses_stripslashes( $sep );
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
            if ($show_current) echo wp_kses_stripslashes( $sep . $before . get_the_time('F') . $after );

        } elseif ( is_year() ) {
            if ($show_home_link && $show_current) echo wp_kses_stripslashes( $sep );
            if ($show_current) echo wp_kses_stripslashes( $before . get_the_time('Y') . $after );

        } elseif ( is_single() && !is_attachment() ) {
            if ($show_home_link) echo wp_kses_stripslashes( $sep );
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                if( function_exists( 'dustrial_framework_init' ) ) {
                    $service_post_slug = dustrial_get_option('service_post_slug');
                    $project_post_slug = dustrial_get_option('project_post_slug');
                    if ( is_singular( 'service' ) ) {
                        printf( $link, $home_url . $slug['slug'] . '/', $service_post_slug );
                    } elseif ( is_singular( 'our_project' ) ) {
                        printf( $link, $home_url . $slug['slug'] . '/', $project_post_slug );
                    } else {
                       printf($link, $home_url . $slug['slug'] . '/', $post_type->labels->singular_name);
                    }
                } else {
                	printf($link, $home_url . $slug['slug'] . '/', $post_type->labels->singular_name);
                }
                if ($show_current) echo wp_kses_stripslashes( $sep . $before . get_the_title() . $after );
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $sep);
                if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
                echo wp_kses_stripslashes( $cats );
                if ( get_query_var('cpage') ) {
                    echo wp_kses_stripslashes( $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after );
                } else {
                    if ($show_current) echo wp_kses_stripslashes( $before . get_the_title() . $after );
                }
            }

        // custom post type
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            if ( get_query_var('paged') ) {
                echo wp_kses_stripslashes( $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after );
            } elseif(!empty($post_type)) {
                if ($show_current) echo wp_kses_stripslashes( $sep . $before . $post_type->label . $after );
            } else {
            	echo wp_kses_stripslashes ( $sep . $before . esc_html__( 'There have no posts', 'dustrial' ) . $after );
            }

        } elseif ( is_attachment() ) {
            if ($show_home_link) echo wp_kses_stripslashes( $sep );
            $parent = get_post($parent_id);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            if ($cat) {
                $cats = get_category_parents($cat, TRUE, $sep);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
                echo wp_kses_stripslashes( $cats );
            }
            printf($link, get_permalink($parent), $parent->post_title);
            if ($show_current) echo wp_kses_stripslashes( $sep . $before . get_the_title() . $after );

        } elseif ( is_page() && !$parent_id ) {
            if ($show_current) echo wp_kses_stripslashes( $sep . $before . get_the_title() . $after );

        } elseif ( is_page() && $parent_id ) {
            if ($show_home_link) echo wp_kses_stripslashes( $sep );
            if ($parent_id != $frontpage_id) {
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    if ($parent_id != $frontpage_id) {
                        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                    }
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    echo wp_kses_stripslashes( $breadcrumbs[$i] );
                    if ($i != count($breadcrumbs)-1) echo wp_kses_stripslashes( $sep );
                }
            }
            if ($show_current) echo wp_kses_stripslashes( $sep . $before . get_the_title() . $after );

        } elseif ( is_tag() ) {
            if ( get_query_var('paged') ) {
                $tag_id = get_queried_object_id();
                $tag = get_tag($tag_id);
                echo wp_kses_stripslashes( $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after );
            } else {
                if ($show_current) echo wp_kses_stripslashes( $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after );
            }

        } elseif ( is_author() ) {
            global $author;
            $author = get_userdata($author);
            if ( get_query_var('paged') ) {
                if ($show_home_link) echo wp_kses_stripslashes( $sep );
                echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_home_link && $show_current) echo wp_kses_stripslashes( $sep );
                if ($show_current) echo wp_kses_stripslashes( $before . sprintf($text['author'], $author->display_name) . $after );
            }

        } elseif ( is_404() ) {
            if ($show_home_link && $show_current) echo wp_kses_stripslashes( $sep );
            if ($show_current) echo wp_kses_stripslashes( $before . $text['404'] . $after );

        } elseif ( has_post_format() && !is_singular() ) {
            if ($show_home_link) echo wp_kses_stripslashes( $sep );
            echo get_post_format_string( get_post_format() );
        }

        echo wp_kses_stripslashes( $wrap_after );

    }
} // end of dustrial_meta_breadcrumbs()



/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function dustrial_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'dustrial_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
			) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'dustrial_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so dustrial_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so dustrial_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in dustrial_categorized_blog.
 */
function dustrial_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'dustrial_categories' );
}
add_action( 'edit_category', 'dustrial_category_transient_flusher' );
add_action( 'save_post',     'dustrial_category_transient_flusher' );


/*-----------------------------------------------------------------------------------*/
/*	Display navigation to next/previous set of posts when applicable.  
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'dustrial_paging_nav' ) ) :

	function dustrial_paging_nav($pages = '', $range = 2) {

		$showitems = ($range * 1)+1;  
		global $paged;
		if(empty($paged)) $paged = 1;
		if($pages == ''){
			global $wp_query;
			$pages = $wp_query->max_num_pages;

			if(!$pages){
				$pages = 1;
			}
		}

		if(1 != $pages){
			echo '<div class="col-md-12"><div class="d-flex justify-content-center pagination_waper"><nav aria-label="Page navigation ct-pagination"><ul class="pagination">';

				if($paged > 2 && $paged > $range+1 && $showitems < $pages){
					echo '<li class="page-item disabled"><a class="bp-prev page-link" href="'.get_pagenum_link(1).'">' . esc_html__( '«', 'dustrial' ) . '</a></li>';
				}
				for ($i=1; $i <= $pages; $i++){
					if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
						echo wp_kses_stripslashes($paged == $i)? "<li class=\"page-item active\"><a href='#' class='page-link activeborder'>".$i."</a></li>":"<li class=\"page-item\"><a href='".get_pagenum_link($i)."' class='page-link'>".$i."</a></li>";
					}
				}
				if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
					echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($pages).'">' . esc_html__( '»', 'dustrial' ) . '</a></li>';
				}
				echo '</ul></nav></div></div>';
		}
	}

endif;


/*-----------------------------------------------------------------------------------*/
/*	Display navigation to next/previous set of posts when applicable.  
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'dustrial_project_paging_nav' ) ) :

	function dustrial_project_paging_nav($pages = '', $range = 2) {

		$showitems = ($range * 1)+1;  

		global $paged;

		if(empty($paged)) $paged = 1;

		if($pages == ''){
			global $the_query;
			$pages = $the_query->max_num_pages;

			if(!$pages){
				$pages = 1;
			}
		}   

		if(1 != $pages){

			echo '<div class="col-md-12"><div class="d-flex justify-content-center pagination_waper"><nav aria-label="Page navigation ct-pagination"><ul class="pagination">';

				if($paged > 2 && $paged > $range+1 && $showitems < $pages){
					echo '<li class="page-item disabled"><a class="bp-prev page-link" href="'.get_pagenum_link(1).'">' . esc_html__( '«', 'dustrial' ) . '</a></li>';
				}

				for ($i=1; $i <= $pages; $i++)
				{
					if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
					{
						echo wp_kses_stripslashes($paged == $i)? "<li class=\"page-item active\"><a href='#' class='page-link activeborder'>".$i."</a></li>":"<li class=\"page-item\"><a href='".get_pagenum_link($i)."' class='page-link'>".$i."</a></li>";
					}
				}

				if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
					echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($pages).'">' . esc_html__( '»', 'dustrial' ) . '</a></li>';
				}

				echo '</ul></nav></div></div>';

		}

	}

endif;



/*------------------------------------------------------------------------------------------------------------------*/
/*	Post Meta
/*------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'dustrial_post_meta' ) ) :

	function dustrial_post_meta() { ?>

		<ul class="post-mate ul-li mb-40">
	        <li>
	            <a>
	                <span class="hero-img">
	                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
	                </span>
	                <?php the_author(); ?>
	            </a>
	        </li>
	        <li>
	            <i class="ion-calendar"></i>
	            <?php echo get_the_date(); ?>
	        </li>
	        <?php if (function_exists('dustrial_post_like_get_simple_likes_button')) { ?>
		        <li>
		            <?php echo dustrial_post_like_get_simple_likes_button( get_the_ID() ); ?>
		        </li>
	        <?php } ?>
	        <li>
	            <a href="<?php the_permalink(); ?>">
	                <i class="ion-android-textsms"></i>
	                <?php comments_number( '0', '1', '%' ); ?>
	            </a>
	        </li>
	    </ul>

<?php }
endif;