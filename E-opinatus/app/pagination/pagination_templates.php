<?php

die();

?>


<!--pagination_header-->
<div class="outer_pagination">
    <div class="pagination white">
<!--pagination_header end-->

<!--selected-->
        <span class="selected">[nth_page]</span>
<!--selected end-->

<!--unselected-->
        <span><a href="[location][nth_page]" title="">[nth_page]</a></span>
<!--unselected end-->

<!--previous-->
        <span><a href="[location][previous_page]" title="">&laquo; Previous</a></span>
<!--previous end-->

<!--next-->
        <span><a href="[location][next_page]" title="">Next &raquo;</a></span>
<!--next end-->

<!--left_arrow_disabled-->
        <span class="disabled"><</span>
<!--left_arrow_disabled end-->

<!--right_arrow_disabled-->
        <span class="disabled">></span>
<!--right_arrow_disabled end-->

<!--left_arrow-->
        <span><a href="[location][previous_page]" title=""><</a></span>
<!--left_arrow end-->

<!--right_arrow-->
        <span><a href="[location][next_page]" title="">></a></span>
<!--right_arrow end-->

<!--jumpto_header-->
        <form name="jumping" method="get">
            <select name="page" id="jumpto" onChange="window.document.location=('[location]'+this.options[this.selectedIndex].value);">
                <option value="1" selected="selected">Page</option>
<!--jumpto_header end-->

<!--jumpto_body-->
                <option value="[nth_page]">[nth_page]</option>
<!--jumpto_body end-->

<!--jumpto_footer-->
            </select>
            <!-- JS fallback -->
            <!--<input type="button" name="go" value="Jump">-->
        </form>
<!--jumpto_footer end-->

<!--pagination_footer-->
    </div>
</div>
<!--pagination_footer end-->
