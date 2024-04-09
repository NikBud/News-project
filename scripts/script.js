document.addEventListener('DOMContentLoaded', function() {
  const word = document.querySelector('.word_1');
  const wordList = document.querySelector('.word-list_1');
  
  word.addEventListener('click', function() {
    if (wordList.style.display === 'none' || wordList.style.display === '') {
      wordList.style.display = 'block';
    } else {
      wordList.style.display = 'none';
    }
  });
});



document.addEventListener('DOMContentLoaded', function() {
  const word = document.querySelector('.word_2');
  const wordList = document.querySelector('.word-list_2');
  
  word.addEventListener('click', function() {
    if (wordList.style.display === 'none' || wordList.style.display === '') {
      wordList.style.display = 'block';
    } else {
      wordList.style.display = 'none';
    }
  });
});


document.addEventListener('DOMContentLoaded', function() {
  const word = document.querySelector('.word_3');
  const wordList = document.querySelector('.word-list_3');
  
  word.addEventListener('click', function() {
    if (wordList.style.display === 'none' || wordList.style.display === '') {
      wordList.style.display = 'block';
    } else {
      wordList.style.display = 'none';
    }
  });
});

