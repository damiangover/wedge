<?php
/* Template Name: Front Page Template */
get_header();
?>

<main class="grid">
    <?php
        $args = array(
            'parent' => $post->ID,
            'post_type' => 'page',
            'post_status' => 'publish',
            'sort_order' => 'asc',
            'sort_column' => 'menu_order'
        );

        $pages = get_pages($args);
    ?>

    <?php foreach ($pages as $page) { 
        $args = array(
            'parent' => $page->ID,
            'post_type' => 'page',
            'post_status' => 'publish',
            'sort_order' => 'asc',
            'sort_column' => 'menu_order'
        );

        $pages_second_level = get_pages($args);

        ?>
        
        <div class="front--tile">
            <header class="front--tile-header">
                <a href="<?php echo get_permalink($page->ID); ?>" rel="bookmark" title="<?php echo $page->post_title; ?>">
                    <?php echo $page->post_title; ?>
                </a>
            </header>
            <section class="front--tile-excerpt">
                <p><?php echo $page->post_excerpt; ?></p>
                <?php 
                    $count = 1;
                    foreach ($pages_second_level as $sub_page) { 
                ?>
                    <nav>
                        <a href="<?php echo get_permalink($sub_page->ID); ?>" class="link" rel="bookmark" title="<?php echo $sub_page->post_title; ?>">
                            <p>
                                <small><?php echo '0'.$count; $count++ ?></small>
                                <?php echo $sub_page->post_title; ?>
                            </p>
                        </a>
                    </nav>
                <?php } ?>
            </section>
        </div>
    <?php } ?>
</main>

<?php
get_footer();
?>