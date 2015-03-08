<h4>Product Reviews</h4>
<% if $ProductReviews %>
    <% loop $ProductReviews %>
        <div class="product-review">
            <% if $Rating >= 1 %>
                <div class="star-ratings">
                    <strong class="rating-label">{$Rating}/{$MaxRating} Stars</strong>
                    <span class="glyphicon glyphicon-star<% if $Rating < 1 %>-empty<% end_if %>"></span>
                    <span class="glyphicon glyphicon-star<% if $Rating < 2 %>-empty<% end_if %>"></span>
                    <span class="glyphicon glyphicon-star<% if $Rating < 3 %>-empty<% end_if %>"></span>
                    <span class="glyphicon glyphicon-star<% if $Rating < 4 %>-empty<% end_if %>"></span>
                    <span class="glyphicon glyphicon-star<% if $Rating < 5 %>-empty<% end_if %>"></span>
                </div>
            <% end_if %>
            <div class="clearfix"></div>
            <p class="rating-comments">
                $Content<br>
                <i>by $Customer.Name on $Created.Month $Created.DayOfMonth, $Created.Year</i>
            </p>
        </div>
    <% end_loop %>
<% else %>
    <p>This product doesn't have any reviews yet.</p>
<% end_if %>
$ProductReviewForm