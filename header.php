<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
   <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
    <?php wp_head(); ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-141216465-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-141216465-1');
    </script>

    <script type="application/ld+json">
      [{
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "All Points Acupuncture & Wellness",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "221 W. Passaic St.",
          "addressLocality": "Rochelle Park",
          "addressRegion": "NJ",
          "addressCountry": "US",
          "postalCode": "07662"
        },
        "openingHours": [
          "Mo 10:00-18:00",
          "Tu 9:00-19:00",
          "We 14:00-19:00",
          "Th 9:00-19:00",
          "Fr 11:00-19:00",
          "Sa 9:00-14:00",
          "Su Closed"
        ],
        "telephone": "201-843-3633",
        "url": "https://allpointsawc.com",
        "image" : "https://allpointsawc.com/wp-content/uploads/2019/04/first-visit.png"
      },
      {
        "@context": "https://schema.org",
        "@type": "Organization",
        "url": "https://allpointsawc.com",
        "sameAs" : [ 
          "https://www.facebook.com/All-Points-Acupuncture-Wellness-Center-1854955441431282/",
          "https://www.instagram.com/allpointsacu/"
        ],
        "logo" : "https://allpointsawc.com/wp-content/themes/all-points-acupuncture/assets/images/all-points-acupuncture-logo.png",
        "contactPoint" : [{
          "@type" : "ContactPoint",
          "telephone" : "+1-201-843-3633",
          "contactType" : "Customer Service"
        
        }]
      }]
    </script>
</head>

<body <?php body_class(); ?>>

  <nav id="mobileNav">
    <a href="#" class="mobileMenuToggle"><i class="fa fa-close"></i></a>
    <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => '' ) ); ?>
  </nav>

   <header class="site-header">
      
      <div class="container-fluid logoContainer">
        <div class="container">
           <div class="row">
              <div>
                <a id="logo" href="<?php bloginfo('url') ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/all-points-acupuncture-logo.png" alt="All Points Acupuncture & Wellness Center Logo" /></a>
              </div>

              <div class="phoneSection">
                <span class="servingStatment">Effective and Safe Acupuncture Treatments in<br/>Bergen County, New Jersey</span>
                <span class="phoneNumbers">
                  Call <a href="tel:2018433633" >(201) 843-3633</a>
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
                <a id="stickyLogo" href="<?php bloginfo('url') ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/all-points-acupuncture-sticky-logo.png" alt="All Points Acupuncture & Wellness Center Icon" /></a>

                <nav id="mainNav">
                  <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => '' ) ); ?>
                </nav>

                <div id="mobileNavButtons">
                  <a href="javascript:void(0);" class="mobileMenuToggle">
                    <i class="fa fa-bars"></i>
                    <span>MENU</span>
                  </a>
                  <a href="tel:2018433633" class="nav-phone">
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
        <?php echo do_shortcode('[contact-form-7 id="191" title="Contact Us Page Form"]'); ?>
      </div>
    </div>
  </div>
</div>
   

<main>