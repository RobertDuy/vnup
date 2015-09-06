<form role="search" class="frm-search" id="search-frm" method="GET" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input name="s" value="<?php echo esc_attr( get_search_query() ); ?>" class="txt-search" type="text" placeholder="Nội dung cần tìm..">
	<input class="btn-search" type="submit" value="" style="background-color: #f9f9f9;">
</form>