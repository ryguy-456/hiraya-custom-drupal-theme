(function (Drupal, once) {
  'use strict';

  Drupal.behaviors.hirayaParticles = {
    attach: function (context) {
      once('hiraya-particles', '.hiraya-hero', context).forEach(function (hero) {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
          return;
        }

        var canvas = document.createElement('canvas');
        canvas.id = 'hiraya-particles';
        canvas.setAttribute('aria-hidden', 'true');

        hero.prepend(canvas);

        var ctx = canvas.getContext('2d');
        var particles = [];
        var particleCount = 45;

        function resize() {
          canvas.width = hero.offsetWidth;
          canvas.height = hero.offsetHeight;
        }

        function createParticles() {
          particles = [];

          for (var i = 0; i < particleCount; i++) {
            particles.push({
              x: Math.random() * canvas.width,
              y: Math.random() * canvas.height,
              vx: (Math.random() - 0.5) * 0.35,
              vy: (Math.random() - 0.5) * 0.35,
              radius: Math.random() * 2 + 1
            });
          }
        }

        function draw() {
          ctx.clearRect(0, 0, canvas.width, canvas.height);

          particles.forEach(function (particle) {
            particle.x += particle.vx;
            particle.y += particle.vy;

            if (particle.x < 0 || particle.x > canvas.width) {
              particle.vx *= -1;
            }

            if (particle.y < 0 || particle.y > canvas.height) {
              particle.vy *= -1;
            }

            ctx.beginPath();
            ctx.arc(
              particle.x,
              particle.y,
              particle.radius,
              0,
              Math.PI * 2
            );

            ctx.fillStyle = 'rgba(31, 79, 70, 0.25)';
            ctx.fill();
          });

          for (var i = 0; i < particles.length; i++) {
            for (var j = i + 1; j < particles.length; j++) {
              var dx = particles[i].x - particles[j].x;
              var dy = particles[i].y - particles[j].y;
              var distance = Math.sqrt(dx * dx + dy * dy);

              if (distance < 145) {
                var opacity = (1 - distance / 145) * 0.12;

                ctx.beginPath();
                ctx.moveTo(particles[i].x, particles[i].y);
                ctx.lineTo(particles[j].x, particles[j].y);
                ctx.strokeStyle =
                  'rgba(31, 79, 70, ' + opacity + ')';
                ctx.lineWidth = 1;
                ctx.stroke();
              }
            }
          }

          requestAnimationFrame(draw);
        }

        resize();
        createParticles();
        draw();

        window.addEventListener('resize', function () {
          resize();
          createParticles();
        });
      });
    }
  };

})(Drupal, once);
