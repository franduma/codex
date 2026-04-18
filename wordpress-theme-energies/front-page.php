<?php
/**
 * Front page template.
 *
 * @package EnergiesRenouvelablesPro
 */

get_header();
?>
<section class="erp-hero">
    <div class="erp-container erp-hero-grid">
        <div>
            <p class="erp-badge"><?php esc_html_e('Installateur & boutique photovoltaïque', 'erp-theme'); ?></p>
            <h1><?php esc_html_e('Une interface premium pour vendre vos solutions solaires', 'erp-theme'); ?></h1>
            <p><?php esc_html_e('Mettez en valeur vos panneaux, onduleurs, batteries et régulateurs MPPT avec un design professionnel orienté confiance et conversion.', 'erp-theme'); ?></p>
            <div class="erp-hero-actions">
                <a class="erp-btn" href="#produits"><?php esc_html_e('Voir la boutique', 'erp-theme'); ?></a>
                <a class="erp-btn erp-btn-outline" href="<?php echo esc_url(erp_get_configurator_page_url()); ?>"><?php esc_html_e('Configurer mon besoin', 'erp-theme'); ?></a>
            </div>
        </div>

        <aside class="erp-hero-panel erp-card">
            <h3><?php esc_html_e('Démarrage rapide', 'erp-theme'); ?></h3>
            <p><?php esc_html_e('Guidez vos visiteurs vers une demande de devis claire en 3 étapes.', 'erp-theme'); ?></p>
            <ul class="erp-check-list">
                <li><?php esc_html_e('1. Ils découvrent vos produits solaires', 'erp-theme'); ?></li>
                <li><?php esc_html_e('2. Ils ouvrent le configurateur dédié', 'erp-theme'); ?></li>
                <li><?php esc_html_e('3. Ils envoient une demande qualifiée', 'erp-theme'); ?></li>
            </ul>
            <div class="erp-hero-panel-actions">
                <a class="erp-btn" href="<?php echo esc_url(erp_get_configurator_page_url()); ?>"><?php esc_html_e('Ouvrir le configurateur', 'erp-theme'); ?></a>
            </div>
        </aside>
    </div>
</section>

<section class="erp-section erp-section-soft">
    <div class="erp-container">
        <h2><?php esc_html_e('Vos univers produits', 'erp-theme'); ?></h2>
        <div class="erp-grid">
            <article class="erp-card"><h3><?php esc_html_e('Panneaux solaires', 'erp-theme'); ?></h3><p><?php esc_html_e('Monocristallins, bifaciaux, kits toiture et sol.', 'erp-theme'); ?></p></article>
            <article class="erp-card"><h3><?php esc_html_e('Onduleurs', 'erp-theme'); ?></h3><p><?php esc_html_e('String, hybrides, micro-onduleurs et monitoring.', 'erp-theme'); ?></p></article>
            <article class="erp-card"><h3><?php esc_html_e('Batteries', 'erp-theme'); ?></h3><p><?php esc_html_e('Stockage résidentiel et tertiaire longue durée.', 'erp-theme'); ?></p></article>
            <article class="erp-card"><h3><?php esc_html_e('Régulateurs MPPT', 'erp-theme'); ?></h3><p><?php esc_html_e('Pilotage intelligent pour un rendement maximal.', 'erp-theme'); ?></p></article>
        </div>
    </div>
</section>

<section id="produits" class="erp-section">
    <div class="erp-container">
        <h2><?php esc_html_e('Produits en vedette', 'erp-theme'); ?></h2>
        <?php if (class_exists('WooCommerce')) : ?>
            <div class="erp-woocommerce-shortcode-wrap">
                <?php echo do_shortcode('[products limit="8" columns="4" orderby="date" order="DESC"]'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
            </div>
        <?php else : ?>
            <div class="erp-grid">
                <?php
                $query = new WP_Query([
                    'post_type'      => 'erp_product',
                    'posts_per_page' => 8,
                ]);

                if ($query->have_posts()) :
                    while ($query->have_posts()) :
                        $query->the_post();
                        get_template_part('template-parts/content', 'product');
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <p><?php esc_html_e('Ajoutez vos premiers produits solaires depuis l’administration WordPress.', 'erp-theme'); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
