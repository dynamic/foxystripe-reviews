<?php

class ProductRating extends DataObject {

    private static $has_one = array(
        'Review' => 'ProductReview'
    );

    private static $default_sort = 'Created DESC';

    public function getCMSFields() {



    }



}