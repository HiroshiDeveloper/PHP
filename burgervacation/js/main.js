function display(num){
	document.getElementById("myAccountErrorMessage").innerHTML="";
	document.getElementById("myAccountSuccessMessage").innerHTML="";
	if (num == 0){
		$("#account").fadeIn("slow");
	}
     	else{
		$("#account").fadeOut("slow");
	}
}

function tableMenuShow(){
	$("#price").fadeOut("slow");
	$("#food").fadeOut("slow");
	$("#tableMenu").fadeIn("slow");
}


$(document).on('click', ".dropmenu .formSubmit", function() {
  	var val = $(this).parent().parent().attr("value");
	document.getElementById("genre").value = val;
});

$(document).on('click', ".formSubmit", function() {
	//var val = $(this).attr("value");
	$("#tableMenu").fadeOut("slow");
	document.getElementById("menu").value = $(this).text();
	document.getElementById("menuBtn").click();
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

	$("#menuForm").submit(function(){
		$.post( "menuBtn.php", $(this).serialize(), function(response){
			//alert(response);
			var dt = response.split(",");
			if(dt.length > 0){
				document.getElementById("price").innerHTML="$"+dt[0];
				document.getElementById("food").src=dt[1];
				$("#price").fadeIn("slow");
				$("#food").fadeIn("slow");
			}
		});
		return false;
	});


	$('#tableMenu td').click(function(){
		var col = this.cellIndex;
		switch(col){
			case 0:
				document.getElementById("genre").value = "burgers";
				break;
			case 1:
				document.getElementById("genre").value = "fries";
				break;
			case 2:
				document.getElementById("genre").value = "drinks";
				break;
			case 3:
				document.getElementById("genre").value = "salad";
				break;
			default:
				break;
		}
	
	});

});

