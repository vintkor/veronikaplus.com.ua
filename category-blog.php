<?php get_header(); ?>

<section class="blog-list">
    <h1 class="blog-list__maintitle align-center">блог</h1>
    <?php $count = 0; ?>
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <article>
            <div class="row prepend">
                <?php if( $count % 2 == 0 ): ?>
                    <div class="col-md-6 col-sm-5"><?php the_post_thumbnail(' img-responsive'); ?></div>
                    <div class="col-md-6 col-sm-7">
                        <div class="blog-list__text">
                            <h2 class="blog-list__title"><?php the_title(); ?></h2>
                            <p class="blog-list__date"><?php echo mysql2date('j/m/Y - H:i', $post->post_date );?></p>
                            <?php echo mb_substr( strip_tags( get_the_content() ), 0, 400 ); ?>...<br>
                            <div class="align-left"><a class="blog-list__link" href="<?php the_permalink(); ?>">читать полностью</a></div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-md-6 col-sm-7 col-xs-12 block-top">
                        <div class="blog-list__text">
                            <h2 class="blog-list__title"><?php the_title(); ?></h2>
                            <p class="blog-list__date"><?php echo mysql2date('j/m/Y - H:i', $post->post_date );?></p>
                            <?php echo mb_substr( strip_tags( get_the_content() ), 0, 400 ); ?>...<br>
                            <div class="align-right"><a class="blog-list__link" href="<?php the_permalink(); ?>">читать полностью</a></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-5 col-xs-12 block-bottom"><?php the_post_thumbnail(' img-responsive'); ?></div>
                <?php endif; ?>
            </div>
        </article>
    <?php $count++; ?>
    <?php endwhile; endif;?>
        <div class="navigate">
            <?php wp_pagenavi(); ?>
        </div>
</section>

<?php get_footer(); ?>