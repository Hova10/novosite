$(document).ready(function(){
   
 init();   

});

function init(){
    
    //Loading div
    $(window).load(function(e){
        $('div.loading-page').fadeOut('slow');
    });
    
    
    //navbar
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('#home header').fadeIn(800);
            } else {
            $('#home header').fadeOut(800);
            }
        });
    
    //VID E SLIDER
    if(jQuery().revolution) {
		jQuery('.home-slider').revolution({
			startwidth:1100,
			startheight:500,
			delay:5000,
			onHoverStop:"on",
			navigationType:"none",
			fullWidth:"off",
			fullScreen:"on",
			fullScreenOffsetContainer: "#pseudo-header"
		});
	}

	if(jQuery().bgVideo) { 
		setTimeout(function() {
			jQuery('.videobg-section').bgVideo();
		}, 1000);
	}
    
    //StellarJs
    $.stellar();
    
    //ScrollReveal
    window.scrollReveal = new scrollReveal();
    var config = {
      viewportFactor: 0.95
    };
    
    //googlemaps
        var map_canvas = document.getElementById('map_canvas');
        var map_options = {
          center: new google.maps.LatLng(38.734325, -9.144716),
          zoom: 15,
          scrollwheel: false,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        
        };
        
        var map = new google.maps.Map(map_canvas, map_options);
    
        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(38.734325, -9.144716),
          map: map,
          animation: google.maps.Animation.DROP,
        });
    
}

