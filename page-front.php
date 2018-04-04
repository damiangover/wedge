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
        );

        $pages = get_pages($args);
    ?>

    <?php foreach ($pages as $page) { ?>
        <a href="<?php echo get_permalink($page->ID); ?>" rel="bookmark" title="<?php echo $page->post_title; ?>">
        <header><h1><?php echo $page->post_title; ?></h1></header>
        <?php }?>
</main>

<?php
get_footer();
?>