<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

// has taxonomy
function has_medio( $medio, $_post = null ) {
	if ( !empty( $medio ) )
		return false;

	if ( $_post )
		$_post = get_post( $_post );
	else
		$_post =& $GLOBALS['post'];

	if ( !$_post )
		return false;

	$r = is_object_in_term( $_post->ID, 'medio', $medio );

	if ( is_wp_error( $r ) )
		return false;

	return $r;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">	
		<h1 class="entry-title">
			<div>
				<span class="bold-text"> <?php $cat = get_the_category(get_the_id());
				if($cat[0]->cat_name=="Destacadas"){ echo $cat[1]->cat_name;}else{
				echo $cat[0]->cat_name;}?></span>
				<p><?php the_title(); ?></p>
			</div>
		</h1>
    <span class="shadow"></span>
  </header><!-- .entry-header -->
  
  <?php //if(is_attachment($post->id)){?>
  <?php //echo do_shortcode("[gallery link='file']");?>
  <?php //echo do_shortcode("[youtubeclass="rmore"=http://www.youtube.com/v/0s6D1_IkfiM]");exit;?>
  <?php $attach = get_posts(array('post_type'=>'attachment','post_parent'=>get_the_ID(),'post__not_in'=>array(get_post_thumbnail_id(get_the_ID()))));?>
  <?php if(get_post_meta(get_the_id(),'video_url',true) != ""){?>
    <div class="video"><?php echo get_post_meta(get_the_id(),'video_url',true);?></div>
  <?php }elseif(count($attach)>0 && is_object_in_term( get_the_ID(), 'medio', 'galeria' )){ ?>
    <?php echo do_shortcode("[gpslideshow post_id=".$post->id." caption='on']");?>
  <?php }elseif (has_post_thumbnail()){?>
      <div class="fimage">
       <?php //featured image
          the_post_thumbnail(array(SINGLE_IMAGE_WIDTH,SINGLE_IMAGE_WIDTH),array('align'=>'left','title'=>get_the_title($post->id)));?>
       </div>
      <?php } ?>
  <?php if(get_post_meta($post->ID, 'featured_text', true) != ""  && get_post_meta($post->ID, 'featured_url', true) != "" ){?>
  <div class="flink">
    <a href="<?php echo get_post_meta($post->ID, 'featured_url', true);?>" target="blank"><?php echo get_post_meta($post->ID, 'featured_text', true);?></a>
  </div>
  <?php }?> 
	<div class="entry-content">
	<?php $metapost = get_post_custom(get_the_id());?>
	<?php //echo do_shortcode("[scrollGallery id=1]");pgid=34 ?>
	<?php //echo do_shortcode("[gallery link='file']");?>
		<div class="lcontent">
		<div class="info">
		<?php //$sub=get_terms('genero');?>
		<?php $sub=wp_get_post_terms( $post->ID, 'genero');?>
			<span class="taxo-name"><?php echo $sub[0]->name;?></span>
			<p class="autor"><?php if($metapost['author_name'][0] != ""){ echo "Por  ".$metapost['author_name'][0]; }else{ echo "Por  ".get_the_author();}?></p>
			<p class="dtpost"><?php echo date('d/m/Y',strtotime($post->post_date)); ?></p>
			<div class="share"><?php echo simple_social_bookmarks('','','','default=off&twitter=on&facebook=on&printfriendly=on&iconfolder=images/24x24&target=_blank'); ?></div>
			<!--<div id="fb-root"></div>-->
      <!--<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="" send="false" width="250" show_faces="false" action="recommend" font="verdana"></fb:like>-->
		</div>
		<div class="scontent">
		  
      <p class="exce"><?php echo $post->post_excerpt;?></p>
      <?php the_content(); ?>
		</div>
		</div><!-- lcontent -->
		<div class="rcontent">
		<?php if($metapost['quote'][0] != ""){ ?>
      <div class="quote">
      <?php echo "\"".$metapost['quote'][0]."\""; ?>
      </div>
		<?php } ?>
		
		<?php 
		if($cat[0]->slug != "blog" && $metapost['title'][0] != ""){ ?>
      <div class="testo">
        <div>
          <?php if($metapost['title'][0]!=""){ ?>
          <h2><?php echo $metapost['title'][0];} ?></h2>
          <?php if($metapost['photo'][0]!=""){ ?>
          <img src="<?php echo $metapost['photo'][0];?>"/>
          <?php } ?>
          <?php if($metapost['description'][0]!=""){ ?>
          <p><?php echo $metapost['description'][0];?></p>
          <?php }?>
          <?php if($metapost['url'][0]!=""){ ?>
          <a target="_blank" href="<?php echo $metapost['url'][0]; ?>">Click aca para ver</a>
          <?php } ?>
        </div>
      </div>
		<?php } ?>
		<?php if($cat[0]->slug != "blog"){ ?>
		<?php if($metapost['title'][0] == ""){ ?>
		<div class="rsub">
		<?php }?>
		<?php if($cat[0]->slug == "ciencia-y-tecnologia"){?>
      <div class="otsub techno">
    <?php }elseif($cat[0]->slug == "ciudad-y-medio-ambiente"){ ?>
      <div class="otsub ciuamb">
    <?php }elseif($cat[0]->slug == "cultura-y-medios"){ ?>
      <div class="otsub culmed">
    <?php }elseif($cat[1]->slug == "politica-y-economia"){ ?>
      <div class="otsub poli">
    <?php }else{ ?>
      <div class="otsub blg" >
    <?php } ?>
      <div>
        <h2>SOBRE EL TEMA</h2>
        <?php //Check for connected posts, else list of posts having current post category. "category_name"=>$cat[0]->slug
	 if(function_exists('zc_get_linked_posts')){
		$connectedposts = zc_get_linked_posts('post');
	}

	if ($connectedposts)
	{
    		foreach ($connectedposts as $otherpostid)
        	{
        		$otherpost = get_post($otherpostid);
        			echo '<a href="' . get_bloginfo('url') . '/' . $otherpost->post_name . '">' . $otherpost->post_title . '</a>';

	        }

	}else{
        
        $catpost = new WP_Query(array('post__not_in' => array($post->ID), 'showposts' => 3,'post_type' => 'post','category_name'=> $cat[0]->name));
        //$catpost->request;exit;
        if($catpost->have_posts()){
        while ( $catpost->have_posts() ) : $catpost->the_post();?>
          <a href="<?php the_permalink();?>"><?php the_title();?></a>
        <?php endwhile; ?>
        <?php } } ?>
      </div>
		</div>
		<?php if($metapost['title'][0] == ""){ ?></div><?php }?>
		<?php }?>
		<?php //wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- rcontent -->
	<div class="com">
    <?php comments_template( '', true );?>
	</div>
	</div><!-- entry-content -->
  <?php  //wp_reset_query();?>

	<footer class="entry-meta">
		
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
