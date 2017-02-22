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
                        <select name="lov_table" id="source_table-id" class="form-control" v-model="form.table" @change="getColumns()">
                            <option value="">{{ trans('Core.Form.Select.Option.Select') }}</option>
                            @foreach($tables as $table)
                                <option value="{{$table->TABLE_NAME}}">{{$table->TABLE_NAME}}</option>
                            @endforeach
                        </select>
                        <span class="error text-danger" v-if="form.errors.has('table')" v-text="form.errors.get('table')"></span>
                    </div>
                </div>

                <div class="form-group required">
                    <label class="col-sm-3 control-label">{{ trans('ListOfValues::lang.Label.Text.Column')}}</label>
                    <div class="col-sm-7">
                        <select name="column" class="form-control" v-model="form.column" @change="form.errors.clear('column')">
                            <option value="">{{ trans('Core.Form.Select.Option.Select') }}</option>
                            <option v-for="column in columns" :form.column="column.name">@{{ column.name }}</option>
                        </select>
                        <span class="error text-danger" v-if="form.errors.has('column')" v-text="form.errors.get('column')"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ trans('ListOfValues::lang.Label.Text.WhereClause')}}</label>
                    <div class="col-sm-7">
                        <textarea name="condition" class="form-control" rows="4" v-model="form.condition"></textarea>
                        <span class="error text-danger" v-if="form.errors.has('condition')" v-text="form.errors.get('condition')"></span>
                    </div>
                </div>

            </div>

            <div role="list" class="tab-pane" id="list">
                <div class="form-group required">
                    <label class="col-sm-3 control-label">{{ trans('ListOfValues::lang.Label.Text.LovValues')}}</label>
                    <div class="col-sm-7">

                        <input type="text" name="lov_value_input" class="form-control" v-model="values" @keyup.enter ="setValues()" />
                        <span class="error text-danger" v-if="form.errors.has('lookupValues')" v-text="form.errors.get('lookupValues')"></span>
                    </div>
                </div>
                <div id="lov_list"></div>
            </div>

        </div>
    </div>

</form>