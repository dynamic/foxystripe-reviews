<?php

class ProductRating extends DataObject {

    private static $db = array(
        'Rating' => 'Int',
        'MaxRating' => 'Int'
    );

    private static $has_one = array(
        //'Review' => 'ProductReview'
    );

}