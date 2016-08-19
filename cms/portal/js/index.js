function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
	} 


$(function(){


	

	//implementing sendmessage in chat
	$('#sendMsg').click(function(){
		var x=$('#messagen').val();
		var user=$('#adminname').val();
		$.post('../includes/ajax.php',{'user':user,'msg':x},function(data){
			if(data==1){
				//document.getElementById('messagen').setAttribute('value',' ');
				//console.log(data);
				$('#messagen').val(" ");
			}
		});
	});

	//implementing enter key code
	/*$('#sendMsg').keypress(function(event){
		var keycode=(event.keyCode ? event.keyCode : event.which);
		if(keycode == 13){ 
		var x=$('#messagen').val();
		var user=$('#adminname').val();
		$.post('../includes/ajax.php',{'user':user,'msg':x},function(data){
			if(data==1){
				$('#messagen').val(" ");
			}

		});
		}
	});*/



	//retrieving data from chat
	setInterval(function(){
		$.post('../includes/ajax.php',{'getchats':'y'},function(data){
			if(data){
				$('#chatList').html(data);
				//document.getElementById('chatList').innerHTML=data;
				//console.log(data);
			}else{

			}
		});

	},1000);



setInterval(function(){
	$('.rotMe').fadeOut(1000);
	$('.rotMe').fadeIn(1000);
},3000);


//send bulk message code
$('#sendMessageBtn').click(function(){
	//alert($('#message').val());
	var topic=$('#topic').val();
	var message=$('#message').val();
	$.post('ajax.php',{'sendBulkMsg':message,'topic':topic},function(data){
		if(data==1){
			$('#msgResult').html("<center><span style='color: #035888'>Message sent!!!</span></center>").fadeOut(5000);
			document.getElementById('message').value=" ";
			document.getElementById('topic').value=" ";
		}else{
			$('#msgResult').html("<center><span style='color: red'>Message not sent!! Try again</span></center>").fadeOut(5000);
		}
	});
});

}); 
