const psTable = document.querySelector("table tbody");
const psCount = document.querySelector(".ps-count");
const time = document.querySelector("#time");

showProcess();
$("#topTable").tablesorter({ theme: "blue" });

function showProcess() {
  fetch("/api/v1/")
    .then(res => res.json())
    .then(json => loadProcess(json));
}

function loadProcess(ps) {
  psCount.innerHTML = `${ps.length} processes`;

  psTable.innerHTML = ps
    .map(p =>
      Object.values(p)
        .map(v => `<td>${v}</td>`)
        .join("")
    )
    .map(p => `<tr>${p}</tr>`)
    .join("");

  $("#topTable").trigger("update");

  setTimeout("showProcess()", time.value);
}
