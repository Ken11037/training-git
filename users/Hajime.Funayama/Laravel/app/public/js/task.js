$(function(){
  $('.delete_btn').on('click', function(){
    var Id = $(this).data('id');

    if(confirm("タスクを完了してよいでしょうか？")){
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type:'POST',
        url: '/delete',
        data:{
          id: Id
        }
      }).done(function(){
        location.reload();
      }).fail(function(XMLHttpRequest, textStatus, errorThown){
        console.log(XMLHttpRequest.status);
        console.log(textStatus);
        console.log(errorThown);
      });
    }
  });
});
