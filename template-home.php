<?php
/*
 * Template Name: Home page
*/

get_header(); ?>

<button id="primary-toggle" class="<?php echo $myth_header_layout_classes; ?> <?php if(get_custom_field('content_toggle') == 'off' ) : echo 'hide'; else : echo $myth_toggle_layout_classes; endif;  ?>"></button>

<?php include ( get_template_directory() . "/sidebar.php"); ?>

<div id="primary" class="standard <?php echo $myth_primary_layout_classes; ?>">

	<!-- ============================================== -->		

	<!-- PAGE CONTENT -->
	<main id="main" class="site-main" role="main">

		<!-- PAGE CONTENT -->
		<?php while ( have_posts() ) : the_post(); if($post->post_content != "") : ?>
				<?php the_content(); ?>
		<?php endif; ?>

            <!-- BACKGROUND PICTURE -->
			<?php if (has_post_thumbnail( $post->ID )) :
				$thumb = get_post_thumbnail_id();
				$image = vt_resize( $thumb, '', '1600', '9999', false );
				?>
				<style type="text/css">
				body{
					background: url("<?php echo $image['url']; ?>") no-repeat center center fixed;
					  -webkit-background-size: cover;
					  -moz-background-size: cover;
					  -o-background-size: cover;
					  background-size: cover;
					}
				</style>
			<?php endif; ?>
		<?php endwhile; ?>

        <?php
            $featured_pages = get_posts('meta_key=homepage_featured&meta_value=true&post_type=page');

        foreach( $featured_pages as $page ) {
            $meta = get_post_meta( $page->ID );

            ?>
            <div class="columns five offset-by-one">
                <div class="homepage-featured-item <?php echo @$meta['homepage_cssclass'][0]; ?>">
                    <div class="icon"></div>
                    <div class="titles">
                        <h2><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo @$meta['homepage_title'][0]; ?></a></h2>
                        <h3><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo @$meta['homepage_subtitle'][0]; ?></a></h3>
                    </div>
                    <div class="link">
                        <a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo @$meta['homepage_link_label'][0]; ?></a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
						
	</main>
	<div class="content_background"></div>			
</div>

<?php include ( get_template_directory() . "/footer.php"); ?>