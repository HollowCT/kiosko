<script language="JavaScript">

$(document).on("keydown",function(ev){
	console.log(ev.keyCode);
	if(ev.keyCode===27||ev.keyCode===122) return false
})

  window.onload = function() {
    document.addEventListener("contextmenu", function(e){
      e.preventDefault();
    }, false);

    document.addEventListener("keydown", function(e) {
      // "F11" key
      if (event.keyCode == 122) {
        disabledEvent(e);
      }
    }, false);

    function disabledEvent(e){
      if (e.stopPropagation){
        e.stopPropagation();
      } else if (window.event){
        window.event.cancelBubble = true;
      }
      e.preventDefault();
      return false;
    }
  };
</script>
