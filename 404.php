<?php
    get_header();
?>

<?php
        echo '<div class="mast innerPage">';
            
            $mast_title       = "<h1>Page Not Found</h1>";
            $mast_description = "";

            if( !empty($mast_title) ) {
            	echo '<div class="container-fluid ">';
	                echo '<div class="container ">';
                		echo '<div class="row">';
                			echo '<div class="col col-5 mast_content">';
			                    echo $mast_title;
                                if( !empty($mast_description) ) {
                                    echo do_shortcode(wpautop( $mast_description ));
                                }
		                    echo '</div>';
	                    echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
        echo '</div>'; // End of page-mast container
    //}
 ?>

 <div class="container">
    <div class="row">
        <div class="col col-12 col-lg-9">
            <p>Oops, we’re sorry. We can’t find the page you’re looking for. </p>
            <p>The link you followed may be broken or the page may have been removed.</p>
            <p>Back to <a href="https://allpointsawc.com/">homepage</a></p>
        </div>
    </div>
</div>

<?php get_footer(); ?>
