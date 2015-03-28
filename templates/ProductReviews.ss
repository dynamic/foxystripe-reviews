<% require css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css') %>
<% require css('foxystripe-reviews/thirdparty/bootstrap-rating/bootstrap-rating.css') %>
<% require css('foxystripe-reviews/css/foxystripe-reviews.css') %>
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
            <% if $MoreThanOnePage %>
                <p>
                    <% if $NotFirstPage %>
                        <a class="prev" href="$PrevLink">Prev</a>
                    <% end_if %>
                    <% loop $Pages %>
                        <% if $CurrentBool %>
                            $PageNum
                        <% else %>
                            <% if $Link %>
                                <a href="$Link">$PageNum</a>
                            <% else %>
                                ...
                            <% end_if %>
                        <% end_if %>
                    <% end_loop %>
                    <% if $NotLastPage %>
                        <a class="next" href="$NextLink">Next</a>
                    <% end_if %>
                </p>
            <% end_if %>
        <% end_with %>
    <% else %>
        <p>This product doesn't have any reviews yet.</p>
    <% end_if %>
    <h4>Review This Product</h4>
    $ProductReviewForm
    <% require javascript("foxystripe-reviews/thirdparty/bootstrap-rating/bootstrap-rating.js") %>
<% end_if %>

