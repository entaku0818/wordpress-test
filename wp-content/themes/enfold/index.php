<?php
if (!defined('ABSPATH')) {
    die();
}

global $avia_config, $more;
get_header();

// タイトル設定
$title = __('Blog - Latest News', 'avia_framework');
$t_link = home_url('/');
$t_sub = '';

if (avia_get_option('frontpage') && $blogpage_id = avia_get_option('blogpage')) {
    $title = get_the_title($blogpage_id);
    $t_link = get_permalink($blogpage_id);
    $t_sub = avia_post_meta($blogpage_id, 'subtitle');
}

if (!empty($blogpage_id) && get_post_meta($blogpage_id, 'header', true) != 'no') {
    echo avia_title(array('heading' => 'strong', 'title' => $title, 'link' => $t_link, 'subtitle' => $t_sub));
}

do_action('ava_after_main_title');

$main_class = apply_filters('avf_custom_main_classes', 'av-main-' . basename(__FILE__, '.php'), basename(__FILE__));
?>

<div class='container_wrap container_wrap_first main_color <?php avia_layout_class('main'); ?> <?php echo avia_blog_class_string(); ?>'>
    <div class='container template-blog'>
        <!-- 事業分野ボタン -->
        <div class="main-buttons">
            <a href="/category/company-group/" class="main-button">
                <span class="button-text">事業分野</span>
            </a>
        </div>

        <main class='content <?php avia_layout_class('content'); ?> units <?php echo $main_class; ?>' <?php avia_markup_helper(array('context' => 'content')); ?>>
            <?php
            $avia_config['blog_style'] = apply_filters('avf_blog_style', avia_get_option('blog_style', 'multi-big'), 'blog');
            
            if ($avia_config['blog_style'] == 'blog-grid') {
                $atts = array(
                    'type' => 'grid',
                    'items' => get_option('posts_per_page'),
                    'columns' => 3,
                    'class' => 'avia-builder-el-no-sibling',
                    'paginate' => 'yes'
                );

                $atts = apply_filters('avf_post_slider_args', $atts, 'index');

                $blog = new avia_post_slider($atts);
                $blog->query_entries();
                echo '<div class="entry-content-wrapper">' . $blog->html() . '</div>';
            } else {
                $more = 0;
                get_template_part('includes/loop', 'index');
            }
            ?>
        </main>

        <?php
        wp_reset_query();
        $avia_config['currently_viewing'] = 'blog';
        if (is_front_page()) {
            $avia_config['currently_viewing'] = 'frontpage';
        }
        get_sidebar();
        ?>
    </div>
</div>

<style>
.main-buttons {
    display: flex;
    justify-content: center;
    margin: 0 0 40px;
}

.main-button {
    padding: 15px 40px;
    background: #fff;
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    text-decoration: none;
    color: inherit;
    transition: transform 0.2s;
}

.main-button:hover {
    transform: translateY(-3px);
}

.button-text {
    font-size: 16px;
    font-weight: bold;
}
</style>

<?php
get_footer();
?>