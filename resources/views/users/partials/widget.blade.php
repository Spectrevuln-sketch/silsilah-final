<div class="panel panel-default">
    <div class="panel-heading"><h3 class="panel-title">Widget Youtube Video</h3></div>
    {{ Form::open(['route' => ['users.embedpost', $user], 'method' => 'POST', 'files' => true]) }}
    {{-- <div class="panel-body text-center">
        @if($user->photo_path)
            <img src="{{ asset('/') . $user->photo_path }}" class="img-thumbnail" style="max-width: 200px;">
        @else
        
        {{ userPhoto($user, ['style' => 'width:100%;max-width:300px']) }}
        @endif

    </div> --}}
    <div class="panel-body">
        {!! FormField::text('embed_youtube', ['required' => false, 'label' => __('Masukan Embed Code Youtube'), 'info' => ['text' => 'Harap Upload Terlebih Dahulu Video Ke Youtube.', 'class' => 'warning']]) !!}

        {!! Form::submit(__('Tambah Video'), ['class' => 'btn btn-success']) !!}
    </div>
    {{ Form::close() }}
    <table class="table">
        <tbody>
            <tr>
                <td>
                    <div id="yv-frame">
                        @foreach($user->embedvideo as $video)
                        {{-- <div class="yv-frame-item"> --}}
                            {!! $video->embed_video !!}  
                        {{-- </div> --}}
                        @endforeach
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<script>
    $(()=>{
        $('iframe').attr('width', '30%');
        $('iframe').attr('height', '30%');
    })
</script>