<form class="form-horizontal" id="metadata-form" action="{!! url('api/v1/metadata') !!}">
    <!-- Hidden elements -->
    <input type="hidden" name="api_token" id="api_token_id" value="{{ Auth::user()->api_token }}" />
    <input type="hidden" name="_method" />
    <!-- end hidden elements -->

    <div class="form-group required">
        <label class="col-sm-3 control-label">{{ trans('Metadata::lang.Label.Text.Type')}}</label>
        <div class="col-sm-7">
            <select name="type" id="type-id" class="form-control">
                <option value="">{{trans('Core.Form.Select.Option.Select')}}</option>
                <option value="label">Label</option>
                <option value="setting">Setting</option>
            </select>
        </div>
    </div>

    <div class="form-group required">
        <label class="col-sm-3 control-label">{{ trans('Metadata::lang.Label.Text.Key')}}</label>
        <div class="col-sm-7">
            <input type="text" name="key" id="key-id" class="form-control"/>
        </div>
    </div>

    <div class="form-group required">
        <label class="col-sm-3 control-label">{{ trans('Metadata::lang.Label.Text.Value')}}</label>
        <div class="col-sm-7">
            <input type="text" name="value" id="value-id" class="form-control"/>
        </div>
    </div>

    <div class="form-group required">
        <label class="col-sm-3 control-label">{{ trans('Metadata::lang.Label.Text.Description')}}</label>
        <div class="col-sm-7">
            <textarea rows="5" name="description" id="description-id" class="form-control"></textarea>
        </div>
    </div>

    <div class="checkbox">
        <div class="col-sm-offset-3">
            <label>
                <input type="checkbox" name="enabled" id="enabled-id" value="Y" checked />
                {{trans('Metadata::lang.Label.Text.Enabled')}}
            </label>
        </div>
    </div>

</form>