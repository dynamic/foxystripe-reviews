<?php

class HasReviews extends DataExtension {

    private static $db = array(
        'AllowReviews' => 'Boolean'
    );

    private static $has_many = array(
        'Reviews' => 'ProductReview'
    );

    private static $casting = array(
        'AverageScore' => 'Decimal'
    );

    private static $defaults = array(
        'AllowReviews' => true
    );

    public function updateSettingsFields(FieldList $fields) {
        $fields->addFieldToTab("Root.Settings", new CheckboxField('AllowReviews'));
        return $fields;
    }

    public function getProductReviewList() {

        $config = SiteConfig::current_site_config();

        if ($this->owner->AllowReviews == true) {
            if ($config->ModerateReviews) {
                $reviews = $this->owner->Reviews()->filter('Approved', '1');
            } else {
                $reviews = $this->owner->Reviews();
            }

            $paginatedList = new PaginatedList($reviews, Controller::curr()->request);
            $paginatedList->setPageLength(5);

            return $paginatedList;
        }

        return false;
    }

    public function getAverageScore() {

        $config = SiteConfig::current_site_config();

        if ($config->ModerateReviews) {
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

        if ($total > 0) return ($score / $total);
        return false;

    }

    public function getProductRating() {
        return $this->owner->renderWith('ProductRating');
    }

    // star rating field, read only to display average score
    public function getStarRating() {
        Requirements::css('foxystripe-reviews/thirdparty/bootstrap/css/bootstrap.min.css');
        Requirements::css("foxystripe-reviews/thirdparty/bootstrap-rating/bootstrap-rating.css");
        Requirements::javascript("foxystripe-reviews/thirdparty/bootstrap-rating/bootstrap-rating.js");
        return HiddenField::create('Rating', '', $this->getAverageScore())
            ->addExtraClass('rating')
            ->setAttribute('readonly', 'readonly')
            ->setAttribute('data-fractions', 4);
    }

    public function updateCMSFields(FieldList $fields) {

        if ($this->owner->AllowReviews) {

            $config = GridFieldConfig_RecordEditor::create();
            if (class_exists('GridFieldBulkManager')) $config->addComponent(new GridFieldBulkManager());

            $reviewField = GridField::create(
                'Reviews',
                _t('HasReviews.Reviews', 'Product Reviews'),
                $this->owner->Reviews(),
                $config
            );

            $fields->addFieldToTab('Root.Reviews', $reviewField);
        }
    }

    // delete reviews if product is deleted
    public function onAfterDelete() {
        if($this->owner->Status != "Published") {
            if($this->owner->Reviews()) {
                $reviews = $this->owner->getComponents('Reviews');
                foreach($reviews as $review) {
                    $review->delete();
                }
            }
        }
        parent::onBeforeDelete();
    }
}

class HasReviews_Controller extends Extension {

    static $allowed_actions = array(
        'ProductReviewForm'
    );

    public function ProductReviews() {
        return $this->owner->renderWith('ProductReviews');
    }

    public function ProductReviewForm(){
        if(Member::currentUser() && $this->owner->AllowReviews == true) {
            return new ProductReviewForm($this->owner, 'ProductReviewForm');
        }
        return '<p class="message bad">You must <a href="Security/login">log in</a> to post a review</p>';
    }
}

class HasReviewsHolder_Controller extends Extension {

    public function onBeforeInit() {
        Requirements::javascript("framework/thirdparty/jquery/jquery.js");
    }

}