$(document).ready(function(){
    /* -----  TRA TỪ SCREEN ----- */
    // Confirm delete word to
    $(document).on('click','._delete-word-to', function(evt){
        var _element = $(this).closest('tr');
        var idWord = _element.find('._word-id').attr('data-id');
        var word = _element.find('._word').text();
        var table = $("#_table-to :selected").text();
        var _token = $('input[name=_token]').val();

        if(confirm('Bạn có muốn xóa từ này?')){
            ajaxDeleteWord(_element, idWord, word, table, _token);
        }
    });

    // Open modal update word
    $(document).on('click','._update-word', function(evt){
        var _element = $(this).closest('tr');
        var idWord = _element.find('._word-id').attr('data-id');
        var word = _element.find('._word').text();
        var table = $("#_table-to :selected").text();
        var explain = _element.find('._explain').html();

        $('#_mean').val(word);
        $('#_table-modal').val(table);
        $('#_id-word-modal').val(idWord);
        CKEDITOR.instances['_gtTo'].setData(explain);
    });

    // Update row word
    $(document).on('submit','#_form-update-word', function(evt){
        evt.preventDefault();
        if($('#_mean').val() == ''){
            alert('Bạn chưa nhập nghĩa!');
        }
        else{
          var idWord = $('#_id-word-modal').val();
          var table = $('#_table-modal').val();
          var updateWord = $('#_mean').val();
          var updateExplain = CKEDITOR.instances['_gtTo'].getData();
          var _token = $('input[name=_token]').val();

          ajaxUpdateWord(idWord, table, updateWord, updateExplain, _token);
        }
    });
    /* -----  /.TRA TỪ SCREEN ----- */

    /* ----- QUẢN LÝ TÀI KHOẢN SCREEN ----- */
    // Update status
    $(document).on('change','.choose-status', function(evt){
        var _element = $(this).closest('tr');
        var idUser = _element.find('._user-id').attr('data-id');
        var idStatus = $(this).val();
        var _token = $('input[name=_token]').val();
        var userName = _element.find('._user-name').text();

        ajaxChangeStatus(idUser, idStatus, _token, userName);
    });

    // Update role
    $(document).on('change','.choose-role',function(evt){
        var _element = $(this).closest('tr');
        var idUser = _element.find('._user-id').attr('data-id');
        var idRole = $(this).val();
        var _token = $('input[name=_token]').val();
        var userName = _element.find('._user-name').text();

        ajaxChangeRole(idUser, idRole, _token, userName);
    });

    // Confirm delete User
    $(document).on('click','._delete-user',function(evt){
        var _element = $(this).closest('tr');
        var idUser = _element.find('._user-id').attr('data-id');
        var _token = $('input[name=_token]').val();
        var userName = _element.find('._user-name').text();

        if(confirm('Bạn có muốn xóa tài khoản "'+userName+'"?')){
            ajaxDeleteUser(_element, idUser, _token, userName);
        }
    });
    /* ----- /.QUẢN LÝ TÀI KHOẢN SCREEN ----- */

    // function chooseProcess(_this, _case){
    //     var _token = $('input[name=_token]').val();
    //     var _element = _this.closest('tr');

    //     switch(_case){
    //         case 'ajaxDeleteWord':
    //             var idWord = _element.find('._word-id').attr('data-id');
    //             var word = _element.find('._word').text();
    //             var table = $("#_table-to :selected").text();
    //             ajaxDeleteWord(_element, idWord, word, table, _token);
    //             break;
    //         case 'ajaxChangeStatus':
    //             var idUser = _element.find('._user-id').attr('data-id');
    //             var idStatus = $(this).val();
    //             var userName = _element.find('._user-name').text();
    //             ajaxChangeStatus(idUser, idStatus, _token, userName);
    //             break;
    //         case 'ajaxChangeRole':
    //             var idUser = _element.find('._user-id').attr('data-id');
    //             var idRole = $(this).val();
    //             var userName = _element.find('._user-name').text();
    //             ajaxChangeRole(idUser, idRole, _token, userName);
    //             break;
    //         case 'ajaxDeleteUser':
    //             var idUser = _element.find('._user-id').attr('data-id');
    //             var userName = _element.find('._user-name').text();
    //             ajaxDeleteUser(_element, idUser, _token, userName);
    //     }
    // }

    /* ----- AJAX ----- */
    function ajaxDeleteWord(_element, idWord, word, table, _token){
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

    function ajaxUpdateWord(idWord, table, updateWord, updateExplain, _token){
        $.ajax({
            url:'update',
            method: 'POST',
            data : {'idWord': idWord,'table': table, 'updateWord': updateWord, 'updateExplain': updateExplain,'_token' : _token},
            dataType:'json',
            success : function(response){
              var task = updateRowWord(response['idWord'], response['word'], response['explain']);
              $("#_tr" + idWord).replaceWith( task );

              $('#myModal').modal('hide');
              alert("Cập nhật thành công");
              $(document).find('._tooltip-me').tooltip();
            },
            error: function(xhr, error) {
               console.log(error);
            }
        });
    }

    function updateRowWord(id, word, explain){
        return '<tr style="color:blue" role="row" class="odd" id="_tr'+id+'"><td class="_word-id text-center" data-id="'+id+'" style="vertical-align:middle">'+id+'</td><td class="_word" id="_td-word'+id+'" style="vertical-align:middle">'+word+'</td><td class="_explain" id="_td-explain'+id+'">'+explain+'</td><td class="text-center" style="vertical-align:middle"><button class="_update-word _tooltip-me button-icon" data-toggle="modal" title="Cập nhật!" data-target="#myModal"><span class="glyphicon glyphicon-edit"></span></button><button class="_delete-word-to _tooltip-me button-icon" title="Xóa!"><span class="glyphicon glyphicon-trash"></span></button></td></tr>';
    }

    function ajaxChangeStatus(idUser, idStatus, _token, userName){
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
    }

    function ajaxChangeRole(idUser, idRole, _token, userName){
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
    }

    function ajaxDeleteUser(_element, idUser, _token, userName){
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
    /* ----- /.AJAX ----- */

    // TOOLTIP
    $(document).find('._tooltip-me').tooltip();
});


