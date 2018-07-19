const psHeaders = Array.from(document.querySelectorAll('table thead th'))
const psTable = document.querySelector('table tbody')
const psCount = document.querySelector('.ps-count')
const time = document.querySelector('#time')

showProcess()

function showProcess() {
  refreshStyleUp()
  fetch('../api/v1/ps.php')
    .then(res => res.json())
    .then(json => loadProcess(json))
}

function loadProcess(ps) {
  psCount.innerHTML = `${ps.length} processes`
  
  psHeaders
    .forEach(h => {
      h.classList.remove('headerSortDown')
      h.classList.remove('headerSortUp')
    })

  psTable.innerHTML = ps
    .map(p => Object.values(p).map(v => `<td>${v}</td>`).join(''))
    .map(p => `<tr>${p}</tr>`)
    .join('')

  $("#myTable").tablesorter()

  setTimeout('refreshStyleDown()', 100)

  setTimeout('showProcess()', time.value)
}

function refreshStyleUp() {
  psTable.classList.add('refreshUp')
}

function refreshStyleDown() {
  psTable.classList.remove('refreshUp')
}