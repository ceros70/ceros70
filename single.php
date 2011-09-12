<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
   <?php $gen=get_the_category(get_the_id());
   if($gen[0]->slug == "ciencia-y-tecnologia"){?>
   <div id="primary" class="techno">
   <?php }elseif($gen[0]->slug == "ciudad-y-medio-ambiente"){ ?>
   <div id="primary" class="ciuamb">
   <?php }elseif($gen[0]->slug == "cultura-y-medios"){ ?>
   <div id="primary" class="culmed">
   <?php }elseif($gen[1]->slug == "politica-y-economia"){ ?>
   <div id="primary" class="poli">
   <?php //}elseif($gen[0]->slug == "destacadas"){ ?>
   <!--<div id="primary" class="techno">-->
   <?php }elseif($gen[0]->slug == "blog"){ ?>
   <div id="primary" class="blg">
   <?php }else{?>
		<div id="primary" class="blg">
		<?php } ?>
			<div id="content" role="main">
				<?php while ( have_posts() ) : the_post(); ?>

					<!--<nav id="nav-single">
						<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
						<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'twentyeleven' ) ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></span>
					</nav> #nav-single -->

					<?php get_template_part( 'content', 'single' ); ?>

					<?php //comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>