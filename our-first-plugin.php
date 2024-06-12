<?php
/**
 * Plugin Name: Our First Plugin
 * Plugin URI: https://wordpress.org/plugins/our-first-plugin
 * Description: This is our first plugin
 * Version: 1.0.0
 * Author: Your Name
 * Author URI: https://wordpress.org/plugins/our-first-plugin
 * 
 */

class Our_First_Plugin {

    public function __construct() {
        add_action('init', array($this, 'initialize'));
    }

    function initialize() {
        // add_filter('the_title', array($this, 'change_title'));
        add_filter('the_title', [$this, 'change_title']);
        add_filter('the_content', array($this, 'change_content'));
    }

    function change_title($post_title) {
        //return uppercase
        return strtoupper($post_title);
    }

    function change_content($post_content) {
        //find word count
        $content = strip_tags($post_content);
        $word_count = str_word_count($content);

        //aprroximate reading time
        $reading_time = ceil($word_count / 200);
        return $post_content . "<p>{$word_count} words, approximate reading time = {$reading_time} minutes</p>";
    }
}

new Our_First_Plugin();

// add_filter('the_title', 'wedevs_ofc_change_title');

// function wedevs_ofc_change_title($post_title) {
//     //return uppercase
//     return strtoupper($post_title);
// }

// add_filter('the_content', 'wedevs_ofc_change_content');

// function wedevs_ofc_change_content($post_content) {
//     //find word count
//     $content = strip_tags($post_content);
//     $word_count = str_word_count($content);

//     //aprroximate reading time
//     $reading_time = ceil($word_count / 200);
//     return $post_content . "<p>{$word_count} words, approximate reading time = {$reading_time} minutes</p>";
// }

