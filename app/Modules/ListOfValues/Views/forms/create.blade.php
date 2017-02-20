<form name="lov-form" id="lov-form-id" class="form-horizontal" @keydown="form.errors.clear($event.target.name)">
    <!-- Hidden elements -->
    <input type="hidden" name="api_token" id="api_token_id" v-model="api_token"/>
    <!-- end hidden elements -->

    <div class="form-group required">
        <label class="col-sm-3 control-label">{{ trans('ListOfValues::lang.Label.Text.LovName')}}</label>
        <div class="col-sm-7">
            <input type="text" name="name" id="name-id" class="form-control" v-model="form.name" />
            <span class="error text-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
        </div>
    </div>

    <div class="form-group required">
        <label class="col-sm-3 control-label">{{ trans('ListOfValues::lang.Label.Text.LovType')}}</label>
        <div class="col-sm-7">
            <select name="type" id="type-id" class="form-control" v-model="form.type" @change="form.errors.clear('type')">
                <option value="1">{{ trans('Core.Form.Select.Option.FromTable') }}</option>
                <option value="2">{{ trans('Core.Form.Select.Option.FromList') }}</option>
            </select>
            <span class="error text-danger" v-if="form.errors.has('type')" v-text="form.errors.get('type')"></span>
        </div>
    </div>

    <div>
        <ul class="nav nav-tabs" role="tablist" id="lov-tab">
            <li role="database" class="active"><a href="#database" aria-controls="database" role="tab" data-toggle="tab">{{trans('ListOfValues::lang.Tab.Text.Database')}}</a></li>
            <li role="list"><a href="#list" aria-controls="list" role="tab" data-toggle="tab">{{trans('ListOfValues::lang.Tab.Text.List')}}</a></li>
        </ul>
        <div class="tab-content" style="margin-top:10px;">
            <div role="database" class="tab-pane active" id="database">

                <div class="form-group required">
                    <label class="col-sm-3 control-label">{{ trans('ListOfValues::lang.Label.Text.TableName')}}</label>
                    <div class="col-sm-7">
                        <select name="lov_table" id="source_table-id" class="form-control" v-model="form.table" @change="form.errors.clear('lov_table')">
                            <option value="">{{ trans('Core.Form.Select.Option.Select') }}</option>
                            @foreach($tables as $table)
                                <option value="{{$table->TABLE_NAME}}">{{$table->TABLE_NAME}}</option>
                            @endforeach
                        </select>
                        <span class="error text-danger" v-if="form.errors.has('lov_table')" v-text="form.errors.get('lov_table')"></span>
                    </div>
                </div>

                <div class="form-group required">
                    <label class="col-sm-3 control-label">{{ trans('ListOfValues::lang.Label.Text.Column')}}</label>
                    <div class="col-sm-7">
                        <select name="lov_column_name" id="lov_column_name-id" class="form-control" v-model="form.column" @change="form.errors.clear('lov_column_name')">
                            <option value="">{{ trans('Core.Form.Select.Option.Select') }}</option>
                        </select>
                        <span class="error text-danger" v-if="form.errors.has('lov_column_name')" v-text="form.errors.get('lov_column_name')"></span>
                    </div>
                </div>

            </div>

            <div role="list" class="tab-pane" id="list">
                <div class="form-group required">
                    <label class="col-sm-3 control-label">{{ trans('ListOfValues::lang.Label.Text.LovValues')}}</label>
                    <div class="col-sm-7">
                        <select name="lovValues[]" class="hidden" id="lov_value_list-id" multiple v-model="form.lov_values"></select>
                        <input type="text" name="lov_value_input" id="lov_value_input-id" class="form-control" />

                        <span class="error text-danger" v-if="form.errors.has('lovValues')" v-text="form.errors.get('lovValues')"></span>
                    </div>
                </div>
                <div id="lov_list"></div>
            </div>

        </div>
    </div>

</form>