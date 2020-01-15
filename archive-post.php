<?php
/**
 * Template Name: Aktuelles
 */

$templates = array( 'archive-post.twig' );

$context = Timber::get_context();
$context['posts'] = new Timber\PostQuery();
$timber_post = new Timber\Post();
$context['post'] = $timber_post;

$args_news = array(
	'post_type' => 'post',
	'orderby' => 'date',
	'order' => 'DESC',
	'posts_per_page' => 6,
	'paged' => $paged
);

$categories = get_categories();

$context['categories'] = $categories;
$context['news'] = new Timber\PostQuery( $args_news );

include('newsletter.php');

Timber::render( $templates, $context );
