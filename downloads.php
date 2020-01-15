<?php
/**
 * Template Name: Mediathek & Downloads
 */

$context = Timber::get_context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;
$templates = array( 'downloads.twig' );

include('newsletter.php');

Timber::render( $templates , $context );