/* ============================================================
   ADICIONAR AO CARRINHO (AJAX)
============================================================ */

function addToCart(productId) {
    fetch(`/cart/add/${productId}`, {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
            "Accept": "application/json"
        }
    })
    .then(async response => {
        const text = await response.text();

        let data;
        try {
            data = JSON.parse(text);
        } catch (e) {
            console.error("Resposta não era JSON:", text);
            throw new Error("Resposta inválida do servidor.");
        }

        if (!response.ok || data.success !== true) {
            throw new Error(data.error || "Erro ao adicionar.");
        }

        showToast(data.message || "Produto adicionado!");
    })
    .catch(error => {
        console.error("Erro:", error);
        showToast("Erro interno. Atualize a página.");
    });
}


/* ============================================================
   TOAST (NOTIFICAÇÃO SIMPLES)
============================================================ */

function showToast(message) {
    const toast = document.createElement("div");
    toast.className = "toast-message";
    toast.innerText = message;

    document.body.appendChild(toast);

    setTimeout(() => toast.classList.add("show"), 50);

    setTimeout(() => {
        toast.classList.remove("show");
        setTimeout(() => toast.remove(), 300);
    }, 2500);
}


/* CSS do Toast - Injetado automaticamente */
const toastCSS = `
.toast-message {
    position: fixed;
    top: 20px;
    right: 20px;
    background: #4CAF50;
    color: white;
    padding: 12px 20px;
    border-radius: 6px;
    opacity: 0;
    transform: translateY(-10px);
    transition: 0.3s ease;
    z-index: 9999;
}
.toast-message.show {
    opacity: 1;
    transform: translateY(0);
}
`;

let style = document.createElement("style");
style.innerHTML = toastCSS;
document.head.appendChild(style);


/* ============================================================
   CARROSSEL (JS PURO)
============================================================ */

document.addEventListener("DOMContentLoaded", () => {
    
    const carousels = document.querySelectorAll(".carousel-wrapper");

    carousels.forEach(wrapper => {
        
        const carousel = wrapper.querySelector(".card-carousel");
        const leftBtn  = wrapper.querySelector(".left-btn");
        const rightBtn = wrapper.querySelector(".right-btn");
        const card     = carousel.querySelector(".card");

        let cardWidth = card.offsetWidth + 20; // largura + gap
        let position = 0;

        /* Botão → */
        rightBtn.addEventListener("click", () => {
            const maxScroll = -(carousel.scrollWidth - wrapper.querySelector(".carousel-container").offsetWidth);

            position -= cardWidth;
            if (position < maxScroll) position = maxScroll;

            carousel.style.transform = `translateX(${position}px)`;
            animateButton(rightBtn);
        });

        /* Botão ← */
        leftBtn.addEventListener("click", () => {
            position += cardWidth;
            if (position > 0) position = 0;

            carousel.style.transform = `translateX(${position}px)`;
            animateButton(leftBtn);
        });

        /* Animação do botão */
        function animateButton(button) {
            button.style.transform += " scale(1.2)";
            setTimeout(() => {
                button.style.transform = button.style.transform.replace(" scale(1.2)", "");
            }, 200);
        }

        /* Recalcular largura ao redimensionar tela */
        window.addEventListener("resize", () => {
            const newWidth = card.offsetWidth + 20;

            if (newWidth !== cardWidth) {
                cardWidth = newWidth;
                position = 0;
                carousel.style.transform = "translateX(0px)";
            }
        });

    });
});
