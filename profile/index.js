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

// Init
const email = $('#email').val();

const users = JSON.parse(localStorage.getItem('users'));

const id = users.findIndex((user) => user.email === email);

if (id < 0) {
  alert("Gak Ada Email");
}

// Set Nama
$('#nama').val(users[id].name);

// Set Gender
$(`input[name="gender"][value="${users[id].gender}"]`).attr('checked', true);

// Set Umur
$('#age').val(users[id].age);

$('#category').val(users[id].category);
$('#type').val(users[id].type);

// Set Kondisi Kulit Sekarang
$('#cond').val(users[id].cond);

// Set Tanggal, default Hari Ini
$('input[type="date"]').val(users[id].scanDate ?? dayjs(Date.now()).format('YYYY-MM-DD'));

// Set Gambar
$('#profile-img').attr('src', users[id].image ?? '/gambar/placeholder.jpg');

const elVipStar = Array(5).fill(undefined).map((_, i) => `
  <svg aria-hidden="true" class="w-10 h-10 ${i < users[id].vip ? 'text-yellow-400' : 'text-gray-300'}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
  </svg>
  `);

$('.star').html(elVipStar.join(''));

// end of Init


// Ubah Image kalau upload
$('#image').on('change', (e) => {
  const file = document.querySelector('#image').files[0];
  const reader = new FileReader();

  reader.addEventListener('load', (e) => {
    $('#profile-img').attr('src', e.target.result);
  })

  reader.readAsDataURL(file)


})

console.log(users[id].vip)

// Form Submit
$('#service').on('submit', (e) => {
  e.preventDefault();
  e.stopPropagation();

  const name = $('#nama').val();
  const gender = $('input[name="gender"]:checked').val();
  if (gender === undefined) alert("Tolong Isi Gender");

  const age = $('#age').val();
  const scanDate = $('#scan-date').val();
  const category = $('#category').val();
  const type = $('#type').val();
  const cond = $('#cond').val();

  if (type === '') {
    alert("Tolong Pilih Tipe Skincare");
    return;
  }

  if (category === '') {
    alert("Tolong Pilih Kategori Skincare");
    return;
  }

  if (age < 17) {
    alert("Anda Belum Cukup Umur 🚫");
    return;
  }

  const user = {
    name,
    gender,
    age,
    scanDate,
    category,
    type,
    cond,
  }

  if (users[id].vip !== undefined) {
    const comb = combination[category][type];

    const vip = getStar(comb)

    const discounts = [];
    console.log(users[id].vip)
    user.vip = vip;
    let disc = 10
    for (let i = 0; i < vip; i++) {
      discounts.push(disc);
      disc += 5;
    }

    user.vipDisc = discounts
  }


  users[id] = { ...users[id], ...user, image: $('#profile-img').attr('src') }

  try {
    localStorage.setItem('users', JSON.stringify(users));
    alert("Berhasil Menambahkan Data");
    document.forms['profile'].submit();
  } catch (error) {
    alert("Gambar Anda Kebesaran");
  }
})

