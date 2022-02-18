<div class="panel panel-default">
    <div class="panel-heading"><h3 class="panel-title">{{ trans('user.profile') }}</h3></div>
    <div class="panel-body text-center">
        @if($user->photo_path)
         <img src="{{ asset('/img') ."/uploads/". $user->photo_path }}" class="img-thumbnail" style="width: 100%; max-width: 300px;">
        @else
        @if($user->gender_id == 1)
        <img src="{{ asset('/images/icon_user_1.png') }}" class="img-thumbnail" style="width: 100%; max-width: 300px;">
        @else
        <img src="{{ asset('/images/icon_user_2.png') }}" class="img-thumbnail" style="width: 100%; max-width: 300px;">
    @endif
    @endif
    </div>
    <table class="table">
        <tbody>
            <tr>
                <th class="col-sm-4">{{ trans('user.name') }}</th>
                <td class="col-sm-8">{{ $user->profileLink() }}</td>
            </tr>
            <tr>
                <th>{{ trans('user.nickname') }}</th>
                <td>{{ $user->nickname }}</td>
            </tr>
            <tr>
                <th>{{ trans('user.gender') }}</th>
                <td>{{ $user->gender }}</td>
            </tr>
            <tr>
                <th>{{ trans('user.dob') }}</th>
                <td>{{ $user->dob }}</td>
            </tr>
            <tr>
                <th>{{ trans('user.birth_order') }}</th>
                <td>{{ $user->birth_order }}</td>
            </tr>
            @if ($user->dod)
            <tr>
                <th>{{ trans('user.dod') }}</th>
                <td>{{ $user->dod }}</td>
            </tr>
            @endif
            <tr>
                <th>{{ trans('user.age') }}</th>
                <td>
                    @if ($user->age)
                        {!! $user->age_string !!}
                    @endif
                </td>
            </tr>
            @if ($user->email)
            <tr>
                <th>{{ trans('user.email') }}</th>
                <td>{{ $user->email }}</td>
            </tr>
            @endif
            <tr>
                <th>{{ trans('user.phone') }}</th>
                <td>{{ $user->phone }}</td>
            </tr>
            <tr>
                <th>{{ trans('user.address') }}</th>
                <td>{!! nl2br($user->address) !!}</td>
            </tr>
        </tbody>
    </table>
</div>
