<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
   <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

  <nav id="mobileNav">
    <a href="#" class="btn mobileMenuToggle">Close</a>
    <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => '' ) ); ?>
  </nav>

   <header class="site-header">
      
      <div class="container-fluid logoContainer">
        <div class="container">
           <div class="row">
              <div>
                <a id="logo" href="<?php bloginfo('url') ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/the-wraptastic-logo.png" /></a>
              </div>

              <div class="phoneSection">
                <span class="servingStatment">Serving Simcoe County and the GTA for Over 20 Years</span>
                <span class="phoneNumbers">
                  GTA <a href="tel:14164075489" class="mr-3">416-407-5489</a> Barrie <a href="tel:17054151919">705-415-1919</a>
                </span>
              </div>

           </div>
        </div>
      </div>

      <div class="menuContainer">
        <div class="container-fluid menuSection">
          <div class="container">
             <div class="row"> 
              <div class="menuWrap">
                <a id="stickyLogo" href="<?php bloginfo('url') ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/the-wraptastic-logo-small.png" /></a>

                <nav id="mainNav">
                  <span id="stickyPhoneNumbers">GTA 416-407-5489 &nbsp; &nbsp; Barrie 705-415-1919</span>
                  <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => '' ) ); ?>
                </nav>

                <div id="mobileNavButtons">
                  <a href="javascript:void(0);" class="mobileMenuToggle">
                    <i class="fa fa-bars"></i>
                    <span>MENU</span>
                  </a>
                  <a href="tel:17054151919" class="nav-phone">
                    <i class="fa fa-phone"></i>
                    <span>CALL</span>
                  </a>

                  <a href="<?php echo bloginfo('url'); ?>/contact/" class="nav-contact">
                    <i class="fa fa-envelope"></i>
                    <span>CONTACT</span>
                  </a>
                </div>

              </div>


             </div>
           </div>
          </div>
        </div>
      </div>
   </header>


<div class="modal" id="quotePop" style="margin-top:20px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <span class="h1" style="display:block; margin-bottom: 0px; margin-left: 10px;">Wrap Me Up!</span>
        <?php echo do_shortcode('[contact-form-7 id="402" title="Contact form 1"]'); ?>
      </div>
    </div>
  </div>
</div>
   

<main>