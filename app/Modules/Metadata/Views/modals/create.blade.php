<modal id="new-metadata-modal">

    <template slot="header">{{trans('Metadata::lang.Label.Text.CreateMetadata')}}</template>

    @include('metadata.views.forms.create')

    <template slot="footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" @click="setAttributeDefaults()">Close</button>
        <button type="button" class="btn btn-primary" @click="submit" :disabled="form.errors.any()">Save changes</button>
    </template>

</modal>
