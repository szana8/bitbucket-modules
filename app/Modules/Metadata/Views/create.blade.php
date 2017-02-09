<div class="modal fade" tabindex="-1" role="dialog" id="new-metadata-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{trans('Metadata::lang.Label.Text.CreateMetadata')}}</h4>
            </div>
            <div class="modal-body">
                <form name="metadata-form" id="metadata-form-id" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="update_item" id="update_item_id"/>
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
                                <input type="checkbox" name="enabled" id="enabled-id" value="Y" checked/>
                                <input type="hidden" name="enabled" disabled id="enabled-hidden-id" value="N"/>
                                {{trans('Metadata::lang.Label.Text.Enabled')}}
                            </label>
                            <script>
                                $('#enabled-id').change(function () {
                                    if ($('#enabled-id').prop('checked')) {
                                        $('#enabled-hidden-id').attr('disabled', true);
                                    } else {
                                        $('#enabled-hidden-id').attr('disabled', false);
                                    }
                                });
                            </script>
                        </div>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveMetadataBtn">Save changes</button>
            </div>

        </div>
    </div>
</div>