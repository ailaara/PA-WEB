<?php require('../utils/auth.php') ?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="/styles/styleo.css">
  <link rel="stylesheet" href="/styles/service.css">
  <link rel="stylesheet" href="/styles/output.css">
  <title>secrett.store_</title>
</head>

<body>
  <?php require("../components/nav.php") ?>
  <form action="" name="profile" method="POST" class="container mx-auto mt-10 pb-10" id="service">
    <label class="block mb-4" for="nama">
      <span class="text-gr font-semibold">Member Name</span>
      <input value="<?= $_SESSION['username'] ?>" name="nama" required id="nama" type="text" class="mt-1 w-full block rounded-md border-gray-300 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50" placeholder="">
    </label>
    <!-- <label class="block mb-4" for="pass"> -->
    <!--   <span class="text-gr font-semibold">ID Member</span> -->
    <!--   <input name="pass" id="pass" required type="password" class="mt-1 w-full block rounded-md border-gray-300 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50" placeholder=""> -->
    <!-- </label> -->
    <div aria-label="Gender">
      <div class="text-gr font-semibold">Jenis Kelamain</div>
      <div class="mt-2 flex items-center justify-start">
        <label class="mb-4 mr-4 inline-block" for="boy">
          <input value="man" type="radio" id="boy" name="gender" class="rounded-full border-gray-300 text-pink-600 shadow-sm focus:border-pink-300 focus:ring focus:ring-offset-0 focus:ring-pink-200 focus:ring-opacity-50" />
          <span class="text-gray-700">Laki Laki</span>
        </label>
        <label class="block mb-4" for="girl">
          <input value="woman" type="radio" id="girl" name="gender" class="rounded-full border-gray-300 text-pink-600 shadow-sm focus:border-pink-300 focus:ring focus:ring-offset-0 focus:ring-pink-200 focus:ring-opacity-50" />
          <span class="text-gray-700">Perempuan</span>
        </label>
      </div>
    </div>
    <label class="block mb-4" for="age">
      <span class="text-gr font-semibold">Usia</span>
      <input name="age" required id="age" type="number" class="mt-1 w-full block rounded-md border-gray-300 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50" placeholder="Isi Usia">
    </label>
    <label class="block mb-4" for="scan-date">
      <span class="text-gr font-semibold">Tanggal Scanning Kulit</span>
      <input name="scan-date" required id="scan-date" type="date" class="w-full mt-1 block rounded-md border-gray-300 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50">
    </label>
    <label for="category" class="block mb-4">
      <span class="text-gr font-semibold">Kategori Skincare</span>
      <select name="category" required id="category" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50">
        <option value="" selected>-- Pilih Kategori Skincare ---</option>
        <option value="hot-deals">Hot Deals</option>
        <option value="new-release">New Release</option>
        <option value="popular">Popular</option>
        <option value="cheapest">Cheapest</option>
      </select>
    </label>
    <label for="type" class="block mb-4">
      <span class="text-gr font-semibold">Jenis Skincare</span>
      <select name="type" required id="type" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50">
        <option value="" selected>-- Pilih Jenis Skincare ---</option>
        <option value="sabun">Sabun</option>
        <option value="serum">Serum</option>
        <option value="cream">Cream</option>
        <option value="gel-spot">Gel-Spot</option>
      </select>
    </label>
    <label class="block mb-4" for="cond">
      <span class="text-gr font-semibold">Kondisi Kulit Sekarang</span>
      <textarea rows="4" required name="cond" id="cond" class="mt-1 w-full block rounded-md border-gray-300 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50" placeholder="Jelaskan Secara Rinci Permasalahannya"></textarea>
    </label>
    <label class="block mb-4" for="email">
      <span class="text-gr font-semibold">Email</span>
      <input disabled name="email" required id="email" type="text" class="mt-1 w-full block rounded-md border-gray-300 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 disabled:text-gray-400 disabled:cursor-not-allowed" placeholder="" value="<?= $_SESSION['email'] ?>">
    </label>
    <span class="text-gr font-semibold">Foto Profile</span>
    <div class="relative w-max mb-4">
      <img id="profile-img" class="h-52" src="/gambar/placeholder.jpg" />
      <label class="block mb-4 absolute top-1 right-2" for="image">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 fill-white hover:fill-pink-600 hover:scale-110">
          <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
        </svg>
      </label>
    </div>
    <input name="image" id="image" type="file" accept="image/*" class="mt-1 hidden w-full rounded-md border-gray-300 shadow-sm focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 disabled:text-gray-400 disabled:cursor-not-allowed" placeholder="" value="<?= $_SESSION['email'] ?>">
    <?php if ($_SESSION['role'] === 'vip') : ?>
      <div class="mb-4">
        <h3 class="text-gr font-bold text-xl">Level VIP</h3>
        <div class="star flex items-center"></div>
      </div>
    <?php endif ?>
    <button class="rounded-md px-3 py-1 font-bold text-white bg-pink-600 hover:bg-pink-700">Submit</button>
  </form>
  <script src="/scripts/cash.min.js"></script>
  <script src="/scripts/dayjs.min.js"></script>
  <script src="/profile/index.js"></script>
</body>

</html>