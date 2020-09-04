jQuery(document).ready(function() {
jQuery(".io-testimonial-container").slick({
	dots: true,
	arrows: true,
	slidesToShow: 1,
	adaptiveHeight: true,
	
	responsive: [
    		{
      		breakpoint: 1024,
      		settings: {
        		arrows: false,
      			}
    		},

    		{
      		breakpoint: 600,
      		settings: {
        		arrows: false,
      			}
    		},

    		{
      		breakpoint: 480,
      		settings: {
        		arrows: false,
      			}
    		}
    
  		]
});
});