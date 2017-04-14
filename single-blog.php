<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <section class="blog-list">
        <article>
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-list__text">
                        <?php the_post_thumbnail(' blog-list__main-image img-responsive alignleft'); ?>
                        <h2 class="blog-list__title"><?php the_title(); ?></h2>
                        <p class="blog-list__date"><?php echo mysql2date('j/m/Y - H:i', $post->post_date );?></p>
                        <?php the_content(); ?><br>
                        <div class="align-center"><a class="blog-list__link" href="/category/blog/">вернуться в блог</a></div>
                    </div>
                </div>
            </div>
        </article>
    </section>
<?php endwhile; endif;?>
<?php get_footer(); ?>
