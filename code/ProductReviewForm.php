<?php

class ProductReviewForm extends Form {

    public function __construct($controller, $name) {

        $fields = FieldList::create(
            HiddenField::create('Rating')
                ->addExtraClass('rating'),
            TextField::create('Title', '')
                ->setAttribute('placeholder', 'Title')
                ->setAttribute('required', 'true'),
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