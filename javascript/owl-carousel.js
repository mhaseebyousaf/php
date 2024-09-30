$(document).ready(function () {
    
 $(".category-owl-carousel").owlCarousel({
    // Navigation
    navigation : true,
    navigationText : ["prev","next"],
    pagination : true,
    paginationNumbers: true,
 
    // Responsive
    responsive: true,
    items : 3,
    itemsDesktop : [1199,3],
    itemsDesktopSmall : [980,2],
    itemsTablet: [768,2],
    itemsMobile : [479,1]
 });



 $(".search-owl-carousel").owlCarousel({
    // Navigation
    navigation : true,
    navigationText : ["prev","next"],
    pagination : true,
    paginationNumbers: true,
 
    // Responsive
    responsive: true,
    items : 3,
    itemsDesktop : [1199,3],
    itemsDesktopSmall : [980,2],
    itemsTablet: [768,2],
    itemsMobile : [479,1]
 });


 $(".owl-carousel").owlCarousel({
   // Navigation
   navigation : true,
   navigationText : ["prev","next"],
   pagination : true,
   paginationNumbers: true,

   // Responsive
   responsive: true,
   items : 3,
   itemsDesktop : [1199,3],
   itemsDesktopSmall : [980,2],
   itemsTablet: [768,2],
   itemsMobile : [479,1]
});

});