<modal id="new-metadata-modal" v-if="showModal">

    <template slot="header">{{trans('Metadata::lang.Label.Text.CreateMetadata')}}</template>

    @include('metadata.views.forms.create')

    <template slot="footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveMetadataBtn">Save changes</button>
    </template>

</modal>
