<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

</div><!-- #main -->
<script type="text/javascript">
<?php $paged = get_query_var('paged'); ?>
  <?php if(is_home()||is_front_page()){ ?>
    document.write('<div id="hpaging" class= "hpage">M&Aacute;S ART&Iacute;CULOS ESPERAN. CLICK AQU&Iacute; PARA VERLOS.</div>');
   <?php wp_reset_query(); ?>
   <?php } elseif(is_category("blog")){ ?>
    document.write('<div id= "hpaging" class= "blog-page">MAS POSTS EN EL BLOG. CLICK AQU&Iacute; PARA VERLOS.</div>');
   <?php } elseif(get_query_var('genero')){ ?>
     document.write('<div id= "hpaging"  class="gen-page">M&Aacute;S ART&Iacute;CULOS ESPERAN. CLICK AQU&Iacute; PARA VERLOS.</div>');
   <?php } elseif($category_name && !is_category("blog")){ ?>
     document.write('<div id="hpaging"  class="tema-page">M&Aacute;S ART&Iacute;CULOS ESPERAN. CLICK AQU&Iacute; PARA VERLOS.</div>');
   <?php } elseif(get_query_var('medio')){?>
     document.write('<div id="hpaging" class="med-page">M&Aacute;S ART&Iacute;CULOS ESPERAN. CLICK AQU&Iacute; PARA VERLOS.</div>');
   <?php } ?>
</script>
  <noscript>
  <?php
  global $wp_query,$paged,$total_pages;
  $paged = get_query_var('paged');
  if(($paged+1) < $total_pages )
  {
    if(is_home()||is_front_page()|| get_query_var('genero') || ($category_name && !is_category("blog")) || get_query_var('medio')){
      echo "<a href='".get_pagenum_link($paged+1)."' id=hpaging>M&Aacute;S ART&Iacute;CULOS ESPERAN. CLICK AQU&Iacute; PARA VERLOS.</a>";
    }
    elseif(is_category("blog"))
    {
      echo "<a href='".get_pagenum_link($paged+1)."' id='hpaging'>MAS POSTS EN EL BLOG.CLICK AQU&Iacute; PARA VERLOS.</a>";
    }
  }
  ?>
  </noscript>
 <footer class="footer">
        <div class="content clearfix">
            <nav class="clearfix">
                <ul>
                <?php $qusom = get_page_by_title('Quienes somos?');?>
                    <li><a target="_blank" href="http://ceper1.uniandes.edu.co/index.php?option=content&task=section&id=5&Itemid=83" title="">&iquest;Qui&eacute;nes Somos?</a></li>
                    <li><a target="_blank" href="http://ceper1.uniandes.edu.co/index.php?option=com_content&task=section&id=23&Itemid=184" title="">Maestr&iacute;a</a></li>
                    <li><a target="_blank" href="http://ceper1.uniandes.edu.co/index.php?option=com_content&task=section&id=16&Itemid=153" title="">Opci&oacute;n de Periodismo</a></li>
                    <li><a target="_blank" href="http://ceper1.uniandes.edu.co/index.php?option=com_content&task=view&id=42&Itemid=127" title="">Profesores</a></li>
                    <li><a target="_blank" href="http://ceper1.uniandes.edu.co/index.php?option=com_content&task=view&id=42&Itemid=127" title="">Investigaci&oacute;n</a></li>
                    <?php $mob_blogid = get_cat_ID( 'Blog' );
                          $mob_catlink = get_category_link( $mob_blogid );?>
                    <li class="mob_blog"><a href="<?php echo $mob_catlink; ?>" title="">Blog</a></li>
                </ul>
            </nav>
            <div class="fadd">
              <div class="clearfix">
                  <a href="http://ceper1.uniandes.edu.co" target="_blank" title="CEPER"><img src="<?php bloginfo('template_directory'); ?>/images/universidad_los_andes.png" alt="" /></a>
              </div>
		<br />
              <div>
                  Calle 18A #2-44 Edificio Casa Rosada. Piso 1  <br />PBX 3 39 4999 Ext: 2135 / 2180 /3130  |  L&iacute;nea directa: 3324524
              </div>
            </div>
            <div class="right fsocial">
                <a target="_blank" href="http://www.facebook.com/pages/070-Cerosetenta/145437715536631" title="" class="Facebook">facebook</a>
                <a target="_blank" href="http://www.vimeo.com/user7983615" title="" class="vimeo">vimeo</a>
                <a target="_blank" href="http://www.youtube.com/user/revistacerosetenta" title="" class="youtube">youtube</a>
                <a target="_blank" href="http://www.flickr.com/photos/65917377@N05/" title="" class="Flickr">flickr</a>
                <a target="_blank" href="http://soundcloud.com/cerosetenta-1" title="" class="Soundcloud">soundcloud</a>
                <a target="_blank" href="http://twitter.com/cerosetenta" title="" class="Twitter">twitter</a>
                <a target="_blank" href="http://issuu.com/Cerosetenta" title="" class="Issuu">Issuu</a>
                <a target="_blank" href="http://storify.com/cerosetenta" title="" class="storify">storify</a>

            </div>
        </div>
    </footer>
  </div> <!-- eo #container -->
<div id="credits">
	<a target="blank" href="http://elmonocromo.com"><img src="<?php bloginfo('template_directory'); ?>/images/monocromo.png" alt="" /></a><br />
	<a target="blank" href="http://8manos.com"><img src="<?php bloginfo('template_directory'); ?>/images/8manos.png" alt="" /></a>
</div>

  <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
  <script>window.jQuery || document.write("<script src='<?php //bloginfo('template_directory'); ?>/js/libs/jquery-1.5.1.min.js'>\x3C/script>")</script>-->


  <!-- scripts concatenated and minified via ant build script-->
  <script src="<?php bloginfo('template_directory'); ?>/js/plugins.js"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/jquery.lightbox-0.5.js"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/jail.min.js"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/script.js"></script>
  <!-- end scripts-->


  <!--[if lt IE 7 ]>
    <script src="<?php bloginfo('template_directory'); ?>/js/libs/dd_belatedpng.js"></script>
    <script>DD_belatedPNG.fix("img, .png_bg");</script>
  <![endif]-->

  <script>
    var _gaq=[["_setAccount","UA-XXXXX-X"],["_trackPageview"]]; // Change UA-XXXXX-X to be your site's ID 
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
    s.parentNode.insertBefore(g,s)}(document,"script"));
  </script>
  <?php wp_footer(); ?>

</body>
</html>
