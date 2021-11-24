<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package dustrial
 */

?> 
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php the_post_thumbnail(); ?>
    <div class="entry-content">
        <?php the_content(); ?>
        <?php
            wp_link_pages( array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'dustrial' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'dustrial' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text">, </span>',
            ) );
        ?>
    </div>
</div>