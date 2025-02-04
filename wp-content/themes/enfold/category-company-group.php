<?php
get_header();

$category = get_queried_object();
$subcategories = get_terms([
    'taxonomy' => 'category',
    'parent' => $category->term_id,
    'hide_empty' => false
]);

echo '<div class="container">';
echo '<h1>' . esc_html($category->name) . '</h1>';
echo '<div class="company-grid">';

foreach ($subcategories as $subcategory) {
    echo '<div class="company-card">';
    echo '<div class="company-image">';
    $image_path = get_template_directory_uri() . '/images/' . $subcategory->term_id . '.jpg';
    echo '<img src="' . esc_url($image_path) . '" alt="' . esc_attr($subcategory->name) . '">';
    echo '</div>';
    echo '<h3 class="company-name">' . esc_html($subcategory->name) . ' (ID: ' . $subcategory->term_id . ')</h3>';
    echo '</div>';
}

echo '</div>';
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
    cursor: pointer;
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
</style>

<?php get_footer(); ?>