/*
 * DRAGGABLE
 =========================== */
$(function(){
  $('.drag').draggable({
    containment:'#drag-area',
    cursor:'move',
    opacity:0.6,
    scroll:true,
    zIndex:10,
    /* STOP処理 */
    stop:function(event, ui){
      let myNum  = $(this).data('num');
      let myLeft = (ui.offset.left - $('#drag-area').offset().left);
      let myTop  = (ui.offset.top  - $('#drag-area').offset().top);
      /* AJAX通信 */
      $.ajax({
        type:'POST',
        url :'./function/update.php',  /* update.php に送信 */
        data: {
          id  :myNum,
          left:myLeft,
          top :myTop
        }
      }).done(function(){
         /* 成功時の処理（必要なら） */
      }).fail(function(XMLHttpRequest, textStatus, errorThrown){
         console.log(XMLHttpRequest.status);
         console.log(textStatus);
         console.log(errorThrown);
      });
      /* AJAX通信終了 */
    }
  });
});
