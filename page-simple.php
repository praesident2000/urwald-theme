<?php
/**
 * Template Name: Seite Einfacher Content
 */

$context = Timber::get_context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;
$templates = array( 'page-simple.twig' );

Timber::render( $templates , $context );