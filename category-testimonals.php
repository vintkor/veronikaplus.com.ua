<?php get_header(); ?>

    <section class="sec_reviews">
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <div class="row min-height-100 flex">
                <div class="col-md-2">
                    <?php echo get_avatar(get_the_author_email(),'96');?>
                </div>
                <div class="col-md-10">
                    <p class="sec_reviews__author"><?php the_title(); ?> 
                        <span><?php echo mysql2date('j F Y', $post->post_date );?></span>
                    </p>
                    <div class="sec_reviews__text"><?php the_content(); ?></div>
                </div>
            </div>
        <?php endwhile; endif;?>
    </section>

<?php get_footer(); ?>