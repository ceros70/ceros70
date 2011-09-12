<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<section id="primary">
			<div id="content" role="main">
			<?php if ( have_posts() ) : ?>  
				<header class="page-header">
					<h1 class="page-title"><?php
						//printf( __( 'Category Archives: %s', 'twentyeleven' ), '<span>' . single_cat_title( '', false ) . '</span>' );
					?></h1>

					<?php
						$category_description = category_description();
						if ( ! empty( $category_description ) )
							echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
					?>
				</header>

				<?php twentyeleven_content_nav( 'nav-above' ); ?>
         <div class="hmedia">
          <span><?php echo single_cat_title( '', false );?></span>
       <?php  // Check to see if the header image has been removed
        $header_image = get_header_image();
        if ( ! empty( $header_image ) ) :
      ?>
      <!--<a href="<?php //echo esc_url( home_url( '/' ) ); ?>">-->
        <?php
          // The header image<a href="<?php the_permalink(); ?>
          <?php  // Check if this is a post or page, if it has a thumbnail, and if it's a big one
          if ( is_singular() &&
              has_post_thumbnail( $post->ID ) &&
              ( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( HEADER_IMAGE_WIDTH, HEADER_IMAGE_WIDTH ) ) ) &&
              $image[1] >= HEADER_IMAGE_WIDTH ) :
            // Houston, we have a new header image!
            echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
          else : ?>
          <img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
        <?php endif; // end check for featured image or standard header ?>
      <!--</a>-->
      <?php endif; // end check for removed header image ?>
         </div>
				<?php /* Start the Loop */ ?>
    <?php
        query_posts(array_merge($wp_query->query, array(
            'paged'          => $paged,
            'posts_per_page' => $per_page)));
            $total_pages =  $wp_query->max_num_pages ;
            ?>
         <script type="text/javascript">
            paged = <?php echo $paged;?>;num_pages=<?php echo $wp_query->max_num_pages;?>;
         </script>
         <div id="blog_post">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>
				<div class="iload"><img src= "<?php echo get_site_url(); ?>/wp-content/themes/cerosetenta/images/loader.gif" /></div>
        </div>
				<?php //twentyeleven_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
