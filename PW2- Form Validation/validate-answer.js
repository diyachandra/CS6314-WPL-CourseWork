window.onload = function (){

var span1 = document.createElement("span");
var span2 = document.createElement("span2");
var span3 = document.createElement("span3");

span1.innerHTML = "test";
span1.className = "info";
span1.style.display = "none";
span2.style.display = "none";
span3.style.display= "none";

var username = document.getElementById("username");
username.parentNode.appendChild(span1);

var password= document.getElementById("password");
password.parentNode.appendChild(span2);

var email= document.getElementById("email");
email.parentNode.appendChild(span3);

username.onfocus=function(){
span1.style.display="inline";
span1.innerHTML=" Only alphanumeric characters allowed";
span1.className="info";
}
username.onblur= function(){
	span1.style.display="inline";
	var regex= /^[A-Za-z0-9]+$/;
	if(username.value.length==0)
	{
		span1.style.display = "none";
	}
	else if(!(regex.test(username.value))){
		span1.innerHTML="Error";
		span1.className="error";
	}
	else{
		span1.innerHTML= "OK";
		span1.className= "ok";
	}
}

password.onfocus= function(){
	span2.style.display="inline";
	span2.innerHTML="The password field should be at least six characters long";
	span2.className="info";
}
password.onblur= function(){
	span2.style.display="inline";
	if(password.value.length==0)
	{
		span2.style.display = "none";
	}
	else if(password.value.length < 6)
	{
		span2.innerHTML="Error";
		span2.className="error";
	}
	else{
		span2.innerHTML= "OK";
		span2.className= "ok";
	}
}
email.onfocus= function(){
	span3.style.display="inline";
	span3.innerHTML="The email field should be a valid email address (abc@def.xyz)";
    span3.className= "info";
}
email.onblur= function(){
	span3.style.display="inline";
	var regex= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
	if(email.value.length==0)
	{
		span3.style.display= "none";
	}
	else if(!(email.value.match(regex))){
		span3.innerHTML="Error";
		span3.className="error";
	}
	else{
		span3.innerHTML= "OKHJBJ";
		span3.className= "ok";
	}

}



}


