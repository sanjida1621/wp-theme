<?php

//Theme Bootstrapping
function sanran_bootstrapping(){
    load_theme_textdomain("sanran");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    $sanran_custom_header_details = array(
            'header-text' => true,
            'default-text-color' => '#222',
            'width'=>1200,
            'height'=> 600
    );
    add_theme_support("custom-header",$sanran_custom_header_details);
    $sanran_custom_logo_defaults = array(
            'width'=>100,
            'height'=>100
    );
    add_theme_support("custom-logo",$sanran_custom_logo_defaults);
    register_nav_menu("header-menu",__("Header Menu","sanran"));
    register_nav_menu("footer-menu",__("Footer Menu","sanran"));

    add_theme_support("post-formats",array("image","quote","video","audio","link"));
    add_theme_support("custom-background");
}
add_action("after_setup_theme","sanran_bootstrapping");


//Linking CSS Assets
function sanran_css_assets(){
    wp_enqueue_style("link_css",get_stylesheet_uri(),null,time());
    wp_enqueue_style("link_bootstrap","//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
    wp_enqueue_style("featherlight-css","//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css");

    wp_enqueue_script("featherlight-js","//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js",array("jquery"),"0.0.1",true);
    wp_enqueue_script("link_main_js",get_template_directory_uri()."/assets/js/main.js",null,time(),true);
}
add_action("wp_enqueue_scripts","sanran_css_assets");

//Widget Register
function sanran_sidebar(){

    register_sidebar( array(
        'name'=>__( 'Single Post Sidebar', 'sanran' ),
        'id' => 'sidebar-1',
        'description' => __( 'these widgets will be shown on single post pages', 'sanran' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' =>'<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar( array(
        'name'=>__( 'Footer Widget 1', 'sanran' ),
        'id' => 'footer-1',
        'description' => __( 'these widgets will be shown on footer widget 1', 'sanran' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' =>'',
        'after_title' => '',
    ));

    register_sidebar( array(
        'name'=>__( 'Footer Widget 2', 'sanran' ),
        'id' => 'footer-2',
        'description' => __( 'these widgets will be shown on footer widget 2', 'sanran' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' =>'',
        'after_title' => '',
    ));

    register_sidebar( array(
        'name'=>__( 'Footer Widget 3', 'sanran' ),
        'id' => 'footer-3',
        'description' => __( 'these widgets will be shown on footer widget 3', 'sanran' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' =>'',
        'after_title' => '',
    ));

    register_sidebar( array(
        'name'=>__( 'Footer Widget 4', 'sanran' ),
        'id' => 'footer-4',
        'description' => __( 'these widgets will be shown on footer widget 4', 'sanran' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' =>'',
        'after_title' => '',
    ));
}
add_action("widgets_init","sanran_sidebar");

//Adding class in navigation menu
function sanran_menu_item_class($classes,$item){
    $classes[]="list-inline-item";
    return $classes;
}
add_filter("nav_menu_css_class","sanran_menu_item_class",10,2);

//Adding style in about page template banner
function sanran_about_page_template_banner(){
    if(is_page()){
        $sanran_feat_image = get_the_post_thumbnail_url(null,"large");
        ?>
        <style>
            .page-header{
                background-image: url(<?php echo $sanran_feat_image;?>);
            }
        </style>
<?php
    }
    if(is_front_page()){
        if(current_theme_supports("custom-header")){
?>
    <style>
        .header{
            background-image: url(<?php echo header_image();?>);
        }
        .header h1.heading a,h3.tagline{
            color:#<?php echo get_header_textcolor();?>;
            <?php
            if(!display_header_text()){
                echo "display:none;";
            }
            ?>
        }
    </style>
<?php
        }
    }
}
add_action("wp_head","sanran_about_page_template_banner");