<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(clearfix); ?>>
		<header class="entry-header">
			<?php if ( is_sticky() ) : ?>
				<hgroup>
					<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
					<h3 class="entry-format"><?php _e( 'Featured', 'twentyeleven' ); ?></h3>
				</hgroup>
			<?php else : ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php endif; ?>

			<?php /*if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php twentyeleven_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif;*/ ?>

			<?php /* if ( comments_open() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Reply', 'twentyeleven' ) . '</span>', _x( '1', 'comments number', 'twentyeleven' ), _x( '%', 'comments number', 'twentyeleven' ) ); ?>
			</div>
			<?php endif;*/ ?>
		</header><!-- .entry-header -->

		<?php /*if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else :*/ ?>
		<div class="entry-content">
		<?php $metapost = get_post_custom(get_the_id());?>
		<div class="lcontent">
		<div class="info">
      <?php //$sub=get_terms('genero');?>
      <?php //$sub=wp_get_post_terms( $post->ID, 'genero');?>
        <!--<span class="taxo-name"><?php //echo $sub[0]->name;?></span>-->
        <p class="autor"><?php if($metapost['author_name'][0] != ""){ echo "Por  ".$metapost['author_name'][0]; }else{ echo "Por  ".get_the_author();}?></p>
        <p class="dtpost"><?php echo date('d/m/Y',strtotime($post->post_date)); ?></p>
        <div class="share"><?php echo simple_social_bookmarks('','','','default=off&twitter=on&facebook=on&printfriendly=on&iconfolder=images/24x24&target=_blank'); ?></div>
        <!--<div id="fb-root"></div>
         <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="" send="false" width="250" show_faces="false" action="recommend" font="verdana"></fb:like>-->
    </div>
    <div class="bcontent">
      <?php $uid = get_the_author_ID();
      $useriimage = get_user_meta($uid, "author_image", true);?>
      <?php if($useriimage!=""){ ?>
      <img src="<?php echo get_site_url();?>/wp-content/authors/<?php echo $useriimage; ?>"  align="left" width="<?php echo USER_THUMB_WIDTH ?>" height="72px"/>
      <?php }else{?>
      <img src="<?php bloginfo('template_url'); ?>/images/default.png" alt=""/>
      <?php } ?>
      <?php the_excerpt(); ?>
      <div class="rmore" style="clear:both;"><a href="<?php the_permalink();?>">LEER MÁS.</a></div>
     </div>
     </div><!--lcontent-->
     <div class="rcontent">
      <?php
      if($metapost['quote'][0] != ""){ ?>
        <div class="quote">
        <?php echo "\"".$metapost['quote'][0]."\""; ?>
        </div>
      <?php } ?>
     </div>
		</div><!-- .entry-content -->
		<?php //endif; ?>

		<footer class="entry-meta">

		</footer><!-- #entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->
