function checkall_foodlist() {  
var All=document.getElementById('all');
var one=document.getElementsByName('foodlist[]');
for(var i=0;i<one.length;i++){  
one[i].checked=All.onclick; 
}  
}  

function checkall_menu() {  
var all=document.getElementById('all');
var one=document.getElementsByName('menu[]');
for(var i=0;i<one.length;i++){  
one[i].checked=all.onclick; 
}  
}

function checkall_staff() {  
var all=document.getElementById('all');
var one=document.getElementsByName('staff[]');
for(var i=0;i<one.length;i++){  
one[i].checked=all.onclick; 
}  
}