window.addEventListener('DOMContentLoaded', (event) => {
    const currentLocation = window.location.pathname;
    const menuLinks = document.querySelectorAll(".menu a");
    const lis = document.querySelectorAll("li");
    const lbs = document.querySelectorAll(".lb");
    const lineDash = document.querySelector(".line-dash");
    let dashOrigin = -35;
    let selectedLi = -35;
    const speed = 500;
    let distance = 0;
    let time = 0;

    // initial animation and class for HOME
  
    lis[0].classList.add("active");

    //push all the bottom lines down.
    function pushDownLb() {
        lbs.forEach((lb) => {
            TweenLite.to(lb, 0.5, {
                y: 0,
                ease: Power3.easeOut
            });
        });
    }

    // Menü bağlantılarını kontrol et ve uygun olanı aktif yap
    menuLinks.forEach((link, i) => {
        if (currentLocation.includes(link.getAttribute("href"))) {
            link.parentNode.classList.add("active");
            selectedLi = -250 * i - 35;
            pushDownLb();
            let current = document.querySelector("li.active");
            current.classList.remove("active");
            lis[i].classList.add("active");
            TweenLite.to(lbs[i], 0.5, {
                y: -43,
                ease: Bounce.easeOut
            });
            
            // Çizgiyi seçilen menü öğesinin altına doğru hareket ettir
            TweenLite.to(lineDash, 0.5, {
                strokeDashoffset: selectedLi,
                ease: Bounce.easeOut
            });
        }
    });

    // Mouse ile menü öğeleri üzerine geldiğinde çizgiyi hareket ettir
    menuLinks.forEach((link, i) => {
        link.addEventListener("mouseover", function() {
            distance = Math.abs(-250 * i - 35 - dashOrigin);
            time = distance / speed;
            dashOrigin = -250 * i - 35;
            if (time) {
                TweenLite.to(lineDash, time, {
                    strokeDashoffset: -250 * i - 35,
                    ease: Bounce.easeOut
                });
            }
        });

        // Menü öğelerine tıklandığında çizgiyi hareket ettir ve seçilen öğeyi aktif yap
        link.addEventListener("click", function() {
            selectedLi = -250 * i - 35;
            pushDownLb();
            let current = document.querySelector("li.active");
            current.classList.remove("active");
            lis[i].classList.add("active");
            TweenLite.to(lbs[i], 0.5, {
                y: -43,
                ease: Bounce.easeOut
            });
            
            // Çizgiyi seçilen menü öğesinin altına doğru hareket ettir
            TweenLite.to(lineDash, 0.5, {
                strokeDashoffset: selectedLi,
                ease: Bounce.easeOut
            });
        });
    });
    
    // HOME sayfasında alt çizgiyi gizle
    if (currentLocation.includes("index.html")) {
        lineDash.style.display = "none";
    }

    const cards = document.querySelectorAll('.card');
    const colors = ['#e07768', '#6eadd4', '#4aada9'];
    cards.forEach((card, index) => {
        const colorIndex = index % colors.length;
        card.querySelector('.icon').style.background = colors[colorIndex];
    });

});
