<?php

get_header();

$category = get_queried_object();

echo '<div class="container">';
echo '<h1>' . esc_html($category->name) . '</h1>';

$image_path = get_template_directory_uri() . '/images/' . $category->term_id . '.jpg';
?>

<div class="category-hero">
    <img src="<?php echo esc_url($image_path); ?>" alt="<?php echo esc_attr($category->name); ?>">
    <div class="category-description">
        <?php echo wpautop($category->description); ?>
    </div>
</div>

<div class="company-details">
    <h2>企業情報</h2>
    <?php
    $args = array(
        'post_type' => 'post',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $category->term_id
            )
        )
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
    ?>
        <div class="company-post">
            <h3><?php the_title(); ?></h3>
            <div class="company-content">
                <?php the_content(); ?>
            </div>
        </div>
    <?php
        endwhile;
        wp_reset_postdata();
    endif;
    ?>
</div>

</div>

<style>
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.category-hero {
    margin-bottom: 40px;
}

.category-hero img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    border-radius: 8px;
}

.category-description {
    margin: 20px 0;
    font-size: 16px;
    line-height: 1.6;
}

.company-details {
    background: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.company-post {
    margin-bottom: 30px;
    padding-bottom: 30px;
    border-bottom: 1px solid #eee;
}

.company-post:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}
</style>

<?php get_footer(); ?>