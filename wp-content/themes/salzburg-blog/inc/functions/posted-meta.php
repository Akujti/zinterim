<?php
if ( ! function_exists( 'salzburg_posted_meta' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 *
	 * @package Salzburg Blog
	 */
	function salzburg_posted_meta() {
		// Posted on.
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
			esc_html_x( '%s', 'post date', 'salzburg-blog' ),
			'<span class="posted-meta-time"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></span>'
		);

		$posted_by = sprintf(
			esc_html_x( '%s', 'post author', 'salzburg-blog' ),
			'<span class="posted-meta-author vcard">' . __( 'Posted by', 'salzburg-blog' ) . ' <a class="posted-meta-author-url" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		// Posted by
		$avatar = get_avatar_url( get_the_author_meta( 'email' ), array(
			'size' => '64',
			'default' => 'retro'
		) );
		$avatar_alt_text = esc_html__( 'Avatar image of ', 'salzburg-blog' );

		$output = '<div class="posted-meta">';
			$output .= '<div class="posted-meta-media">';
				$output .= '<img class="posted-meta-media" src="'. $avatar .'" alt="'. $avatar_alt_text .'">';
			$output .= '</div>';
			$output .= '<div class="posted-meta-body">';
				$output .= $posted_on;
				$output .= $posted_by;
			$output .= '</div>';
		$output .= '</div>';

		echo $output;
	}

endif;
