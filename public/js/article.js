// Carrossel
let currentIndex = 0;
const track = document.querySelector('.carousel-track');
const items = document.querySelectorAll('.carousel-item');
setInterval(() => {
  currentIndex = (currentIndex + 1) % items.length;
  track.style.transform = `translateX(-${currentIndex * 100}%)`;
}, 4000);

// Artigos
const articlesContainer = document.getElementById('articles');
const loadMoreBtn = document.getElementById('loadMore');
let articleCount = 0;

function createArticle(title, content, imageUrl) {
  const card = document.createElement('div');
  card.classList.add('article-card');
  card.innerHTML = `
    <img src="${imageUrl}" alt="Capa do artigo">
    <div class="article-content">
      <h3><i class="fas fa-info-circle"></i> ${title}</h3>
      <p>${content}</p>
      <button>Ler mais</button>
    </div>
  `;
  return card;
}

function loadArticles() {
  const firstNewArticles = [];
  for (let i = 0; i < 3; i++) {
    articleCount++;
    const randomImg = `https://picsum.photos/200/200?random=${Math.floor(Math.random() * 1000)}`;
    const newArticle = createArticle(
      `Título ${articleCount}`,
      "Conteúdo do artigo de exemplo, com curiosidades e informações sobre biodiversidade.",
      randomImg
    );
    articlesContainer.appendChild(newArticle);
    if (i === 0) firstNewArticles.push(newArticle);
  }
  return firstNewArticles[0];
}

// Carrega os primeiros artigos
loadArticles();

// Botão Ver Mais
loadMoreBtn.style.display = 'flex';
loadMoreBtn.addEventListener('click', () => {
  const firstNew = loadArticles();
  firstNew.scrollIntoView({ behavior: 'smooth', block: 'start' });
});