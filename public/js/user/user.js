$(document).ready(function() {
    /* SETTING SCREEN */
    /* Result JS */
    $(document).on('click','._push-his', function(evt){
        var type = $("#_type").text();
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
            data: {'from': from,'to': to, 'type': type,'from_text': from_text,'to_text': to_text,'_token' : _token},
            success : function(response){
                if(response['data'] == "fine"){
                    alert("Đã thêm vào lịch sử");

                }
                else{
                    alert("Opps! Vui lòng xem lại thông tin");
                }
            }
        });
    });

    // DataTableJS
    $(document).on('click', "a.deleteRecord", function(evt){
        var _element = $(this);
        var to = $(this).attr('data-id');
        var from = $(this).attr('value');
        var _token = $('input[name=_token]').val();
        if(!confirm('Bạn có muốn xóa từ : ' + from+'?')){
            evt.preventDefault();
            return false;
        }
        else{
            $.ajax({
                url: 'HistoryDelete',
                type: 'POST',
                dataType: 'json',
                data: {'to': to,'from': from, '_token' : _token},
                success : function(response){
                    if(response['data'] == "fine"){
                        _element.closest('tr').remove();
                        alert("Bạn đã xóa thành công");
                    }
                    else{
                        alert("ERROR ! Please try again");
                    }
                }
            });
        }
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
         //var _token = $('input[name=_token]').val()
         alert(notification);
         $.ajax({
             url:'historyEdit',
             method:'POST',
             dataType:'json',
             data: {'from': from,'to': to,'notification' : notification, '_token' : _token},
             success : function(response){
                if(response['data']=="fine"){
                 alert("Thêm vào thành công");
             }  else{
           }
       },
   });
    });

 });


