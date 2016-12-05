// burger image list
var burgerImage = new Array(	
	"img/fp_burger1.png",		
	"img/fp_burger2.png",
	"img/fp_burger3.png",
	"img/fp_burger4.png"
);

// burger name list
var burgerName = new Array(
	"Featured Burger1",
	"Featured Burger2",
	"Featured Burger3",
	"Featured Burger4"
);

var burgerExp = new Array(
	"This is Featured Burger1. ABC",
	"This is Featured Burger2. DEF",
	"This is Featured Burger3. GHI",
	"This is Featured Burger4. JLK"
)

var myNowCnt = -1;	// current number of array
var myflg = 0;		// display flag

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