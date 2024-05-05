const apiKey = '59eb4d9d369c47c085ac2b417f1aeb41';
const newsList = document.getElementById('news-list');
const searchForm = document.getElementById('search-form');
const searchInput = document.getElementById('search-input');
let searchQuery = '';

// Fetch news data from News API
async function getNews() {
  newsList.innerHTML = '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>';

  const url = `https://newsapi.org/v2/top-headlines?country=en&category=technology&language=en&q=${searchQuery}&apiKey=${apiKey}`;

  try {
    const response = await fetch(url);
    const jsonData = await response.json();

    newsList.innerHTML = '';

    const articles = jsonData.articles;

    for (let i = 0; i < articles.length; i++) {
      const { title, url, urlToImage, description } = articles[i];

      if (!urlToImage || urlToImage.trim() === '') {
        continue;
      }

      const newsCard = `
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <img src="${urlToImage}" class="card-img-top" alt="${title}">
            <div class="card-body">
              <h5 class="card-title">${title}</h5>
              <p class="card-text">${description}</p>
            </div>
            <div class="card-footer">
              <a href="${url}" target="_blank" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
      `;

      newsList.insertAdjacentHTML('beforeend', newsCard);
    }
  } catch (error) {
    newsList.innerHTML = '<h3>Unable to fetch news, please try again later.</h3>';
  }
}

// Handle search form submit
searchForm.addEventListener('submit', (e) => {
  e.preventDefault();
  searchQuery = searchInput.value.trim();
  getNews();
});

// Fetch news on page load
getNews();

// Fetch more news when user scrolls to the bottom of the page
window.addEventListener('scroll', () => {
  const { scrollTop, scrollHeight, clientHeight } = document.documentElement;

  if (scrollTop + clientHeight >= scrollHeight - 5) {
    getNews();
  }
});
