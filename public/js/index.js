document.addEventListener("DOMContentLoaded", () => {
    const main = document.querySelector("main");
    const leafCount = 40;

    for (let i = 0; i < leafCount; i++) {
        const leaf = document.createElement("div");
        leaf.classList.add("falling-leaf");
        leaf.style.left = `${Math.random() * 100}%`;
        leaf.style.animationDuration = `${8 + Math.random() * 5}s`;
        leaf.style.animationDelay = `${Math.random() * 5}s`;
        leaf.style.opacity = 0.3 + Math.random() * 0.7;
        leaf.style.transform = `scale(${0.5 + Math.random() * 1}) rotate(${Math.random()*360}deg)`;
        main.appendChild(leaf);
    }
});