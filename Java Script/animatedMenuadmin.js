$(document).ready(function(){

$("#form").hide(0); 
$("#report").hide(0);  
$("#f3").mouseover(complain);
$("#f3").click(complain);
$("#labwise").mouseover(apply);
$("#labwise").click(apply);

});

function complain()
{
   $("div#form").slideToggle("medium");
}
function apply()
{
   $("div#report").slideToggle("medium");
}