var burgers = ['Cheese', 'Double', 'Teriyaki', 'Vege'];
var fries = ['Poutine', 'Onion', 'Normal'];
var drinks = ['Coke', 'Coffee', 'Orange', 'Milk'];
var salad = ['Avocado', 'Seafood'];

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
	$("#arrowLeft").fadeOut("slow");
	$("#arrowRight").fadeOut("slow");
	$("#tableMenu").fadeIn("slow");
}

function makeList(food, parentId, listId){
	$.each(food, function(i, text){
		$('<li />').appendTo(parentId);
		$('<a />').attr('href', 'javascript:void(0)').attr('class', 'formSubmit').text(text).appendTo($(listId).eq(i));
	});
}

function makeTable(){
	var count=0;
	$('<tr />').attr('id', 'row'+count).appendTo("#foodList");
	while(true){
		$('<td />').attr('class', 'formSubmit').text(burgers[count]).appendTo($('#row'+count));
		$('<td />').attr('class', 'formSubmit').text(fries[count]).appendTo($('#row'+count));
		$('<td />').attr('class', 'formSubmit').text(drinks[count]).appendTo($('#row'+count));
		$('<td />').attr('class', 'formSubmit').text(salad[count]).appendTo($('#row'+count));
		if(burgers[count] == null && 
				fries[count] == null &&
			       	drinks[count] == null &&
			       	salad[count] == null){
			return;
		}
		count += 1;
		$('<tr />').attr('id', 'row'+count).appendTo("#foodList");
	}
}

function switchMenu(){
	var genre = document.getElementById("genre").value;
	var tmp;
	switch (genre){
		case "burgers":
			tmp = burgers;
			break;
		case "fries":
			tmp = fries;
			break;
		case "drinks":
			tmp = drinks;
			break;
		case "salad":
			tmp = salad;
			break;
		default:
			break;
	}
	return tmp;
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

$(document).on('click', '#arrowLeft', function(){
	var tmp = switchMenu();
	var index = tmp.indexOf(document.getElementById("menu").value);
	if(index==0){
		document.getElementById("menu").value = tmp[tmp.length-1];
	}else{
		document.getElementById("menu").value = tmp[index-1];
	}
	document.getElementById("menuBtn").click();
});

$(document).on('click', '#arrowRight', function(){
	var tmp = switchMenu();
	var index = tmp.indexOf(document.getElementById("menu").value);
	if(index==tmp.length-1){
		document.getElementById("menu").value = tmp[0];
	}else{
		document.getElementById("menu").value = tmp[index+1];
	}
	document.getElementById("menuBtn").click();
});

$(document).ready(function(){
	makeList(burgers, '#burgersList', '#burgersList li');
	makeList(fries, '#friesList', '#friesList li');
	makeList(drinks, '#drinkList', '#drinkList li');
	makeList(salad, '#saladList', '#saladList li');
	makeTable();

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
				$("#arrowLeft").fadeIn("slow");
				$("#arrowRight").fadeIn("slow");
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

