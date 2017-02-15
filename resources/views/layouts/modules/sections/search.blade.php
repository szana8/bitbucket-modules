<form class="form-horizontal" name="search-form" id="search-form-id">
    <div class="form-group">
        <label class="col-sm-3 control-label">{{ trans('Core.Label.Text.Search')}}</label>
        <div class="col-sm-9">
            <input type="text" name="search" id="search-id" value="{!! Request::get('search') !!}" class="form-control"/>
        </div>
    </div>
</form>