<?php
/**
 * Template part for displaying title Posts page
 *
 * @package Simple Podcast
 */


the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
