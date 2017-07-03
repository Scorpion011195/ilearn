public function deleteRecordByAjax(Request $request)
{
    $history= new History;
    $listTypeEnglish = MyConstant::TYPE_OF_WORD_ENGLISH;
    
    $id=Auth::user()->id_user;
                // Lấy ID user để update cho user
    $historys = History::where('id_history', $id)->first();
        // $data =json_decode($historys->content);
    $arr= json_decode($historys->content, true);

    foreach ($arr as $key => $value) {

        if($key ==$request->STT){
           unset($arr[$key]);  /*Unset array = key đang tìm*/

           $json = json_encode($arr,JSON_UNESCAPED_UNICODE); /* Chuyển qua file JSon*/
           $info = ['content' => $json]; 
           $successUpdate= History::where('id_history',$id)->update($info); /* Update lại arr nơi à ID history = id_user*/
           $dataResponse = ["data"=>"fine"];
           return json_encode($dataResponse);

       } else{
        $dataResponse = ["data"=>"false"];
        return json_encode($dataResponse);
    }

}

}
 <!-- <script>
     $(document).ready(function(){
        $("a.deleteRecord").on('click', function(E){
            // id =$(".id_{{ $row['STT'] }}").text();
            var _element = $(this);
            var STT =$(this).attr('data-id');
            var _element = $(this);
            var _token = $('input[name=_token]').val();
             if(!confirm('Bạn có muốn xóa ID "'+STT+'" ?')){
                        E.preventDefault();
                        return false;
            }
            else{
                $.ajax({
                    url: 'HistoryDelete',
                    type: 'POST',
                    dataType: 'json',
                    data: {'STT': STT,'_token' : _token},
                    success : function(response){
                       if(response['data'] == "fine"){
                         _element.closest('tr').remove();
                        alert("Bạn đã xóa thành công");
                        }    
                    },
                    error: function(xhr, error) {
                               console.log(error);
                    }
                });
            }
        });
    });
     $(document).ready(function(){
        $("a.editRecord").on('click', function(E){
            // id =$(".id_{{ $row['STT'] }}").text();
            var _element = $(this);
            var STT =$(this).attr('data-id');
            $
        });
    });
</script>
 -->