<!doctype html>
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>
	<?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 * We filter the output of wp_title() a bit -- see
		 * boilerplate_filter_wp_title() in functions.php.
		 */
		wp_title( '|', true, 'right' );
	?>
  </title>
  <meta name="description" content="">
  <meta name="author" content="8manos S.A.S">
  <!--moblie -->
  <!-- For iPhone 4 with high-resolution Retina display: -->
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon.png">
  <!-- For first-generation iPad: -->
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon.png">
  <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
  <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-precomposed.png">
  <!-- For nokia devices: -->
  <link rel="shortcut icon" href="images/apple-touch-icon.png">

  <!--iOS web app, deletable if not needed -->
  <!--<meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <link rel="apple-touch-startup-image" href="img/l/splash.png">-->

  <!-- Mobile IE allows us to activate ClearType technology for smoothing fonts for easy reading -->
  <meta http-equiv="cleartype" content="on">

    <!-- more tags for your 'head' to consider https://gist.github.com/849231 -->
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/mobile.css?v=1" media="only screen and (min-width: 320px) and (max-width: 640px)" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/style.css?v=2" media="only screen and (min-width: 640px)" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/favicon.ico">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/jquery.lightbox-0.5.css" media="screen"/>
<link href='http://fonts.googleapis.com/css?family=Ovo' rel='stylesheet' type='text/css'>
 <!--<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/temp.css?v=2">-->
  <script src="<?php bloginfo('template_directory'); ?>/js/libs/modernizr-1.7.min.js"></script>
  <script type="text/javascript">
    var num_pages,paged,term_name;
  </script>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="container">
	<header class="header">
		<div class="head-bg">
			<div class="content clearfix">
				<h1 id="logo" class="left"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
				<div class="right srh">
          <?php get_search_form(); ?><br />
          <?php //wp_nav_menu( array('menu' => 'Dropdown' )); ?>
				</div>
				<nav class="right">
					<ul class="clearfix">
					<li>
					<a href="#" title="">G&eacute;nero</a>
					<ul>
					<?php $gens = get_terms("genero");
					foreach($gens as $gen){?>
					  <li>
					    <a href="<?php echo get_term_link($gen->slug, 'genero');?>"><?php echo $gen->name;?></a>
					  </li>
					<?php }?>
					</ul>
					</li>
					
					<li><a href="#" title="">Tema</a>
					<ul class="mn-tema">
					<?php  $cats = get_categories();
					foreach($cats as $cat){
					if($cat->name != "Anuncios" && $cat->name != "Blog" && $cat->name != "Destacadas" ){
					?>
					  <li>
					    <a href="<?php echo get_category_link($cat->term_id);?>"><?php echo $cat->name;?></a>
					  </li>
					  <?php }?>
					<?php }?>
					</ul>
					</li>
					<li><a href="#" title="">Medio</a>
					<ul>
					<?php $meds = get_terms("medio");
					foreach($meds as $med){?>
					  <li>
					    <a href="<?php echo get_term_link($med->slug, 'medio');?>"><?php echo $med->name;?></a>
					  </li>
					<?php }?>
					</ul>
					</li>
					<li id="somos"><a href="/quienes-somos/" title="">&iquest;Quienes Somos?</a></li>
					</ul>
				</nav>
				<!--</div>-->		
			</div><!--content end-->
		</div><!--head-bg end-->					
	</header><!-- #branding -->


	<div id="main" role="main" class="clearfix">
		
		
