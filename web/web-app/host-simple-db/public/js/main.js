const hostTable = document.querySelector('#hosts')
const createHostForm = document.querySelector('form')

loadHosts()
createHostForm.onsubmit = createHostEvent

function loadHosts() {
  fetch('../api/v1/')
    .then(res => res.json())
    .then(json => drawHosts(json))
}

function drawHosts(hosts) {
  for (const host of hosts) {
    createHostRow(host)
  }
}

function createHostRow(host) {
  hostTable.insertAdjacentHTML('beforeend', getHostRow(host))
  hostTable.lastChild.querySelector('.edit').onclick = editHostEvent
  hostTable.lastChild.querySelector('.remove').onclick = removeHostEvent
}

function getHostRow(host) {
  return `<tr data-host-id="${host.id}">
      <td class="count"></td>
      <td class="name">${host.name}</td>
      <td class="address">${host.address}</td>
      <td>
        <i class="fas fa-pencil-alt edit"></i>
        <i class="fas fa-times remove"></i>
      </td>
    </tr>`
}

// Events
function createHostEvent(event) {
  event.preventDefault()

  const formData = new FormData(createHostForm)
  const name = formData.get('name')
  const address = formData.get('address')

  fetch(`../api/v1/?a=readOrCreate&name=${name}&address=${address}`)
    .then(res => res.json())
    .then(host => createHostRow(host))
  createHostForm.reset()
}

function removeHostEvent(event) {
  const row = event.target.parentNode.parentNode
  const hostId = row.dataset.hostId
  fetch(`../api/v1/?a=remove&id=${hostId}`)
  row.remove()
}

function updateHostEvent(event) {
  const row = event.target.parentNode.parentNode
  if (event.key === 'Enter') {
    const hostId = row.dataset.hostId
    const name = row.querySelector('.name')
    const address = row.querySelector('.address')

    const nameValue = name.firstChild.value
    const addressValue = address.firstChild.value
    fetch(`../api/v1/?a=update&id=${hostId}&name=${nameValue}&address=${addressValue}`)

    name.innerHTML = nameValue
    address.innerHTML = addressValue
  }
}

function editHostEvent(event) {
  const row = event.target.parentNode.parentNode

  const name = row.querySelector('.name')
  name.innerHTML = `<input type="text" value="${name.innerHTML}">`
  name.onkeyup = updateHostEvent

  const address = row.querySelector('.address')
  address.innerHTML = `<input type="text" value="${address.innerHTML}">`
  address.onkeyup = updateHostEvent
}