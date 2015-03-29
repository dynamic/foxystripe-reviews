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

    public function updateSettingsFields(FieldList $fields) {
        $fields->addFieldToTab("Root.Settings", new CheckboxField('AllowReviews'));
        return $fields;
    }

    // return a paginated list of eligible reviews
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

    // calculate product's average score of all eligible reviews
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

        if ($total > 0) return round(($score / $total) * 2, 0) / 2;
        return false;

    }

    // star rating field, read only to display average score
    public function getStarRating() {
        return RatingField::create('Rating', '', $this->getAverageScore())
            ->setAttribute('readonly', 'readonly');
    }

    // call to render ProductRating include in template
    public function getProductRating() {
        return $this->owner->renderWith('ProductRating');
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
        parent::onAfterDelete();
    }
}

class HasReviews_Controller extends Extension {

    static $allowed_actions = array(
        'ProductReviewForm'
    );

    // call to render ProductReviews include in template
    public function ProductReviews() {
        return $this->owner->renderWith('ProductReviews');
    }

    // only display form is user is logged in
    public function ProductReviewForm(){
        if(Member::currentUser() && $this->owner->AllowReviews == true) {
            return new ProductReviewForm($this->owner, 'ProductReviewForm');
        }
        return '<p class="message bad">You must <a href="Security/login">log in</a> to post a review</p>';
    }
}

class HasReviewsHolder_Controller extends Extension {

    // require jquery in ProductHolder for bootstrap ratings
    public function onBeforeInit() {
        Requirements::javascript("framework/thirdparty/jquery/jquery.js");
    }

}