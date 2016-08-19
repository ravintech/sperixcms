function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
	} 


function updateView(x){
	var info =x;
	document.getElementById('addFNView').innerHTML=x;
}

	function showMyImage(fileInput) {
        var files = fileInput.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var imageType = /image.*/;
            if (!file.type.match(imageType)) {
                continue;
            }
            var img=document.getElementById("displayPic");
            img.file = file;
            var reader = new FileReader();
            reader.onload = (function(aImg) {
                return function(e) {
                    aImg.src = e.target.result;
                };
            })(img);
            reader.readAsDataURL(file);
        }
    }

$(function(){


	//editing field...
	$('.editfield').jqte();

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
