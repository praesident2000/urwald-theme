<?php
/**
 * Template Name: Aktuelles
 */

$templates = array( 'archive-post.twig' );

$context = Timber::get_context();
$context['posts'] = new Timber\PostQuery();
$context['post'] = $post;

$args_news = array(
	'post_type' => 'post',
	'orderby' => 'date',
	'order' => 'DESC',
	'posts_per_page' => 10,
	'paged' => $paged
);

$categories = get_categories();

$context['categories'] = $categories;
$context['news'] = new Timber\PostQuery( $args_news );

Timber::render( $templates, $context );
