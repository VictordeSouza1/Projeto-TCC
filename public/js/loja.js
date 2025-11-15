document.addEventListener("DOMContentLoaded", () => {
    const carousels = document.querySelectorAll(".carousel-wrapper");

    carousels.forEach(wrapper => {
        const carousel = wrapper.querySelector(".card-carousel");
        const leftBtn = wrapper.querySelector(".left-btn");
        const rightBtn = wrapper.querySelector(".right-btn");
        const card = carousel.querySelector(".card");
        const cardWidth = card ? card.offsetWidth + 20 : 270;
        let position = 0;

        if (rightBtn) {
            rightBtn.addEventListener("click", () => {
                const maxScroll = -(carousel.scrollWidth - wrapper.querySelector(".carousel-container").offsetWidth);
                position -= cardWidth;
                if (position < maxScroll) position = maxScroll;
                carousel.style.transform = `translateX(${position}px)`;
                animateButton(rightBtn);
            });
        }

        if (leftBtn) {
            leftBtn.addEventListener("click", () => {
                position += cardWidth;
                if (position > 0) position = 0;
                carousel.style.transform = `translateX(${position}px)`;
                animateButton(leftBtn);
            });
        }

        function animateButton(button) {
            button.style.transform += " scale(1.2)";
            setTimeout(() => {
                button.style.transform = button.style.transform.replace(" scale(1.2)", "");
            }, 200);
        }

        window.addEventListener("resize", () => {
            const newCardWidth = card ? card.offsetWidth + 20 : 270;
            // reset pos for simplicity on resize
            position = 0;
            carousel.style.transform = `translateX(${position}px)`;
        });
    });

    /* ------------- CARRINHO (localStorage) ------------- */
    const CART_KEY = "carrinho";
    const cartBtnHeader = document.querySelector(".cart-btn");

    // atualiza contador do header ao carregar
    function updateHeaderCount() {
        const carrinho = JSON.parse(localStorage.getItem(CART_KEY) || "[]");
        const totalItems = carrinho.reduce((sum, item) => sum + (item.qty || 0), 0);
        if (cartBtnHeader) cartBtnHeader.textContent = `🛒 ${totalItems}`;
    }

    updateHeaderCount();

    // função para extrair preço numérico de string "R$ 29,90" ou "29,90"
    function parsePrice(priceStr) {
        if (!priceStr) return 0;
        // tira tudo que não é número ou vírgula/ponto
        const cleaned = priceStr.replace(/[^\d,.-]/g, "").replace(",", ".");
        const n = parseFloat(cleaned);
        return isNaN(n) ? 0 : n;
    }

    // adiciona item ao carrinho (localStorage)
    function addToCart(product) {
        const carrinho = JSON.parse(localStorage.getItem(CART_KEY) || "[]");
        // identifica por title+price para simplicidade
        const existing = carrinho.find(i => i.id === product.id);
        if (existing) {
            existing.qty = (existing.qty || 1) + (product.qty || 1);
        } else {
            carrinho.push(product);
        }
        localStorage.setItem(CART_KEY, JSON.stringify(carrinho));
        updateHeaderCount();
    }

    // botões "Adicionar" nos cards
    document.querySelectorAll(".card").forEach(card => {
        const addBtn = card.querySelector(".add-cart-btn");
        if (!addBtn) return;

        addBtn.addEventListener("click", () => {
            const titleEl = card.querySelector(".card-title");
            const priceEl = card.querySelector(".price");
            const imgEl = card.querySelector(".card-image");

            const title = titleEl ? titleEl.textContent.trim() : "Produto";
            const price = priceEl ? parsePrice(priceEl.textContent) : 0;
            const img = imgEl ? imgEl.src : "";

            // gera id simples (pode ser substituído por id real)
            const id = `${title.replace(/\s+/g, "_")}_${price}`;

            const product = {
                id,
                title,
                price,
                img,
                qty: 1
            };

            addToCart(product);

            // pequena animação/feedback no botão
            addBtn.textContent = "✅ Adicionado";
            setTimeout(() => addBtn.textContent = "🛒 Adicionar", 900);
        });
    });

    // se o header cartBtn for clicado, redireciona para carrinho.html
    if (cartBtnHeader) {
        cartBtnHeader.addEventListener("click", () => {
            window.location.href = "carrinho.html";
        });
    }
});