<% if $AllowReviews %>
    <h4>Product Reviews</h4>
    <% if $ProductReviewList %>
        <% loop $ProductReviewList %>
            <div class="product-review">
                <h5>$Title</h5>
                <% if $Rating >= 1 %>$StarRating<% end_if %>
                <span class="small">by $Customer.Name on $Created.Month $Created.DayOfMonth, $Created.Year</span>
                <p>$Content</p>
            </div>
        <% end_loop %>

        <% with $ProductReviewList %>
            <% include FoxyStripePagination %>
        <% end_with %>
    <% else %>
        <p>This product doesn't have any reviews yet.</p>
    <% end_if %>
    <h4>Review This Product</h4>
    $ProductReviewForm
<% end_if %>

