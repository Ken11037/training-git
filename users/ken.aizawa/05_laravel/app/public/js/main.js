$(function(){
  // CSRFトークンを設定
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // ドラッグ処理
  $('.drag').draggable({
    containment:'#drag-area',
    cursor:'move',
    opacity:0.6,
    scroll:true,
    zIndex:10,
    stop:function(event, ui){
      var myNum  = $(this).data('num');
      var myLeft = ui.offset.left - $('#drag-area').offset().left;
      var myTop  = ui.offset.top  - $('#drag-area').offset().top;

      $.ajax({
        type:'POST',
        url:'/update',
        data:{
          id: myNum,
          left: myLeft,
          top: myTop
        }
      }).done(function(){
        console.log('成功');
      }).fail(function(xhr, status, error){
        console.log(xhr.status);
        console.log(status);
        console.log(error);
      });

      console.log("左: " + myLeft);
      console.log("上: " + myTop);
    }
  });

  // 🆕 ここに完了ボタンの処理を追加
  $('.delete_btn').on('click', function(){
    var Id = $(this).data('id');

    if(confirm("タスクを完了してよいでしょうか？")){
      $.ajax({
        type: 'POST',
        url: '/delete',
        data: {
          id: Id
        }
      }).done(function(){
        location.reload();
      }).fail(function(xhr, status, error){
        console.log(xhr.status);
        console.log(status);
        console.log(error);
      });
    }
  });
});
