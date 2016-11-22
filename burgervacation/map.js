function initialize() {
       	var latlng = new google.maps.LatLng(49.2850818,-123.1154072);
     	var myOptions = {
		zoom: 16,
	    	center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
   	var map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
	
	// style
	var styleOptions = [
	{
		featureType: "all",
	     	elementType: "all",
	   	stylers: [
			{ saturation: -100 }
	     	] 
  	},{
		featureType: "all",
		elementType: "labels",
		stylers:[
			{ visibility: "off" }
		] 
	},{
		featureType: "administrative",
		elementType: "all",
		stylers: [
			{ visibility: "on" }		
		] 
	},{
		featureType: "landscape",
		elementType: "all",
		stylers: [
			{ visibility: "on" }
		] 
	},{
		featureType: "transit",			
		elementType: "all",
		stylers: [
			{ visibility: "on" }			
		] 
	}];

	//icon
	var icon = {
		url : "img/icon.png",
		scaledSize : new google.maps.Size(48, 48)
	}

	var markerOptions = {
	  	position: latlng,
       		map: map,
	  	icon: icon,
      		title: 'Burger Vacation'
	};
	 
     	//var marker = new google.maps.Marker(markerOptions);
     	new google.maps.Marker(markerOptions);
	var styledMapOptions = { name: 'Burger Vacation' }
      	var sampleType = new google.maps.StyledMapType(styleOptions, styledMapOptions);
	
	map.mapTypes.set('sample', sampleType);
  	map.setMapTypeId('sample');
	google.maps.event.addDomListener(window, 'load', initialize);
}
