<?php
/**
 * WooCommerce fallback template.
 *
 * @package EnergiesRenouvelablesPro
 */

get_header();
?>
<main class="erp-section">
    <div class="erp-container erp-woocommerce-container">
        <?php
        if (is_shop()) {
            $shop_page_id = wc_get_page_id('shop');
            if ($shop_page_id > 0) {
                $shop_page = get_post($shop_page_id);
                if ($shop_page instanceof WP_Post && trim((string) $shop_page->post_content) !== '') {
                    ?>
                    <section class="erp-shop-intro">
                        <?php
                        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Content is filtered by WordPress.
                        echo apply_filters('the_content', $shop_page->post_content);
                        ?>
                    </section>
                    <?php
                }
            }
        }
        ?>

        <?php woocommerce_content(); ?>

        <?php
        if (is_shop() && ! woocommerce_product_loop() && current_user_can('manage_woocommerce')) :
            ?>
            <p>
                <strong><?php esc_html_e('Aucun produit visible dans la boutique pour cette langue/ce contexte.', 'erp-theme'); ?></strong>
                <?php esc_html_e('Vérifiez la publication, la visibilité catalogue et les traductions produits.', 'erp-theme'); ?>
            </p>
        <?php endif; ?>
    </div>
</main>
<?php
get_footer();
