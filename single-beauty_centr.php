<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <section class="single_beauty-centr">
        <article>
            <div class="row">
                <div class="col-md-6 col-sm-5"><?php the_post_thumbnail(' single_beauty-centr__main-image img-responsive'); ?></div>
                <div class="col-md-6 col-sm-7">
                    <h2 class="single_beauty-centr__title"><?php the_title(); ?></h2>
                    <div class="single_beauty-centr__excerpt">
                        Описание процедуры: <?php echo get_the_excerpt(); ?>
                    </div>
                    <div class="row single_beauty-centr__subcat-items">
                        <div class="col-md-4 col-sm-4 col-xs-4 single_beauty-centr__subcat-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/app/img/calendar.png"> <?php the_field('сеанс'); ?>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 single_beauty-centr__subcat-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/app/img/clock.png"> <?php the_field('длительность'); ?>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 single_beauty-centr__subcat-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/app/img/price.png"> <?php the_field('стоимость'); ?>
                        </div>
                    </div>
                    <button class="single_beauty-centr__button pull-right" data-toggle="modal" data-target="#service-modal">записаться</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="single_beauty-centr__text">
                        <?php the_content(); ?><br>
                        <div class="align-center"><a class="single_beauty-centr__link" href="/category/beauty_centr/">вернуться к списку</a></div>
                    </div>
                </div>
            </div>
        </article>
    </section>
<?php endwhile; endif;?>
<?php get_footer(); ?>
