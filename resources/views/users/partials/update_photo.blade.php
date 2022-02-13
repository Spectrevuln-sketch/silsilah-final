<div class="panel panel-default">
    <div class="panel-heading"><h3 class="panel-title">{{ __('user.update_photo') }}</h3></div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
    </div>
    @endif
    {{ Form::open(['route' => ['users.photo-upload', $user], 'method' => 'patch', 'files' => true]) }}

    <div class="panel-body text-center">
        @if($user->photo_path)
        <img src="{{ asset('/') . $user->photo_path }}" class="img-thumbnail" style="width: 100%; max-width: 300px;">
        @else
        @if($user->gender_id == 1)
        <img src="{{ asset('/images/icon_user_1.png') }}" class="img-thumbnail" style="width: 100%; max-width: 300px;">
        @else
        <img src="{{ asset('/images/icon_user_2.png') }}" class="img-thumbnail" style="width: 100%; max-width: 300px;">
    @endif
    @endif

    </div>
    <div class="panel-body">
        {!! FormField::file('photo', ['required' => true, 'label' => __('user.reupload_photo'), 'info' => ['text' => 'Format jpg, maks: 6mb.', 'class' => 'warning']]) !!}
    </div>
    <div class="panel-footer">
        {!! Form::submit(__('user.update_photo'), ['class' => 'btn btn-success']) !!}
        {{ link_to_route('users.show', __('app.cancel'), [$user], ['class' => 'btn btn-default']) }}
    </div>
    {{ Form::close() }}
</div>
