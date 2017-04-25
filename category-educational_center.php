<?php get_header(); ?>

<section class="edu-center">
    <h1 class="edu-center__maintitle align-center">ПРОГРАММА КУРСОВ</h1>
    <div class="row">
        <div class="col-md-5 col-sm-4">
            <h2 class="edu-center__cat-maintitle">НАПРАВЛЕНИЕ ОБУЧЕНИЯ</h2>
            <div class="edu-center__tabs2-nav edu-center__tabs2-nav-1 animated fadeIn">
                <ul class="edu-center__cat-list">
                    <?php $count2 = 0; ?>
                    <?php $idObj = get_category_by_slug('educational_center'); $id = $idObj->term_id; $n=25;
                    $recent = new WP_Query("cat=$id&showposts=$n");?>
                    <?php while($recent->have_posts()) : $recent->the_post();?>
                        <li class="edu-center__cat-list-li"><a href="#<?php echo get_the_ID(); ?>" data-id="<?php echo get_the_ID(); ?>" class="edu-center__cat-list-link hash-<?php echo get_the_ID(); ?> <?php echo ($count2 == 0) ? 'active' : ''; ?>"><?php the_title(); ?></a></li>
                        <?php $count2++; ?>
                    <?php endwhile; wp_reset_query(); ?>
                </ul>
            </div>
            <div class="edu-center__tabs2-nav edu-center__tabs2-nav-2 animated fadeIn" style="display: none;">
                <ul class="edu-center__cat-list">
                    <?php $idObj = get_category_by_slug('dop-courses'); $id = $idObj->term_id; $n=25;
                    $recent = new WP_Query("cat=$id&showposts=$n");?>
                    <?php $count3 = 0; ?>
                    <?php while($recent->have_posts()) : $recent->the_post();?>
                        <li class="edu-center__cat-list-li"><a href="#" data-id="<?php echo get_the_ID(); ?>" class="edu-center__tabs2-cat-list-link <?php echo ($count3 == 0) ? 'active' : ''; ?>"><?php the_title(); ?></a></li>
                    <?php $count3++; ?>
                    <?php endwhile; wp_reset_query(); ?>
                </ul>
            </div>
        </div>
        <div class="col-md-7 col-sm-8">
            <div class="edu-center__tabs2">
                <div class="edu-center__tabs2-link active" data-id="1">Основные курсы</div>
                <div class="edu-center__tabs2-link" data-id="2">Дополнительные курсы</div>
            </div>
            <div class="edu-center__tab2 animated fadeIn edu-center__tab2-1">
                <?php $count = 0; ?>
                <?php $idObj = get_category_by_slug('educational_center'); $id = $idObj->term_id; $n=25;
                $recent = new WP_Query("cat=$id&showposts=$n");?>
                <?php while($recent->have_posts()) : $recent->the_post();?>
                    <div class="edu-center__tab animated fadeIn edu-center__tab-<?php echo get_the_ID(); ?>" 
                        style="display: <?php echo ($count == 0) ? 'block' : 'none'; ?>">
                        <div class="row">
                            <div class="col-md-6 col-sm-5">
                                <?php the_post_thumbnail(' img-responsive'); ?>
                            </div>
                            <div class="col-md-6 col-sm-7">
                                <p class="edu-center__tab-date">Старт программы:<br>
                                    <span><?php echo mysql2date('j/m/Y', get_field('дата') );?></span>
                                </p>
                                <h2 class="edu-center__tab-title sec_courses__subcat-title"><?php the_title(); ?></h2>
                                <div class="edu-center__tab-field">
                                    <img src="<?php echo get_template_directory_uri(); ?>/app/img/calendar.png"> <?php the_field('сеанс'); ?>
                                </div>
                                <div class="edu-center__tab-field">
                                    <img src="<?php echo get_template_directory_uri(); ?>/app/img/price.png"> <?php the_field('стоимость'); ?>
                                </div>
                                <div class="edu-center__tab-field">
                                    <img src="<?php echo get_template_directory_uri(); ?>/app/img/clock.png"> <?php the_field('длительность'); ?>
                                </div>
                                <button class="edu-center__tab-button sec_courses__call" data-toggle="modal" data-target="#courses-modal">записать на курс</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="edu-center__tab-text-wrapper">
                                    <div class="edu-center__tab-text">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $count++; ?>
                <?php endwhile; wp_reset_query(); ?>
            </div>
            <div class="edu-center__tab2 animated fadeIn edu-center__tab2-2" style="display: none;">
                <?php $count4 = 0; ?>
                <?php $idObj = get_category_by_slug('dop-courses'); $id = $idObj->term_id; $n=25;
                $recent = new WP_Query("cat=$id&showposts=$n");?>
                <?php while($recent->have_posts()) : $recent->the_post();?>
                    <div class="edu-center__tab3 animated fadeIn edu-center__tab3-<?php echo get_the_ID(); ?>" 
                        style="display: <?php echo ($count4 == 0) ? 'block' : 'none'; ?>">
                        <div class="row">
                            <div class="col-md-6 col-sm-5">
                                <?php the_post_thumbnail(' img-responsive'); ?>
                            </div>
                            <div class="col-md-6 col-sm-7">
                                <p class="edu-center__tab-date">Старт программы:<br>
                                    <span><?php echo mysql2date('j/m/Y', get_field('дата') );?></span>
                                </p>
                                <h2 class="edu-center__tab-title sec_courses__subcat-title"><?php the_title(); ?></h2>
                                <div class="edu-center__tab-field">
                                    <img src="<?php echo get_template_directory_uri(); ?>/app/img/calendar.png"> <?php the_field('сеанс'); ?>
                                </div>
                                <div class="edu-center__tab-field">
                                    <img src="<?php echo get_template_directory_uri(); ?>/app/img/price.png"> <?php the_field('стоимость'); ?>
                                </div>
                                <div class="edu-center__tab-field">
                                    <img src="<?php echo get_template_directory_uri(); ?>/app/img/clock.png"> <?php the_field('длительность'); ?>
                                </div>
                                <button class="edu-center__tab-button sec_courses__call" data-toggle="modal" data-target="#courses-modal">записать на курс</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="edu-center__tab-text-wrapper">
                                    <div class="edu-center__tab-text">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $count4++; ?>
                <?php endwhile; wp_reset_query(); ?>
            </div>
        </div>
    </div>
</section>

<section class="video">
    <div class="row">
        <div class="col-md-7 col-sm-6">
            <img src="<?php echo get_template_directory_uri();?>/app/img/video2.png" class="img-responsive video__image">
            <a href="https://www.youtube.com/watch?v=gQtms53wew4" data-lity class="video__link"><img src="<?php echo get_template_directory_uri();?>/app/img/play.png"></a>
        </div>
        <div class="col-md-5 col-sm-6">
            <h3 class="video__title">мы учимся и работаем вместе!</h3>
            <p class="video__desc">Сотни человек после обучения у нас преобрели профессию, лучшие из них - работают с нами!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="#" class="video__youtube">
                Больше видео на канале
                <img src="<?php echo get_template_directory_uri();?>/app/img/youtube-icon.png">
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>