<?php
/**
 * Minimal index template for the Vert Custom theme
 */
get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        echo '<article>';
        the_title( '<h1>', '</h1>' );
        the_content();
        echo '</article>';
    endwhile;
else :
    echo '<p>No posts found.</p>';
endif;

get_footer();
