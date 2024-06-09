<?php
add_action('after_setup_theme', 'MediaPlusPro_wordpress_theme');

if (!function_exists('MediaPlusPro_wordpress_theme')) {
    function MediaPlusPro_wordpress_theme()
    {


        //     <!-- Google Fonts -->
        // <link href=" rel="stylesheet">




        // for thumbnail image
        add_theme_support('post-thumbnails');
        // add_theme_support('post-formats', array('aside', 'gallery', 'image', 'video', 'audio'));
        add_action('wp_enqueue_scripts', 'MediaPlusPro_theme_enqueue_styles');
        function MediaPlusPro_theme_enqueue_styles()
        {

            wp_enqueue_style(
                'MediaPlusPro-Poppins',
                "https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap",
                array(),
                wp_get_theme()->get('Version'),
                'all'
            );
            wp_enqueue_style('MediaPlusPro-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), wp_get_theme()->get('Version'));
            wp_enqueue_style('MediaPlusPro-nice-select', get_template_directory_uri() . '/assets/css/nice-select.css', array(), wp_get_theme()->get("Version"));
            wp_enqueue_style('MediaPlusPro-font-awesome-icon-zabir', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), wp_get_theme()->get("Version"), 'all');
            wp_enqueue_style('MediaPlusPro-icofont', get_template_directory_uri() . '/assets/css/icofont.css', array(), wp_get_theme()->get("Version"), 'all');
            wp_enqueue_style('MediaPlusPro-slicknav', get_template_directory_uri() . '/assets/css/slicknav.min.css', array(), wp_get_theme()->get("Version"));
            wp_enqueue_style('MediaPlusPro-owl-carousel', get_template_directory_uri() . '/assets/css/owl-carousel.css', array(), wp_get_theme()->get("Version"), 'all');
            wp_enqueue_style('MediaPlusPro-datepicker', get_template_directory_uri() . '/assets/css/datepicker.css', array(), wp_get_theme()->get("Version"));
            wp_enqueue_style('MediaPlusPro-animate', get_template_directory_uri() . '/assets/css/animate.min.css', array(), wp_get_theme()->get("Version"));
            wp_enqueue_style('MediaPlusPro-magnific', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), wp_get_theme()->get("Version"));
            wp_enqueue_style('MediaPlusPro-normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), wp_get_theme()->get("Version"));



            wp_enqueue_style(
                'MediaPlusPro-theme-style',
                get_stylesheet_uri(),
                array(),
                wp_get_theme()->get('Version'),
                'all'
            );

            wp_enqueue_style(
                'MediaPlusPro-responsive',
                get_template_directory_uri() . '/assets/css/responsive.css',

                array(),
                wp_get_theme()->get("Version")
            );
        }

        if (!function_exists('myMeta')) {
            function myMeta()
            {
                add_meta_box(
                    'zabir_pagla',
                    'Add Icon',
                    'myInputHtml',
                    'myownslider',
                );
            }
        }


        if (!function_exists('myInputHtml')) {
            function myInputHtml($post)
            {
                $icon = get_post_meta($post->ID, 'unique_key', true);
?>
                <label for="addIcon">Add Icon</label>
                <input type="text" name="add_icon" id="add_icon" value="<?php echo $icon; ?>">
<?php
            }
        }
        add_action("add_meta_boxes", "myMeta");

        if (!function_exists('my_save_meta')) {
            function my_save_meta($post_id)
            {
                update_post_meta($post_id, 'unique_key', $_POST['add_icon']);
            }
        }

        add_action('save_post', 'my_save_meta');

        load_theme_textdomain('MediaPlusPro', get_template_directory(), '/languages');
    }
}

include_once  get_template_directory() . '/inc/customerPost.php';
