$(document).ready(function() {
    $(".course-nav-btn").click(function() {
      $(".container").toggleClass("collapsed-nav");
    });
    
    $(".section-item").click(function() {
      $(".section-item").removeClass("selected");
      $(this).addClass("selected");
      
      $(".section-body").removeClass("visible");
      $("#" + $(this)[0].id + "-body").addClass("visible");
    });
    
    $(".button-close").click(function() {
      $(".course-completion-panel").removeClass("u-flex");
      $(".course-completion-panel").addClass("u-none");
    });
    
    $(".content-item").click(function() {
      $(".course-completion-panel").removeClass("u-none");
      $(".course-completion-panel").addClass("u-flex");
          
      resetConfetti();
      courseComplete();
    });
    
  });
  
  const canvasEl = document.querySelector('#confetti');
  
  var w = canvasEl.width = window.innerWidth;
  var h = canvasEl.height = window.innerHeight;
  var ctx = canvasEl.getContext('2d');
  var confNum = Math.floor(w / 4);
  var confs = [];
  var animationID = -1;
  
  function resetConfetti() {
    ctx.clearRect(0,0,w,h);
    ctx.beginPath();
    
    if (animationID != -1) {
      cancelAnimationFrame(animationID);
    }
    
    confs = [];
    confs = new Array(confNum).fill().map(_ => new Confetti());
  }
  
  function courseComplete() {
    animationID = requestAnimationFrame(courseComplete);
    ctx.clearRect(0,0,w,h);
    ctx.beginPath();
    
    confs.forEach((conf) => {
      conf.update();
      conf.draw();
    })
  }
  
  function Confetti () {
    //construct confetti
    var colors = ['#fde132', '#009bde', '#ff6b00'];
    
    this.x = Math.round(Math.random() * w);
    this.y = Math.round(Math.random() * h)-(h/2);
    this.rotation = Math.random()*360;
  
    var size = Math.random()*(w/80);
    
    this.size = size < 10 ? 10 : size;
    this.color = colors[Math.floor(colors.length * Math.random())];
    this.speed = this.size/6;  
    this.opacity = Math.random();
    this.shiftDirection = Math.random() > 0.5 ? 1 : -1;
  }
  
  Confetti.prototype.update = function() {
    this.y += this.speed;
    
    if (this.y <= h) {
      this.x += this.shiftDirection/3;
      this.rotation += this.shiftDirection*this.speed/100;
    }
  };
  
  Confetti.prototype.draw = function() {
    ctx.beginPath();
    ctx.arc(this.x, this.y, this.size, this.rotation, this.rotation+(Math.PI/2));
    ctx.lineTo(this.x, this.y);
    ctx.closePath();
    ctx.globalAlpha = this.opacity;
    ctx.fillStyle = this.color;
    ctx.fill();
  };
  
  
  
  