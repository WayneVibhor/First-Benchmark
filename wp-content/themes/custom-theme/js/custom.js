jQuery(document).ready(function($){

$("div.coach-columns span.x-image img").hover(function(){
    
   // $(this).css("display", "none");
   $(this).parent().siblings(".x-text").nextAll().slice(0, 1).css("display", "block");
   $(this).closest('.x-text-headline').find('.x-text-content-text-primary').css("display", "block");


    });
});