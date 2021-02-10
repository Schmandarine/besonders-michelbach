<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package besonders-michelbach
 */

function show_functions_images_function() {

	$output = "none";

	$terms_funktionen = get_terms( array(
		'taxonomy' => 'funktionen',
		'hide_empty' => false,
	) );
		if ( ! empty( $terms_funktionen ) ) {
			$output = '<div class="print-funktionen-icons-list-wrapper">';
			foreach ($terms_funktionen as $term) {
				$output .= '<div class="funktion-icon-wrapper">';
					$output .= '<div class="funktion-descr">'.$term->name.'</div>';
					$output .= '<img src="'.get_template_directory_uri(  ).'/assets/dist/img/'.$term->slug.'.svg" class="funktion-icon-item">';
				$output .= '</div>';
			}
			$output .= '</div>';
		}

		return $output;
}
add_shortcode('show_functions_images', 'show_functions_images_function');


if ( ! function_exists( 'besonders_brombach_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function besonders_brombach_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'besonders-michelbach' ),
			'<span>' . $time_string . '</span>'
		);

		echo '<div class="posted-on">' . $posted_on . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'besonders_brombach_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function besonders_brombach_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'besonders-michelbach' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'besonders_brombach_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function besonders_brombach_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'besonders-michelbach' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'besonders-michelbach' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'besonders-michelbach' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'besonders-michelbach' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'besonders-michelbach' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'besonders-michelbach' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;


if ( ! function_exists( 'besonders_brombach_post_categorys' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function besonders_brombach_post_categorys() {

			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'besonders-michelbach' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'besonders-michelbach' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

	}
endif;


if ( ! function_exists( 'besonders_brombach_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function besonders_brombach_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;






	function the_site_navigation() { ?>

			<div class="site-navigation-wrapper" data-visibility="hidden">
				<div class="bg-white">
					<div class="site-navigation-container">
						<div class="site-branding ">
							<?php the_custom_logo(); ?>
						</div>

						<div class="search-navi-wrapper ">
							<a class="searchform-trigger" id="search-trigger"><img src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/lupe-icon.svg"></a>
							<div id="search-form-wrapper" class="search-form-wrapper"><?php echo get_search_form(); ?></div>

							<div class="button-wrapper menu-toggle"><!-- Hamburger Menu -->
								<div id="hamburger-toggle">
									<div></div>
									<div></div>
									<div></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<nav id="site-navigation" class="main-navigation">
			
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'site_navigation_menu',
							'menu_class'	=> ''
						)
					);
					?>
				</nav><!-- #site-navigation -->

			</div>

	<?php } 