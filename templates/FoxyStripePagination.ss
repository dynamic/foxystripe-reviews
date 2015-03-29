<% if $MoreThanOnePage %>
    <ul class="pagination" style="margin-left: 0">
        <li<% if $NotLastPage %> class="disabled"<% end_if %>>
            <a <% if $NotFirstPage %>href="$PrevLink"<% end_if %>>&#60;</a>
        </li>
        <% loop $Pages %>
            <li<% if $CurrentBool %> class="active"<% end_if %>>
                <% if $CurrentBool %>
                    <a>$PageNum</a>
                <% else %>
                    <% if $Link %>
                        <a href="$Link">$PageNum</a>
                    <% else %>
                        <a>...</a>
                    <% end_if %>
                <% end_if %>
            </li>
        <% end_loop %>
        <li<% if $NotFirstPage %> class="disabled"<% end_if %>>
            <a <% if $NotLastPage %>href="$NextLink"<% end_if %>>&#62;</a>
        </li>
    </ul>
<% end_if %>