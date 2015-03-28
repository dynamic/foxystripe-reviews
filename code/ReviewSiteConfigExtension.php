<?php

class ReviewSiteConfigExtension extends DataExtension {

    private static $db = array(
        'ModerateReviews' => 'Boolean'
    );

    private static $defaults = array(
        'ModerateReviews' => true
    );

    public function updateCMSFields(FieldList $fields) {

        $fields->addFieldsToTab('Root.Reviews', array(
            HeaderField::create('ProductReviewHD', _t('ReviewSiteConfigExtension.ProductReviewHD', 'Product Reviews', 3)),
            CheckboxField::create('ModerateReviews', 'Moderate Product Reviews')
                ->setDescription('Reviews must be approved before being displayed on the website')
        ));

    }

}