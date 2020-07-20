<?php get_header(); ?>


<?php
$blogPageId = 233;
if(has_post_thumbnail($blogPageId)) {
	$imageUrl = get_the_post_thumbnail_url($blogPageId);

    echo '<div class="mast innerPage" style="background-image:url(\''.$imageUrl.'\')">';
        
        $mast_title       = get_post_meta( $blogPageId, 'mast_title', true );
        $mast_description = get_post_meta( $blogPageId, 'mast_description', true );

        if( !empty($mast_title) ) {	
        	echo '<div class="container-fluid ">';
                echo '<div class="container ">';
            		echo '<div class="row">';
            			echo '<div class="col col-6 mast_content">';
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
}
 ?>

<!----- FEATURED BLOGS ------> 





<div class="container-fluid" style="background-color:#ffffff;">
	<div class="container" style="">
		<?php 
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post(); 
				//
				// Post Content here
				//

				?>
				<div class="row blogPost pb-0">
					<div class="col col-12">
						<p class="date"><?php echo get_the_date(); ?></p>
						<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
						<p><?php echo substr(strip_tags(get_the_content()),0,200); ?></p>
					</div>
				</div>
				<?php 

			} // end while
		} // end if
		?>
		

		<div class="row">
			<div class="col col-12">
				<div class="next-prev">
					<?php echo paginate_links(); ?>
	            </div>
			</div>
		</div>

	</div>
</div>







<?php get_footer();