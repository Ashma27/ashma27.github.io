//const second = 1000,
//    minute = second * 60,
//    hour = minute * 60,
//    day = hour * 24;
//
//let countDown = new Date('dec 14, 2019 00:00:00').getTime(),
//    x = setInterval(function() {
//
//        let now = new Date().getTime(),
//            distance = countDown - now;
//
//        document.getElementById('days').innerText = Math.floor(distance / (day)),
//            document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
//            document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
//            document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);
//
//    }, second)
//


//counter for clock start from here
// var ringer = {
//   countdown_to: "12/14/2019",
//   rings: {
//     'DAYS': { 
//       s: 86400000, // mseconds in a day,
//       max: 365
//     },
//     'HOURS': {
//       s: 3600000, // mseconds per hour,
//       max: 24
//     },
//     'MINUTES': {
//       s: 60000, // mseconds per minute
//       max: 60
//     },
//     'SECONDS': {
//       s: 1000,
//       max: 60

//     }
   
//    },
//   r_count: 4,
//   r_spacing: 30, // px
//   r_size: 150, // px
//   r_thickness: 15, // px
//   update_interval: 11, // ms
    
    
//   init: function(){
   
//     $r = ringer;
//     $r.cvs = document.createElement('canvas'); 
    
//     $r.size = { 
//       w: ($r.r_size + $r.r_thickness) * $r.r_count + ($r.r_spacing*($r.r_count-1)), 
//       h: ($r.r_size + $r.r_thickness) 
//     };
    


//     $r.cvs.setAttribute('width',$r.size.w);           
//     $r.cvs.setAttribute('height',$r.size.h);
//     $r.ctx = $r.cvs.getContext('2d');
//     $(".countdownwrap").append($r.cvs);
//     $r.cvs = $($r.cvs);    
//     $r.ctx.textAlign = 'center';
//     $r.actual_size = $r.r_size + $r.r_thickness;
//     $r.countdown_to_time = new Date($r.countdown_to).getTime();
//     $r.cvs.css({ width: $r.size.w+"px", height: $r.size.h+"px" });
//     $r.go();
//   },
//   ctx: null,
//   go: function(){
//     var idx=0;
    
//     $r.time = (new Date().getTime()) - $r.countdown_to_time;
    
    
//     for(var r_key in $r.rings) $r.unit(idx++,r_key,$r.rings[r_key]);      
    
//     setTimeout($r.go,$r.update_interval);
//   },
//   unit: function(idx,label,ring) {
//     var x,y, value, ring_secs = ring.s;
//     value = parseFloat($r.time/ring_secs);
//     $r.time-=Math.round(parseInt(value)) * ring_secs;
//     value = Math.abs(value);
    
//     x = ($r.r_size*.5 + $r.r_thickness*.5);
//     x +=+(idx*($r.r_size+$r.r_spacing+$r.r_thickness));
//     y = $r.r_size*.5;
//     y += $r.r_thickness*.5;

    
//     // calculate arc end angle
//     var degrees = 360-(value / ring.max) * 360.0;
//     var endAngle = degrees * (Math.PI / 180);
    
//     $r.ctx.save();

//     $r.ctx.translate(x,y);
//     $r.ctx.clearRect($r.actual_size*-0.5,$r.actual_size*-0.5,$r.actual_size,$r.actual_size);

//     // first circle
//     $r.ctx.strokeStyle = "#2b2c30";
//     $r.ctx.beginPath();
//     $r.ctx.arc(0,0,$r.r_size/2,0,2 * Math.PI, 2);
//     $r.ctx.lineWidth =$r.r_thickness;
//     $r.ctx.stroke();
   
//     // second circle
//     $r.ctx.strokeStyle = "#0033a0";
//     $r.ctx.beginPath();
//     $r.ctx.arc(0,0,$r.r_size/2,0,endAngle, 1);
//     $r.ctx.lineWidth =$r.r_thickness;
//     $r.ctx.stroke();
    
//     // label
//     $r.ctx.fillStyle = "#fff";
   
//     $r.ctx.font = '16px FiraSansLight';
//     $r.ctx.fillText(label, 0, 23);
//     $r.ctx.fillText(label, 0, 23);   
    
//     $r.ctx.font = '40px FiraSansLight';

//     $r.ctx.fillText(Math.floor(value), 0, 10);
    
//     $r.ctx.restore();
//   }
// }

// ringer.init();




//counter for clock end here


$(document).ready(function() {
	function scrollToSection(event) {
    event.preventDefault();
    var $section = $($(this).attr('href')); 
    $('html, body').animate({
      scrollTop: $section.offset().top
    }, 1000);
  }
  $('[data-scroll]').on('click', scrollToSection);
});