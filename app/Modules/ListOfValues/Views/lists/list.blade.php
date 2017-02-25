<table name="lov-table" id="lov-table-id" class="table">
    <thead>
        <tr>
            <th>{{ trans('ListOfValues::lang.Label.Text.LovName') }}</th>
            <th>{{ trans('ListOfValues::lang.Label.Text.LovType') }}</th>
            <th>{{ trans('ListOfValues::lang.Label.Text.TableName') }}</th>
            <th>{{ trans('ListOfValues::lang.Label.Text.Column') }}</th>
            <th>{{ trans('ListOfValues::lang.Label.Text.LovValues') }}</th>
            <th>{{ trans('ListOfValues::lang.Label.Text.Condition') }}</th>
            <th>{{ trans('ListOfValues::lang.Label.Text.Operations') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($listofvalues->data as $listOfValue)
            <tr>
                <td>{{ $listOfValue->name }}</td>
                <td>
                    @if($listOfValue->type == 1)
                        {{ trans('ListOfValues::lang.Label.Text.FromTable') }}
                    @else
                        {{ trans('ListOfValues::lang.Label.Text.FromList') }}
                    @endif
                </td>
                <td>{{ $listOfValue->table }}</td>
                <td>{{ $listOfValue->column }}</td>
                <td width="450px">
                    @foreach($listOfValue->lookups as $lookup)
                        <span class="label label-primary">{{ $lookup->value }}</span>&nbsp;
                    @endforeach
                </td>
                <td>{{ $listOfValue->condition }}</td>
                <td>
                    <ul class="list-inline">
                        <li>
                            <a @click="show({{ $listOfValue->id }})">{{ trans('Core.Label.text.Edit') }}</a>
                        </li>
                        <li>
                            <a @click='destroy("{{ $listOfValue->id }}");'>{{ trans('Core.Label.text.Delete') }}</a>
                        </li>
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="8">{{ $listofvalues->pagination }}</td>
    </tr>
    </tfoot>
</table>