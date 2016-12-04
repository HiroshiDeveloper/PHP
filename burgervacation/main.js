function display(num)
{
	if (num == 0){
		document.getElementById("account").style.visibility="visible";
	}
     	else{
		document.getElementById("account").style.visibility="hidden";
	}
}

$(document).ready(function(){
	$("#signUpForm").submit(function(){
    		$.post( "signUpBtn.php", $(this).serialize(), function(response){
			document.getElementById("signUpMessage").innerHTML=response;
			//alert(response);
		} );
    		return false;
	});
});
