<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @package Liquid Glass Portfolio
 */

get_header();

// Include the homepage front page content as a fallback
include get_template_directory() . '/front-page.php';

get_footer();
