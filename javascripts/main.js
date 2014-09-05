function handleFormSubmission(form) {
  setTimeout(function() {
    location.href = root + '/url/' + form.url.value.replace(/\//g, '|') + '#videos';
  }, 50);

  return false;
}
