<?php
/**
 * Liquid Glass Portfolio Theme Functions and Definitions
 *
 * @package Liquid Glass Portfolio
 */

if ( ! function_exists( 'liquid_glass_portfolio_setup' ) ) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function liquid_glass_portfolio_setup() {
        // Let WordPress manage the document title
        add_theme_support( 'title-tag' );

        // Enable support for Post Thumbnails on posts and pages
        add_theme_support( 'post-thumbnails' );

        // Support for clean HTML5 output
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ) );

        // Support for Custom Logo
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );
    }
}
add_action( 'after_setup_theme', 'liquid_glass_portfolio_setup' );

/**
 * Enqueue scripts and styles.
 */
function liquid_glass_portfolio_scripts() {
    // Load main theme stylesheet
    wp_enqueue_style( 'liquid-glass-portfolio-style', get_stylesheet_uri(), array(), '1.0.0' );

    // FontAwesome Icons (CDN fallback or standard)
    wp_enqueue_style( 'font-awesome-6', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css', array(), '6.6.0' );

    // Enqueue AJAX Contact form script
    wp_enqueue_script( 'liquid-glass-contact', get_template_directory_uri() . '/assets/js/contact-form.js', array( 'jquery' ), '1.0.0', true );

    // AOS Animations CSS & JS
    wp_enqueue_style( 'aos-css', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css', array(), '2.3.4' );
    wp_enqueue_script( 'aos-js', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', array(), '2.3.4', true );
    
    // Theme JS (Animations init and Dark/Light toggle)
    wp_enqueue_script( 'liquid-glass-animations', get_template_directory_uri() . '/assets/js/animations.js', array( 'aos-js' ), '1.0.0', true );
    wp_enqueue_script( 'liquid-glass-theme-toggle', get_template_directory_uri() . '/assets/js/theme-toggle.js', array(), '1.0.0', true );

    // Localize the contact script with the admin AJAX url and security nonce
    wp_localize_script( 'liquid-glass-contact', 'lg_ajax_obj', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'nonce'    => wp_create_nonce( 'lg_contact_nonce' )
    ) );
}
add_action( 'wp_enqueue_scripts', 'liquid_glass_portfolio_scripts' );

/**
 * Register Customizer Settings for the Portfolio
 */
function liquid_glass_portfolio_customize_register( $wp_customize ) {
    // Create Portfolio Section
    $wp_customize->add_section( 'lg_portfolio_section', array(
        'title'       => __( 'Portfolio Settings', 'liquid-glass-portfolio' ),
        'priority'    => 30,
        'description' => __( 'Manage links, contact details and resume download link.', 'liquid-glass-portfolio' ),
    ) );

    // Hero Image Setting
    $wp_customize->add_setting( 'lg_hero_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'lg_hero_image_control', array(
        'label'    => __( 'Hero Profile Photo', 'liquid-glass-portfolio' ),
        'section'  => 'lg_portfolio_section',
        'settings' => 'lg_hero_image',
    ) ) );

    // Resume Download Link Setting
    $wp_customize->add_setting( 'lg_resume_link', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'lg_resume_link_control', array(
        'label'    => __( 'Resume PDF / Download URL', 'liquid-glass-portfolio' ),
        'section'  => 'lg_portfolio_section',
        'settings' => 'lg_resume_link',
        'type'     => 'text',
    ) );

    // Phone Setting
    $wp_customize->add_setting( 'lg_phone', array(
        'default'           => '+91 8848024298',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'lg_phone_control', array(
        'label'    => __( 'Contact Phone Number', 'liquid-glass-portfolio' ),
        'section'  => 'lg_portfolio_section',
        'settings' => 'lg_phone',
        'type'     => 'text',
    ) );

    // Location Setting
    $wp_customize->add_setting( 'lg_location', array(
        'default'           => 'Mannarkkad, Kerala',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'lg_location_control', array(
        'label'    => __( 'Location', 'liquid-glass-portfolio' ),
        'section'  => 'lg_portfolio_section',
        'settings' => 'lg_location',
        'type'     => 'text',
    ) );

    // Instagram Setting
    $wp_customize->add_setting( 'lg_instagram_url', array(
        'default'           => 'https://www.instagram.com/ismaayyll/',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'lg_instagram_url_control', array(
        'label'    => __( 'Instagram URL', 'liquid-glass-portfolio' ),
        'section'  => 'lg_portfolio_section',
        'settings' => 'lg_instagram_url',
        'type'     => 'url',
    ) );

    // GitHub Setting
    $wp_customize->add_setting( 'lg_github_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'lg_github_url_control', array(
        'label'    => __( 'GitHub URL', 'liquid-glass-portfolio' ),
        'section'  => 'lg_portfolio_section',
        'settings' => 'lg_github_url',
        'type'     => 'url',
    ) );

    // LinkedIn Setting
    $wp_customize->add_setting( 'lg_linkedin_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'lg_linkedin_url_control', array(
        'label'    => __( 'LinkedIn URL', 'liquid-glass-portfolio' ),
        'section'  => 'lg_portfolio_section',
        'settings' => 'lg_linkedin_url',
        'type'     => 'url',
    ) );
}
add_action( 'customize_register', 'liquid_glass_portfolio_customize_register' );

/**
 * Handle AJAX Contact Form Submission
 */
function lg_submit_contact_form() {
    // Check security token
    check_ajax_referer( 'lg_contact_nonce', 'nonce' );

    // Parse and sanitize form variables
    $name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
    $email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
    $subject = isset( $_POST['subject'] ) ? sanitize_text_field( wp_unslash( $_POST['subject'] ) ) : '';
    $message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

    // Validate fields
    if ( empty( $name ) || empty( $email ) || empty( $message ) ) {
        wp_send_json_error( array( 'message' => __( 'Please fill in all required fields.', 'liquid-glass-portfolio' ) ) );
    }

    if ( ! is_email( $email ) ) {
        wp_send_json_error( array( 'message' => __( 'Please enter a valid email address.', 'liquid-glass-portfolio' ) ) );
    }

    // Default subject if empty
    if ( empty( $subject ) ) {
        $subject = sprintf( __( 'New Portfolio Message from %s', 'liquid-glass-portfolio' ), $name );
    }

    // Email recipient (uses the administrator email address of the site)
    $to = get_option( 'admin_email' );

    // Format the email body
    $body  = "You have received a new contact message from your Portfolio website:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Subject: $subject\n\n";
    $body .= "Message:\n$message\n";

    // Set custom headers to support Reply-To
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . get_bloginfo( 'name' ) . ' <' . $to . '>',
        'Reply-To: ' . $name . ' <' . $email . '>'
    );

    // Send the email using wp_mail
    $mail_sent = wp_mail( $to, $subject, $body, $headers );

    if ( $mail_sent ) {
        wp_send_json_success( array( 'message' => __( 'Thank you! Your message has been sent successfully.', 'liquid-glass-portfolio' ) ) );
    } else {
        wp_send_json_error( array( 'message' => __( 'Sorry, there was an issue sending your message. Please try again later.', 'liquid-glass-portfolio' ) ) );
    }
}
add_action( 'wp_ajax_lg_submit_contact', 'lg_submit_contact_form' );
add_action( 'wp_ajax_nopriv_lg_submit_contact', 'lg_submit_contact_form' );

/**
 * Register Projects Custom Post Type
 */
function lg_register_projects_cpt() {
    $labels = array(
        'name'                  => _x( 'Projects', 'Post Type General Name', 'liquid-glass-portfolio' ),
        'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'liquid-glass-portfolio' ),
        'menu_name'             => __( 'Projects', 'liquid-glass-portfolio' ),
        'name_admin_bar'        => __( 'Project', 'liquid-glass-portfolio' ),
        'add_new'               => __( 'Add New', 'liquid-glass-portfolio' ),
        'add_new_item'          => __( 'Add New Project', 'liquid-glass-portfolio' ),
        'new_item'              => __( 'New Project', 'liquid-glass-portfolio' ),
        'edit_item'             => __( 'Edit Project', 'liquid-glass-portfolio' ),
        'update_item'           => __( 'Update Project', 'liquid-glass-portfolio' ),
        'view_item'             => __( 'View Project', 'liquid-glass-portfolio' ),
        'all_items'             => __( 'All Projects', 'liquid-glass-portfolio' ),
        'search_items'          => __( 'Search Projects', 'liquid-glass-portfolio' ),
    );
    $args = array(
        'label'                 => __( 'Project', 'liquid-glass-portfolio' ),
        'description'           => __( 'Portfolio Projects', 'liquid-glass-portfolio' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-portfolio',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true, // Enable Gutenberg
    );
    register_post_type( 'lg_project', $args );
}
add_action( 'init', 'lg_register_projects_cpt', 0 );
