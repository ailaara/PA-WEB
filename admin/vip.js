const combination = {
  "hot-deals": {
    "sabun": 45,
    "serum": 20,
    "cream": 60,
    "gel-spot": 35
  },
  "new-release": {
    "sabun": 70,
    "serum": 60,
    "cream": 20,
    "gel-spot": 10
  },
  "popular": {
    "sabun": 40,
    "serum": 65,
    "cream": 70,
    "gel-spot": 90
  },
  "cheapest": {
    "sabun": 30,
    "serum": 80,
    "cream": 10,
    "gel-spot": 45
  },
}

function getStar(comb) {
  if (comb <= 30) {
    return 1;
  } else if (comb > 30 && comb <= 55) {
    return 2;
  } else if (comb > 55 && comb <= 78) {
    return 3
  } else if (comb > 78 && comb <= 88) {
    return 4;
  } else if (comb > 88) {
    return 5;
  }

  return 0;
}

let vip = 0;
const vipDisc = [1, 2, 3, 4, 5];
let idx = -1;


const users = JSON.parse(localStorage.getItem('users') ?? '[]');

const elements = ['<option value="-1" selected>-- Pilih User ---</option>']

const elUsers = users.filter((user) => user.type !== undefined).map((user, i) => `
<option value="${i}">${user.name} - ${user.email}</option>
`);

$('#users').html([...elements, ...elUsers].join(''));

$('#users').on('change', (e) => {
  idx = parseInt(e.currentTarget.value, 10);

  // Reset
  if (idx == -1) {
    $('#type').val('').attr('disabled', true);
    $('#category').val('').attr('disabled', true);
    $('#age').val('').attr('disabled', true);
    const el = vipDisc.map(() => `
  <svg aria-hidden="true" class="w-10 h-10 text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
  </svg>
  `);


    $('#vip-star').html(el.join(''));
    return;
  }

  const type = users[idx].type;
  const category = users[idx].category;
  const age = parseInt(users[idx].age, 10);

  $('#type').val(type).attr('disabled', false);
  $('#category').val(category).attr('disabled', false);
  $('#age').val(age).attr('disabled', false);

  const comb = combination[category][type];

  vip = getStar(comb);

  const elVipStar = vipDisc.map((_, i) => `
  <svg aria-hidden="true" class="w-10 h-10 ${i < vip ? 'text-yellow-400' : 'text-gray-300'}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
  </svg>
  `);

  $('#vip-star').html(elVipStar.join(''));

});

$('form[name="vip"]').on('submit', (e) => {
  e.preventDefault();
  e.stopPropagation();

  if ($('#users').val() == -1) {
    alert("Tolong Pilih User Dulu");
    return;
  }

  users[idx].vip = vip + 1;

  const discounts = [];

  let disc = 10
  for (let i = 0; i < users[idx].vip; i++) {
    discounts.push(disc);
    disc += 5;
  }

  users[idx].vipDisc = discounts;

  localStorage.setItem('users', JSON.stringify(users));
  alert("Berhasil Menambahkan VIP USER");

  document.forms['vip'].submit();
})
