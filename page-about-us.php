<?php
/*
Template Name: О нас
*/
?>

<?php get_header(); ?>
<!-- =========================== page about-us =========================== -->
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <section class="page-about">
        <div class="row">
            <div class="col-md-12">
                <div class="page-about__text">
                    <?php the_post_thumbnail(); ?>
                    <h1 class="blog-list__title"><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; endif;?>
<?php get_footer(); ?>