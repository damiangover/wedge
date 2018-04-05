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
                <span class="light"><?php echo $page->post_title; ?>
            </header>
            <section class="front--tile-excerpt">
                <div class="front--tile-blurb"><?php echo $page->post_excerpt; ?></div>
                <nav>
                    <?php 
                        $count = 1;
                        foreach ($pages_second_level as $sub_page) { 
                    ?>
                    <a href="<?php echo get_permalink($sub_page->ID); ?>" rel="bookmark" title="<?php echo $sub_page->post_title; ?>">
                        <div class="line-up-text">
                            <p><small><?php echo '0'.$count; $count++ ?></small><p>
                            <p><?php echo $sub_page->post_title; ?></p>
                        </div>
                    </a>
                    <?php } ?>
                </nav>
            </section>
        </div>
    <?php } ?>
</main>

<?php
get_footer();
?>