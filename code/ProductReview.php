<?php

class ProductReview extends DataObject {

    private static $db = array(
        'Title' => 'Varchar',
        'Content' => 'Text',
        'Approved' => 'Boolean'
    );

    private static $has_one = array(
        'Product' => 'ProductPage',
        'Customer' => 'Member'
    );

    private static $has_many = array(
        'Ratings' => 'ProductRating'
    );

    private static $summary_fields = array(
        'Product.Title' => 'Product',
        'Title' => 'Title',
        'Created' => 'Created',
        'MemberDetails' => 'Reviewer',
        //'Status' => 'Status'
    );

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields->addFieldsToTab('Root.Main', array(
            OptionSetField::create('Rating', 'Rating', array(1,2,3,4,5)))
        );

        return $fields;

    }

    /*
    public function getStatus() {
        return $this->Approved ? 'Approved' : 'Pending';
    }
    */

    public function getMemberDetails() {
        $reviewer = $this->Member()->Name;
        $email = $this->Member()->Email;
        return $reviewer .' (' . $email .')';
    }


}