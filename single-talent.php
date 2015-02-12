<?php
/**
 * The Template for displaying all single posts.
 *
 * @package mythology
 */

get_header(); ?>

    <button id="primary-toggle" class="<?php echo $myth_header_layout_classes; ?> <?php if(get_custom_field('content_toggle') == 'off' ) : echo 'hide'; else : echo $toggle_layout_classes; endif;  ?>"></button>

<?php include ( get_template_directory() . "/sidebar.php"); ?>

    <div id="primary" class="talent-page standard <?php echo $myth_primary_layout_classes; ?>">

        <?php if(has_tag( 'spotlight' )) : ?>
            <div id="spotlight-banner">&nbsp;</div>
        <?php endif; ?>

        <main id="main" class="site-main" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <h1>Blackshore talent spotlight</h1>

                    <header class="entry-header clearfix">
                        <img id="talent-avatar" class="columns five" src="<?php echo get_custom_field( 'avatar' ); ?>" />

                        <div class="columns six">
                            <?php if(ot_get_option('show_title') != 'off') : ?>
                                <h2><a href="<?php echo get_custom_field( 'website_link_url' ); ?>"><?php the_title(); ?></a></h2>
                            <?php endif; ?>
                            <a id="website-link" href="<?php echo get_custom_field( 'website_link_url' ); ?>"><?php echo get_custom_field( 'website_link_label' ); ?></a>
                        </div>
                    </header>

                    <div class="entry-content clearfix columns fourteen">
                        <?php if(ot_get_option('show_thumbnail') != 'off') :
                            if ( has_post_thumbnail() ) :
                                the_post_thumbnail('slim');
                            endif;
                        endif; ?>
                        <?php the_content(); ?>
                        <?php wp_link_pages( array(
                            'before' => '<div class="page-links">' . __( 'Pages:', 'mythology' ),
                            'after'  => '</div>',
                        ) );
                        ?>
                    </div>
                    <?php if(ot_get_option('show_post_footer') != 'off') : ?>
                        <footer class="entry-footer clearfix chunk">

                            <?php if(ot_get_option('show_categories') != 'off') : ?>
                                <?php
                                /* translators: used between list items, there is a space after the comma */
                                $categories_list = get_the_category_list( __( ', ', 'mythology' ) );
                                if ( $categories_list && mythology_categorized_blog() ) :
                                    ?>
                                    <span class="cat-links clearfix">
					<?php printf( __( 'Posted in %1$s', 'mythology' ), $categories_list ); ?>
				</span>
                                <?php endif; // End if categories ?>
                            <?php endif; ?>

                            <?php if(ot_get_option('show_tags') != 'off') : ?>
                                <?php
                                /* translators: used between list items, there is a space after the comma */
                                $tags_list = get_the_tag_list( '', __( ', ', 'mythology' ) );
                                if ( $tags_list ) :
                                    ?>
                                    <span class="tags-links clearfix">
					<?php printf( __( 'Tagged %1$s', 'mythology' ), $tags_list ); ?>
				</span>
                                <?php endif; // End if $tags_list ?>
                            <?php endif; ?>

                            <?php if(ot_get_option('show_comments_count') != 'off') : ?>
                                <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
                                    <span class="comments-link clearfix"><?php comments_popup_link( __( 'Leave a comment', 'mythology' ), __( '1 Comment', 'mythology' ), __( '% Comments', 'mythology' ) ); ?></span>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php // edit_post_link( __( 'Edit', 'mythology' ), '<span class="edit-link">', '</span>' ); ?>
                        </footer>
                    <?php endif; ?>

                </article>

            <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
        <div class="content_background"></div>
    </div><!-- #primary -->

<?php // include ( get_template_directory() . "/sidebar.php"); ?>
<?php include ( get_template_directory() . "/footer.php"); ?>