<?php

$category = get_queried_object();
$subcategories = get_terms([
    'taxonomy' => 'category',
    'parent' => $category->term_id,
    'hide_empty' => false
]);

echo '<div class="container">';
echo '<h1>' . esc_html($category->name) . '</h1>';

foreach ($subcategories as $subcategory) {
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $subcategory->term_id
            )
        )
    );
    
    $query = new WP_Query($args);
    
    if ($query->have_posts()) :
        echo '<div class="subcategory-section">';
        echo '<h2>' . esc_html($subcategory->name) . '</h2>';
        echo '<div class="company-grid">';
        
        while ($query->have_posts()) :
            $query->the_post();
            ?>
            <div class="company-card">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="company-image">
                        <?php the_post_thumbnail('medium'); ?>
                    </div>
                <?php endif; ?>
                <h3 class="company-name"><?php the_title(); ?></h3>
            </div>
            <?php
        endwhile;
        
        echo '</div>';
        echo '</div>';
    endif;
    wp_reset_postdata();
}

echo '</div>';
?>

<style>
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.company-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
    margin: 20px 0;
}

.company-card {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    overflow: hidden;
    transition: transform 0.2s;
}

.company-card:hover {
    transform: translateY(-5px);
}

.company-image img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.company-name {
    padding: 15px;
    margin: 0;
    font-size: 16px;
    text-align: center;
}

.subcategory-section {
    margin: 40px 0;
}

h2 {
    border-bottom: 2px solid #eee;
    padding-bottom: 10px;
    margin-bottom: 20px;
}
</style>

