
// buat login (ini udah multiuser)

const login = document.querySelector('#login');

$('#login').on('submit', (e) => {
  e.preventDefault();
  e.stopPropagation();

  const email = $('#email').val();
  const password = $('#pass2').val();

  if (email === 'admin@gmail.com') {
    document.forms['login'].submit();
    return;
  }

  const users = JSON.parse(localStorage.getItem('users') ?? '[]');

  // Database Kosong, jadi pasti gagal
  if (!users) {
    alert("Username dan Password tidak cocok");
    return;
  }

  const user = users.find((user) => user.email === email && user.password === password);

  console.log(user);

  // User gak ditemukan
  if (user === undefined) {
    alert("Username dan Password Tidak Cocok");
    return;
  }

  // Cek jika user VIP
  if (user.vip) $('input[name="roleUser"]').val(user.vip ?? 0);

  $('input[name="username"]').val(user.name);

  localStorage.setItem("userLogin", JSON.stringify(user));

  alert("Berhasil Login");

  document.forms['login'].submit();
});

const checkIfEmailExist = (users, email) => {
  return users.some((cc) => cc.email === email);
};

// buat daftar
const signup = document.querySelector('#daftar');

$('#daftar').on('submit', (e) => {
  e.preventDefault();
  e.stopPropagation();

  const name = $('#user1').val();
  const email = $('#emailA').val();
  const password = $('#pass1').val();
  const confPass = $('#pass0').val();

  if (email === 'admin@gmail.com') {
    alert("Gak boleh");
    return;
  }

  if (password !== confPass) {
    alert("Password dan Konfirmasi Password Tidak sama");
    return;
  }

  let users = JSON.parse(localStorage.getItem('users') ?? '[]')

  if (checkIfEmailExist(users, email)) {
    alert("Email Udah Ada");
    return;
  }

  const user = {
    name,
    email,
    password
  };

  users.push(user);

  localStorage.setItem('users', JSON.stringify(users));

  alert('User data saved successfully!');

  $('#item-1').prop('checked', true);

  $('#user1').val('');
  $('#emailA').val('');
  $('#pass1').val('');
  $('#pass0').val('');
})
