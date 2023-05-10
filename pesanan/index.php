<?php require("../utils/auth.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/styles/promo.css">
  <link rel="stylesheet" href="/styles/styleo.css">
  <link rel="stylesheet" href="/styles/output.css">
  <title>Promo </title>
</head>

<body>

  <?php require("../components/nav.php") ?>
  <div class="bdprm">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">
              <span class="sr-only">Image</span>
            </th>
            <th scope="col" class="px-6 py-3">
              Barang
            </th>
            <th scope="col" class="px-6 py-3">
              Harga Satuan
            </th>
            <th scope="col" class="px-6 py-3">
              Qty
            </th>
            <?php if ($_SESSION['role'] === 'vip') : ?>
              <th scope="col" class="px-6 py-3">
                Diskon
              </th>
            <?php endif ?>
            <th scope="col" class="px-6 py-3">
              Total
            </th>
            <th scope="col" class="px-6 py-3">
              Status
            </th>
          </tr>
        </thead>
        <tbody class="tbody">
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="w-32 p-4">
              <img src="/gambar/placeholder.jpg" alt="Apple Watch">
            </td>
            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
              Loading
            </td>
            <td class="px-6 py-4">
              <div class="flex items-center space-x-3">
                <div>
                  <input type="number" id="first_product" class="disabled bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" required>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
              $599
            </td>
            <td class="px-6 py-4">
              <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <script>
    const email = "<?= $_SESSION['email'] ?>";
    const role = "<?= $_SESSION['role'] ?>";
  </script>
  <script src="/scripts/cash.min.js"></script>
  <script type="module" src="/pesanan/index.js"></script>
</body>
<html>