# FoxyStripe Reviews

FoxyStripe Reviews is an add-on module for [FoxyStripe](http://github.com/dynamic/foxystripe), a [SilverStripe](http://silverstripe.org) ecommerce module designed to integrate with [FoxyCart](http://www.foxycart.com/).

Add product reviews to your FoxyStripe store. Your customers can rate the product on a five star scale, and leave feedback on their experience with the product.

Features include:

*	five star rating field for input and display
*	comment  moderation
*	requires customers to be logged in

## Installation

### Requirements

*  SilverStripe 3.1.x
*  FoxyStripe 1.x

### Composer Installation

`"require": { "dynamic/foxystripe-reviews": "*" }`

### Git Installation

`git clone git@github.com:dynamic/foxystripe-reviews.git foxystripe-reviews`

### Manual Installation

Place this directory in the root of your SilverStripe installation, and rename the folder to 'foxystripe-reviews'.

## Setup

Once FoxyStripe Reviews is installed, run a dev/build to setup the database.

In the CMS, reviews can be enabled in the Settings tab of a Product page. Reviews will be enbaled by default when new Products are created.

Comment moderation is enabled by default, so only reviews marked "approved" will display on the Product page. Moderation can be disabled in the CMS in Settings > Reviews.

## Usage

With reviews enabled, a review form will display near the bottom of the Product page. Customers can rate the product from 1-5 stars, and leave feedback on their experience.

Approved reviews will display below the product information. The list of reviews is paginated to handle any number of reviews.

Products display an average rating score.

Customers are required to login to post a review.


## Additional Information

### Maintainer Contact

 *  [Dynamic](http://www.dynamicagency.com) (<dev@dynamicagency.com>)
 
### License

	Copyright (c) 2015, Dynamic, Inc.
	All rights reserved.

	Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

	Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
	
	Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
	
	THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.


