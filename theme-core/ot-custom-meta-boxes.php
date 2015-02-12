<?php

/**
 * Initialize the meta boxes.
 */
add_action( 'admin_init', 'custom_meta_boxes_child' );

function custom_meta_boxes_child() {

    /* ================= */

    $talent_options = array(
        'id'        => 'page_options',
        'title'     => 'Theme Talent Options',
        'desc'      => '',
        'pages'     => array( 'talent' ),
        'context'   => 'normal',
        'priority'  => 'high',
        'fields'    => array(
            array(
                'label'       => 'Avatar',
                'id'          => 'avatar',
                'type'        => 'upload',
                'desc'        => 'Add an avatar.',
                'std'         => '',
            ),
            array(
                'label'       => 'Website URL',
                'id'          => 'website_link_url',
                'type'        => 'text',
                'desc'        => 'URL to link to the talent website.',
                'std'         => '',
            ),
            array(
                'label'       => 'Website link label',
                'id'          => 'website_link_label',
                'type'        => 'text',
                'desc'        => 'Label of the link to the talent website.',
                'std'         => '',
            ),
            array(
                'label'       => 'Post Layout',
                'id'          => 'content_layout',
                'type'        => 'radio-image',
                'desc'        => 'Select your page layout.',
                'std'         => 'default',
            ),
            array(
                'id'          => 'mobile_content_top_margin',
                'label'       => 'Mobile : Content Column Top Margin',
                'desc'        => 'When viewing the site on small devices it can be useful to push the content column down when you want the background visible. This option allows you to fine-tune just how far the content gets pushed down.',
                'std'         => '',
                'type'        => 'select',
                'choices'     => array(
                    array(
                        'value'       => '70',
                        'label'       => 'Theme Default - 70%',
                    ),
                    array(
                        'value'       => '0',
                        'label'       => '0%',
                    ),
                    array(
                        'value'       => '10',
                        'label'       => '10%',
                    ),
                    array(
                        'value'       => '20',
                        'label'       => '20%',
                    ),
                    array(
                        'value'       => '30',
                        'label'       => '30%',
                    ),
                    array(
                        'value'       => '40',
                        'label'       => '40%',
                    ),
                    array(
                        'value'       => '50',
                        'label'       => '50%',
                    ),
                    array(
                        'value'       => '60',
                        'label'       => '60%',
                    ),
                    array(
                        'value'       => '70',
                        'label'       => '70%',
                    ),
                    array(
                        'value'       => '80',
                        'label'       => '80%',
                    ),
                    array(
                        'value'       => '90',
                        'label'       => '90%',
                    ),
                    array(
                        'value'       => '100',
                        'label'       => '100%',
                    )
                ),
            ),
            array(
                'id'          => 'background_slider_toggle',
                'label'       => 'Custom Background Slider',
                'desc'        => 'Toggle whether you would like to use the background slider on this page or not.',
                'std'         => 'on',
                'type'        => 'select',
                'choices'     => array(
                    array(
                        'value'       => 'off',
                        'label'       => 'No Slider (Background will default to use the featured image).',
                    ),
                    array(
                        'value'       => 'on',
                        'label'       => 'Simple Background Slider',
                    ),
                ),
            ),
            array(
                'id'          => 'background_slider',
                'label'       => 'Custom Background Image(s)',
                'desc'        => 'Add a new item for each background image that you want to add. An uploaded image is all that is required (the link does nothing). The image should be a JPG sized to about 2100x1200.',
                'type'        => 'list-item',
                'condition'   => 'background_slider_toggle:is(on)'
            ),
            array(
                'id'          => 'background_slider_controls',
                'label'       => 'Background Slider : Playhead Controls',
                'desc'        => 'This is "on" by default - turn it off to hide the Previous, Play/Pause, and Next buttons.',
                'type'        => 'on_off',
                'std'         => 'off',
                'condition'   => 'background_slider_toggle:is(on)',
            ),
            array(
                'id'          => 'slider_mode',
                'label'       => 'Background Slider : Slider Pagination Mode',
                'desc'        => 'BETA: Change the default behavior of the slider.',
                'type'        => 'select',
                'std'         => 'none',
                'condition'   => 'background_slider_toggle:is(on)',
                'choices'     => array(
                    array(
                        'value'       => 'thumbnails',
                        'label'       => 'Thumbnails',
                    ),
                    array(
                        'value'       => 'rectangles',
                        'label'       => 'Rectangles',
                    ),
                    array(
                        'value'       => 'circles',
                        'label'       => 'Circles',
                    ),
                    array(
                        'value'       => 'none',
                        'label'       => 'None',
                    ),
                ),
            ),
            array(
                'id'          => 'slider_titles',
                'label'       => 'Background Slider : Titles & Captions',
                'desc'        => 'This is "on" by default - turn it off to hide the slide title and description.',
                'type'        => 'on_off',
                'std'         => 'off',
                'condition'   => 'background_slider_toggle:is(on)',
            ),
            array(
                'id'          => 'slider_thumbnail_size',
                'label'       => 'Background Slider : Thumbnail Size',
                'desc'        => 'Set the max height of the thumbnails (ie: \'100px\'). The theme will do the rest.',
                'type'        => 'text',
                'std'         => '0px',
                'condition'   => 'slider_mode:is(thumbnails)',
            ),
            array(
                'id'          => 'slider_thumbnail_opacity',
                'label'       => 'Background Slider : Thumbnail Opacity',
                'desc'        => 'Set the opacity of the thumbnails. The theme will do the rest.',
                'type'        => 'select',
                'std'         => 'pagination',
                'condition'   => 'slider_mode:is(thumbnails)',
                'choices'     => array(
                    array(
                        'value'       => '0.1',
                        'label'       => '10%',
                    ),
                    array(
                        'value'       => '0.2',
                        'label'       => '20%',
                    ),
                    array(
                        'value'       => '0.3',
                        'label'       => '30%',
                    ),
                    array(
                        'value'       => '0.4',
                        'label'       => '40%',
                    ),
                    array(
                        'value'       => '0.5',
                        'label'       => '50%',
                    ),
                    array(
                        'value'       => '0.6',
                        'label'       => '60%',
                    ),
                    array(
                        'value'       => '0.7',
                        'label'       => '70%',
                    ),
                    array(
                        'value'       => '0.8',
                        'label'       => '80%',
                    ),
                    array(
                        'value'       => '0.9',
                        'label'       => '90%',
                    ),
                    array(
                        'value'       => '1',
                        'label'       => '100%',
                    ),
                ),
            ),

            array(
                'id'          => 'slider_transition',
                'label'       => 'Background Slider : Slide Time',
                'desc'        => 'How long each slide will stay?',
                'type'        => 'select',
                'std'         => 'crossfade',
                'condition'   => 'background_slider_toggle:is(on)',
                'choices'     => array(
                    array(
                        'value'       => 'crossfade',
                        'label'       => 'Crossfade (default)',
                    ),
                    array(
                        'value'       => 'slidefade',
                        'label'       => 'Slidefade',
                    ),
                    array(
                        'value'       => 'fade',
                        'label'       => 'Fade',
                    ),
                    array(
                        'value'       => 'slide',
                        'label'       => 'Slide',
                    ),
                ),
            ),
            array(
                'id'          => 'slider_slide_time',
                'label'       => 'Background Slider : Slide Time',
                'desc'        => 'How long each slide will stay?',
                'type'        => 'select',
                'std'         => '4000',
                'condition'   => 'background_slider_toggle:is(on)',
                'choices'     => array(
                    array(
                        'value'       => '999999',
                        'label'       => 'Disable Autoplay',
                    ),
                    array(
                        'value'       => '1000',
                        'label'       => '1 second',
                    ),
                    array(
                        'value'       => '2000',
                        'label'       => '2 seconds',
                    ),
                    array(
                        'value'       => '3000',
                        'label'       => '3 seconds',
                    ),
                    array(
                        'value'       => '4000',
                        'label'       => '4 seconds (default)',
                    ),
                    array(
                        'value'       => '5000',
                        'label'       => '5 seconds',
                    ),
                    array(
                        'value'       => '6000',
                        'label'       => '6 seconds',
                    ),
                    array(
                        'value'       => '7000',
                        'label'       => '7 seconds',
                    ),
                    array(
                        'value'       => '8000',
                        'label'       => '8 seconds',
                    ),
                    array(
                        'value'       => '9000',
                        'label'       => '9 seconds',
                    ),
                    array(
                        'value'       => '10000',
                        'label'       => '10 seconds',
                    ),
                ),
            ),
            array(
                'id'          => 'slider_effect_speed',
                'label'       => 'Background Slider : Effect Speed',
                'desc'        => 'How fast is the transition?',
                'type'        => 'select',
                'std'         => '0',
                'condition'   => 'background_slider_toggle:is(on)',
                'choices'     => array(
                    array(
                        'value'       => '0',
                        'label'       => 'No transition',
                    ),
                    array(
                        'value'       => '400',
                        'label'       => '400',
                    ),
                    array(
                        'value'       => '600',
                        'label'       => '600',
                    ),
                    array(
                        'value'       => '800',
                        'label'       => '800',
                    ),
                    array(
                        'value'       => '1000',
                        'label'       => '1000 (1 second - default)',
                    ),
                    array(
                        'value'       => '1500',
                        'label'       => '1500 (1.5 seconds)',
                    ),
                    array(
                        'value'       => '2000',
                        'label'       => '2000 (2 seconds)',
                    )
                ),
            ),

        )
    );

    /* ================= */

    ot_register_meta_box( $talent_options );
}
?>