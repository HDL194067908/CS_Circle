function show(){   //刷新验证码
	var obj = document.getElementById('yzm');
    obj.src = '验证码.php';
}
function Verification1(){  //判空输入框
	var flag=0;
    if (document.getElementById("id").value=="")
    {
		var message=document.getElementById("message1");
		message.innerText="!";
        flag=1;
    }
    if (document.getElementById("passwd").value=="")
    {
		var message=document.getElementById("message2");
		message.innerText="!";
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
	var key='id';
    var value = document.getElementById(key).value;
	var date=30;
    //date.setDate(date.getDate() + day);  
    document.cookie = key + '=' + escape(value) + ';expires=' + date;
}

function getCookie(){
	 var key='id';
	 document.getElementById(key).value=unescape(document.cookie.split(key+"=")[1].split(";")[0]);
 }