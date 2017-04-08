<?php
/**
 * exam Theme Customizer
 *
 * @package exam
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function exam_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'exam_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function exam_customize_preview_js() {
	wp_enqueue_script( 'exam_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'exam_customize_preview_js' );

add_action('customize_register', function($customizer){
    /**
     * copyright
     */
    $customizer->add_section(
        'copyright_text_section',
        array(
            'title' => 'Copyright text',
            'description' => 'You can add or change the text of the copyright, which is displayed at the bottom of the page'
        )
    );
    $customizer->add_setting(
        'copyright_textbox',
        array('default' => 'Copyright text')
    );

    $customizer->add_control(
        'copyright_textbox',
        array(
            'label' => 'Copyright text',
            'section' => 'copyright_text_section',
            'type' => 'text',
        )
    );

    /**
     * client
     */
    $customizer->add_section(
        'clients_section',
        array(
            'title' => 'Clients section',
            'description' => 'You can add or change the text of the copyright, which is displayed at the bottom of the page'
        )
    );
    $customizer->add_setting(
        'title-clients',
        array('default' => 'Featured Clients')
    );

    $customizer->add_control(
        'title-clients',
        array(
            'label' => 'Title for clients',
            'section' => 'clients_section',
            'type' => 'text',
        )
    );

    /**
     * Settings for the blog
     */
    $customizer->add_section(
        'background_page_title-section',
        array(
            'title' => 'Settings for the blog',

            'priority' => 35,
        )
    );
    $customizer->add_setting('background-page-title');
    $customizer->add_control(
        new WP_Customize_Image_Control(
            $customizer,
            'background-page-title',
            array(
                'label' => 'Download the background image for the page title',
                'section' => 'background_page_title-section',
                'settings' => 'background-page-title'
            )
        )
    );

    $customizer->add_setting('icon-link');
    $customizer->add_control(
        new WP_Customize_Image_Control(
            $customizer,
            'icon-link',
            array(
                'label' => 'Icon for link:',
                'section' => 'background_page_title-section',
                'settings' => 'icon-link'
            )
        )
    );

    $customizer->add_setting(
        'time-icon',
        array('default' => 'fa-clock-o')
    );

    $customizer->add_control(
        'time-icon',
        array(
            'label' => esc_html__('Icon for time:', 'exam' ) ,
            'description' => esc_html__('Insert here the class icons with Font Awesome','exam' ) ,
            'section' => 'background_page_title-section',
            'type' => 'text',
        )
    );

    /**
     * Contacts
     */

    $customizer->add_section(
        'contacts-section',
        array(
            'title' => esc_html__( 'Site contacts', 'exam' )
        )
    );

    $customizer->add_setting(
        'titel-contacts',
        array('default' => 'Contact Us:')
    );

    $customizer->add_control(
        'titel-contacts',
        array(
            'label' => esc_html__('Titel contacts:', 'exam' ) ,
            'section' => 'contacts-section',
            'type' => 'text',
        )
    );

    $customizer->add_setting(
        'description-contacts',
        array('default' => 'It is a long established fact that a reader will be distracted by 
the readable content of a page when looking at its layout.')
    );

    $customizer->add_control(
        'description-contacts',
        array(
            'label' => esc_html__('Description contacts:', 'exam' ) ,
            'section' => 'contacts-section',
            'type' => 'text',
        )
    );

    $customizer->add_setting(
        'phone',
        array('default' => '+1 123 4567 891')
    );

    $customizer->add_control(
        'phone',
        array(
            'label' => esc_html__('Phone:', 'exam' ) ,
            'section' => 'contacts-section',
            'type' => 'text',
        )
    );

    $customizer->add_setting(
        'phone-icon',
        array('default' => 'fa-video-camera')
    );

    $customizer->add_control(
        'phone-icon',
        array(
            'label' => esc_html__('Icon for phone:', 'exam' ) ,
            'description' => esc_html__('Insert here the class icons with Font Awesome','exam' ) ,
            'section' => 'contacts-section',
            'type' => 'text',
        )
    );

    $customizer->add_setting(
        'adress',
        array('default' => '123 Office, Street No 2, Parkview.  Sednney, Australia.')
    );

    $customizer->add_control(
        'adress',
        array(
            'label' => esc_html__('Adress:', 'hromadske-tv' ) ,
            'section' => 'contacts-section',
            'type' => 'text',
        )
    );

    $customizer->add_setting(
        'adress-icon',
        array('default' => 'fa-video-camera')
    );

    $customizer->add_control(
        'adress-icon',
        array(
            'label' => esc_html__('Icon for adress:', 'exam' ) ,
            'description' => esc_html__('Insert here the class icons with Font Awesome','exam' ) ,
            'section' => 'contacts-section',
            'type' => 'text',
        )
    );

    $customizer->add_setting(
        'map',
        array('default' => '')
    );

    $customizer->add_control(
        'map',
        array(
            'label' => esc_html__('Map:', 'exam' ) ,
            'description' => esc_html__('Insert map code','exam' ) ,
            'section' => 'contacts-section',
            'type' => 'text',
        )
    );

    $customizer->add_setting('background-contacts');
    $customizer->add_control(
        new WP_Customize_Image_Control(
            $customizer,
            'background-contacts',
            array(
                'label' => 'Download the background image for the contacts',
                'section' => 'contacts-section',
                'settings' => 'background-contacts'
            )
        )
    );
});
