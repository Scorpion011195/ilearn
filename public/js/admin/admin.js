$(document).ready(function(){
/* -----  THỐNG KÊ SCREEN ----- */
    // Tooltip
    $('[data-toggle="tooltip"]').tooltip();
/* -----  /.THỐNG KÊ SCREEN ----- */

/* -----  TRA TỪ SCREEN ----- */
    // Confirm delete word to
    $(document).on('click','._delete-word-to', function(evt){
        var _element = $(this).closest('tr');
        var idWord = _element.find('._word-id').attr('data-id');
        var word = _element.find('._word').text();
        var _token = $('input[name=_token]').val();
        var table = $("#_table-dich :selected").text();

        if(confirm('Bạn có muốn xóa từ này?')){
            $.ajax({
                url:'delete',
                method: 'POST',
                data : {'idWord': idWord,'table': table, '_token' : _token},
                dataType:'json',
                success : function(response){
                    if(response['data'] == "OK"){
                       _element.remove();
                        $("#_notify").html('Đã xóa từ "'+ word +'"');
                    }
                },
                error: function(xhr, error) {
                   console.log(error);
                }
            });
        }
    });

    // Update explain
    // OPEN MODAL
    $(document).on('click','._update-word', function(evt){
        var _element = $(this).closest('tr');
        var idWord = _element.find('._word-id').attr('data-id');
        var word = _element.find('._word').text();
        var explain = _element.find('._explain').html();
        var _token = $('input[name=_token]').val();
        var table = $("#_table-dich :selected").text();

        $('#_nghia').val(word);
        $('#_table-modal').val(table);
        $('#_id-word-modal').val(idWord);
        CKEDITOR.instances['_gtTo'].setData(explain);
    });

    // UPDATE
    $(document).on('submit','#_form-update-word', function(evt){
        evt.preventDefault();
        if($('#_nghia').val() == ''){
            alert('Bạn chưa nhập nghĩa!');
        }
        else{
          var idWord = $('#_id-word-modal').val();
          var table = $('#_table-modal').val();
          var updateWord = $('#_nghia').val();
          var updateExplain = CKEDITOR.instances['_gtTo'].getData();
          var _token = $('input[name=_token]').val();

          $.ajax({
            url:'update',
            method: 'POST',
            data : {'idWord': idWord,'table': table, 'updateWord': updateWord, 'updateExplain': updateExplain,'_token' : _token},
            dataType:'json',
            success : function(response){
              var task = updateHtml(response['idWord']);
              $("#_tr" + idWord).replaceWith( task );

              $('#myModal').modal('hide');
              alert("Cập nhật thành công");
            },
            error: function(xhr, error) {
               console.log(error);
            }
          });
        }
    });

    function updateHtml(id){
        return '<tr style="color:blue" role="row" class="odd" id="_tr'+id+'"><td class="_word-id text-center" data-id="'+id+'" style="vertical-align:middle">'+id+'</td><td class="_word" id="_td-word'+id+'" style="vertical-align:middle">'+id+'</td><td class="_explain" id="_td-explain'+id+'">'+id+'</td><td class="text-center" style="vertical-align:middle"><a class="_update-word _tooltip-me" data-toggle="modal" title="Cập nhật!" data-target="#myModal"><span class="glyphicon glyphicon-edit"></span></a><a class="_delete-word-to _tooltip-me" title="Xóa!"><span class="glyphicon glyphicon-trash"></span></a></td></tr>';
    }

    // script toltip
    $(document).find('._tooltip-me').tooltip();
/* -----  /.TRA TỪ SCREEN ----- */

/* ----- QUẢN LÝ TÀI KHOẢN ----- */
    // Update status
    $(document).on('change','.choose-status', function(evt){
        var _element = $(this).closest('tr');
        var idUser = _element.find('._user-id').attr('data-id');
        var userName = _element.find('._user-name').text();
        var idStatus = $(this).val();
        var _token = $('input[name=_token]').val();

        $.ajax({
            url:'status',
            method: 'POST',
            data : {'idUser': idUser, 'idStatus' : idStatus, '_token' : _token},
            dataType:'json',
            success : function(response){
                if(response['data'] == "OK"){
                  alert('Bạn đã cập nhật "Tình trạng" của tài khoản "'+userName+'"');
                }
            },
        });
    });

    // Update role
    $(document).on('change','.choose-role',function(evt){
        var _element = $(this).closest('tr');
        var idUser = _element.find('._user-id').attr('data-id');
        var userName = _element.find('._user-name').text();
        var idRole = $(this).val();
        var _token = $('input[name=_token]').val();

        $.ajax({
            url:'role',
            method: 'POST',
            data : {'idUser': idUser, 'idRole' : idRole, '_token' : _token},
            dataType:'json',
            success : function(response){
                if(response['data'] == "OK"){
                  alert('Bạn đã cập nhật "Quyền" của tài khoản "'+userName+'"');
                }
            },
        });
    });

    // Confirm delete User
    $(document).on('click',"a._delete-user",function(evt){
        var _element = $(this).closest('tr');
        var idUser = _element.find('._user-id').attr('data-id');
        var userName = _element.find('._user-name').text();
        var _token = $('input[name=_token]').val();

        if(!confirm('Bạn có muốn xóa tài khoản "'+userName+'"?')){
            evt.preventDefault();
            return false;
        }
        else{
            $.ajax({
                url:'delete',
                method: 'POST',
                data : {'idUser': idUser, '_token' : _token},
                dataType:'json',
                success : function(response){
                    if(response['data'] == "OK"){
                      _element.closest('tr').remove();
                      alert('Bạn đã xóa tài khoản "'+userName+'"');
                    }
                },
                error: function(xhr, error) {
                   console.log(error);
                }
            });
        }
    });

    // function chooseProcess(element, _case){
    //     var _element = $(this).closest('tr');
    //     var idUser = _element.find('._user-id').attr('data-id');
    //     var userName = _element.find('._user-name').text();
    //     var idRole = $(this).val();
    //     var _token = $('input[name=_token]').val();

    //     switch(_case){
    //         case 'choose-status' : AjaxChooseStatus(); break;
    //         case :
    //     }
    // }

    // function AjaxChooseStatus(idUser, idStatus, _token){
    //     $.ajax({
    //         url:'status',
    //         method: 'POST',
    //         data : {'idUser': idUser, 'idStatus' : idStatus, '_token' : _token},
    //         dataType:'json',
    //         success : function(response){
    //             if(response['data'] == "OK"){
    //               alert('Bạn đã cập nhật "Tình trạng" của tài khoản "'+userName+'"');
    //             }
    //         },
    //     });
    // }
/* ----- /.QUẢN LÝ TÀI KHOẢN ----- */
});


