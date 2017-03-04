<table class="table" name="responsibility-lookup-table" id="responsibility-lookup-table-id">
    <thead>
    <tr>
        <th>{{ trans('UserManagement::lang.Label.Text.UserName') }}</th>
        <th>{{ trans('UserManagement::lang.Label.Text.FullName') }}</th>
        <th>{{ trans('UserManagement::lang.Label.Text.Responsibilities') }}</th>
        <th>{{ trans('UserManagement::lang.Label.Text.Operations') }}</th>
    </tr>
    </thead>
    <tbody>

    </tbody>
    <tfoot>
    @foreach($users as $user)

        <tr>
            <td>{{ $user->email }}</td>
            <td>
                @foreach($user->profiles as $profile)
                    <button class="btn btn-default">
                        <i class="fa fa-{{ $profile->type }}"></i>
                        {{ $profile->name }}
                    </button>
                @endforeach
                </td>
            <td></td>
            <td>
                <button id="edit-user-btn" type="button" class="btn btn-primary" data-user-id="{{$user->id}}">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    <b>{{ trans('UserManagement::lang.Label.Text.Edit') }}</b>
                </button>
                <button id="delete-user-btn" type="button" class="btn btn-danger"data-user-id="{{$user->id}}">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    <b>{{ trans('UserManagement::lang.Label.Text.Delete') }}</b>
                </button>
            </td>

        </tr>
    @endforeach
    </tfoot>
</table>