// carrinho.js
document.addEventListener("DOMContentLoaded", () => {
    const CART_KEY = "cart";
    const FRETE = 9.90; // frete fixo
    const cartItemsEl = document.getElementById("cart-items");
    const summarySubtotalEl = document.getElementById("summary-subtotal");
    const summaryFreteEl = document.getElementById("summary-frete");
    const summaryTotalEl = document.getElementById("summary-total");
    const checkoutBtn = document.getElementById("checkout-btn");
    const clearCartBtn = document.getElementById("clear-cart");
    const cartHeaderBtn = document.querySelector(".cart-btn");

    // util: formata preço para BRL
    function formatPrice(value) {
        return value.toLocaleString("pt-BR", { style: "currency", currency: "BRL" });
    }

    // pega carrinho do localStorage
    function getCart() {
        return JSON.parse(localStorage.getItem(CART_KEY) || "[]");
    }

    function saveCart(cart) {
        localStorage.setItem(CART_KEY, JSON.stringify(cart));
        updateHeaderCount();
    }

    function updateHeaderCount() {
        if (!cartHeaderBtn) return;
        const cart = getCart();
        const total = cart.reduce((s, i) => s + (i.qty || 0), 0);
        cartHeaderBtn.textContent = `🛒 ${total}`;
    }

    // renderiza a lista
    function renderCart() {
        const cart = getCart();
        cartItemsEl.innerHTML = "";

        if (!cart.length) {
            cartItemsEl.innerHTML = `<div class="empty-cart"><p>Seu carrinho está vazio.</p><p><a href="loja.html">Voltar para a loja</a></p></div>`;
            summarySubtotalEl.textContent = formatPrice(0);
            summaryFreteEl.textContent = formatPrice(FRETE);
            summaryTotalEl.textContent = formatPrice(0 + FRETE);
            return;
        }

        cart.forEach((item, index) => {
            const itemEl = document.createElement("article");
            itemEl.className = "cart-item";
            itemEl.innerHTML = `
                <img class="cart-item-img" src="${item.img}" alt="${escapeHtml(item.title)}">
                <div class="cart-item-info">
                    <h3>${escapeHtml(item.title)}</h3>
                    <p class="muted">Quantidade e controle</p>
                    <div class="cart-item-actions">
                        <div class="qty-control">
                            <button class="qty-btn btn-decrease" data-index="${index}">−</button>
                            <span class="qty-display">${item.qty}</span>
                            <button class="qty-btn btn-increase" data-index="${index}">+</button>
                        </div>
                        <div class="price-item">${formatPrice(item.price)}</div>
                        <button class="remove-btn" data-index="${index}">Remover</button>
                    </div>
                </div>
            `;
            cartItemsEl.appendChild(itemEl);
        });

        attachItemButtons();
        updateSummary();
    }

    // evita injeção simples de HTML via títulos
    function escapeHtml(text) {
        return text
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    function attachItemButtons() {
        // aumentar
        document.querySelectorAll(".btn-increase").forEach(btn => {
            btn.addEventListener("click", e => {
                const idx = parseInt(btn.dataset.index, 10);
                const cart = getCart();
                cart[idx].qty = (cart[idx].qty || 1) + 1;
                saveCart(cart);
                renderCart();
            });
        });

        // diminuir
        document.querySelectorAll(".btn-decrease").forEach(btn => {
            btn.addEventListener("click", e => {
                const idx = parseInt(btn.dataset.index, 10);
                const cart = getCart();
                cart[idx].qty = (cart[idx].qty || 1) - 1;
                if (cart[idx].qty < 1) cart[idx].qty = 1;
                saveCart(cart);
                renderCart();
            });
        });

        // remover
        document.querySelectorAll(".remove-btn").forEach(btn => {
            btn.addEventListener("click", e => {
                const idx = parseInt(btn.dataset.index, 10);
                let cart = getCart();
                cart.splice(idx, 1);
                saveCart(cart);
                renderCart();
            });
        });
    }

    function updateSummary() {
        const cart = getCart();
        const subtotal = cart.reduce((s, i) => s + (i.price * (i.qty || 1)), 0);
        const frete = FRETE;
        const total = subtotal + frete;

        summarySubtotalEl.textContent = formatPrice(subtotal);
        summaryFreteEl.textContent = formatPrice(frete);
        summaryTotalEl.textContent = formatPrice(total);
    }

    // checkout: placeholder
    checkoutBtn.addEventListener("click", () => {
        const cart = getCart();
        if (!cart.length) {
            alert("Seu carrinho está vazio.");
            return;
        }
        // aqui integraria com gateway / backend
        alert("Obrigado! Função de finalização simulada. Implementar integração de pagamento.");
    });

    clearCartBtn.addEventListener("click", () => {
        if (!confirm("Deseja esvaziar o carrinho?")) return;
        localStorage.setItem(CART_KEY, JSON.stringify([]));
        renderCart();
    });

    // inicial
    updateHeaderCount();
    renderCart();
});