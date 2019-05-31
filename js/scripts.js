(function($) {
    $(document).ready(function(){

        $(window).scroll(function(){
            var aTop = 100;

            if($(this).scrollTop() >= 275){
                if (!$('body .site-header').hasClass("sticky")) {
                    $('body .site-header .menuContainer').css('top','-100px');
                    $('body .site-header .menuContainer').animate({top:0}, 200, function() {
                        //callback
                    });
                    $('body .site-header').addClass('sticky');
                }
            }else if($(this).scrollTop() <= 150){
                $('body .site-header').removeClass('sticky');
            }
        });

        $(document).on('mailsent.wpcf7', function (e) {
            $form=$(e.target);
            
            if($form.attr('id').search('f150')!=-1){               
                gtag('event', 'Submit', {
                  'event_category': 'Form',
                  'event_label': 'Contact'
                });
            }
            else if($form.attr('id').search('f191')!=-1){               
                gtag('event', 'Submit', {
                  'event_category': 'Form',
                  'event_label': 'Popup'
                });
            }
        });

        jQuery("a[href^='tel:']").click(function(){
            if (jQuery(window).width() <= 500){
                var href = jQuery(this).attr("href");
                ga('send','event','Phone','Click',href);
                
                gtag('event', 'Click', {
                  'event_category': 'Phone',
                  'event_label': href
                });
            }
        });

        $('.quotePop').click(function(e){
            e.preventDefault();
            $('#quotePop').modal();
        });

        $('.mobileMenuToggle').click(function(e){
            e.preventDefault();
            $('#mobileNav').toggleClass('open');
        })
    
    });
})(jQuery);