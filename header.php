<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
        <?php 
        if ( has_custom_logo() ) {
            the_custom_logo();
        } else {
            echo 'MY PORTFOLIO';
        }
        ?>
    </a>
    <nav>
        <a href="#home"><?php esc_html_e( 'Home', 'liquid-glass-portfolio' ); ?></a>
        <a href="#about"><?php esc_html_e( 'About', 'liquid-glass-portfolio' ); ?></a>
        <a href="#skills"><?php esc_html_e( 'Skills', 'liquid-glass-portfolio' ); ?></a>
        <a href="#projects"><?php esc_html_e( 'Projects', 'liquid-glass-portfolio' ); ?></a>
        <a href="#resume"><?php esc_html_e( 'Resume', 'liquid-glass-portfolio' ); ?></a>
        <a href="#contact"><?php esc_html_e( 'Contact', 'liquid-glass-portfolio' ); ?></a>
    </nav>
    <a href="#" id="lg-theme-toggle" title="<?php esc_attr_e( 'Toggle Light/Dark Mode', 'liquid-glass-portfolio' ); ?>">
        <i class="fas fa-sun"></i>
    </a>
</header>
