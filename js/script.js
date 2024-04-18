const subs = document.querySelectorAll('.recent-block-button');

subs.forEach(item => {
  item.addEventListener('click', () => {
    if(item.classList.contains('followed')) {
      item.classList.remove('followed')
      item.innerText = "Follow";
    } else {
      item.classList.add('followed');
      item.innerText = "Followed";
    }
  });
});
