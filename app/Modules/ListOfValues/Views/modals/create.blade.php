<modal id="new-list-of-values-modal">

    <template slot="header">{{trans('ListOfValues::lang.Label.Text.ListOfValues')}}</template>

    @include('listofvalues.views.forms.create')

    <template slot="footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" @click="submit" :disabled="form.errors.any()">Save changes</button>
    </template>

</modal>