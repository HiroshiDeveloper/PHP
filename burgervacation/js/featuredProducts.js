// burger image list
var burgerImage = new Array(	
	"img/mashHam.png",		
	"img/shrimp.png",
	"img/steak.png"
);

// burger name list
var burgerName = new Array(
	"MashHam Burger",
	"Shrimp Burger",
	"Steak Burger"
);

var burgerExp = new Array(
	"This is MashHam Burger! A lot of mashrooms and hams inside the burger! Let's try the seasonal burger!!",
	"This is Shrimp Burger! The shrimps are caught in Canada. The shrimp and the creamy sauce are a vary good combination!",
	"This is Steak Burger! American beef 100%. Let's try the burger with BBQ sauce. If you are hungy, that's perfect!"
)

var myNowCnt = -1;	// current number of array
var myflg = 0;		// display flag


document.getElementById("show1").src = burgerImage[0];	// initialize
document.getElementById("show2").src = burgerImage[1];

// slide show
function myChange(){
	myNowCnt = (myNowCnt<burgerImage.length-1) ? myNowCnt+1 : 0;		// next number for array
	myflg = (myflg==0) ? 1 : 0;											// jusdg to display or not
	if (myflg == 0){
		document.getElementById("show1").src = burgerImage[myNowCnt];	// set the next pic
		document.getElementById("fp_burgerName").innerHTML = burgerName[myNowCnt];
		document.getElementById("fp_burgerExp").innerHTML = burgerExp[myNowCnt];
		document.getElementById("show1").className = "fadein";			// fade in
		document.getElementById("show2").className = "fadeout";			// fade out
	}else{
		document.getElementById("show2").src = burgerImage[myNowCnt];
		document.getElementById("fp_burgerName").innerHTML = burgerName[myNowCnt];
		document.getElementById("fp_burgerExp").innerHTML = burgerExp[myNowCnt];
		document.getElementById("show1").className = "fadeout";			// fade out
		document.getElementById("show2").className = "fadein";			// fade in
	}
	setTimeout( "myChange()" , 6000 );	// 5 sec iteration			
}

myChange(); 
