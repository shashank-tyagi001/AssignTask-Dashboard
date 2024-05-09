const submitButton = document.querySelector('#btn-submit');
const submitButtonText = document.querySelector('#btn-submit .button-text');

submitButton.addEventListener('click', (e) => {
  e.preventDefault();

  submitButton.classList.add('loading');

  setTimeout(() => {
    submitButton.classList.remove('loading');
    submitButton.classList.add('success');
    submitButtonText.innerHTML = 'Login Successful';
  }, 4000);

});
