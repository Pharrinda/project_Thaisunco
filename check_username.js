$('#username').keyup(function(){
	var username = $('#username').val();
	$('#status').html('username ซ้ำ').css('color','red');
	if (username!='') {
		$.POST('check_username.php',{username:username});
		function(data){
			$('#status').html(data);
		}
	}
	else{
		$('#status').html('');
	}
});


<?php 
                            // $open = $open.value();
                            // $close = $close.value();
                           
                            //     if(isset($open)){
                            //         echo "open";
                            //     // echo "<script>alert('open')</script>" ;
                            //         $res = file_get_contents("http://45.32.69.11:7755/test/1");
                            //     }
                            //     if(isset($close)){
                            //         echo "close";
                            //     // echo "<script>alert('open')</script>" ;
                            //         $res = file_get_contents("http://45.32.69.11:7755/test/0");
                            //     }
                        ?>