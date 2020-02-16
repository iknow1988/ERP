	$(document).ready(function(){
		 $('#popUpTrigger').colorbox({
            width:"auto",
            height:"auto",
			html:"<p>Hello</p>",
			opacity:".95",
            onClosed:function() { refreshEntries($(this).attr('return')); }
     });
		$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
	 	$(".inline").colorbox({inline:true, width:"50%"});
		$("#click").click(function(){ 
		setTimeout($.colorbox.next, 90000);
		$.colorbox.close();
					return false;
				});
	 
	 });