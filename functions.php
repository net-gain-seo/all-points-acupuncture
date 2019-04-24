<?php
function my_theme_enqueue_styles() {

    $parent_style = 'ns_main';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/main.css' );
    wp_enqueue_style( 'child_main',
        get_stylesheet_directory_uri() . '/main.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style( 'Lato', 'https://fonts.googleapis.com/css?family=Lato' );
    wp_enqueue_style('Roboto', 'https://fonts.googleapis.com/css?family=Roboto+Condensed');


}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function ns_child_scripts() {

    //wp_enqueue_script( 'child-custom', get_bloginfo('template_url') . '/js/custom.js', 'jquery', '1.6.0', true );

}
add_action( 'wp_enqueue_scripts', 'ns_child_scripts' );



add_image_size( 'featuredBlogImage', 330,380 , true );
add_image_size( 'featuredBlogImage2', 330,155 , true );





/**
 * SHORTCODES
 *
 */


function latest_news() {
    extract( shortcode_atts( array(
        'class' => '',
        'title' => '',
        'link' => '',
        'category' => ''
      ), $atts )
    );
    if(isset($category) && $category != '') {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 4,
            'orderby' => 'date',
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'post',
                    'terms' => $category,
                    'field' => 'name'
                )
            )
        );
    }
    else {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'orderby' => 'date',
            'order' => 'DESC'
        );
    }

    $posts = new WP_Query($args);
    $return = '';

     $return .= '<div class="recentPosts">';
    while($posts->have_posts()) : $posts->the_post();
        $terms = wp_get_post_terms(get_the_ID(),'category');
        $parentCategory = get_the_terms(get_the_ID(),"category");
        $postTags = get_the_tags();

        $return .= '<div class="recentPost">';
            $return .= '<span class="date">'.get_the_date().'</span>';
            $return .= '<h3 class="postTitle"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';
            $return .= '<p>'.substr(strip_tags(get_the_content()),0,100).'...</p>';
        $return .= '</div>';
    endwhile;
    $return .= '</div>';

    return $return;
}
add_shortcode('latest_news','latest_news');




function wraptastic_testimonial_slider($atts) {
    extract( shortcode_atts( array(
        'class' => '',
        'category' => ''
      ), $atts ) );

    // WP_Query arguments
    if($category != '') {
        $args = array(
            'post_type'   => 'testimonials',
            'post_status' => 'published',
            'tax_query' => array(
                array(
                    'taxonomy' => 'testimonial_category',
                    'field'    => 'slug',
                    'terms'    => $category,
                ),
            )
        );
    }
    else {
        $args = array(
            'post_type'   => 'testimonials',
            'post_status' => 'published',
        );
    }


    // The Query
    $query = new WP_Query( $args );

    $content = do_shortcode( shortcode_unautop( $content ) );
    $content = stripParagraphs($content);

    $return = '';

    $return .= '<div id="testimonials" class="testimonials-slider">';
        foreach( $query->posts as $post ) {
            $return .= '<div class="testimonial">';
                $excerpt = str_replace('"', '', $post->post_content);
                $return .= '<div>';
                    $return .= '<p>'.do_shortcode($excerpt).'</p>';
                    $return .= '<p>'.get_the_title($post->ID).'</p>';
                $return .= '</div>';
            $return .= '</div>';
        }
    $return .= '</div>';
    
    return $return;
}
add_shortcode('wraptastic_testimonial_slider','wraptastic_testimonial_slider');





function service_item($atts) {
    extract( shortcode_atts( array(
        'class' => '',
        'link' => '#',
        'title' => '',
        'content' => ''
      ), $atts ) );

       $return = '';

    $return .= '<a href="'.$link.'" class="service_item">';
        $return .= '<img src="'.get_stylesheet_directory_uri().'/assets/images/icons/check-mark.png" />';
        $return .= '<h5>'.$title.'</h5>';
        $return .= '<p>'.$content.'</p>';
    $return .= '</a>';
    
    return $return;
}
add_shortcode('service_item','service_item');


function green_box_item($atts) {
    extract( shortcode_atts( array(
        'class' => '',
        'icon' => '',
        'title' => '',
        'content' => ''
      ), $atts ) );

       $return = '';

    $return .= '<div class="green_box_item">';
        $return .= '<img src="'.$icon.'" />';
        $return .= '<h5>'.$title.'</h5>';
        $return .= '<p>'.$content.'</p>';
    $return .= '</div>';
    
    return $return;
}
add_shortcode('green_box_item','green_box_item');



function numbered_item($atts) {
    extract( shortcode_atts( array(
        'class' => '',
        'content' => '',
        'number' => '1'
      ), $atts ) );

       $return = '';

     $return .= '<div class="numbered_item">';
        $return .= '<span class="theNumber">'.$number.'</span>';
        $return .= '<p>'.$content.'</p>';
    $return .= '</div>';
    
    return $return;
}
add_shortcode('numbered_item','numbered_item');









/// ADD CUSTOM FIELDS FOR BLOG POST
function post_add_meta_box() {
    add_meta_box( 'post_meta_box',
        'Page Mast Title (leave blank to use page title)',
        'display_post_meta_box',
        'post'
    );
}

add_action( 'admin_init', 'post_add_meta_box' );

function display_post_meta_box() {
    global $post;

    $is_featured = esc_html( get_post_meta( $post->ID, 'is_featured', true ) );
   
    ?>

    <table style="width: 100%;">
        <tr>
            <td style="width: 100%;padding-bottom: 20px;">
                <label><input type="checkbox" value="1" <?php if($is_featured == '1'){ echo 'checked'; } ?> name="is_featured" value="<?php echo $is_featured; ?>" /> Is Featured</label>
            </td>
        </tr>

        <input type="hidden" name="post_flag" value="true" />
    </table>
<?php
}

function update_post_meta_box( $post_id, $post ) {
    if ( $post->post_type == 'post' ) {
        if ( isset($_POST['post_flag']) ) {

            if ( isset( $_POST['is_featured'] ) && $_POST['is_featured'] != '' ) {
                update_post_meta( $post_id, 'is_featured', $_POST['is_featured'] );
            } else {
                update_post_meta( $post_id, 'is_featured', '0' );
            }
            
        }
    }
}

add_action( 'save_post', 'update_post_meta_box', 10, 2 );





function a1_scripts() {
    wp_enqueue_script( 'a1_scripts', get_stylesheet_directory_uri() . '/js/scripts.js', 'jquery', '2.9', true );
}
add_action( 'wp_enqueue_scripts', 'a1_scripts', 1 );







add_image_size( 'wraptastic_gallery_thumb', 275,275 , true );



function wraptastic_gallery($atts){

    extract( shortcode_atts( array(
        'class' => '',
        'posts_per_page' => $posts_per_page,
        'title' => '',
        'category' => $category
    ), $atts ));

    if($category == '') {
        $args = array(
          'post_type'   => array( 'gallery' ),
          'posts_per_page' => $posts_per_page,
          'orderby' => 'publish_date',
          'order' => 'ASC'
        );
    }
    else {
        $args = array(
            'post_type'   => array( 'gallery' ),
            'posts_per_page' => $posts_per_page,
            'orderby' => 'publish_date',
            'order' => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'categories',
                    'field' => 'name',
                    'terms' => array($category)
                )
            )
        );
    }

    global $post;

    $query = new WP_Query( $args );
    $return .= '';
    $return .= '<div class="container  gallery-container " >';
    $return .= '<div class="row d-flex justify-content-between flex-wrap">';
    if($query->have_posts()) {
        while($query->have_posts()):$query->the_post();
            $return .= '<a href="'.get_the_post_thumbnail_url().'" data-fancybox="gallery-image" data-type="image"  class="col-lg-3 col-md-4 col-sm-6 col-xsm-12 gallery-thumb">';
                //$return .= the_post_thumbnail('wraptastic_gallery_thumb');
                $return .= '<img src="'. get_the_post_thumbnail_url(get_the_ID(),'wraptastic_gallery_thumb') .'" class="thumbnail img-responsive">';
            $return .= '</a>';
        endwhile;
      }
    $return .= '</div>';
    $return .= '</div>';

    wp_reset_query();

    return $return;
}

add_shortcode( 'wraptastic_gallery', 'wraptastic_gallery' );

