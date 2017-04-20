<?php
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
add_theme_support('post-thumbnails');
remove_action('wp_head', 'wp_generator');
add_theme_support( 'woocommerce' );

function custom_disable_embeds_init() {
    // Remove the REST API endpoint.
    remove_action('rest_api_init', 'wp_oembed_register_route');
    // Turn off oEmbed auto discovery.
    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
    // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');
}

// --------------------Регистрация меню верхнее--------------------------------------
add_action('init', 'top_menu');
function top_menu() {
    register_nav_menus(array(
        'top-menu' => 'Меню сайта верхнее'
    ));
}

// --------------------Виджет в футере 1---------------------------
function w_footer_1_text_widget_init() {
  register_sidebar( array(
    'name'          => 'Виджет в футере 1',
    'id'            => 'w_footer_1',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<span class="hidden">',
    'after_title'   => '</span>',
  ) );
}
add_action( 'widgets_init', 'w_footer_1_text_widget_init' );

// --------------------Виджет в футере 2---------------------------
function w_footer_2_text_widget_init() {
  register_sidebar( array(
    'name'          => 'Виджет в футере 2',
    'id'            => 'w_footer_2',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<span class="hidden">',
    'after_title'   => '</span>',
  ) );
}
add_action( 'widgets_init', 'w_footer_2_text_widget_init' );

// --------------------Виджет в футере 3---------------------------
function w_footer_3_text_widget_init() {
  register_sidebar( array(
    'name'          => 'Виджет в футере 3',
    'id'            => 'w_footer_3',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<span class="hidden">',
    'after_title'   => '</span>',
  ) );
}
add_action( 'widgets_init', 'w_footer_3_text_widget_init' );

// --------------------Виджет недавно просмотренные товары---------------------------
function woo_recently_products_text_widget_init() {
  register_sidebar( array(
    'name'          => 'недавно просмотренные товары в каталоге',
    'id'            => 'woo_recently_products',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h2 class="recently_product_title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'woo_recently_products_text_widget_init' );

// --------------------Виджет контакты на главной---------------------------
function sec_contact_text_widget_init() {
  register_sidebar( array(
    'name'          => 'Виджет контакты на главной',
    'id'            => 'sec_contact',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<span class="hidden">',
    'after_title'   => '</span>',
  ) );
}
add_action( 'widgets_init', 'sec_contact_text_widget_init' );

// --------------------Виджет фильтр товаров---------------------------
function woo_filter_text_widget_init() {
  register_sidebar( array(
    'name'          => 'Виджет фильтр товаров',
    'id'            => 'woo_filter',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<span class="hidden">',
    'after_title'   => '</span>',
  ) );
}
add_action( 'widgets_init', 'woo_filter_text_widget_init' );

// --------------------убираем количество в категориях---------------------------
add_filter('woocommerce_subcategory_count_html','remove_count');

function remove_count(){
 $html='';
 return $html;
}

/*
** Отключение вкладок на странице товара
*/
 
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
 
function woo_remove_product_tabs( $tabs ) {
 
unset( $tabs['description'] ); // Убираем вкладку "Описание"
//unset( $tabs['reviews'] ); // Убираем вкладку "Отзывы"
unset( $tabs['additional_information'] ); // Убираем вкладку "Свойства"
 
return $tabs;
 
}

// ================= Добавление доп полей для отзывов ==========================

add_action( 'comment_post', 'save_extend_comment_meta_data' );
function save_extend_comment_meta_data( $comment_id ){

    if( !empty( $_POST['recomend'] ) ){
        $recomend = sanitize_text_field($_POST['recomend']);
        add_comment_meta( $comment_id, 'recomend', $recomend );
    }

    if( !empty( $_POST['plus'] ) ){
        $plus = sanitize_text_field($_POST['plus']);
        add_comment_meta( $comment_id, 'plus', $plus );
    }

    if( !empty( $_POST['minus'] ) ){
        $minus = sanitize_text_field($_POST['minus']);
        add_comment_meta( $comment_id, 'minus', $minus );
    }

}

add_filter( 'woocommerce_currencies', 'add_my_currency' );
function add_my_currency( $currencies ) {
     $currencies['UAH'] = __( 'Українська гривня', 'woocommerce' );
     return $currencies;
}

add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);
function add_my_currency_symbol( $currency_symbol, $currency ) {
    switch( $currency ) {
        case 'UAH': $currency_symbol = 'грн'; break;
    }
    return $currency_symbol;
}


// Виджет в консоли "Отзывы ожидающие проверки"
function getDraftReviews() {
    $options = array(
        'category_name' => 'testimonals',
        'post_status' => 'draft',
    );
    $query = new WP_Query($options);
    return $query;
}

function example_dashboard_widget_function(){
    echo '<ol>';
    foreach (getDraftReviews()->posts as $post) {
        $content = mb_substr($post->post_content, 0, 200);
        echo "<li>$post->post_date &rarr; $content &rarr; <a href='/wp-admin/post.php?post=$post->ID&action=edit'>Редактировать</a></li>";
    }
    echo '</ol>';
}

// Создаем функцию, используя хук действия
function example_add_dashboard_widgets() {
    wp_add_dashboard_widget('example_dashboard_widget', 'Отзывы ожидающие проверки', 'example_dashboard_widget_function');
}
// Хук в 'wp_dashboard_setup', чтобы зарегистрировать нашу функцию среди других
add_action('wp_dashboard_setup', 'example_add_dashboard_widgets' );

// images auto class
function add_image_responsive_class($content) {
   global $post;
   $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
   $replacement = '<img$1class="$2 img-responsive"$3>';
   $content = preg_replace($pattern, $replacement, $content);
   return $content;
}
add_filter('the_content', 'add_image_responsive_class');