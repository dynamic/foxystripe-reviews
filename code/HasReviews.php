<?php

class HasReviews extends DataExtension {

    private static $moderated_comments;

    private static $has_many = array(
        'Reviews' => 'ProductReview'
    );

    private static $casting = array(
        'AverageScore' => 'Decimal'
    );

    public function getProductReviews() {

        $moderated = $this->owner->stat('moderated_comments');

        if ($moderated) {
            $reviews = $this->owner->Reviews()->filter('Approved', '1');
        } else {
            $reviews = $this->owner->Reviews();
        }

        $paginatedList = new PaginatedList($reviews, Controller::curr()->request);
        $paginatedList->setPageLength(3);

        return $paginatedList;
    }

    public function getAverageScore() {

        $moderated = $this->owner->stat('moderated_comments');

        if ($moderated) {
            $reviews = ProductReview::get()->filter(array('ProductID' => $this->owner->ID, 'Approved' => 1));
        } else {
            $reviews = ProductReview::get()->filter(array('ProductID' => $this->owner->ID));
        }
        $score = 0;
        $total = 0;

        foreach ($reviews as $review) {
            $score += $review->Rating;
            $total++;
        }

        return ($score / $total);

    }

    public function getMaxStars() {
        return Config::inst()->get('ProductReviewForm', 'max_stars');
    }

}

class HasReviews_Controller extends Extension {
    static $allowed_actions = array(
        'ProductReviewForm'
    );

    public function ProductReviewForm(){
        if(Member::currentUser()) {
            return new ProductReviewForm($this->owner, 'ProductReviewForm');
        }
        return '<p class="message bad">You must be logged in to post a review</p>';
    }
}