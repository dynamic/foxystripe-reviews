# FoxyStripe Reviews

FoxyStripe Reviews is an add-on module for [FoxyStripe](http://github.com/dynamic/foxystripe), a [SilverStripe](http://silverstripe.org) ecommerce module designed to integrate with [FoxyCart](http://www.foxycart.com/).

Add product reviews to your FoxyStripe store. Your customers can rate the product on a five star scale, and leave feedback on their experience with the product.

Features include:

*	RatingField for input and display using [Bootstrap Rating](https://github.com/dreyescat/bootstrap-rating/)
*	Review  moderation

## Installation

### Requirements

*  SilverStripe 3.1.x
*  FoxyStripe 1.x

### Composer Installation

`"require": { "dynamic/foxystripe-reviews": "dev-master" }`

### Git Installation

`git clone git@github.com:dynamic/foxystripe-reviews.git foxystripe-reviews`

### Manual Installation

Place this directory in the root of your SilverStripe installation, and rename the folder to 'foxystripe-reviews'.

## Setup

Once FoxyStripe Reviews is installed, run a dev/build to setup the database.

### Settings

Reviews can be enabled in the Settings tab of a Product page. Reviews will be enbaled by default as new Products are created.

Comment moderation is enabled by default, and can be disabled in the CMS in Settings > Reviews.

### Templates

Use `$ProductRating` to display the product's 5 star rating

Use `$ProductReviews` to display the form and a paginated list of product reviews 

## Usage

With reviews enabled, a form will display near the bottom of the Product page. Logged in customers can rate the product from 1-5 stars, and leave feedback on their experience.

Eligible reviews will display in a paginated list below the product information. 

If any eligible reviews have been submitted for a product, and the average score is greater than 1, the product will display a 5 star rating.

## Additional Information

### Maintainer Contact

 *  [Dynamic](http://www.dynamicagency.com) (<dev@dynamicagency.com>)
 
Contributions welcome by pull request and/or issue report. Please follow Silverstripe code standards.
 
### License

	Copyright (c) 2015, Dynamic, Inc.
	All rights reserved.

	Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

	Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
	
	Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
	
	THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.


