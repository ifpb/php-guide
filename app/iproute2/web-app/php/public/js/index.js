const table = document.querySelector("table tbody");

function loadInterfaces() {
  fetch("/api/v1/")
    .then(res => res.json())
    .then(json => showInterfaces(json));
}

function showInterfaces(interfaces) {
  let rows = "";
  for (const interface of interfaces) {
    const mask = interface.ipmask ? "/" + interface.ipmask : "";
    const link = interface.name.split("@")[0];
    rows += `<tr>
      <td>${interface.id}</td>
      <td>
        <a href="link.html?info=link&link=${link}" target="_blank">${
      interface.name
    }</a>
      </td>
      <td>${interface.mtu}</td>
      <td>${interface.state}</td>
      <td>${interface.mac}</td>
      <td>${interface.ip || "-"}${mask}</td>
    </tr>`;
  }
  table.innerHTML = rows;
}

loadInterfaces();
