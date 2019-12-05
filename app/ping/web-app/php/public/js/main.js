const addressField = document.querySelector("#address");
const countField = document.querySelector("#count");
const pingButton = document.querySelector("#pingButton");
const spinner = document.querySelector("#spinner");

const pingTable = document.querySelector("#pingTable");
const pingTableContent = document.querySelector("#pingTable tbody");

const addressStatus = document.querySelector("#addressStatus");
const transmittedStatus = document.querySelector("#transmittedStatus");

// Events
pingButton.onclick = () => getPing(addressField.value, countField.value);
document.onkeydown = e => {
  if (e.key === "Enter") getPing(addressField.value, countField.value);
};

// Data
let statusValues = {};

function updateStatusValues(ping) {
  let address = ping.address;
  if (statusValues[address]) {
    statusValues[address].transmitted += ping.transmitted;
    statusValues[address].losted += ping.losted;
    statusValues[address].received += ping.received;
    statusValues[address].times.concat(ping.times);
  } else {
    statusValues[address] = {
      transmitted: ping.transmitted,
      losted: ping.losted,
      received: ping.received,
      times: ping.times
    };
  }
}

// Ping
function getPing(addressValue, countValue) {
  spinner.classList.remove("invisible");
  let url = `../api/v1/?host=${addressValue}&count=${countValue}`;
  fetch(url)
    .then(res => res.json())
    .then(json => addPing(json));
}

function addPing(pingResponse) {
  if (pingResponse.error) {
    alert("Erro na obtenção do Ping!");
  } else {
    const ping = pingParser(pingResponse);
    updateStatusValues(ping);
    loadPingHistory(ping);
    loadStatssInfo(ping.address);
    loadTimePackets(ping.times);
  }
  spinner.classList.add("invisible");
  addressField.focus();
  addressField.value = "";
  countField.value = "";
}

function pingParser(pingResponse) {
  const address = pingResponse.host;
  const transmitted = parseInt(pingResponse.statistics.transmitted);
  const received = parseInt(pingResponse.statistics.received);
  const losted = transmitted - received;
  const totalTimes = pingResponse.packets
    .reduce((t, p) => parseFloat(p.time) + t, 0)
    .toFixed(1);
  const times = pingResponse.packets.map(p => p.time);
  return { address, transmitted, received, losted, totalTimes, times };
}

// Ping History
function loadPingHistory(ping) {
  const values = [
    ping.address,
    ping.transmitted,
    ping.received,
    ping.losted,
    ping.totalTimes
  ];
  pingTableContent.insertAdjacentHTML(
    "afterbegin",
    `<tr data-address="${ping.address}"><td>${values.join(
      "</td><td>"
    )}</td></tr>`
  );
  pingTableContent.firstChild.onclick = () => {
    const row = event.target.parentNode;
    const address = row.dataset.address;
    loadStatssInfo(address);
    loadTimePackets(statusValues[address].times);
    Array.from(pingTableContent.childNodes).map(r =>
      r.classList.remove("selected")
    );
    row.classList.add("selected");
  };
  let sort = new Tablesort(pingTable);
}

// Stats Info
let statsInfoChart;
const statsInfoChartCanvas = document.querySelector("#stats-info-chart");

function createTransmittedChart(transmitted) {
  const data = {
    labels: ["Losted", "Received"],
    datasets: [
      {
        data: transmitted,
        backgroundColor: ["#FF6384", "#36A2EB"],
        hoverBackgroundColor: ["#FF6384", "#36A2EB"]
      }
    ]
  };
  const options = {
    legend: {
      display: false
    }
  };
  const chart = new Chart(statsInfoChartCanvas, {
    type: "doughnut",
    data: data,
    options: options
  });
  return chart;
}

function loadStatssInfo(address) {
  const transmitted = statusValues[address].transmitted;
  const losted = statusValues[address].losted;
  const received = statusValues[address].received;
  const transmittedPercentage = [
    (losted / transmitted) * 100,
    (received / transmitted) * 100
  ];
  addressStatus.innerHTML = address;
  transmittedStatus.innerHTML = `${transmitted} (<span id="lostedStatus">${losted}</span> / <span id="receivedStatus">${received}</span>)`;

  if (statsInfoChart) {
    statsInfoChart.data.datasets[0].data = transmittedPercentage;
    statsInfoChart.update();
  } else {
    statsInfoChart = createTransmittedChart(transmittedPercentage);
  }
}

// Time Packets
let timePacketsChart;
const timePacketsChartCanvas = document.querySelector("#time-packets-chart");

function createTimePacketsChart(times) {
  const data = {
    labels: Object.keys(times).map(t => +t + 1),
    datasets: [{ data: times }]
  };
  const options = {
    legend: {
      display: false
    }
  };
  const chart = new Chart(timePacketsChartCanvas, {
    type: "line",
    data: data,
    options: options
  });
  return chart;
}

function loadTimePackets(times) {
  if (timePacketsChart) {
    timePacketsChart.data.labels = Object.keys(times).map(t => +t + 1);
    timePacketsChart.data.datasets[0].data = times;
    timePacketsChart.update();
  } else {
    timePacketsChart = createTimePacketsChart(times);
  }
}
