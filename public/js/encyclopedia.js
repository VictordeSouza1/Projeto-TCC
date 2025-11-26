document.addEventListener("DOMContentLoaded", () => {
    const carousels = document.querySelectorAll(".carousel-wrapper");

    carousels.forEach(wrapper => {
        const carousel = wrapper.querySelector(".card-carousel");
        const leftBtn = wrapper.querySelector(".left-btn");
        const rightBtn = wrapper.querySelector(".right-btn");
        let position = 0;

        function getCardWidth() {
            const card = carousel.querySelector(".card");
            const style = window.getComputedStyle(card);
            return card.offsetWidth + parseInt(style.marginRight);
        }

        function slideRight() {
            const cardWidth = getCardWidth();
            const visibleWidth = wrapper.querySelector(".carousel-container").offsetWidth;
            const maxScroll = -(carousel.scrollWidth - visibleWidth);

            position -= cardWidth;
            if (position < maxScroll) position = maxScroll;

            carousel.style.transform = `translateX(${position}px)`;
            animateButton(rightBtn);
        }

        function slideLeft() {
            const cardWidth = getCardWidth();

            position += cardWidth;
            if (position > 0) position = 0;

            carousel.style.transform = `translateX(${position}px)`;
            animateButton(leftBtn);
        }

        rightBtn.addEventListener("click", slideRight);
        leftBtn.addEventListener("click", slideLeft);

        // Recalcular tudo ao mudar tamanho da tela
        window.addEventListener("resize", () => {
            position = 0;
            carousel.style.transform = "translateX(0px)";
        });

        function animateButton(btn) {
            btn.style.transform = "scale(1.2)";
            setTimeout(() => btn.style.transform = "scale(1)", 150);
        }
    });
});
