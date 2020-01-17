<?php
/**
 * Template Name: Wald & Wissen (Artikel)
 */

$templates = array( 'archive-article.twig' );

$context = Timber::get_context();
$context['posts'] = new Timber\PostQuery();
$timber_post = new Timber\Post();
$context['post'] = $timber_post;

$args_articles = array(
	'post_type' => 'urwald_article',
	'orderby' => 'date',
	'order' => 'DESC',
	'posts_per_page' => 12,
	'paged' => $paged
);

$categories = get_categories();

$context['categories'] = $categories;
$context['articles'] = new Timber\PostQuery( $args_articles );

include('newsletter.php');

Timber::render( $templates, $context );
