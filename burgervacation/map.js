function initialize() {
       	var latlng = new google.maps.LatLng(49.2850818,-123.1154072);
     	var myOptions = {
		zoom: 18, /*拡大比率*/
	    	center: latlng, /*表示枠内の中心点*/
		mapTypeId: google.maps.MapTypeId.ROADMAP/*表示タイプの指定*/
	};
   	var map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
}
