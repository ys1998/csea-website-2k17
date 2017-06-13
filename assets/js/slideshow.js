function showSlide(n,k) {
  var current_slide;
  var containers=document.getElementsByClassName("slideshow-container");
  var slides=containers[k-1].getElementsByClassName("slide");
  var dots=containers[k-1].getElementsByClassName("dot");

  if(n=='n') {
    for(var i=0;i<dots.length;i++) {
      if(dots[i].className.includes("dot-active")) {
        current_slide=i+1;
        break;
      }
    }
    var next_slide;
    if(current_slide==dots.length) { next_slide=1; }
    else { next_slide=current_slide+1; }
    /* Changing class-names of slide and dot */
    dots[current_slide-1].className="dot";
    slides[current_slide-1].style.display="none";

    dots[next_slide-1].className += " dot-active";
    slides[next_slide-1].style.display="block"; 

  }
  else if(n=='p') {
    for(var i=0;i<dots.length;i++) {
      if(dots[i].className.includes("dot-active")) {
        current_slide=i+1;
        break;
      }
    }
    var prev_slide;
    if(current_slide==1) { prev_slide=dots.length; }
    else { prev_slide=current_slide-1; }
    /* Changing class-names of slide and dot */
    dots[current_slide-1].className="dot";
    slides[current_slide-1].style.display="none";

    dots[prev_slide-1].className += " dot-active";
    slides[prev_slide-1].style.display="block"; 

  }
  else {
    for(var i=0;i<dots.length;i++) {
      dots[i].className="dot";
      slides[i].style.display="none";
  }
  dots[n-1].className += " dot-active";
  slides[n-1].style.display="block";
}
}