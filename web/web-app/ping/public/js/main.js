const address = document.querySelector('#address');
const count = document.querySelector('#count');
const pingButton = document.querySelector('#pingButton');
const pingTableContent = document.querySelector('#pingTable tbody');
const pingTable = document.querySelector('#pingTable');
const infoStatus = document.querySelector('#infoStatus');
const addressStatus = document.querySelector('#addressStatus');
// const transmittedStatus = document.querySelector('#transmittedStatus');
// const lostedStatus = document.querySelector('#lostedStatus');
// const receivedStatus = document.querySelector('#receivedStatus');
const spinner = document.querySelector('#spinner');
const chartCanvas = document.querySelector('#chart');
let chart;

let countRow = 0;
let statusValues = {};

loadClickInPingButton();
let sort = new Tablesort(pingTable);

function loadClickInPingButton() {
  pingButton.onclick = () => addRowInPingTableAction();
}

function loadClickInLastRowPingTable() {
  activeRow(pingTableContent.querySelector('tr:last-child'));
  const lastedColumnsPingTable = pingTableContent.querySelectorAll('tr:last-child td');
  for (let column of lastedColumnsPingTable) {
    column.onclick = function (event) {
      let row = event.target.parentNode;
      activeRow(row);
      loadStatusInfo(row.dataset.address);
    }
  }
}

function activeRow(row) {
  pingTableContent.querySelectorAll('tr').forEach(row => row.style.backgroundColor = "#fff");
  row.style.backgroundColor = "#eee";
}

function loadStatusInfo(address) {
  let transmitted = [statusValues[address].losted, statusValues[address].received];

  addressStatus.innerHTML = address;

  if (chart) {
    chart.data.datasets[0].data = transmitted;
    chart.update();
  } else {
    chart = createTransmittedChart(transmitted);
  }
  // transmittedStatus.innerHTML = statusValues[address].transmitted;
  // lostedStatus.innerHTML = statusValues[address].losted/statusValues[address].transmitted*100;
  // receivedStatus.innerHTML = statusValues[address].received/statusValues[address].transmitted*100;
}

function addRowInPingTableAction() {
  let addressValue = address.value;
  let countValue = count.value;
  getPingInfo(addressValue, countValue);
}

function getPingInfo(addressValue, countValue) {
  let url = `../v1/ping.php?host=${addressValue}&count=${countValue}`;
  spinner.style.visibility = 'visible';
  ajax("get", url, addRowByPingResponse);
}

function addRowByPingResponse(pingResponse) {
  pingResponse = JSON.parse(pingResponse);
  if (pingResponse.error === undefined) {
    let pingInfo = toPingInfo(pingResponse);
    let address = pingInfo.address;
    let rowValues = Object.values(pingInfo);
    rowValues.unshift(++countRow);

    infoStatus.style.visibility = 'visible';
    updateStatusValues(pingInfo);

    pingTableContent.insertAdjacentHTML('beforeend', `<tr data-address="${address}"><td>${rowValues.join('</td><td>')}</td></tr>`);
    loadClickInLastRowPingTable();
    loadStatusInfo(address);
  } else {
    alert("Erro na obtenção do Ping!");
  }
  spinner.style.visibility = 'hidden';
  pingTable.style.visibility = 'visible';
}

function updateStatusValues(pingInfo) {
  let address = pingInfo.address;
  if (statusValues[address] === undefined) {
    statusValues[address] = {
      transmitted: pingInfo.transmitted,
      losted: pingInfo.losted,
      received: pingInfo.received
    };
  } else {
    statusValues[address].transmitted += pingInfo.transmitted;
    statusValues[address].losted += pingInfo.losted;
    statusValues[address].received += pingInfo.received;
  }
}

function toPingInfo(pingResponse) {
  let address = pingResponse.host;
  let transmitted = parseInt(pingResponse.statistics.transmitted);
  let received = parseInt(pingResponse.statistics.received);
  let losted = transmitted - received;
  let time = pingResponse.packets
    .reduce((previous, packet) => parseFloat(packet.time) + previous, 0)
    .toFixed(3);
  return {
    address,
    transmitted,
    received,
    losted,
    time
  };
}

function ajax(method, url, callback) {
  let xhr = new XMLHttpRequest();
  xhr.open(method, url);
  xhr.onload = () => callback(xhr.responseText);
  xhr.send();
}

function createTransmittedChart(transmitted) {
  let data = {
    labels: ["Losted", "Received"],
    datasets: [{
      data: transmitted,
      backgroundColor: ["#FF6384", "#36A2EB"],
      hoverBackgroundColor: ["#FF6384", "#36A2EB"]
    }]
  };
  let chart = new Chart(chartCanvas, {
    type: 'doughnut',
    data: data
  });
  return chart;
}