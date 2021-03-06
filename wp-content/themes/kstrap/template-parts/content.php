<?php
/**
 * @package KMA
 * @subpackage kstrap
 * @since 1.0
 * @version 1.2
 */
$headline = ($post->page_information_headline != '' ? $post->page_information_headline : $post->post_title);
$subhead = ($post->page_information_subhead != '' ? $post->page_information_subhead : '');
$sidebar = ($post->sidebar_content_html != '' ? $post->sidebar_content_html : '');

$postterms = get_the_terms($post->ID, 'layout');
$layout = ($postterms ? array_pop($postterms) : false);
$layout = ($layout ? $layout->slug : false);

?>
<div id="mid" >
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <section class="hero is-dark">
            <div class="hero-body">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col<?php echo ($layout != 'sidebar' ? '-lg-10' : ''); ?>">
                        <h1 class="title"><?php echo $headline; ?></h1>
                        <?php echo ($subhead!='' ? '<p class="subtitle">'.$subhead.'</p>' : null); ?>
                        <?php if ('post' === get_post_type()) : ?>
                            <div class="entry-meta">
                                <?php //kstrap_posted_on(); ?>
                            </div><!-- .entry-meta -->
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="content" class="content section">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col<?php echo ($layout != 'sidebar' ? '-lg-10' : ''); ?>">
                        <div class="entry-content">
                            <?php

                                the_content(sprintf(
                                    /* translators: %s: Name of current post. */
                                    wp_kses(__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'kstrap'), array( 'span' => array( 'class' => array()))),
                                    the_title('<span class="screen-reader-text">"', '"</span>', false)
                                ));
                            ?>
                        </div>
                    </div>
                    <?php if ($layout == 'sidebar') { ?>
                    <div class="col-lg-4">
                        <div class="sidebar">
                            <?php echo $sidebar; ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php if (is_page(11)) { ?>
                <div class="row">
                    <div class="col">
                    <?php include(locate_template('template-parts/homeowner-form.php')); ?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>
    </article><!-- #post-## -->
</div>
