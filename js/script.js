(function($) {
    "use strict";

    // manual carousel controls
    $('.next').click(function(){ $('.carousel').carousel('next');return false; });
    $('.prev').click(function(){ $('.carousel').carousel('prev');return false; });
    
})(jQuery);

$(document).on("click", ".navbar-right .dropdown-menu", function(e){
    e.stopPropagation();
});