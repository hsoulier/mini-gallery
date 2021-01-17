console.log("Hello")


if (document.querySelector(".create-new-gallery")) {
const createNew = document.querySelector(".btn-new-gallery")
    createNew.addEventListener("click", () => {
        document.querySelector(".create-new-gallery").style.display = "block";
    })
}


const mySwiper = new Swiper('.swiper-container', {
    direction: 'horizontal',
    speed: 400,
    spaceBetween: 100,
    updateOnWindowResize: true,
    autoHeight: true,
    loop: true,
    navigation: {
        nextEl: '.slider-nav-next',
        prevEl: '.slider-nav-prev',
    },
    scrollbar: {
        el: '.swiper-scrollbar',
    },
})