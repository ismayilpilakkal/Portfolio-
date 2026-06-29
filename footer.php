<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package Liquid Glass Portfolio
 */
?>

<footer>
    <p>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All Rights Reserved.', 'liquid-glass-portfolio' ); ?></p>
</footer>

<?php wp_footer(); ?>
</body>
</html>
