$(document).ready(function() {
    /* SETTING SCREEN */
    /* Result JS */
    $(document).on('click','._push-his', function(evt){
        var from = $("#sel1 :selected").text();
        var to = $("#sel2 :selected").text();
        var id = $(this).attr('data-id');
        var from_text = $('#from').val();
        var to_text = $(this).next().next().next().text();// +1 next() if add tooltip
        var _token = $('input[name=_token]').val();

        $.ajax ({
            url: 'HistoryAddNew',
            type: 'POST',
            dataType: 'json',
            data: {'from': from,'to': to, 'id': id,'from_text': from_text,'to_text': to_text,'_token' : _token},
            success : function(response){
                if(response['data'] == "fine"){
                    $.notify('Đã thêm từ "'+from_text+'" với nghĩa "'+to_text+'"vào lịch sử!', "success");
                }
                else if(response['data'] == "existed"){
                    $.notify('Từ "'+ from_text +'" với nghĩa "'+ to_text +'" đã có!', "success");
                }
                else if(response['data'] == "tooLong"){
                    $.notify('Từ không được quá 50 kí tự!', "warn");
                }
                else{
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
                //sound: '/sounds/push.wav'
            }
            case 'Nghĩa':
            return options = {
                body: mean,
                noscreen: true,
                icon: 'http://felix.hamburg/files/codepen/rMgbrJ/notification.png'
                //sound: '/sounds/push.wav'
            }
            case 'Từ và nghĩa':
            return options = {
                body: word+'-'+mean,
                noscreen: true,
                icon: 'http://felix.hamburg/files/codepen/rMgbrJ/notification.png'
                //sound: '/sounds/push.wav'
            }
        }
    }

    // Toggle button Notification
    var isRun = false;
    $(document).on('change','#toggle-one', function(evt){
        if($('#toggle-one').prop('checked')){
            if (!Notification in window) {
                alert('Desktop notifications are not available in your browser!');
            }
            else if (Notification.permission !== 'granted') {
                Notification.requestPermission((permission) => {
                  if (permission === 'granted') {
                    $.notify('Đã bật chức năng thông báo. Bấm Lưu để xác nhận!', "success");
                    isRun = true;
                    ajaxGetTimeToPush();
                  }
                });
            }
            else {
                $.notify('Đã bật chức năng thông báo. Bấm Lưu để xác nhận!', "success");
                isRun = true;
                ajaxGetTimeToPush();
            }
        }
        else{
            isRun = false;
            $.notify('Đã tắt chức năng thông báo. Bấm Lưu để xác nhận!', "success");
        }
    })

    $(document).ready(function() {
        var statusPushNotification = $('input[name=ss-push]').val();
        var isStartSessionPush = $('input[name=is-ss-push]').val();

        if(statusPushNotification=="ON"){
            if (!Notification in window) {
                alert('Desktop notifications are not available in your browser!');
            }
            else if (Notification.permission !== 'granted') {
                Notification.requestPermission((permission) => {
                  if (permission === 'granted') {
                    if(isStartSessionPush=='true'){
                        $.notify('Đã bật chức năng thông báo', "success");
                    }
                    isRun = true;
                    ajaxGetTimeToPush();
                  }
                });
            }
            else {
                if(isStartSessionPush=='true'){
                    $.notify('Đã bật chức năng thông báo', "success");
                }
                isRun = true;
                ajaxGetTimeToPush();
            }
        }
    });
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

    var setLoop;
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

                    setLoop = window.setInterval(loopPush, time);

                    function loopPush(){
                        if(isRun){
                            var index = Math.floor(Math.random() * lenghtContent);
                            var word = arrContent[index]['from_text'];
                            var mean = arrContent[index]['to_text'];

                            var options = getOptions(type, word, mean);
                            var n = new Notification(title, options);
                            //n.sound;
                            setTimeout(n.close.bind(n), 5000);
                        }
                    }
                }
                // If code ==  false
                else{
                    $.notify('Xin chọn ít nhất 1 từ bên Lịch sử để nhận thông báo!', "success");
                }
            },
            error: function(xhr, error) {
             console.log(error);
            }
        });
    }

    // History push words
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
                    if(notification == "T"){
                        $.notify('Đã thêm từ "'+ from +'" với nghĩa "'+ to +'"vào thông báo!', 'success');
                    }
                    else{
                        $.notify('Đã loại từ "'+ from +'" với nghĩa "'+ to +'"khỏi thông báo!', 'success');
                    }

                }else{
                    $.notify("Oppps: Lỗi, vui lòng thử lại", "warn");
                }
            },
        });
    });

    // History delete words
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
                    $.notify('Đã xóa từ "'+ from + '"với nghĩa "'+ to +'" khỏi lịch sử!', "success");
                }
            },
             error: function(xhr, error) {
                $.notify("Oppps: Lỗi, vui lòng thử lại", "warn");
            }
        });
    }

    // History add words
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
                    var rowAdd = getRowAddHistory(fromText, toText, typeWord, from, to);
                    $(document).find("#example1").append( rowAdd );
                    $.notify('Đã thêm từ "'+fromText+'" với nghĩa "'+toText+'"vào lịch sử!', "success");
                }
                else if(response["data"]== false){
                    $.notify('Từ "'+ fromText +'" với nghĩa "'+ toText +'" đã có!', "success");
                }
                else if(response["data"]== 'invalidate'){
                    $.notify('Từ không hợp lệ!', "warn");
                }
                else if(response["data"]== 'emptyFrom'){
                    $.notify('Bạn chưa nhập từ!', "warn");
                }
                else if(response["data"]== 'emptyTo'){
                    $.notify('Bạn chưa nhập nghĩa!', "warn");
                }
            },
            error: function(xhr, error) {
                $.notify("Oppps: Lỗi, vui lòng thử lại", "warn");
            }
        });
    }

    function getRowAddHistory(fromText, toText, typeWord, from, to){
        return '<tr><td class="_from text-center align--vertical-middle">'+fromText+'</td>'+
                    '<td class="_to text-center align--vertical-middle">'+toText+'</td>'+
                    '<td class="type_to text-center align--vertical-middle">'+typeWord+'</td>'+
                    '<td class="text-center align--vertical-middle">'+from+'-'+to+'</td>'+
                    '<td class="text-center align--vertical-middle"><input type="checkbox" name="notification" class="action"></td>'+
                    '<td class="text-center align--vertical-middle">'+
                        '<span>'+
                            '<a class="deleteRecord" data-toggle="tooltip" data-placement="left" title="Xóa!"><i class=" fa fa-trash-o fa-1x" aria-hidden="true"  "></i></a>'+
                        '</span>'+
                    '</td>'+
                '</tr>';
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
                    if($('#toggle-one').prop('checked')){
                        window.clearInterval(setLoop);
                        isRun = true;
                        ajaxGetTimeToPush();
                    }
                }
            },
            error: function(xhr, error) {
                $.notify("Oppps: Lỗi, vui lòng thử lại", "warn");
            }
        });
    }

    // TOOLTIP
    $(document).find('._tooltip-me').tooltip();
});


