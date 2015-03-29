<?php

class ProductReview extends DataObject {

    private static $db = array(
        'Title' => 'Varchar(255)',
        'Content' => 'Text',
        'Approved' => 'Boolean',
        'Rating' => 'Decimal'
    );

    private static $has_one = array(
        'Product' => 'ProductPage',
        'Customer' => 'Member'
    );

    private static $summary_fields = array(
        'ShortTitle' => 'Title',
        'RatingNice' => 'Rating',
        'Approved.Nice' => 'Approved',
        'MemberDetails' => 'Reviewer',
        'Created' => 'Created'
    );

    private static $searchable_fields = array(
        'Approved' => 'Approved',
        'Product.ID' => array(
            'title' => 'Product'
        ),
        'Customer.ID' => array(
            'title' => 'Customer'
        ),
        'Title' => 'Title',
        'Content' => 'Review',
        'Created' => 'Date'
    );

    private static $default_sort = 'Created DESC';

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields = FieldList::create(
            CheckboxField::create('Approved'),
            ReadonlyField::create('Title'),
            ReadOnlyField::create('Content'),
            ReadonlyField::create('Rating')
        );

        return $fields;

    }

    public function getTitle() {
        if ($this->getField('Title')) return $this->getField('Title');
        return 'Untitled';
    }

    public function getShortTitle() {
        $title = $this->obj('Title');
        if (isset($title)) return $title->LimitCharacters(20);
        return 'Untitled';
    }

    public function getSummary() {
        return $this->obj('Content')->LimitCharacters(40);
    }

    public function getMemberDetails() {
        $reviewer = $this->Customer()->Name;
        $email = $this->Customer()->Email;
        return $reviewer .' (' . $email .')';
    }

    public function getRatingNice() {
        return round($this->Rating * 2, 0) / 2;
    }

    public function getStarRating() {
        return RatingField::create('Rating', '', $this->getRatingNice())
            ->setAttribute('readonly', 'readonly');
    }

}