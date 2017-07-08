$(document).ready(function() {
    /* SETTING SCREEN */
    /* Result JS */
    $(document).on('click','._push-his', function(evt){
        var from = $("#sel1 :selected").text();
        var to = $("#sel2 :selected").text();
        var id = $(this).attr('data-id');
        var from_text = $('#from').val();
        var to_text = $(this).next().next().text();
        var _token = $('input[name=_token]').val();

        $.ajax ({
            url: 'HistoryAddNew',
            type: 'POST',
            dataType: 'json',
            data: {'from': from,'to': to, 'id': id,'from_text': from_text,'to_text': to_text,'_token' : _token},
            success : function(response){
                if(response['data'] == "fine")
                {
                    $.notify('Đã thêm nghĩa của từ "'+ from_text +'" vào lịch sử!', "success");
                }
                else
                {
                    $.notify('Lỗi, vui lòng thử lại!', "error");
                }
            }
        });
    });

    // Toggle button
    $(document).find('#toggle-one').bootstrapToggle();
    /* /.SETTING SCREEN */

    /* PUSH NOTIFICATION */
    // Get options
    function getOptions(option, word, mean){
        switch(option){
            case 'Từ':
            return options = {
                body: word,
                noscreen: true,
                icon: 'http://felix.hamburg/files/codepen/rMgbrJ/notification.png'
            }
            case 'Nghĩa':
            return options = {
                body: mean,
                noscreen: true,
                icon: 'http://felix.hamburg/files/codepen/rMgbrJ/notification.png'
            }
            case 'Từ và nghĩa':
            return options = {
                body: word+'-'+mean,
                noscreen: true,
                icon: 'http://felix.hamburg/files/codepen/rMgbrJ/notification.png'
            }
        }
    }

    // Toggle button Notification
    var isRun = false;
    $(document).on('change','#toggle-one', function(evt){
        if($(this).prop('checked')){
            if (!Notification in window) {
                alert('Desktop notifications are not available in your browser!');
            }
            else if (Notification.permission !== 'granted') {
                Notification.requestPermission((permission) => {
                  if (permission === 'granted') {
                    isRun = true;
                    ajaxGetTimeToPush();
                  }
                });
            }
            else {
                isRun = true;
                ajaxGetTimeToPush();
            }
        }
        else{
            isRun = false;
        }
    })
    /* /.PUSH NOTIFICATION */

    /* ----- AJAX ----- */
    function ajaxGetTimeToPush(){
        $.ajax({
            url:'pushTime',
            method:'get',
            dataType:'json',
            success : function(response){
                if(response['code']==true){
                    var time = response['time'];
                    ajaxGetWordToPush(time);
                }
            },
            error: function(xhr, error) {
             console.log(error);
         }
     });
    }

    function ajaxGetWordToPush(time){
        $.ajax({
            url:'pushWord',
            method:'get',
            dataType:'json',
            success : function(response){
                if(response['code']==true){
                    var title = 'Remember';

                    var type = response['type'];
                    var arrContent = $.parseJSON(response['content']);
                    var lenghtContent = arrContent.length;

                    setInterval(loopPush, time);

                    function loopPush(){
                        if(isRun){
                            var index = Math.floor(Math.random() * lenghtContent);
                            var word = arrContent[index]['from_text'];
                            var mean = arrContent[index]['to_text'];

                            var options = getOptions(type, word, mean);
                            var n = new Notification(title, options);
                            setTimeout(n.close.bind(n), 5000);
                        }
                    }
                }
            },
            error: function(xhr, error) {
             console.log(error);
            }
        });
    }

    $(document).on('click','.action', function(){
        var to = $(this).closest('tr').find('._to').text();
        var from = $(this).closest('tr').find('._from').text();
        var _token = $('input[name=_token]').val();
        if (this.checked){
            var notification = "T";
        }
        else{
            var notification ="F";
        };

        $.ajax({
           url:'historyEdit',
           method:'POST',
           dataType:'json',
           data: {'from': from,'to': to,'notification' : notification, '_token' : _token},
           success : function(response){
                if(response['data']=="fine"){
                   $.notify("Chỉnh sửa trạng thái thành công", "success");
                }else{
                    $.notify("Oppps: Lỗi, vui lòng thử lại", "warn");
                }
            },
        });
    });

    $(document).on('click', "a.deleteRecord", function(evt){
        var _element = $(this).closest('tr');
        var to = $(this).closest('tr').find('._to').text();
        var from = $(this).closest('tr').find('._from').text();
        var _token = $('input[name=_token]').val();

        $(this).confirmation({
          title: 'Xóa!',
          onConfirm: function() {
            AjaxHistoryDeleteBy(_element, to, from, _token);
          },
          onCancel: function() {
          },
        });

        $(this).confirmation('show');
    });

    function  AjaxHistoryDeleteBy(_element, to, from, _token){
        $.ajax({
            url:'HistoryDelete',
            method: 'POST',
            data : {'to': to,'from': from, '_token' : _token},
            dataType:'json',
            success : function(response){
                if(response['data'] == "fine"){
                     _element.remove();
                    $.notify("Đã xóa thành công!", "success");
                }
            },
             error: function(xhr, error) {
                $.notify("Oppps: Lỗi, vui lòng thử lại", "warn");
            }
        });
    }


    //update setting
    $(document).on('click','#_save-setting',function(evt){
        if($('#toggle-one').prop('checked')){
            var notificationBtn = "ON";
        }
        else{
            var notificationBtn = "OFF";
        }
        var timeRemind = $('#_time').val();
        var typeRemind = $('#_typeRemind').val();
        var _token = $('input[name=_token]').val();

        AjaxUpdateSetting(timeRemind,typeRemind,notificationBtn,_token);
    })

    function  AjaxUpdateSetting(timeRemind,typeRemind,notificationBtn,_token){
        $.ajax({
            url:'settingUpdate',
            method: 'POST',
            data : {'timeRemind': timeRemind, 'typeRemind': typeRemind, 'notificationBtn': notificationBtn, '_token' : _token},
            dataType:'json',
            success : function(response){
                if(response["data"]== true){
                    $.notify("Cài đặt thành công !", "success");
                }
            },
            error: function(xhr, error) {
                $.notify("Oppps: Lỗi, vui lòng thử lại", "warn");
            }
        });
    }

    $(document).on('click','#btnAddHistory',function(evt){
        var from =  $("#selectFromLg").val();
        var typeWord =  $("#typeWord").val();
        var to = $("#selectToLg").val();
        var fromText = $("#fromText").val();
        var toText = $("#toText").val();
        var _token = $('input[name=_token]').val();

        AjaxAddNewHistory(typeWord, from, to, fromText, toText, _token);
    })
    function  AjaxAddNewHistory(typeWord, from, to, fromText, toText, _token){
        $.ajax({
            url:'historyUpdate',
            method: 'POST',
            data : {'typeTo': typeWord,'from': from,'to': to,'fromText': fromText,'toText': toText, '_token' : _token},
            dataType:'json',
            success : function(response){
                if(response["data"]== true){
                    $.notify("Cài đặt thành công !", "success");
                }
            },
            error: function(xhr, error) {
                $.notify("Oppps: Lỗi, vui lòng thử lại", "warn");
            }
        });
    }
});


