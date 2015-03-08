<?php

class ProductReviewAdmin extends ModelAdmin {

    private static $url_segment = 'reviews';
    private static $menu_title = 'Product Reviews';
    private static $menu_priority = 8;
    private static $menu_icon = 'foxystripe-reviews/images/product-reviews-admin.png';
    private static $managed_models = array(
        "ProductReview"
    );

}