<form id="metadata-form-id" class="form-horizontal" @keydown="form.errors.clear($event.target.name)">
    <!-- Hidden elements -->
    <input type="hidden" name="api_token" id="api_token_id" v-model="api_token"/>
    <!-- end hidden elements -->

    <div class="form-group">
        <label class="col-sm-3 control-label">{{ trans('Metadata::lang.Label.Text.Type')}}</label>
        <div class="col-sm-7">
            <select name="type" id="type-id" class="form-control" v-model="form.type" @change="form.errors.clear('type')">
                <option value="">{{trans('Core.Form.Select.Option.Select')}}</option>
                <option value="label">Label</option>
                <option value="setting">Setting</option>
            </select>
            <span class="error text-danger" v-if="form.errors.has('type')" v-text="form.errors.get('type')"></span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">{{ trans('Metadata::lang.Label.Text.Key')}}</label>
        <div class="col-sm-7">
            <input type="text" name="key" id="key-id" class="form-control" v-model="form.key"/>
            <span class="error text-danger" v-if="form.errors.has('key')" v-text="form.errors.get('key')"></span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">{{ trans('Metadata::lang.Label.Text.Value')}}</label>
        <div class="col-sm-7">
            <input type="text" name="value" id="value-id" class="form-control" v-model="form.value" />
            <span class="error text-danger" v-if="form.errors.has('value')" v-text="form.errors.get('value')"></span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">{{ trans('Metadata::lang.Label.Text.Description')}}</label>
        <div class="col-sm-7">
            <textarea rows="5" name="description" id="description-id" class="form-control" v-model="form.description"></textarea>
            <span class="error text-danger" v-if="form.errors.has('description')" v-text="form.errors.get('description')"></span>
        </div>
    </div>

    <div class="checkbox">
        <div class="col-sm-offset-3">
            <label>
                <input type="checkbox" name="enabled" id="enabled-id" v-model="form.enabled"/>
                {{trans('Metadata::lang.Label.Text.Enabled')}}
            </label>
        </div>
    </div>

</form>