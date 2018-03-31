<?php

class NewsModel {

    private $post_title;
    private $post_content;
    private $post_user_id;
    private $post_school_id;
    private $post_featured_image_id;
    private $post_like_count;
    private $post_dislike_count;
    private $post_comment_count;
    private $post_date_created;
    private $post_status_id;
    private $category_id;
    private $post_id;
    public function __construct() {

    }

    public function get_post_title() {
        return filter_var($this->post_title, FILTER_SANITIZE_STRING);
    }

    public function get_post_id() {
        return filter_var($this->post_id, FILTER_SANITIZE_NUMBER_INT);
    }

    public function set_post_id($post_id) {
        $this->post_id = $post_id;
    }

    public function get_post_content() {
      return filter_var($this->post_content,FILTER_SANITIZE_STRING);
    }

    public function get_post_user_id() {
        return filter_var($this->post_user_id,FILTER_SANITIZE_NUMBER_INT);
    }

    public function get_post_category_id() {
        return filter_var($this->post_category_id,FILTER_SANITIZE_NUMBER_INT);
    }

    public function get_post_school_id() {
        return filter_var($this->post_school_id,FILTER_SANITIZE_NUMBER_INT);
    }

    public function get_post_featured_image_id() {
        return filter_var($this->post_featured_image_id, FILTER_SANITIZE_NUMBER_INT);
    }

    public function get_post_like_count() {
        return filter_var($this->post_like_count, FILTER_SANITIZE_NUMBER_INT);
    }

    public function get_post_dislike_count() {
        return filter_var($this->post_dislike_count, FILTER_SANITIZE_NUMBER_INT);
    }

    public function get_post_comment_count() {
        return filter_var($this->post_comment_count, FILTER_SANITIZE_NUMBER_INT);
    }

    public function get_post_date_created() {
        return $this->post_date_created;
    }

    public function get_post_status_id() {
        return filter_var($this->post_status_id, FILTER_SANITIZE_NUMBER_INT);
    }

    public function set_post_title($post_title) {
        $this->post_title = $post_title;
    }

    public function set_post_content($post_content) {
        $this->post_content = $post_content;
    }

    public function set_post_user_id($post_user_id) {
        $this->post_user_id = $post_user_id;
    }

    public function set_post_category_id($post_category_id) {
        $this->post_category_id = $post_category_id;
    }

    public function set_post_school_id($post_school_id) {
        $this->post_school_id = $post_school_id;
    }

    public function set_post_featured_image_id($post_featured_image_id) {
        $this->post_featured_image_id = $post_featured_image_id;
    }

    public function set_post_like_count($post_like_count) {
        $this->post_like_count = $post_like_count;
    }

    public function set_post_dislike_count($post_dislike_count) {
        $this->post_dislike_count = $post_dislike_count;
    }

    public function set_post_comment_count($post_comment_count) {
        $this->post_comment_count = $post_comment_count;
    }

    public function set_post_date_created($post_date_created) {
        $this->post_date_created = $post_date_created;
    }

    public function set_post_status_id($post_status_id) {
        $this->post_status_id = $post_status_id;
    }

}
