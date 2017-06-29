 <?php $data = DB::table('languages')->get(); ?>
 <?php
 if (Session::has('message')) {

     ?>
     <div class="alert alert-success">
        <?php
        $message = Session::get('message');
        echo "<center>".$message."</center>";
        ?>

    </div>
    <?php

}
?>
<br>
<div id="create-dict"  class="container">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <center><h1><b>THÊM LỊCH SỬ</b></h1></center>
    <br>
</div>
<div class="col-sm-6 col-sm-offset-3 form-group row panel panel-default no-radius-left no-radius-right">
    <div class="panel-body">
        <form action="{{ route('historyUpdate') }}" method="POST" role="form" id="create-dict-form">
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <div class="create-dict-input">
            <div class="row panel">
                <div class="row no-margin margin-top">
                    <div class="col-sm-5">
                        <div class="row">
                            <div class="col-sm-3">
                                <label  class="form-label text-center-vertical">Từ</label>
                            </div>
                            <div class="col-sm-9">
                            <textarea class="form-control" name="tu" rows="2"></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-5">
                                <label  class="form-label text-center-vertical">Ngôn ngữ</label>
                            </div>
                            <div class="col-sm-7">
                                <select name="cb1" id="" class="form-control">
                                    <?php foreach($data as $item){
                                        $language = $item->language;
                                        ?>
                                        <option>{{ $language }}</option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row no-margin margin-top">
                        <div class="col-sm-5">
                            <div class="row">

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label  class="form-label text-center-vertical">Loại từ</label>
                                </div>
                                <div class="col-sm-7">
                                    <select class="form-control" name="typeword">
                                    @if(isset($getTypeEnglish))
                                      @foreach($getTypeEnglish as $key=>$value)
                                      <option
                                      value="{{ $value }}">{!! $value !!}</option>
                                      @endforeach
                                    @endif
                                  </select>
                              </div>
                          </div>
                      </div>
                  </div>

              </div>
              <div class="row no-margin margin-top">
                <div class="col-sm-5">
                    <div class="row">
                        <div class="col-sm-3">
                            <label  class="form-label text-center-vertical">Nghĩa</label>
                        </div>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="nghia" rows=""></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-5">
                            <label  class="form-label text-center-vertical">Ngôn ngữ</label>
                        </div>
                        <div class="col-sm-7">
                            <select name="cb2" id="" class="form-control">
                                <?php foreach($data as $item){
                                    $language = $item->language;
                                    ?>
                                    <option>{{ $language }}</option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center row margin-top">
            {!! Form::submit("Thêm từ", ['class' => 'btn btn-success']) !!}
        </div>
        <br>
    </form>
</div>
</div>
</div>