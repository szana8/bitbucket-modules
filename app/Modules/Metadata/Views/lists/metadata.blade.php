<table class="table" name="metadata-table" id="metadata-table-id">
    <thead>
        <tr>
            <th>{{ trans('Metadata::lang.Label.Text.Type') }}</th>
            <th>{{ trans('Metadata::lang.Label.Text.Key') }}</th>
            <th>{{ trans('Metadata::lang.Label.Text.Value') }}</th>
            <th>{{ trans('Metadata::lang.Label.Text.Description') }}</th>
            <th>{{ trans('Metadata::lang.Label.Text.Enabled') }}</th>
            <th>{{ trans('Metadata::lang.Label.Text.Operations') }}</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="metadata in list.data">
            <td v-text="metadata.type"></td>
            <td v-text="metadata.key"></td>
            <td v-text="metadata.value"></td>
            <td v-text="metadata.description"></td>
            <td v-text="metadata.enabled"></td>
            <td>
                <ul class="list-inline">
                    <li>
                        <a @click="show(metadata.id)">{{ trans('Core.Label.text.Edit') }}</a>
                    </li>
                    <li>
                        <a @click='destroy(metadata.id);'>{{ trans('Core.Label.text.Delete') }}</a>
                    </li>
                </ul>
            </td>
        </tr>

    </tbody>
    <tfoot>
        <tr>
            <td colspan="8" v-html="list.pagination"></td>
        </tr>
    </tfoot>
</table>