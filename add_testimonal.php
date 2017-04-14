
<?php
    /* Define these, So that WP functions work inside this file */
    define('WP_USE_THEMES', false);
    require( $_SERVER['DOCUMENT_ROOT'] .'/wp-blog-header.php');

    if( isset($_POST['testimonal']) ) {
        $post_title = wp_strip_all_tags( $_POST['title'] );
        $post_content = wp_strip_all_tags( $_POST['testimonal'] );
        $post_author = wp_strip_all_tags( $_POST['author'] );
         
        $new_post = array(
            'post_author' => $post_author,
            'post_category' => array(40),
            'post_content' => $post_content,
            'post_title' => $post_title,
            'post_status' => 'draft'
        );
         
        $post_id = wp_insert_post($new_post);
    }
?>