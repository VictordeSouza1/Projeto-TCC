document.addEventListener("DOMContentLoaded", () => {
    const carousels = document.querySelectorAll(".carousel-wrapper");

    carousels.forEach(wrapper => {
        const carousel = wrapper.querySelector(".card-carousel");
        const leftBtn = wrapper.querySelector(".left-btn");
        const rightBtn = wrapper.querySelector(".right-btn");
        const card = carousel.querySelector(".card");
        const cardWidth = card.offsetWidth + 20; // card + gap
        let position = 0;

        rightBtn.addEventListener("click", () => {
            const maxScroll = -(carousel.scrollWidth - wrapper.querySelector(".carousel-container").offsetWidth);
            position -= cardWidth;
            if (position < maxScroll) position = maxScroll;
            carousel.style.transform = `translateX(${position}px)`;
            animateButton(rightBtn);
        });

        leftBtn.addEventListener("click", () => {
            position += cardWidth;
            if (position > 0) position = 0;
            carousel.style.transform = `translateX(${position}px)`;
            animateButton(leftBtn);
        });

        function animateButton(button) {
            button.style.transform += " scale(1.2)";
            setTimeout(() => {
                button.style.transform = button.style.transform.replace(" scale(1.2)", "");
            }, 200);
        }
    
        // Responsivo: recalcular largura do card se mudar tamanho da janela
        window.addEventListener("resize", () => {
            const newCardWidth = card.offsetWidth + 20;
            if (newCardWidth !== cardWidth) {
                // Atualiza posição proporcional
                position = 0;
                carousel.style.transform = `translateX(${position}px)`;
            }
        });
    });
});