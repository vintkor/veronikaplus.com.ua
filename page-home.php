<?php
/*
Template Name: Главная
*/
?>
<?php get_header(); ?>

<!-- =========================== SLIDER =========================== -->

<section class="sec_slider">
    <div class="owl-carousel owl-carousel-1">
        <?php $idObj = get_category_by_slug('slider'); $id = $idObj->term_id; $n=15;
        $recent = new WP_Query("cat=$id&showposts=$n");?>
        <?php while($recent->have_posts()) : $recent->the_post();?>
            <div class="sec_slider__single-slide" style="background-image: url(<?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
        echo $thumb_url[0];
        ?>);">
                <a href="<?php the_field('ссылка') ?>" class="sec_slider__link"></a>
            </div>
        <?php endwhile; wp_reset_query(); ?>
    </div>
</section>

<!-- =========================== ABOUT =========================== -->

<?php
    /**
     * Принимает массив категорий-объектов WooCommerce
     * Возвращает массив категорий WooCommerce с добавленными изображениями категории и ссылкой на категорию.
     */
    function modify_data($arr) {
        $thumbnail_id = get_woocommerce_term_meta( $arr->term_id, 'thumbnail_id', true );
        $new_arr = (array)$arr;
        $new_arr['image'] = wp_get_attachment_image_url( $thumbnail_id, 'full' );
        $new_arr['link'] = get_category_link($new_arr['term_id']);
        return $new_arr;
    }

    $parent_category = array_map(
        "modify_data",
        get_terms( array('taxonomy' => 'product_cat', 'parent' => 0 ) )
    );

    foreach ($parent_category as $key => $value) {
        $categories_tree[$key] = $value;
        $temp = get_terms( array('taxonomy' => 'product_cat', 'parent' => $value['term_id']) );
        $temp2 = array_map("modify_data", $temp);
        $categories_tree[$key]['children'] = $temp2;
    }
?>

<section class="sec_about">
    <div class="row">
        <div class="col-md-12">
            <h2 class="sec_about__main-title">Студия-магазин</h2>
            <div class="sec_about__desc">
                <p>В нашем магазине широкий выбор профессиональной косметики и товаров, как для профессиональных мастеров в салонах красоты, так и личного пользования в домашних условиях.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <?php foreach($categories_tree as $parent_cat): ?>
            <div class="col-md-6 col-sm-6 sec_about__categories">
                <div class="sec_about__category" style="background-image: url(<?php echo $parent_cat['image']; ?>)"></div>
                <h3 class="sec_about__cat-title">
                    <a class="sec_about__parent-link" href="<?php echo $parent_cat['link']; ?>"><?php echo $parent_cat['name']; ?></a>
                </h3>
                <div class="row flex">
                    <?php if( count($parent_cat['children']) > 0 ): ?>
                        <?php foreach($parent_cat['children'] as $child_cat): ?>
                            <div class="col-md-6 sec_about__item">
                                <div class="sec_about__sub-cat">
                                    <img src="<?php echo $child_cat['image'] ?>" class="sec_about__sub-image">
                                    <h4 class="sec_about__sub-cat-title">
                                        <a class="sec_about__child-link" href="<?php echo $child_cat['link'] ?>"><?php echo $child_cat['name'] ?></a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>


<?php
    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => 12,
        'meta_key' => 'total_sales',
        'orderby' => 'meta_value_num',
    );
    $wc_query = new WP_Query($args);
?>
<section class="sec_popular">
    <h2 class="sec_popular__main-title">Популярные товары</h2>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="owl-carousel owl-carousel-2">
                    <?php if($wc_query->have_posts()): ?>
                        <?php $product_sales = $wc_query->posts; ?>
                        <?php foreach($product_sales as $wc_product): ?>
                            <div class="sec_popular__product-wrapper">
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $wc_product->ID ), 'medium' );?>
                                <?php $prod = wc_get_product( $wc_product->ID ); ?>
                                <img class="sec_popular__product-image" src="<?php echo $image[0]; ?>">
                                <h3 class="sec_popular__product-title"><?php echo $prod->get_name(); ?></h3>
                                <?php $brand = $prod->get_attribute( 'pa_brand' ); ?>
                                <?php echo ( $brand ) ? '<p class="product_brand">' . $brand . "</p>" : '<p class="product_brand product_brand-hidden">.</p>'; ?>
                                <?php $badges = get_field('product_badge', $wc_product->ID);
                                if( $badges ) {
                                    foreach ( $badges as $badge ) {
                                        echo '<span class="product_badge_' . $badge . '"></span>';
                                    }
                                } ?>
                                <div class="product_review">
                                    <img class="product_review_image" src="<?php echo get_template_directory_uri(); ?>/app/img/heart.png">
                                    (<?php echo $prod->get_review_count() ?>) Отзывов
                                </div>
                                <span class="sec_popular__product-price pull-left woocommerce-Price-amount"><?php echo $prod->get_regular_price(); ?> грн</span>
                                <a class="sec_popular__product-link" href="<?php echo $wc_product->guid;?>"></a>
                                <a class="sec_popular__product-cart add_to_cart_btn pull-right" href="/?add-to-cart=<?php echo $wc_product->ID ?>">
                                    <img src="<?php echo get_template_directory_uri(); ?>/app/img/cart-icon-btn.png">
                                </a>
                                <div class="clearfix"></div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>

<section class="sec_centr">
    <h2 class="sec_centr__main-title">Центр Красоты “Вероника+”</h2>
    <div class="sec_centr__desc">
        <p>Мы - команда экспертов в сфере красоты. Центр красоты “Вероника+” это всегда высокий уровень обслуживания, уютная атмосфера, широкий спектр услуг и приятные цены.</p>
    </div>
    <h3 class="sec_centr__cat-title">Популярные услуги</h3>
    <div class="row">
        <?php $idObj = get_category_by_slug('beauty_centr'); $id = $idObj->term_id; $n=6;
        $recent = new WP_Query("cat=$id&showposts=$n");?>
        <?php while($recent->have_posts()) : $recent->the_post();?>
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
                <button class="sec_centr__call pull-right" data-toggle="modal" data-target="#service-modal">записать на процедуру</button>
                <div class="clearfix"></div>
            </div>
        </div>
        <?php endwhile; wp_reset_query(); ?>
    </div>
    <div class="align-center">
        <a href="/category/beauty_centr/" class="sec_centr__link-more">
            полный список процедур <img src="<?php echo get_template_directory_uri(); ?>/app/img/Forward.png">
        </a>
    </div>    
</section>

<section class="sec_courses">
    <h2 class="sec_courses__main-title">Курсы учебного центра “Вероника Плюс”</h2>
    <div class="sec_courses__desc">
        <p>Учебный центр “Вероника Плюс” — это твой шанс стать настоящим профессионалом бьюти-сервиса. Наши студенты изучают особенности профессионального наращивания ногтей; узнают все тонкости создания качественного маникюра и педикюра; становятся мастерами-парикмахерами, способнымиуже после курсов работать в салонах и зарабатывать, выполняя прически и стрижки от  простой мужской стрижки до сложной свадебной прически. </p>
    </div>
    <div class="row">
        <?php $idObj = get_category_by_slug('educational_center'); $id = $idObj->term_id; $n=6;
        $recent = new WP_Query("cat=$id&showposts=$n");?>
        <?php while($recent->have_posts()) : $recent->the_post();?>
        <div class="col-md-4 col-sm-6 sec_courses__categories">
            <div class="sec_courses__cat-wrapper">
                <div class="sec_courses__cat-image" style="background-image: url(<?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
                    echo $thumb_url[0];
                    ?>);"></div>
                <h4 class="sec_courses__subcat-title"><?php the_title(); ?></h4>
                <div class="sec_courses__subcat-desc">
                    <p>Описание курса: <?php echo get_the_excerpt(); ?></p>
                </div>
                <div class="row sec_courses__subcat-items">
                    <div class="col-md-4 col-sm-4 col-xs-4 sec_courses__subcat-item">
                        <img src="<?php echo get_template_directory_uri(); ?>/app/img/calendar.png"> <?php the_field('сеанс'); ?>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 sec_courses__subcat-item">
                        <img src="<?php echo get_template_directory_uri(); ?>/app/img/clock.png"> <?php the_field('длительность'); ?>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 sec_courses__subcat-item">
                        <img src="<?php echo get_template_directory_uri(); ?>/app/img/price.png"> <?php the_field('стоимость'); ?>
                    </div>
                </div>
                <a href="/category/educational_center/#<?php echo get_the_ID(); ?>" class="sec_courses__more pull-left">программа курса</a>
                <button class="sec_courses__call pull-right" data-toggle="modal" data-target="#courses-modal">записать на курс</button>
                <div class="clearfix"></div>
            </div>
        </div>
        <?php endwhile; wp_reset_query(); ?>
    </div>
    <div class="align-center">
        <a href="/category/educational_center/" class="sec_courses__link-more">
            полный список курсов <img src="<?php echo get_template_directory_uri(); ?>/app/img/Forward.png">
        </a>
    </div>
</section>

<section class="sec_question">
    <div class="row flex">
        <div class="col-md-6 col-md-offset-6">
            <div class="sec_question__wrapper">
                <h3 class="sec_question__title">Необходима консультация о курсах?</h3>
                <p class="sec_question__desc">Оставьте заявку и наш менеджер свяжется с Вами в ближайшее время</p>
                <button class="sec_question__btn">оставить заявку</button>
            </div>
        </div>
    </div>
</section>

<section class="sec_reviews">
    <h2 class="sec_reviews__main-title">Отзывы</h2>
    <?php do_action( 'wordpress_social_login' ); ?>
    <?php
        $user_id = get_current_user_id();
        $user = get_user_meta( $user_id );
    ?>
    <?php if( is_user_logged_in() ): ?>
        <?php $avatar_data = get_avatar_data( $user_id ); ?>
        <div class="row">
            <div class="col-md-2">
                <img class="sec_reviews__avatar" src="<?php echo $avatar_data['url']; ?>" alt="<?php echo $user['nickname'][0]; ?>">
            </div>
            <div class="col-md-10">
                <form class="sec_reviews__form" method="POST">
                    <textarea class="sec_reviews__input" id="testimonal" name="testimonal" placeholder="Оставить отзыв"></textarea>
                    <input type="hidden" name="title" value="<?php echo $user['nickname'][0]; ?>">
                    <input type="hidden" name="author" value="<?php echo $user_id; ?>">
                    <button class="sec_reviews__button pull-right" type="submit">
                        <img src="<?php echo get_template_directory_uri(); ?>/app/img/share_1.png">
                        Отправить
                    </button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    <?php endif; ?>
    <div class="sec_reviews__line"></div>
    <?php $idObj = get_category_by_slug('testimonals'); $id = $idObj->term_id; $n=3;
    $recent = new WP_Query("cat=$id&showposts=$n");?>
    <?php while($recent->have_posts()) : $recent->the_post();?>
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
    <?php endwhile; wp_reset_query(); ?>
    <div class="align-center">
        <a href="/category/testimonals/" class="sec_reviews__link-more">
            читать все отзывы <img src="<?php echo get_template_directory_uri(); ?>/app/img/Forward.png">
        </a>
    </div>
</section>

<section class="sec_contact" id="sec_contact">
    <h2 class="sec_contact__main-title">КОНТАКТЫ</h2>
    <div class="row">
        <div class="col-md-5 sec_contact__bg-dark">
            <div class="sec_contact__widget">
                <?php dynamic_sidebar('sec_contact'); ?>
                <div class="align-center">
                    <button class="sec_contact__btn">оставить заявку</button>
                </div>                
            </div>
        </div>
        <div class="col-md-7 sec_contact__maps">
            <div id="maps"></div>
        </div>
    </div>
</section>

<?php get_footer(); ?>