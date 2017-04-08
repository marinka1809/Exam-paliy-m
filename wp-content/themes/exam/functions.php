<?php
/**
 * exam functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package exam
 */

if ( ! function_exists( 'exam_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function exam_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on exam, use a find and replace
	 * to change 'exam' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'exam', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

    add_image_size( 'portfolio', 364, 322, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'exam' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'exam_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'exam_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function exam_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'exam_content_width', 640 );
}
add_action( 'after_setup_theme', 'exam_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function exam_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'exam' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'exam' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'exam_widgets_init' );

function my_extra_fields() {
    global $post;
    if ( $post->post_name == home ) {

        add_meta_box( 'section_welcome', 'Welcome section ', 'section_welcome_box_func', 'page', 'normal', 'high'  );
        add_meta_box( 'section_services', 'Services section ', 'section_services_box_func', 'page', 'normal', 'high'  );
        add_meta_box( 'section_portfolio', 'Portfolio section ', 'section_portfolio_box_func', 'page', 'normal', 'high'  );
    };
    add_meta_box( 'link-clients', 'Link ', 'link_clients_section_func', 'clients', 'normal', 'high'  );
    add_meta_box( 'label-category', 'Label (category) ', 'label_func', 'portfolio', 'normal', 'high'  );
}
add_action('add_meta_boxes', 'my_extra_fields', 1);

// Block code

function section_welcome_box_func( $post ){ ?>
    <ul>
        <li>
            <label>Section title:
                <input type="text" name="extra[welcome-title]" value="<?php echo get_post_meta($post->ID, 'welcome-title', 1); ?>" style="width:30%;" />
            </label>
        </li>
        <li>
            <label>Section description:
                <textarea type="text" name="extra[welcome-description]" style="width:100%;height:50px;"><?php echo get_post_meta($post->ID, 'welcome-description', 1); ?></textarea>
            </label>
        </li>
        <li>
            <input type="hidden" name="extra[welcome-display]" value="">
            <label><input type="checkbox" name="extra[welcome-display]" value="1" <?php checked( get_post_meta($post->ID, 'welcome-display', 1), 1 ) ?>"> Display ?</label>
        </li>
    </ul>

    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
    <?php
}

function section_services_box_func( $post ){ ?>
    <ul>
        <li>
            <label>Section title:
                <input type="text" name="extra[services-title]" value="<?php echo get_post_meta($post->ID, 'services-title', 1); ?>" style="width:30%;" />
            </label>
        </li>
        <li>
            <label>Section description:
                <textarea type="text" name="extra[services-description]" style="width:100%;height:50px;"><?php echo get_post_meta($post->ID, 'services-description', 1); ?></textarea>
            </label>
        </li>
        <li>
            <input type="hidden" name="extra[info-display]" value="">
            <label><input type="checkbox" name="extra[info-display]" value="1" <?php checked( get_post_meta($post->ID, 'info-display', 1), 1 ) ?>"> Display ?</label>
        </li>
    </ul>

    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
    <?php
}

function section_portfolio_box_func( $post ){ ?>
    <ul>
        <li>
            <label>Section title:
                <input type="text" name="extra[portfolio-title]" value="<?php echo get_post_meta($post->ID, 'portfolio-title', 1); ?>" style="width:30%;" />
            </label>
        </li>
        <li>
            <label>Section description:
                <textarea type="text" name="extra[portfolio-description]" style="width:100%;height:50px;"><?php echo get_post_meta($post->ID, 'portfolio-description', 1); ?></textarea>
            </label>
        </li>
        <li>
            <input type="hidden" name="extra[portfolio-display]" value="">
            <label><input type="checkbox" name="extra[portfolio-display]" value="1" <?php checked( get_post_meta($post->ID, 'portfolio-display', 1), 1 ) ?>"> Display ?</label>
        </li>
    </ul>

    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
    <?php
}
function link_clients_section_func( $post ){ ?>
    <input type="text" name="extra[link_client]" value="<?php echo get_post_meta($post->ID, 'link_client', 1); ?>" style="width:40%;" />
    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
    <?php
}
function label_func( $post ){ ?>
    <input type="text" name="extra[label-image]" value="<?php echo get_post_meta($post->ID, 'label-image', 1); ?>" style="width:40%;" />
    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
    <?php
}

/* Save the data, if you save the post */
function my_extra_fields_update( $post_id ){
    if ( ! wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__) ) return false; // Test
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; // Exit if this autosave
    if ( !current_user_can('edit_post', $post_id) ) return false; // Exit if the user does not have the right to edit the record

    if( !isset($_POST['extra']) ) return false; // If there is no data? left

    // Все ОК! Теперь, нужно сохранить/удалить данные
    $_POST['extra'] = array_map('trim', $_POST['extra']); // Clean all data from spaces at the edges
    foreach( $_POST['extra'] as $key=>$value ){
        if( empty($value) ){
            delete_post_meta($post_id, $key); // Delete the field if the value is empty
            continue;
        }

        update_post_meta($post_id, $key, $value); // add_post_meta() работает автоматически
    }
    return $post_id;
}

add_action('save_post', 'my_extra_fields_update', 0);


/**
 * Enqueue scripts and styles.
 */
function exam_scripts() {
	wp_enqueue_style( 'exam-style', get_stylesheet_uri() );
    wp_enqueue_style( 'libs-css', get_template_directory_uri() . '/style/libs.css', array() );
    wp_enqueue_style( 'main', get_template_directory_uri() . '/style/main.css', array() );
    wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/95a5ddb753.js', true);

	wp_enqueue_script( 'exam-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'exam-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    wp_enqueue_script( 'libs', get_template_directory_uri() . '/js/libs.min.js', array(),  true );
    wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/main.js', array(),  true );
}
add_action( 'wp_enqueue_scripts', 'exam_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement the Custom Logo.
 */
require get_template_directory() . '/inc/custom-logo.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Custom post type
 */
require get_template_directory() . '/inc/custom-post-type.php';