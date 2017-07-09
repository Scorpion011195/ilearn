$(document).ready(function(){
    /* -----  SEARCH WORD SCREEN ----- */
    // Confirm delete word to
    $(document).on('click','._delete-word-to', function(evt){
        var _element = $(this).closest('tr');
        var idWord = _element.find('._word-id').attr('data-id');
        var word = _element.find('._word').text();
        var table = $("#_table-to :selected").text();
        var _token = $('input[name=_token]').val();

        $(this).confirmation({
              title: 'Bạn có muốn xóa từ này?',
              onConfirm: function() {
                ajaxDeleteWord(_element, idWord, word, table, _token);
              },
              onCancel: function() {
              },
        });

        $(this).confirmation('show');
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
        if($('#_mean').val() != ''){
          var idWord = $('#_id-word-modal').val();
          var table = $('#_table-modal').val();
          var updateWord = $('#_mean').val();
          var updateExplain = CKEDITOR.instances['_gtTo'].getData();
          var _token = $('input[name=_token]').val();

          ajaxUpdateWord(idWord, table, updateWord, updateExplain, _token);
        }
    });
    /* -----  /.SEARCH WORD SCREEN ----- */

    /* ----- ACCOUNTS MANAGEMENT SCREEN ----- */
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

        $(this).confirmation({
              title: 'Bạn có muốn xóa tài khoản này?',
              onConfirm: function() {
                ajaxDeleteUser(_element, idUser, _token, userName);
              },
              onCancel: function() {
              },
        });

        $(this).confirmation('show');
    });
    /* ----- /.ACCOUNTS MANAGEMENT SCREEN ----- */

    /* ----- AJAX ----- */
    function ajaxDeleteWord(_element, idWord, word, table, _token){
        $.ajax({
            url:'delete',
            method: 'POST',
            data : {'idWord': idWord,'table': table, '_token' : _token},
            dataType:'json',
            success : function(response){
                if(response['data'] == true){
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

              $('#modal-success').modal('show');
              $('#myModal').modal('hide');
              $(document).find('._tooltip-me').tooltip();
            },
            error: function(xhr, error) {
               console.log(error);
            }
        });
    }

    function updateRowWord(id, word, explain){
        return '<tr style="color:blue" role="row" class="odd" id="_tr'+id+'"><td class="_word-id text-center" data-id="'+id+'" style="vertical-align:middle">'+id+'</td><td class="_word" id="_td-word'+id+'" style="vertical-align:middle">'+word+'</td><td class="_explain" id="_td-explain'+id+'">'+explain+'</td><td class="text-center" style="vertical-align:middle"><button class="_update-word _tooltip-me btn__icon btn--color-link" data-toggle="modal" title="Cập nhật!" data-target="#myModal"><span class="glyphicon glyphicon-edit"></span></button><button class="_delete-word-to _tooltip-me btn__icon btn--color-link" title="Xóa!" data-toggle="confirmation" data-placement="left"><span class="glyphicon glyphicon-trash"></span></button></td></tr>';
    }

    function ajaxChangeStatus(idUser, idStatus, _token, userName){
        $.ajax({
            url:'status',
            method: 'POST',
            data : {'idUser': idUser, 'idStatus' : idStatus, '_token' : _token},
            dataType:'json',
            success : function(response){
                if(response['data'] == true){
                  var task = '<div id="alert-content" class="text-center">Bạn đã cập nhật "Tình trạng" của tài khoản "'+userName+'"</div>';
                  $('#alert-content').replaceWith( task );
                  $('#modal-alert').modal('show');
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
                if(response['data'] == true){
                  var task = '<div id="alert-content" class="text-center">Bạn đã cập nhật "Quyền" của tài khoản "'+userName+'"</div>';
                  $('#alert-content').replaceWith( task );
                  $('#modal-alert').modal('show');
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
                if(response['data'] == true){
                  _element.closest('tr').remove();
                  var task = '<div id="alert-content" class="text-center">Bạn đã xóa tài khoản "'+userName+'"</div>';
                  $('#alert-content').replaceWith( task );
                  $('#modal-alert').modal('show');
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

    // DATEPICKER
    $(document).find('#datepicker').datepicker({
        dateFormat: "dd-mm-yy",
    });

    // GET PROFILE
    $(document).on('click', '#img-profile', function(evt){
        window.location.href = "/ilearn.vn/public/admin/profile/get";
    });
});


