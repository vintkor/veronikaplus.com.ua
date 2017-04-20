<?php get_header(); ?>
<section class="sec_centr">
    <div class="row">
        <?php if ( have_posts() ) : query_posts('page_id=44'); while (have_posts()) : the_post(); ?>
        <h1 class="sec_centr__inner-top-title align-center"><?php the_title(); ?></h1>
        <div class="flex">
            <div class="col-md-4 col-sm-5">
                <?php $top_image = get_field('изображение'); ?>
                <div class="sec_centr__inner-top-image" style="background-image: url(<?php echo $top_image['url']; ?>);"></div>
            </div>
            <div class="col-md-7 col-md-offset-1 col-sm-7 col-sm-offset-0 bg-white">
                <h2 class="sec_centr__inner-top-subtitte"><?php the_field('заголовок'); ?></h2>
                <div class="sec_centr__inner-top-text"><?php the_field('описание'); ?></div>
            </div>
        </div>
        <? endwhile; endif; wp_reset_query(); ?>
    </div>
    <h2 class="sec_centr__inner-cat-title align-center"><?php echo get_queried_object()->name; ?></h2>
    <div class="row">
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
            <div class="col-md-4 col-sm-6 sec_centr__categories">
                <div class="sec_centr__cat-wrapper">
                    <div class="sec_centr__cat-image" style="background-image: url(<?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
                        echo $thumb_url[0];
                        ?>);">
                    </div>
                    <h4 class="sec_centr__subcat-title"><?php the_title(); ?></h4>
                    <div class="sec_centr__subcat-desc">
                        <p>Описание процедуры: <?php echo get_the_excerpt(); ?></p>
                    </div>
                    <div class="row sec_centr__subcat-items">
                        <div class="col-md-4 col-sm-4 col-xs-4 sec_centr__subcat-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/app/img/calendar.png"> <?php the_field('сеанс'); ?>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 sec_centr__subcat-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/app/img/clock.png"> <?php the_field('длительность'); ?>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 sec_centr__subcat-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/app/img/price.png"> <?php the_field('стоимость'); ?>
                        </div>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="sec_centr__more pull-left">подробнее</a>
                    <button class="sec_centr__call pull-right">записать на процедуру</button>
                    <div class="clearfix"></div>
                </div>
            </div>
        <?php endwhile; endif;?>
    </div>
</section>
<section class="inner_centr">
    <div class="row">
        <div class="col-md-5 col-md-offset-3 col-sm-7 col-sm-offset-5 margin-bottom-30px">
            <h3 class="inner_centr__title">Ждем Встречи</h3>
            <h4 class="inner_centr__subtitle">Заборонируйте удобное для Вас время</h4>
            <p class="inner_centr__address">
                <span><img src="<?php echo get_template_directory_uri(); ?>/app/img/inner_place.png"></span>
                город Борисполь, ул. Киевский Шлях, 14
            </p>
            <p class="inner_centr__address">
                <span><img src="<?php echo get_template_directory_uri(); ?>/app/img/inner_phone.png"></span>
                (063) 527-31-71,  (098) 523-56-00, (066) 404-03-36
            </p>
            <p class="inner_centr__address">
                <span><img src="<?php echo get_template_directory_uri(); ?>/app/img/inner_time.png"></span>
                9.00 - 20.00    без выходных
            </p>
        </div>
        <div class="col-md-4 col-sm-12">
            <form class="inner_centr__form">
                <div class="inner_centr__form-bg">
                    <input type="text" name="name" placeholder="Ваше имя">
                    <input type="text" name="phone" placeholder="телефон*">
                    <input type="text" name="service" placeholder="желаемая услуга">
                    <input type="text" name="date" onfocus="(this.type='date')" placeholder="желаемая дата">
                </div>
                <div class="align-center">
                    <input type="submit" name="submit" value="забронировать">
                </div>
            </form>
        </div>
    </div>
</section>

<?php $idObj = get_category_by_slug('our_team'); $id = $idObj->term_id; $n=4;
$recent = new WP_Query("cat=$id&showposts=$n&order=asc");?>
<section class="team">
    <h2 class="team__title align-center"><?php echo $idObj->name; ?></h2>
    <div class="row">
        <?php while($recent->have_posts()) : $recent->the_post();?>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <a href="#" data-id="<?php echo get_the_ID(); ?>" class="team__link">
                    <div class="team__wrapper">
                    <?php
                        $full_name = get_the_title();
                        $name_arr = explode(' ', $full_name);
                        $name = $name_arr[0];
                    ?>
                        <h3 class="team__name"><?php echo $name; ?></h3>
                        <p class="team__position"><?php the_field('должность'); ?></p>
                        <div class="team__photo" style="background-image: url(<?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
                            echo $thumb_url[0];
                            ?>);">
                        </div>
                    </a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <?php $count = 1; ?>
    <?php while($recent->have_posts()) : $recent->the_post();?>    
    <div class="team__desc animated fadeIn team__desc-<?php echo get_the_ID(); ?>" style="display: <?php echo ($count == 1) ? "block" : "none"; ?>">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <h3 class="team__name team__name-2"><?php the_title(); ?></h3>
                <p class="team__position team__position-2"><?php the_field('должность'); ?></p>
            </div>
            <div class="col-md-8 col-sm-8"><div class="team__desc-text"><?php the_content(); ?></div></div>
        </div>
    </div>
    <?php $count++; ?>
    <?php endwhile; ?>
</section>
<?php wp_reset_query(); ?>

</div>

<section class="zoom" style="position: relative;">
    <h2 class="zoom__title align-center">НОВЕЙШИЕ РАБОТЫ</h2>
    <div id="gallery" class="zoomwall">
        <img src="<?php echo get_template_directory_uri();?>/app/img/f1.png" data-highres="<?php echo get_template_directory_uri();?>/app/img/f1.png">
        <img src="<?php echo get_template_directory_uri();?>/app/img/f2.png" data-highres="<?php echo get_template_directory_uri();?>/app/img/f2.png">
        <img src="<?php echo get_template_directory_uri();?>/app/img/f3.png" data-highres="<?php echo get_template_directory_uri();?>/app/img/f3.png">
        <img src="<?php echo get_template_directory_uri();?>/app/img/f4.png" data-highres="<?php echo get_template_directory_uri();?>/app/img/f4.png">
        <img src="<?php echo get_template_directory_uri();?>/app/img/f5.png" data-highres="<?php echo get_template_directory_uri();?>/app/img/f5.png">
    </div>
</section>

<div class="container">

<section class="subscription">
    <div class="subscription__wrapper">
        <div class="row">
            <div class="col-md-7">
                <p class="subscription__desc">подпишись и узнавай первой о секретных скидках для наших клиентов</p>
            </div>
            <div class="col-md-5">
                <form id="subscription__form">
                    <input type="text" name="subscription__email" class="subscription__email" placeholder="E-MAIL">
                    <button type="submit" class="subscription__submit">подписаться</button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="video">
    <div class="row">
        <div class="col-md-7 col-sm-6">
            <img src="<?php echo get_template_directory_uri();?>/app/img/video.png" class="img-responsive video__image">
            <a href="https://www.youtube.com/watch?v=gQtms53wew4" data-lity class="video__link"><img src="<?php echo get_template_directory_uri();?>/app/img/play.png"></a>
        </div>
        <div class="col-md-5 col-sm-6">
            <h3 class="video__title">ПРОЦЕСС СОЗДАНИЯ СВАДЕБНОЙ ПРИЧЕСКИ. ТРЕНД 2017</h3>
            <p class="video__desc">Сложное плетение.<br>“Мастер-парикмахер”, март 2017.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="#" class="video__youtube">
                Подписаться на наш канал
                <img src="<?php echo get_template_directory_uri();?>/app/img/youtube-icon.png">
            </a>
        </div>
    </div>
</section>

<script type="text/javascript">
    window.onload = function() {
        zoomwall.create(document.getElementById('gallery'), true);
    };
</script>


<?php get_footer(); ?>