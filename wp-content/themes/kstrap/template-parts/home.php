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
?>
<div id="mid" >
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="section-wrapper" >

            <?php
                $slider = new Slider();
                echo $slider->getSlider('home-page-slider');
            ?>

        </div>
        <div id="quote-box-container" class="container">
            <div class="row no-gutters">
                <div id="quote-box" class="col-lg-5 col-xl-4 text-center">
                    <h2>GET A QUICK QUOTE</h2>
                    <form method="get" action="/quote-request/">
                        <div class="form-options">
                            <label class="custom-control custom-radio">
                                <input id="autooption" name="quotetype" type="radio" class="custom-control-input" value="auto">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">AUTO</span>
                            </label>
                            <label class="custom-control custom-radio">
                                <input id="homeownersoption" name="quotetype" type="radio" class="custom-control-input" value="homeowners">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">HOMEOWNERS</span>
                            </label>
                        </div>
                        <button class="btn btn-lg btn-secondary btn-pill" type="submit" >GET QUOTE</button>
                    </form>
                </div>
            </div>
        </div>
        <section id="content" class="content section">
            <div class="container">
                <h1 class="title"><?php echo $headline; ?></h1>
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-8">
                        <div class="entry-content">
                            <?php
                                echo ($subhead!='' ? '<p class="subtitle">'.$subhead.'</p>' : null);
                                the_content( sprintf(
                                /* translators: %s: Name of current post. */
                                    wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'kstrap' ), array( 'span' => array( 'class' => array() ) ) ),
                                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                                ) );
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sidebar">
                        <?php echo $sidebar; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article><!-- #post-## -->
</div>
<!--<modal v-if="isVisible" @close="isVisible = false"><div class="box" >Welcome!</div></modal>-->