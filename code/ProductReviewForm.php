<?php

class ProductReviewForm extends Form {

    private static $max_stars;

    public static function getMaxStars() {
        return self::$max_stars;
    }

    public function __construct($controller, $name) {

        $maxStars = $this->stat('max_stars');

        $fields = FieldList::create(
            HiddenField::create('MaxRating')
                ->setValue($maxStars),
            NumericField::create('Rating', 'Rating', 5)
                ->setAttribute('type','number')
                ->setAttribute('max', $maxStars)
                ->setAttribute('min', '1')
                ->addExtraClass('rating'),
            TextareaField::create('Content','')
                ->setAttribute('placeholder','Comments')
                ->setAttribute('required','true')
        );

        $actions = FieldList::create(
            FormAction::create('process','Submit')->addExtraClass('btn btn-primary')
        );
        parent::__construct($controller, $name, $fields, $actions);
        $this->setHTMLID('product-review-form');
        $this->disableSecurityToken();
    }

    public function process($data, $form) {

        $productID = $this->Controller->ID;
        $memberID = Member::currentUserID();
        $review = new ProductReview($data);
        $review->ProductID = $productID;
        $review->CustomerID = $memberID;

        //debug::show($review);
        $review->write();

        $form->sessionMessage('Review Saved Pending Approval', 'good');
        $this->Controller->redirectBack();

    }

}