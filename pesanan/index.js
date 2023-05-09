import { currency } from "../buy/index.js";

const users = JSON.parse(localStorage.getItem('users') ?? '[]');

const idx = users.findIndex((user) => user.email === email);

const purchases = JSON.parse(localStorage.getItem('purchases') ?? '[]');

const filterPurchases = purchases.filter((purc) => purc.id_user === idx);

const els = filterPurchases.map((purc) => `
  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
    <td class="w-32 p-4">
      <img src="${purc.img}" alt="${purc.name_item}">
    </td>
    <td class="px-6 py-4  text-gray-900 dark:text-white">
      ${purc.name_item}
    </td>
    <td class="px-6 py-4  text-gray-900 dark:text-white">
      ${currency(purc.price)}
    </td>
    <td class="px-6 py-4">
      <div class="flex items-center space-x-3">
        <div>
          <div  id="first_product" class="disabled bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">${purc.amount}</div>
        </div>
      </div>
    </td>
    ${role === 'vip' ? `<td class="px-6 py-4  text-gray-900 dark:text-white">
      ${purc.disc}%
    </td>` : ''}
    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
      ${currency(purc.total)}
    </td>
    <td class="px-6 py-4  text-gray-900 dark:text-white">
      ${purc.success ? `<div class="bg-green-100 border border-green-600 text-green-600 rounded-xl px-2 py-1">Sukses</div>` : '<div class="bg-orange-100 border border-orange-600 text-orange-600 rounded-xl px-2 py-1">Proses</div>'}
    </td>
  </tr>
`)

$('.tbody').html(els.join(''));

