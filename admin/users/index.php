<?php require("../../utils/auth-admin.php"); ?>
<!DOCTYPE html>
<html lang="en" class="light">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="/styles/output.css">
</head>

<body>
  <?php require("../../components/sidebar-admin.php") ?>
  <div class="p-4 sm:ml-64">
    <section class="bg-white dark:bg-gray-900 p-3 sm:p-5 antialiased">
      <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
          <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-1/2">
              <form class="flex items-center">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                  </div>
                  <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                </div>
              </form>
            </div>
            <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
              <a href="/admin/vip/" id="createProductModalButton" data-modal-target="createProductModal" data-modal-toggle="createProductModal" class="flex items-center justify-center text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Tambah VIP
              </a>
            </div>
          </div>
          <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-4 py-4">-</th>
                  <th scope="col" class="px-4 py-3">Nama</th>
                  <th scope="col" class="px-4 py-3">Email</th>
                  <th scope="col" class="px-4 py-3">Tipe Skin Care</th>
                  <th scope="col" class="px-4 py-3">Kategory</th>
                  <th scope="col" class="px-4 py-3">Umur</th>
                  <th scope="col" class="px-4 py-3">Action</th>
                </tr>
              </thead>
              <tbody class="tbody">
                <tr class="border-b dark:border-gray-700">
                  <th scope="row" class="px-4 py-3 h-full flex items-center justify-center font-medium text-gray-900 whitespace-nowrap dark:text-white"><img src="/gambar/placeholder.jpg" class="w-20"></th>
                  <td class="px-4 py-3">PC</td>
                  <td class="px-4 py-3">Apple</td>
                  <td class="px-4 py-3 max-w-[12rem] truncate">What is a product description? A product description describes a product.</td>
                  <td class="px-4 py-3">$2999</td>
                  <td class="px-4 py-3">Loading...</td>
                  <td class="px-4 py-3"><button class="bg-red-600 text-white px-3 py-1 rounded-lg">Loading</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!-- End block -->
  </div>
  <script src="/scripts/cash.min.js"></script>
  <script src="/admin/users.js"></script>
</body>

</html>