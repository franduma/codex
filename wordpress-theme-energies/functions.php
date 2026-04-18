<?php
/**
 * Theme bootstrap.
 *
 * @package EnergiesRenouvelablesPro
 */

if (! defined('ABSPATH')) {
    exit;
}

function erp_theme_setup(): void {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 260,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    register_nav_menus([
        'primary' => __('Menu principal', 'erp-theme'),
        'footer'  => __('Menu pied de page', 'erp-theme'),
    ]);
}
add_action('after_setup_theme', 'erp_theme_setup');

function erp_theme_assets(): void {
    wp_enqueue_style('erp-style', get_stylesheet_uri(), [], wp_get_theme()->get('Version'));
    wp_enqueue_script('erp-main', get_template_directory_uri() . '/assets/js/main.js', [], wp_get_theme()->get('Version'), true);
}
add_action('wp_enqueue_scripts', 'erp_theme_assets');

function erp_primary_menu_fallback(): void {
    echo '<ul class="erp-menu">';
    wp_list_pages([
        'title_li' => '',
        'depth'    => 1,
    ]);
    echo '</ul>';
}

function erp_customize_register(WP_Customize_Manager $wp_customize): void {
    $wp_customize->add_section('erp_theme_options', [
        'title'    => __('Options Energies Renouvelables Pro', 'erp-theme'),
        'priority' => 30,
    ]);

    $wp_customize->add_setting('erp_quote_shortcode', [
        'default'           => '[solithium-wizard]',
        'sanitize_callback' => 'wp_kses_post',
    ]);

    $wp_customize->add_control('erp_quote_shortcode', [
        'label'       => __('Shortcode configurateur devis', 'erp-theme'),
        'description' => __('Exemple: [solithium-wizard] ou [configurateur_devis]', 'erp-theme'),
        'section'     => 'erp_theme_options',
        'type'        => 'text',
    ]);

    $wp_customize->add_setting('erp_language_switcher_shortcode', [
        'default'           => '[gtranslate]',
        'sanitize_callback' => 'wp_kses_post',
    ]);

    $wp_customize->add_control('erp_language_switcher_shortcode', [
        'label'       => __('Shortcode sélecteur de langue', 'erp-theme'),
        'description' => __('Exemple: [gtranslate]. Laissez vide pour masquer le switcher.', 'erp-theme'),
        'section'     => 'erp_theme_options',
        'type'        => 'text',
    ]);
}
add_action('customize_register', 'erp_customize_register');

function erp_register_products_cpt(): void {
    $labels = [
        'name'          => __('Produits solaires', 'erp-theme'),
        'singular_name' => __('Produit solaire', 'erp-theme'),
        'add_new_item'  => __('Ajouter un produit solaire', 'erp-theme'),
        'edit_item'     => __('Modifier le produit solaire', 'erp-theme'),
    ];

    register_post_type('erp_product', [
        'labels'       => $labels,
        'public'       => true,
        'menu_icon'    => 'dashicons-lightbulb',
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'produits-solaires'],
        'supports'     => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'erp_register_products_cpt');

function erp_register_product_meta(): void {
    register_post_meta('erp_product', '_erp_price', [
        'single'        => true,
        'type'          => 'string',
        'show_in_rest'  => true,
        'auth_callback' => '__return_true',
    ]);

    register_post_meta('erp_product', '_erp_product_type', [
        'single'        => true,
        'type'          => 'string',
        'show_in_rest'  => true,
        'auth_callback' => '__return_true',
    ]);
}
add_action('init', 'erp_register_product_meta');

function erp_product_meta_box(): void {
    add_meta_box('erp_product_data', __('Détails produit', 'erp-theme'), 'erp_product_meta_box_callback', 'erp_product', 'normal', 'high');
}
add_action('add_meta_boxes', 'erp_product_meta_box');

function erp_product_meta_box_callback(WP_Post $post): void {
    wp_nonce_field('erp_save_product_data', 'erp_product_nonce');

    $price = get_post_meta($post->ID, '_erp_price', true);
    $type  = get_post_meta($post->ID, '_erp_product_type', true);
    ?>
    <p>
        <label for="erp_product_type"><strong><?php esc_html_e('Type', 'erp-theme'); ?></strong></label><br>
        <select id="erp_product_type" name="erp_product_type">
            <option value="panel" <?php selected($type, 'panel'); ?>><?php esc_html_e('Panneau solaire', 'erp-theme'); ?></option>
            <option value="inverter" <?php selected($type, 'inverter'); ?>><?php esc_html_e('Onduleur', 'erp-theme'); ?></option>
            <option value="battery" <?php selected($type, 'battery'); ?>><?php esc_html_e('Batterie', 'erp-theme'); ?></option>
            <option value="mppt" <?php selected($type, 'mppt'); ?>><?php esc_html_e('Régulateur MPPT', 'erp-theme'); ?></option>
        </select>
    </p>
    <p>
        <label for="erp_price"><strong><?php esc_html_e('Prix (ex: 799€)', 'erp-theme'); ?></strong></label><br>
        <input id="erp_price" name="erp_price" type="text" value="<?php echo esc_attr($price); ?>" class="regular-text" />
    </p>
    <?php
}

function erp_save_product_data(int $post_id): void {
    if (! isset($_POST['erp_product_nonce']) || ! wp_verify_nonce($_POST['erp_product_nonce'], 'erp_save_product_data')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (! current_user_can('edit_post', $post_id)) {
        return;
    }

    $allowed_types = ['panel', 'inverter', 'battery', 'mppt'];
    $type = isset($_POST['erp_product_type']) ? sanitize_text_field(wp_unslash($_POST['erp_product_type'])) : '';
    $price = isset($_POST['erp_price']) ? sanitize_text_field(wp_unslash($_POST['erp_price'])) : '';

    if (in_array($type, $allowed_types, true)) {
        update_post_meta($post_id, '_erp_product_type', $type);
    }

    update_post_meta($post_id, '_erp_price', $price);
}
add_action('save_post_erp_product', 'erp_save_product_data');

function erp_get_quote_shortcode_candidates(): array {
    $configured = trim((string) get_theme_mod('erp_quote_shortcode', '[solithium-wizard]'));

    $candidates = [];

    if ($configured !== '') {
        $candidates[] = $configured;
    }

    $fallback_tags = ['solithium-wizard', 'solithium_wizard', 'configurateur_devis'];

    foreach ($fallback_tags as $tag) {
        $candidates[] = '[' . $tag . ']';
    }

    return array_values(array_unique($candidates));
}

function erp_normalize_shortcode_tag(string $shortcode): string {
    $shortcode = trim($shortcode);

    if ($shortcode === '') {
        return '';
    }

    if (preg_match('/^\[\s*([^\s\]]+)/', $shortcode, $matches) === 1) {
        return sanitize_key($matches[1]);
    }

    return sanitize_key($shortcode);
}

function erp_render_quote_shortcode(): string {
    $candidates = erp_get_quote_shortcode_candidates();

    foreach ($candidates as $candidate) {
        $tag = erp_normalize_shortcode_tag($candidate);

        if ($tag !== '' && shortcode_exists($tag)) {
            $rendered = do_shortcode($candidate);
            if (trim(wp_strip_all_tags($rendered)) !== '') {
                return $rendered;
            }
        }
    }

    if (current_user_can('manage_options')) {
        return '<p><strong>Configurateur non affiché.</strong> Vérifiez le shortcode dans Apparence > Personnaliser > Options Energies Renouvelables Pro.</p>';
    }

    return '';
}

function erp_render_language_switcher(): string {
    $shortcode = trim((string) get_theme_mod('erp_language_switcher_shortcode', '[gtranslate]'));

    if ($shortcode === '') {
        return '';
    }

    $tag = erp_normalize_shortcode_tag($shortcode);
    if ($tag === '' || ! shortcode_exists($tag)) {
        return '';
    }

    $output = do_shortcode($shortcode);

    return trim($output) !== '' ? $output : '';
}

function erp_get_configurator_page_url(): string {
    $configurator_page = get_page_by_path('configurateur-solaire');

    if ($configurator_page instanceof WP_Post) {
        return (string) get_permalink($configurator_page);
    }

    return home_url('/#devis');
}

function erp_add_body_class(array $classes): array {
    $classes[] = 'erp-theme';

    return $classes;
}
add_filter('body_class', 'erp_add_body_class');

/**
 * Detect if current language/locale is English.
 */
function erp_is_english_language(): bool {
    $request_language_keys = ['lang', 'language', 'gtranslate_lang'];

    foreach ($request_language_keys as $request_language_key) {
        if (isset($_GET[$request_language_key])) {
            $request_language = strtolower(sanitize_text_field(wp_unslash($_GET[$request_language_key])));
            if (str_starts_with($request_language, 'en')) {
                return true;
            }
            if (str_starts_with($request_language, 'fr')) {
                return false;
            }
        }
    }

    $cookie_language_keys = ['gtranslate_lang', 'gtranslate-language'];

    foreach ($cookie_language_keys as $cookie_language_key) {
        if (isset($_COOKIE[$cookie_language_key])) {
            $cookie_language = strtolower(sanitize_text_field(wp_unslash($_COOKIE[$cookie_language_key])));
            if (str_starts_with($cookie_language, 'en')) {
                return true;
            }
            if (str_starts_with($cookie_language, 'fr')) {
                return false;
            }
        }
    }

    if (isset($_COOKIE['googtrans'])) {
        $googtrans = strtolower(sanitize_text_field(wp_unslash($_COOKIE['googtrans'])));
        $googtrans_parts = explode('/', trim($googtrans, '/'));
        $target_language = end($googtrans_parts);
        if (is_string($target_language) && str_starts_with($target_language, 'en')) {
            return true;
        }
        if (is_string($target_language) && str_starts_with($target_language, 'fr')) {
            return false;
        }
    }

    if (function_exists('pll_current_language')) {
        $language = (string) pll_current_language('slug');
        if ($language !== '') {
            return str_starts_with($language, 'en');
        }
    }

    if (defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE !== '') {
        return str_starts_with((string) ICL_LANGUAGE_CODE, 'en');
    }

    $locale = function_exists('determine_locale') ? determine_locale() : get_locale();

    return str_starts_with((string) $locale, 'en');
}

/**
 * Return FR or EN copy depending on active language.
 */
function erp_i18n(string $french, string $english): string {
    if (erp_is_english_language()) {
        return $english;
    }

    return $french;
}
