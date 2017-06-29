@extends('backend.ilearn')

@section('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"
          rel="stylesheet"/>
    <!-- X EDITABLE CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css"
          rel="stylesheet"/>
@endsection

@section('content-header')
        <h1>
            Thống kê
            <!-- <small>{{ Session::get('user')->username }}</small> -->
        </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol> -->
@endsection

@section('content')
    <div class="panel">
        <div class="panel-body">
            <div class="row">
              <div class="col-sm-12">
                <form class="form-inline" action="{{ route('adminDictCollectByCondition') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                      <div class="input-group ">
                        <span class="input-group-addon">Tình trạng</span>
                        <select class="form-control" name="_condition">
                            @foreach($listSearch as $value)
                            <option
                                @if($value == $cbTypeWord)
                                    {!! "selected" !!}
                                @endif
                            >{!! $value !!}</option>
                            @endforeach
                        </select>
                      </div>
                      <button type="submit" class="btn btn-info">
                          <span class="glyphicon glyphicon-search"></span>
                      </button>
                    </div>
                </form>
              </div>
            </div>
            <br>
            @include('backend.layout.partial.collect-table')
        </div>
    </div>
@endsection

@section('script')
    <!-- Active left menu -->
    <script>
        $(document).ready(function(){
            $('#_menu-qltd').addClass("active");
            $('#_menu-qltd-tk').addClass("active");
        });
    </script>
    <!-- /.Active left menu -->

    <!-- script toltip -->
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <!-- /.script tootip -->
@endsection
