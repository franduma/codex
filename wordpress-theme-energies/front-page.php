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
            <p class="erp-badge"><?php echo esc_html(erp_i18n('Installateur & boutique photovoltaïque', 'Installer & photovoltaic store')); ?></p>
            <h1><?php echo esc_html(erp_i18n('Une interface premium pour vendre vos solutions solaires', 'A premium interface to sell your solar solutions')); ?></h1>
            <p><?php echo esc_html(erp_i18n('Mettez en valeur vos panneaux, onduleurs, batteries et régulateurs MPPT avec un design professionnel orienté confiance et conversion.', 'Showcase your panels, inverters, batteries and MPPT controllers with a professional design focused on trust and conversion.')); ?></p>
            <div class="erp-hero-actions">
                <a class="erp-btn" href="#produits"><?php echo esc_html(erp_i18n('Voir la boutique', 'Browse the shop')); ?></a>
                <a class="erp-btn erp-btn-outline" href="<?php echo esc_url(erp_get_configurator_page_url()); ?>"><?php echo esc_html(erp_i18n('Configurer mon besoin', 'Configure my needs')); ?></a>
            </div>
        </div>

        <aside class="erp-hero-panel erp-card">
            <h3><?php echo esc_html(erp_i18n('Démarrage rapide', 'Quick start')); ?></h3>
            <p><?php echo esc_html(erp_i18n('Guidez vos visiteurs vers une demande de devis claire en 3 étapes.', 'Guide your visitors to a clear quote request in 3 steps.')); ?></p>
            <ul class="erp-check-list">
                <li><?php echo esc_html(erp_i18n('1. Ils découvrent vos produits solaires', '1. They discover your solar products')); ?></li>
                <li><?php echo esc_html(erp_i18n('2. Ils ouvrent le configurateur dédié', '2. They open the dedicated configurator')); ?></li>
                <li><?php echo esc_html(erp_i18n('3. Ils envoient une demande qualifiée', '3. They submit a qualified request')); ?></li>
            </ul>
            <div class="erp-hero-panel-actions">
                <a class="erp-btn" href="<?php echo esc_url(erp_get_configurator_page_url()); ?>"><?php echo esc_html(erp_i18n('Ouvrir le configurateur', 'Open the configurator')); ?></a>
            </div>
        </aside>
    </div>
</section>

<section class="erp-section erp-section-soft">
    <div class="erp-container">
        <h2><?php echo esc_html(erp_i18n('Vos univers produits', 'Your product categories')); ?></h2>
        <div class="erp-grid">
            <article class="erp-card"><h3><?php echo esc_html(erp_i18n('Panneaux solaires', 'Solar panels')); ?></h3><p><?php echo esc_html(erp_i18n('Monocristallins, bifaciaux, kits toiture et sol.', 'Monocrystalline, bifacial, roof and ground kits.')); ?></p></article>
            <article class="erp-card"><h3><?php echo esc_html(erp_i18n('Onduleurs', 'Inverters')); ?></h3><p><?php echo esc_html(erp_i18n('String, hybrides, micro-onduleurs et monitoring.', 'String, hybrid, microinverters and monitoring.')); ?></p></article>
            <article class="erp-card"><h3><?php echo esc_html(erp_i18n('Batteries', 'Batteries')); ?></h3><p><?php echo esc_html(erp_i18n('Stockage résidentiel et tertiaire longue durée.', 'Long-duration storage for residential and commercial use.')); ?></p></article>
            <article class="erp-card"><h3><?php echo esc_html(erp_i18n('Régulateurs MPPT', 'MPPT controllers')); ?></h3><p><?php echo esc_html(erp_i18n('Pilotage intelligent pour un rendement maximal.', 'Smart control for maximum performance.')); ?></p></article>
        </div>
    </div>
</section>

<section id="produits" class="erp-section">
    <div class="erp-container">
        <h2><?php echo esc_html(erp_i18n('Produits en vedette', 'Featured products')); ?></h2>
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
                    <p><?php echo esc_html(erp_i18n('Ajoutez vos premiers produits solaires depuis l’administration WordPress.', 'Add your first solar products from the WordPress admin dashboard.')); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
