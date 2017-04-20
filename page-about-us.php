<?php
/*
Template Name: О нас
*/
?>

<?php get_header(); ?>
<!-- =========================== page about-us =========================== -->
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <section class="page-about">
        <h1 class="page-about__title align-center"><?php the_title(); ?></h1>
        <div class="row">
            <?php
                $photo1 = get_field('фото_1');
                $photo2 = get_field('фото_2');
            ?>
            <div class="col-md-6 col-sm-6 col-xs-6"><img class="img-responsive" src="<?php echo $photo1['url']; ?>"></div>
            <div class="col-md-6 col-sm-6 col-xs-6"><img class="img-responsive" src="<?php echo $photo2['url']; ?>"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="page-about__text">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; endif;?>

<section class="partners">
    <h2 class="partners__title align-center">наши партнеры</h2>
    <div class="row">
        <?php $idObj = get_category_by_slug('partners'); $id = $idObj->term_id; $n=9;
        $recent = new WP_Query("cat=$id&showposts=$n");?>
        <?php while($recent->have_posts()) : $recent->the_post();?>
            <div class="col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2 ">
                <div class="partners__image-wrapper align-center">
                    <?php $photo3 = get_field('фото'); ?>
                    <img src="<?php echo $photo3['url']; ?>" class="img-responsive">
                </div>
            </div>
        <?php endwhile; wp_reset_query(); ?>
    </div>
</section>

<?php get_footer(); ?>