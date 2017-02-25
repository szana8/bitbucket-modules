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
        @foreach($list->data as $metadata)
            <tr>
                <td>{{$metadata->type}}</td>
                <td>{{$metadata->key}}</td>
                <td>{{$metadata->value}}</td>
                <td>{{$metadata->description}}</td>
                <td>{{$metadata->enabled}}</td>
                <td>
                    <ul class="list-inline">
                        <li>
                            <a @click="show({{ $metadata->id }})">{{ trans('Core.Label.text.Edit') }}</a>
                        </li>
                        <li>
                            <a @click='destroy("{{ $metadata->id }}");'>{{ trans('Core.Label.text.Delete') }}</a>
                        </li>
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="8">{!! $list->pagination !!}</td>
        </tr>
    </tfoot>
</table>