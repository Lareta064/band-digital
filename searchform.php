
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" class="sidebar-widget search">
    <div class="form-group">
        <input name="s" id="s" value="<?php echo get_search_query() ?>" type="text" placeholder="поиск" class="form-control">
        <button type="submit" id="searchsubmit">
            <i class="fa fa-search"></i>
        </button>
    </div>
</form>
                       