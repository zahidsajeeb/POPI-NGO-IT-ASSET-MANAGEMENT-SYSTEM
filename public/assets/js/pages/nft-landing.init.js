function windowScroll(){var e=document.getElementById("navbar");e&&(50<=document.body.scrollTop||50<=document.documentElement.scrollTop?e.classList.add("is-sticky"):e.classList.remove("is-sticky"))}window.addEventListener("scroll",function(e){e.preventDefault(),windowScroll()});var filterBtns=document.querySelectorAll(".filter-btns .nav-link"),productItems=document.querySelectorAll(".item-item");filterBtns.forEach(function(e){e.addEventListener("click",function(e){e.preventDefault();for(var t=0;t<filterBtns.length;t++)filterBtns[t].classList.remove("active");this.classList.add("active");var n=e.target.dataset.filter;productItems.forEach(function(e){"all"===n||e.classList.contains(n)?e.style.display="block":e.style.display="none"})})});var swiper=new Swiper(".mySwiper",{slidesPerView:4,spaceBetween:30,loop:!0,autoplay:{delay:2500,disableOnInteraction:!1},pagination:{el:".swiper-pagination",clickable:!0},navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"}});
