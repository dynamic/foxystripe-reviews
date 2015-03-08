<h4>Product Reviews</h4>
<% if $ProductReviews %>
    <% loop $ProductReviews %>
        <div class="product-review">
            <% if $Rating >= 1 %>
                <div class="star-ratings">
                    <strong class="rating-label">{$Rating}/{$Top.MaxStars} Stars</strong>
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

    <% with $ProductReviews %>
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