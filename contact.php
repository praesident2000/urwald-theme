<?php
/**
 * Template Name: Kontakt
 */

$context = Timber::get_context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;
$templates = array( 'contact.twig' );

Timber::render( $templates , $context );