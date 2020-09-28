/*changement de thème*/
function myFunction(){
 
  var element =document.body;
  element.classList.toggle("dark-mode");
  
}
/* Rotation du logo*/
var val=0;
function rott()
{
	val=val+1;
	document.getElementById('logo8').style.webkitTransform="rotate("+val+"deg)";
	document.getElementById('logo8').style.mozTransform="rotate("+val+"deg)";
}

