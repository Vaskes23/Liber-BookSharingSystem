const carouselSlide = document.querySelector('.carousel-slide');
const carouselImages = document.querySelectorAll('.carousel-slide img');

//stara se o funkce banneru na homepage
const prevBtn = document.querySelector('#prevBtn');
const nextBtn = document.querySelector('#nextBtn');


let counter = 1;
const size = carouselImages[0].clientWidth;

carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';

// toci banner co 5 vterin
function timeout(){
setTimeout(function (){
    moveImgRight();
    timeout();
},5000);
}
timeout();

window.onload = moveImgRight();

nextBtn.addEventListener('click',()=>{
    //kontroluje jestli zmazkneme talictko a posune banner
   moveImgRight();
});

function moveImgRight(){
    //posune banner
    if(counter >= carouselImages.length - 1)return;
    carouselSlide.style.transition = "transform 0.4s ease-in-out";
    counter++;
    carouselSlide.style.transform = 'translateX('+ (-size * counter) + 'px)';
}

prevBtn.addEventListener('click',()=>{
    //posune banner na druhou stranu
    if(counter <= 0)return;
    carouselSlide.style.transition = "transform 0.4s ease-in-out";
    counter--;
    carouselSlide.style.transform = 'translateX('+ (-size * counter) + 'px)';
});

carouselSlide.addEventListener('transitionend',()=>{
    //posune konec bannery dopredu pro loop efekt
    if(carouselImages[counter].id === 'lastClone'){
        carouselSlide.style.transition = "none";
        counter = carouselImages.length - 2;
        carouselSlide.style.transform = 'translateX('+ (-size * counter) + 'px)';
    }
    //udela to same na druhou stranu
    if(carouselImages[counter].id === 'firstClone'){
        carouselSlide.style.transition = "none";
        counter = carouselImages.length - counter - 1;
        carouselSlide.style.transform = 'translateX('+ (-size * counter) + 'px)';
    }



});