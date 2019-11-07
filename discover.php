<?php
/**
 * Template Name: Entdecken & Reisen Routen
 */

$context = Timber::get_context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;
$templates = array( 'discover.twig' );

Timber::render( $templates , $context );