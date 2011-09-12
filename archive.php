<?php get_header()?>
      
        <div class="content clearfix">        	
      

			<div class="columns" id="columns">

				<?php 
					if ( have_posts() ) : while ( have_posts() ) : the_post(); 
				?>

				<div <?php post_class('block');?>>
				  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>                    
				  <?php $medio = wp_get_post_terms( $post->ID, "medio");?>
				  <?php if(count($medio)>0){?>
				  <div class="sicons">
				  <?php if($medio[0]->slug == "audio" && $medio[1]->slug == "fotografia"){?>
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
				  <span class="autor"><?php the_author(); ?></span>
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
				  <?php }elseif($cattag[1]->slug == "politica-y-economia"){?>
				    <p class="tagline politag"><?php echo $cattag[1]->name; ?></p>
				  <?php //}elseif($cattag[0]->slug == "destacadas"){?>
				    <!--<p class="tagline technotag"><?php //the_terms($post->ID, 'category'); ?></p>-->
				  <?php }else{?>
				    <p class="tagline"><?php echo $cattag[0]->name; ?></p>
				  <?php } ?>
				</div>

				<?php endwhile; endif; ?>
          <!--<div class="ads">-->
            <?php //224X392
            /* $adspost = new WP_Query(array('showposts' => 1,'post_type' =>
            'post','category_name'=> "anuncios"));
            if($adspost->have_posts()){
            while ( $adspost->have_posts() ) : $adspost->the_post();?>
            <?php the_content(); ?>
            <?php endwhile;
            }*/
            ?>
          <!--</div>-->
          
    		</div><!--div class blcok end-->  
    	</div><!--columns end-->
    	<?php get_sidebar(); ?>
    </div><!--content end-->
		
		<?php get_footer(); ?>  	
</body>
</html>
