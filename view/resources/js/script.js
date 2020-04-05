$(document).ready(function(){

    /*for the sticky navigation*/
    $('.js--section-dir-nav').waypoint(function(direction){
        if(direction == "down"){
            $('nav').addClass('sticky');
        }else{
            $('nav').removeClass('sticky');
        }        
    },{
        offset: '60px'        
    });
    
    
    /*scroll on buttons*/

    $('.js--scroll').click(function(){
        $('html, body').animate({scrollTop:$('.js--section-form').offset().top}, 1000);
    });

    $('.js--scroll-inicio').click(function(){
        $('html, body').animate({scrollTop:($('.js--inicio').offset().top)-220}, 1000);
    });



/*mobile navigation */

$('.js--nav-icon').click(function(){
    var nav = $('.js--main-nav');
    var icon = $('.js--nav-icon');

    nav.slideToggle(500);

        if(icon.attr("name") == 'menu-outline'){
            icon.removeAttr('name');
            icon.attr('name', 'close-outline');
        } else{
            icon.removeAttr('name');
            icon.attr('name', 'menu-outline');
        }
})

});


