const form = document.querySelector("#hello-form");
const helloField = document.querySelector("div#hello");

form.addEventListener("submit", helloWorld);

function helloWorld(event) {
  event.preventDefault();

  const name = helloField.value;
  const url = `/api/v1/?name=${name}`;
  const formData = new FormData(form);

  fetch(url, {
    method: "POST",
    body: formData
  })
    .then(function(res) {
      return res.text();
    })
    .then(function(responseText) {
      helloField.innerHTML = responseText;
    });
}
