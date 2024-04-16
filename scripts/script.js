window.onload = () => {
  const options = document.getElementsByClassName('options');
    
  for(var i = 0; i < options.length; i++){
    let element = options[i];
    element.addEventListener('click', function() {
      var child = element.firstElementChild;
      if (child.style.display === 'none' || child.style.display === '') {
        child.style.display = 'block';
      } 
      else {
        child.style.display = 'none';
      }
    });
  }; 
}

