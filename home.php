<?php get_header()?>
    
			<?php query_posts(array("post_type"=>"post","category_name"=>"Destacadas","posts_per_page"=>5));?>
			<?php if($wp_query->post_count > 1):?>
      <div class="slider clearfix" id="slider-home">
	      <?php if(have_posts()){ ?>
	        <?php while(have_posts()): the_post();  ?>
					<div class="single-slide">
						<div class="slide-image">          
							<?php if (has_post_thumbnail()) {?>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(963,285),array("class"=>"lazy"));?></a><?php } ?>
						</div>
						
						<div class="slide-info">
						  <div>
						    <?php $sub=wp_get_post_terms( $post->ID, 'genero');?>
						    <span class="genero"><?php echo $sub[0]->name;?></span>
						    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						    <span class="resume"><?php the_excerpt();?></span>
						    <span class="autor"><?php
                if(get_post_meta($post->ID, 'author_name', true) != "" ){
                echo "Por  ".get_post_meta($post->ID, 'author_name', true);
                }else{
                echo "Por  ".get_the_author();}?></span>
						  </div>
						</div>
					</div>
	        <?php endwhile;?>
	        <?php } ?>	        
	      </div> <!--slider end-->
	      <div id="slider-paging" class="clearfix"></div>
	      <?php endif; ?>
        <div class="content clearfix">        	

			<div class="columns" id="columns">

      <?php global $wp_query;
        $per_page = 12;
        $paged = get_query_var('paged')+1;
        $paged = ($paged == ""? 0 : $paged );
      ?>
        <?php
        query_posts(array("post_type"=>"post","category__not_in"=>array(6,15),"paged"=>$paged,"posts_per_page"=>$per_page,'orderby'=>'date'));
        $total_pages =  $wp_query->max_num_pages;
        ?>
       <script type='text/javascript'>
          paged = <?php echo $paged;?>;num_pages=<?php echo $wp_query->max_num_pages;?>
       </script>
				<?php 
				//$colpost = new WP_Query(array("post_type"=>"post","category__not_in"=>array(6,16),"paged"=>$paged,"posts_per_page"=>2));
					if ( have_posts() ) : while ( have_posts() ) : the_post();
				?>
        <?php $category = get_the_category($post->ID);
           if($category[0]->cat_name != "Anuncios"){
         ?>
				<div <?php post_class('block');?>>
				  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>                    
				  <?php $medio = wp_get_post_terms( $post->ID, "medio");?>
				  <?php if(count($medio)>0){?>
				  <div class="sicons">
				  <?php if($medio[0]->slug == "audio" && $medio[1]->slug == "fotografia" && $medio[2]->slug == "video"){?>
				    <figure class="icons vdo"></figure>
				    <figure class="icons audo"></figure>
				    <figure class="icons foto"></figure>
				  <?php }elseif($medio[0]->slug == "audio" && $medio[1]->slug == "fotografia"){?>
				    <figure class="icons audo"></figure>
				    <figure class="icons foto"></figure>
				  <?php }elseif($medio[0]->slug == "audio" && $medio[1]->slug == "video"){?>
				    <figure class="icons vdo"></figure>
				    <figure class="icons audo"></figure>
				  <?php }elseif($medio[0]->slug == "fotografia" && $medio[1]->slug == "video"){?>
				    <figure class="icons foto"></figure>
				    <figure class="icons vdo"></figure>
				  <?php }elseif( $medio[0]->slug == "fotografia"){?>
				    <figure class="icons foto"></figure>
				   <?php }elseif($medio[0]->slug == "video"){ ?>
				    <figure class="icons vdo"></figure>
				   <?php }elseif($medio[0]->slug == "audio"){ ?>
				    <figure class="icons audo"></figure>
				   <?php } ?>
				   </div><!--sicons end-->
				   <?php } ?>
				   <?php $geno=wp_get_post_terms( $post->ID, 'genero');?>
				  <span class="genero"><?php echo $geno[0]->name;?></span>
				  <?php //$current_user = wp_get_current_user();?>
				  <span class="autor"><?php
                if(get_post_meta($post->ID, 'author_name', true) != "" ){
                echo "Por  ".get_post_meta($post->ID, 'author_name', true);
                }else{
                echo "Por  ".get_the_author();}?></span>
				  <div class="resume"><?php the_excerpt(); ?></div>
				  <figure><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(225,225)); ?></a></figure>
				  <?php //the_terms($post->ID, 'category');
				  $cattag = get_the_category(get_the_id());
				  if($cattag[0]->slug == "ciencia-y-tecnologia"){?>
				    <p class="tagline technotag"><?php echo $cattag[0]->name; ?></p>
				  <?php }elseif($cattag[0]->slug == "ciudad-y-medio-ambiente"){?>
				    <p class="tagline ciuambtag"><?php echo $cattag[0]->name; ?></p>
				  <?php }elseif($cattag[0]->slug == "cultura-y-medios"){?>
				    <p class="tagline culmedtag"><?php echo $cattag[0]->name;?></p>
				  <?php }elseif($cattag[1]->slug == "politica-y-economia" || $cattag[0]->slug == "politica-y-economia"){?>
				    <p class="tagline politag"><?php if($cattag[1]->slug == "politica-y-economia"){echo $cattag[1]->name;}elseif($cattag[0]->slug == "politica-y-economia"){ echo $cattag[0]->name;} ?></p>
				  <?php //}elseif($cattag[0]->slug == "destacadas"){?>
				    <!--<p class="tagline technotag"><?php //the_terms($post->ID, 'category'); ?></p>-->
				  <?php }else{?>
				    <p class="tagline"><?php echo $cattag[0]->name; ?></p>
				  <?php } ?>
				</div>
				<?php }elseif($category[0]->cat_name == "Anuncios"){?>
          <div <?php post_class('block ads');?>>
            <?php if (has_post_thumbnail()) :
              $adlink = get_post_meta(get_the_id(), 'ads_url', true);?>
              <a href="<?php echo $adlink;?>">
                  <?php the_post_thumbnail(); ?>
              </a>
              <?php endif; ?>
              </div>
        <?php } ?>
				<?php endwhile; endif; ?>
				<div class="iload"><img src= "<?php echo get_site_url(); ?>/wp-content/themes/cerosetenta/images/loader.gif" /></div>
            <?php //224X392
             /*$adspost = new WP_Query(array('showposts' => 1,'post_type' =>
            'post','category_name'=> "anuncios",'orderby'=>'date'));
            if($adspost->post_count > 0):
            ?>
            <div <?php post_class('block ads');?>>
            <?php if($adspost->have_posts()){
            while ( $adspost->have_posts() ) : $adspost->the_post();?>
            <?php if (has_post_thumbnail()) :
            $adlink = get_post_meta(get_the_id(), 'ads_url', true);?>
            <a href="<?php echo $adlink;?>">
                <?php the_post_thumbnail(); ?>
            </a>    
            <?php endif; ?>
            <?php endwhile;
            }?>
            </div>
           <?php  endif;*/
            ?>
    		</div><!--div class blcok end-->
    		<?php //global $paged; ?>
    		<!--<div id="fbox"></div>-->
    		<!--<div id="hpaging">Read More</div>-->
         <?php //wp_reset_query(); ?>
    	</div><!--columns end-->
    	<?php get_sidebar(); ?>
    </div><!--content end-->
		
		<?php get_footer(); ?>
