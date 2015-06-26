jQuery( document ).ready(function() {
    
    //custom stats thingy
    jQuery('div.stats').hover(Expand_Stats,Close_Stats);
    jQuery('div.stats').click(Click_Stats);
});

Click_Stats = function(){
    $stats = jQuery('div.stats');
    if($stats.hasClass('expanded')){
       $stats.removeClass('expanded');
       Close_Stats();
    }else{
       $stats.addClass('expanded');
       Expand_Stats();
    }
}
Expand_Stats = function(){
    $stats = jQuery('div.stats');
    $stats.animate({width:'100%'});
    $stats.find('label').fadeIn();
}
Close_Stats = function(){
   $stats = jQuery('div.stats');
   if(!$stats.hasClass('expanded')){
    $stats.animate({width:'100px'});
    $stats.find('label').fadeOut();
   }
}