<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <section class="index-page">
        <div class="row">
            <div class="col-md-12">
                <div class="index-page__text">
                    <?php the_post_thumbnail(); ?>
                    <h1 class="blog-list__title"><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; endif;?>
<?php get_footer(); ?>
