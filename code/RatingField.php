<?php

class RatingField extends HiddenField {

    function __construct($name, $title = "", $source = array(), $value = "", $form = null) {
        parent::__construct($name, $title, $source, $value, $form);
        Requirements::css('foxystripe-reviews/thirdparty/bootstrap/css/bootstrap.min.css');
        Requirements::css("foxystripe-reviews/thirdparty/bootstrap-rating/bootstrap-rating.css");
        Requirements::javascript(THIRDPARTY_DIR."/jquery/jquery.js");
        Requirements::javascript("foxystripe-reviews/thirdparty/bootstrap-rating/bootstrap-rating.js");
        //$this->addExtraClass('rating');
    }

    public function getAttributes() {
        return array_merge(
            parent::getAttributes(),
            array(
                'data-fractions' => "2",
                'data-step' => ".5"
            )
        );
    }

}