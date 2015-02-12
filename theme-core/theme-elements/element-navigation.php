<!-- DESKTOP MENU -->
<div id="superfish-menu" class="dropdown-menu <?php echo ot_get_option("submenu_indicator_position"); ?>">

    <!-- DEFAULT NAVIGATION -->
    <?php
    if (has_nav_menu('primary_menu')) {

        wp_nav_menu( array(
                'container' =>false,
                'theme_location' => 'primary_menu',
                'menu_class' => 'menu',
                'echo' => true,
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',
                'depth' => 0,
                'walker' => new description_walker())
        );

    }
    ?>
    <!-- /DEFAULT NAVIGATION -->
    <?php if (get_option_tree('footer_social') != 'off') : get_template_part( 'theme-core/theme-elements/element', 'getsocial' ); endif; ?>
</div>
<!-- /DESKTOP MENU -->