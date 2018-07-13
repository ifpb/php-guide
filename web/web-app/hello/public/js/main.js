const form = new FormData(document.querySelector('#hello-form'));
const helloField = document.querySelector('div#hello');

helloButton.addEventListener('click', helloWorld);

function helloWorld(event) {
  let name = nameField.value;
  let url = `../v1/hello.php?name=${name}`;

  fetch(url, {
      method: "GET",
      body: form
    })
    .then(function (res) {
      return res.text()
    })
    .then(function (responseText) {
      helloField.innerHTML = responseText;
    })

  event.preventDefault();
}