
$(window).load( function() {
// fade-in
	var el = document.getElementById("pageFade");
							fadeIn(el, 4000);
// curseur
  $(document).mousemove( function(e) {
  var x = e.pageX;
  var y = e.pageY;

$('#chataigneCurseur').css('margin-left', x);
$('#chataigneCurseur').css('margin-top', y);
});
 // dégradé
	var canvas  = document.querySelector('#canvas');
          var context = canvas.getContext('2d');
          context.canvas.width = window.innerWidth;
          context.canvas.height = window.innerHeight;

		  var radial = context.createRadialGradient(1000, 800, 0, 800, 800, 1000);
                                  // jaune
          radial.addColorStop(0, '#F5BB00');
                                  //vert
          radial.addColorStop(1, '#539A00');

          context.fillStyle = radial;
          context.fillRect(0, 0, context.canvas.width, context.canvas.height); 
});

// fade-in
function fadeIn(el, time) {
  el.style.opacity = 0;

  var last = +new Date();
  var tick = function() {
    el.style.opacity = +el.style.opacity + (new Date() - last) / time;
    last = +new Date();

    if (+el.style.opacity < .99) {
      (window.requestAnimationFrame && requestAnimationFrame(tick)) || setTimeout(tick, 16);
    }
  };

  tick();
}
