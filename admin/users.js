const users = JSON.parse(localStorage.getItem('users') ?? '[]');

let html = ''

const star = `<svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
  </svg>`;

function getData() {
  const elements = users.map((user, i) => `<tr class="border-b dark:border-gray-700">
  <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
    <img src="${user.image ?? '/gambar/placeholder.jpg'}" class="w-20" />
  </th>
  <td class="px-4 py-3 ">
<div class="flex items-center ">
<div class="${user.vip && 'text-gr font-bold'} ">${user.name}</div> <div class="flex ml-2  items-center justify-center"> ${new Array(user.vip ?? 0).fill(undefined).map(() => star).join('')} </div> </td>
</div>
  <td class="px-4 py-3">${user.email}</td>
  <td class="px-4 py-3 max-w-[12rem] truncate">${user.type ?? '-'}</td>
  <td class="px-4 py-3">${user.category ?? '-'}</td>
  <td class="px-4 py-3">${user.age ?? '-'} ${user.age !== undefined ? 'Tahun' : ''}</td>
  ${user.vip ? `<td class="px-4 py-3"><button data-id="${i}" class="del-vip bg-red-600 text-white px-3 py-1 rounded-lg">Hapus VIP</button></td>` : ``} 
</tr>`
  )
  $('.tbody').html(elements.join(''))
}
getData();

$(document).on('click', '.del-vip', function () {
  const idx = $(this).data('id');

  const conf = confirm("Yakin ingin menghilangkan status VIP?");

  console.log(idx);
  if (!conf) return;


  delete users[idx]['vip'];
  delete users[idx]['vipDisc']

  localStorage.setItem('users', JSON.stringify(users));

  alert("Berhasil Menghilangkan status VIP");

  getData()
})
