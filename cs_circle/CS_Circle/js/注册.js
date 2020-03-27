
function show(){  //刷新验证码
			 var obj = document.getElementById('yzm');
			 obj.src = '验证码.php?a='+Math.random();
}

function Verification(){  //判空输入框及两次密码确认一致
			//var obj=['id','passwd','passwd','username','brthday','school'];
			var flag=0;
			if (document.getElementById("id").value=="")
            {
		         var message=document.getElementById("message1");
		         message.innerText="必须填入";
				 message.style.fontSize=10;
                 flag=1;
            }
			var pw1=document.getElementById("pw1");
	        var pw2=document.getElementById("pw2");
	        
			if (pw1.value=="")
            {
			    var message=document.getElementById("message2");
			    message.innerText="必须填入";
			    message.style.fontSize=10;
                flag=1;
            } 
			if (pw2.value=="")
            {
			    var message=document.getElementById("message3");
			    message.innerText="必须填入";
			    message.style.fontSize=10;
                flag=1;
            } 
			
			if(pw1.value!=pw2.value){
		     var message2=document.getElementById("message2");
			 var message3=document.getElementById("message3");
			  message2.innerText="密码不一致";
			  message2.style.fontSize=10;
			  message3.innerText="请重新输入";
			  message3.style.fontSize=10;
		      pw2.value="";
		      pw2.focus();
		      flag=1;
		    }
			if (document.getElementById("username").value=="")
            {
			    var message=document.getElementById("message4");
			    message.innerText="必须填入";
			    message.style.fontSize=10;
                flag=1;
            } 
			
	        if (document.getElementById("birthday").value=="")
            {
			    var message=document.getElementById("message5");
			    message.innerText="必须填入";
			    message.style.fontSize=10;
                flag=1;
            } 
			if (document.getElementById("school").value=="")
            {
			    var message=document.getElementById("message6");
			    message.innerText="必须填入";
			    message.style.fontSize=10;
                flag=1;
            } 
			
			if(flag==0&&document.getElementById("yzminput").value==""){
				document.getElementById("yzminput").focus();
				alert("请输入验证码");
				flag=1;
			}
			if(flag==1){
				return false;
			}
}
function setCookie(){
	var obj=['id','username','birthday','school'];

	for(var i=0;i<obj.length;i++){
		var key=obj[i];	
		var value = document.getElementById(key).value;
	    var date=30;
        //date.setDate(date.getDate() + day);  
		document.cookie = key + '=' + escape(value) + ';expires=' + date;
	}

  }
 function getCookie(){
	 
	 var obj=['id','username','birthday','school'];

	for(var i=0;i<obj.length;i++){
	    var key=obj[i];	
	    document.getElementById(key).value=unescape(document.cookie.split(key+"=")[1].split(";")[0]);
		
	}
	
 }