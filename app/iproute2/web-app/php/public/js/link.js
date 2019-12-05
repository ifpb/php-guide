const url = new URL(location);
const link = url.searchParams.get("link");
const title = document.querySelector("h1");
const table = document.querySelector("table tbody");

function loadInterface() {
  title.innerHTML = `Interface ${link}`;
  fetch(`/api/v1/?a=link&link=${link}`)
    .then(res => res.json())
    .then(json => showInterface(json));
}

function showInterface(interface) {
  let rows = "";
  for (const kind of ["rx", "tx"]) {
    rows += `<tr>
    <th>${kind.toUpperCase()}</th>
    <td>${interface.stats[kind].bytes}</td>
    <td>${interface.stats[kind].packets}</td>
    <td>${interface.stats[kind].errors}</td>
    <td>${interface.stats[kind].dropped}</td>
  </tr>`;
  }
  table.innerHTML = rows;
  setTimeout("loadInterface()", 2000);
}

loadInterface();
