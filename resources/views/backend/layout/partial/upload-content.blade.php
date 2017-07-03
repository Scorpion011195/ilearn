    <div class="panel">
        <div class="panel-body">
            {!! Form::open(array('enctype' => 'multipart/form-data', 'files' =>true, 'accept-charset' => 'utf-8')) !!}
            <div class="panel-content">
                {!! Form::label('csv-file', 'Tải lên file csv') !!}
                {!! Form::file('csv-file', ['class' => 'btn btn-default']) !!}
            </div>
        </div>
        <div class="panel-footer">
            {!! Form::submit('Duyệt file', ['class' => 'btn btn-default']) !!}
        </div>
        {!! Form::close() !!}
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(isset($info))
    <div class='col-md-3'></div>
    <div class="col-md-6">
        <div class="alert alert-info" id='idsuccess'>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h2 align="center">Upload file successfully</h2>
        </div>
    </div>
    @endif
