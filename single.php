<?php 

if(in_category(15)) { // single blog page
    include 'single-blog.php';
} elseif ( in_category(41) ) { // single beauty_centr
    include 'single-beauty_centr.php';
} else {
    include 'index.php';
}