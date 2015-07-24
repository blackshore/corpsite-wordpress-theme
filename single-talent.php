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
			<div class="columns six">
			    <div class="talent-avatar">
				<div class="img-border">
				    <img src="<?php echo get_custom_field( 'avatar' ); ?>" />
				</div> 	
			    </div>			    
			</div>                        

                        <div class="columns eight">
                            <?php if(ot_get_option('show_title') != 'off') : ?>
                                <h2><a href="<?php echo get_custom_field( 'website_link_url' ); ?>"><?php the_title(); ?></a></h2>
                            <?php endif; ?>
                            <a id="website-link" href="<?php echo get_custom_field( 'website_link_url' ); ?>" target="_blank"><?php echo get_custom_field( 'website_link_label' ); ?></a>
			    
			    <div class="social-links">
				<?php if (get_custom_field( 'youtube_link_url' ) != '') : ?>
				    <a class="social-link" href="<?php echo get_custom_field( 'youtube_link_url' ); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/youtube-logo_large_shadow.png" alt="YouTube"></a>
				<?php endif; ?>
				<?php if (get_custom_field( 'facebook_link_url' ) != '') : ?>
				    <a class="social-link" href="<?php echo get_custom_field( 'facebook_link_url' ); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook-logo_large_shadow.png" alt="Facebook"></a>
				<?php endif; ?>
				<?php if (get_custom_field( 'twitter_link_url' ) != '') : ?>
				    <a class="social-link" href="<?php echo get_custom_field( 'twitter_link_url' ); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/twitter-logo_large_shadow.png" alt="Twitter"></a>
				<?php endif; ?>
				<?php if (get_custom_field( 'instagram_link_url' ) != '') : ?>
				    <a class="social-link" href="<?php echo get_custom_field( 'instagram_link_url' ); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/instagram-logo_large_shadow.png" alt="Instagram"></a>
				<?php endif; ?>
			    </div>
			    
			    
			    <?php if (get_custom_field( 'stats_code' ) != '') : ?>
			    <div class="stats">
			    <?php
				$stats_arr = explode(';', get_custom_field( 'stats_code' ));
				for ($x=0; $x < count($stats_arr); $x++) {				    
				    $stat_stack = explode('-', $stats_arr[$x]);
				    if (isset($stat_stack[1])){
					echo '<div class="stat-label label-'. $x .'" style="width:' . trim($stat_stack[0]) . '%;"><label>' . trim($stat_stack[1]) . '</label></div>';
				    }				    
				}				
			    ?>
			    </div>
			    <?php endif; ?>
                        </div>
                    </header>

                    <div class="entry-content clearfix columns fourteen">
                        <?php if(ot_get_option('show_thumbnail') != 'off') :
                            if ( has_post_thumbnail() ) :
                                the_post_thumbnail('slim');
                            endif;
                        endif; ?>
                        
			<?php if(has_tag( 'full-story' )) { ?>			
			    <?php if(get_query_var('story') == 'full') { ?>
			    <div class="full-story">
				<?php the_content(); ?>    
			    </div>
			    <?php }else { ?>
				<?php the_excerpt(); ?>
				<a href="<?php echo get_permalink( $post->ID ) ?>?story=full" class="btn">> Read Full Story</a>
			    <?php } ?>	
			<?php } else { ?>
			    <?php the_excerpt(); ?>
			<?php } ?>
			
			
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