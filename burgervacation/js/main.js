function display(num)
{
	document.getElementById("myAccountErrorMessage").innerHTML="";
	document.getElementById("myAccountSuccessMessage").innerHTML="";
	if (num == 0){
		$("#account").fadeIn("slow");
	}
     	else{
		$("#account").fadeOut("slow");
	}
}

$(document).on('click', ".formSubmit", function() {
	  var val = $(this).attr("value");
});

$(document).ready(function(){
	$("#signUpForm").submit(function(){
    		$.post( "signUpBtn.php", $(this).serialize(), function(response){
			var dt = response.split(",");
			if (dt[0] == 1){
				document.getElementById("signUpSuccessMessage").innerHTML="";
				document.getElementById("signUpErrorMessage").innerHTML=dt[1];
			}else{
				document.getElementById("signUpErrorMessage").innerHTML="";
				document.getElementById("signUpSuccessMessage").innerHTML=dt[1];
			
			}
		} );
    		return false;
	});
});


$(document).ready(function(){
	$("#myAccountForm").submit(function(){
    		$.post( "myAccountBtn.php", $(this).serialize(), function(response){
			var dt = response.split(",");
			if (dt[0] == 1){
				document.getElementById("myAccountSuccessMessage").innerHTML="";
				document.getElementById("myAccountErrorMessage").innerHTML=dt[1];
			}else{
				document.getElementById("myAccountErrorMessage").innerHTML="";
				document.getElementById("myAccountSuccessMessage").innerHTML=dt[1];
			
			}
		} );
    		return false;
	});
});

$(document).ready(function(){
       	$("#menuForm").submit(function(){
		$.post( "myAccountBtn.php", $(this).serialize(), function(response){
			var dt = response.split(",");
			if (dt[0] == 1){
				document.getElementById("myAccountSuccessMessage").innerHTML="";
				document.getElementById("myAccountErrorMessage").innerHTML=dt[1];
			}else{
				document.getElementById("myAccountErrorMessage").innerHTML="";
				document.getElementById("myAccountSuccessMessage").innerHTML=dt[1];
			}
		});
	});
});

