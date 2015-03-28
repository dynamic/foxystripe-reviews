<?php

class ProductReview extends DataObject {

    private static $db = array(
        'Title' => 'Varchar(255)',
        'Content' => 'Text',
        'Approved' => 'Boolean',
        'Rating' => 'Int'
    );

    private static $has_one = array(
        'Product' => 'ProductPage',
        'Customer' => 'Member'
    );

    private static $summary_fields = array(
        'ShortTitle' => 'Title',
        'Created' => 'Created',
        'MemberDetails' => 'Reviewer',
        'Status' => 'Status'
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

    public function getStatus() {
        return $this->Approved ? 'Approved' : 'Pending';
    }

    public function getMemberDetails() {
        $reviewer = $this->Customer()->Name;
        $email = $this->Customer()->Email;
        return $reviewer .' (' . $email .')';
    }

    public function getStarRating() {
        return HiddenField::create('Rating', '', $this->Rating)
            ->addExtraClass('rating')
            ->setAttribute('readonly', 'readonly')
            ->setAttribute('data-fractions', 4);
    }

}