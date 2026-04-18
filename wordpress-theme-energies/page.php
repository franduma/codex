<?php
/**
 * Page template.
 *
 * @package EnergiesRenouvelablesPro
 */

get_header();
?>
<main class="erp-section">
    <div class="erp-container">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class('erp-card'); ?>>
                    <h1><?php the_title(); ?></h1>
                    <div class="erp-page-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p><?php esc_html_e('Aucun contenu trouvé.', 'erp-theme'); ?></p>
        <?php endif; ?>
    </div>
</main>
<?php
get_footer();
