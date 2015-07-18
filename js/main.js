$(function() {
		var temp;
			var action;
			$(".number-spinner button").mousedown(function () {
				btn = $(this);
				input = btn.closest('.number-spinner').find('input');
				btn.closest('.number-spinner').find('button').prop("disabled", false);

				if (btn.attr('data-dir') == 'up') {
					action = setInterval(function(){
						if ( input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max')) ) {
							temp = input.val(parseInt(input.val())+1);
							clearInterval(action);
							
						}else{
							btn.prop("disabled", true);
							clearInterval(action);
						}
					}, 80);
				} else {
					action = setInterval(function(){
						if ( input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min')) ) {
							temp=input.val(parseInt(input.val())-1);
							clearInterval(action);
						}else{
							btn.prop("disabled", true);
							clearInterval(action);
						}
					}, 80);
				}
			}).mouseup(function(){
				clearInterval(action);
			});
		});
		var check_false = true;
		function checkVolume(volume)
		{
			if(volume %1 != 0)
			{
				document.getElementById("volume").value = 5;
				check_false = false;
			}
			else 
			{
				if(!(volume>=0 && volume<=9))
				{
					document.getElementById("volume").value = 5;
					check_false = false;
				}
			}
			
			
		}
		function checkChannel(ch)
		{
			if(ch %1 != 0)
			{
				document.getElementById("ch").value = 5;
				check_false = false;
			}
			else 
			{
				if(!(ch>0 && ch<=80))
				{
					document.getElementById("ch").value = 5;
					check_false = false;
				}
			}
			
			
		}
		function send()
		{
		if(document.getElementById("ch").value %1 != 0 || document.getElementById("volume").value %1 !=0);
		else{
			if(!(document.getElementById("ch").value>0 && document.getElementById("ch").value<=80 ) || !(document.getElementById("volume").value>=0 && document.getElementById("volume").value<=9 ));
			else
			{
				$.ajax({
			url: "PushData.php",
			type: 'POST',
			data:{channel:$("#ch").val(),volume:$("#volume").val()},
			success: function(data) {
					 $( "#wait" ).hide(10);
					$( "#send" ).show( "fast" ).delay(3000);
					$( "#send" ).hide( 10 );
					$( "#success" ).show( "fast" ).delay(3000);
					$( "#success" ).hide( 10);
			}
			});
			
			}
		}
		
		}

$(document).keypress(function(e) {
    if(e.which == 13) {
		 $( "#wait" ).show( "slow" );
		  send();
    }
});

  
