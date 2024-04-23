function fetchAndDisplayNews() {
    fetch('../php_files/publication_news.php') 
        .then(response => response.json()) 
        .then(data => {

            const container = document.getElementById('news_publication');
          
            data.forEach(news => {
                const article = document.createElement('article');
                article.className = 'article';

                const img = document.createElement('img');
                img.src = news.image;
                img.width = 350;
                img.height = 200;
                article.appendChild(img);

                
                const div = document.createElement('div');

                
                const h1 = document.createElement('h1');
                h1.textContent = news.title;

                
                const p1 = document.createElement('p');
                p1.textContent = news.content;

                
                div.appendChild(h1);
                div.appendChild(p1);

                
                article.appendChild(div);
                container.appendChild(article);

                
            });
        })
        .catch(error => console.error('Ошибка загрузки новостей:', error));
}
document.addEventListener('DOMContentLoaded', fetchAndDisplayNews);
