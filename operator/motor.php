<?php
include '../koneksi/koneksi.php';

$motor = mysqli_query($koneksi, "SELECT * FROM motor");
?>

<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<link rel="stylesheet" href="style.css">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin's Dashboard - Motor</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="./assets/js/init-alpine.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      defer
    ></script>
    <script src="./assets/js/charts-lines.js" defer></script>
    <script src="./assets/js/charts-pie.js" defer></script>
    <script src="./assets/js/charts-bars.js" defer></script>
  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen}"
    >
      <!-- Desktop sidebar -->
      <aside
        class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0"
      >
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <a
            class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
            href="#"
          >
            Yukrental!
          </a>
          <ul class="mt-6">
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="home.php"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                  ></path>
                </svg>
                <span class="ml-4">Home</span>
              </a>
            </li>
          </ul>
          <ul>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="customer.php"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                  ></path>
                </svg>
                <span class="ml-4">Customer</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="jenis_motor.php"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                  ></path>
                </svg>
                <span class="ml-4">Jenis Motor</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="motor.php"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"
                  ></path>
                  <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                </svg>
                <span class="ml-4">Motor</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="transaksi.php"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"
                  ></path>
                </svg>
                <span class="ml-4">Transaksi</span>
              </a>
            </li>
            <li class="relative px-4 py-1">
                      <a
                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="index.php"
                      >
                        <svg
                          class="w-5 h-5"
                          aria-hidden="true"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          viewBox="0 0 19 24"
                          stroke="currentColor"
                        >
                          <path
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                          ></path>
                        </svg>
                        <span class="ml-4">Log out</span>
                      </a>
                    </li>
            </ul>
          </template>
        </li>
      </ul>
        </div>
      </aside>

      <!-- Header -->
      <div class="flex flex-col flex-1 w-full">
        <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
          <div
            class="container flex items-center justify-between h-full px-4 mx-auto text-purple-600 dark:text-purple-300"
          >
            </button>
            <!-- Search input -->
            <div class="flex justify-start flex-1 lg:mr-32">
              <div
                class="relative w-full max-w-xl mr-6 focus-within:text-purple-500"
              >
              <div class="absolute flex items-center pl-2" style="transform: translate(0px, 15px);">
                  <svg
                    class="w-4 h-4"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
                <input
                  class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                  type="text"
                  placeholder="Search for projects"
                  aria-label="Search"
                  style="padding-left: 30px;"
                />
              </div>
            </div>
            <ul class="flex items-center flex-shrink-0 space-x-6">
              <!-- Theme toggler -->
              <li class="flex">
                <button
                  class="rounded-md focus:outline-none focus:shadow-outline-purple"
                  @click="toggleTheme"
                  aria-label="Toggle color mode"
                >
                  <template x-if="!dark">
                    <svg
                      class="w-5 h-5"
                      aria-hidden="true"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                    >
                      <path
                        d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
                      ></path>
                    </svg>
                  </template>
                  <template x-if="dark">
                    <svg
                      class="w-5 h-5"
                      aria-hidden="true"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        clip-rule="evenodd"
                      ></path>
                    </svg>
                  </template>
                </button>
              </li>
            </a>
          </li>
          </ul>
                </template>
              </li>
            </ul>
          </div>
        </header>
        <main class="h-full pb-16 overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Motor
            </h2>
              
            <!-- Tabel -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                      <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                          <thead>
                            <tr
                              class="text-l font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                            >
                            <th class="px-4 py-3">ID Motor</th>
                            <th class="px-4 py-3">ID Jenis Motor</th>
                            <th class="px-4 py-3">Nama Motor</th>
                            <th class="px-4 py-3">No Plat</th>
                            <th class="px-4 py-3">Harga / 12 jam</th>
                            <th class="px-4 py-3">Foto Unit</th>
                            <th class="px-4 py-3">Detail</th>
                            <th class="px-4 py-3">Action</th>
                            </tr>
                            </thead>
                            <?php while ($row = mysqli_fetch_assoc($motor)) : ?>
                              <tbody
                                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                                >
                                <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">  
                                  <p class="font-semibold text-center"><?php echo $row['id_motor']; ?></p>
                                </td>
                                <td class="px-4 py-3">  
                                  <p class="font-semibold text-center"><?php echo $row['id_jenis_motor']; ?></p>
                                </td>
                                <td class="px-4 py-3">  
                                  <p class="font-semibold"><?php echo $row['nama_motor']; ?></p>
                                </td>
                                <td class="px-4 py-3">  
                                  <p class="font-semibold"><?php echo $row['plat_motor']; ?></p>
                                </td>
                                <td class="px-4 py-3">  
                                  <p class="font-semibold text-center"><?php echo $row['harga_perjam']; ?></p>
                                </td>
                                <td class="px-4 py-3">  
                                  <p class="font-semibold"><?php echo $row['foto']; ?></p>
                                </td>
                                <td class="px-4 py-3">  
                                  <p class="font-semibold"><?php echo $row['detail']; ?></p>
                                </td>
                                
                                <td class="px-4 py-3">     
                                <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                                      >
                                      <a href="motor.php?page=motor&action=edit&id_motor=<?php echo $row['id_motor']; ?>">Edit</a>
                                  </span>         
                              </td>  
                              <td class="px-4 py-3">
                                    <span
                                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700"
                                    >
                                    <a href="crud_motor.php?delete&id_motor=<?php echo $row['id_motor']; ?>">Delete</a>
                                    </span>   
                              </td>

                              </td>  
                            </tr>
                            <?php endwhile; ?>

                        </table>
                                      
                      </div>
                      
                      <!-- Tambah Kategori -->
                          </div>
                    </h4>
            <section class="content">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                <a
                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                href="motor.php?page=motor&action=add">Add New Motor
                </a>
              </div><br>
            </div>
            <?php
                        if (isset($_GET['action']) && ($_GET['action'] == 'add' || $_GET['action'] == 'edit')) {
                            if ($_GET['action'] == 'edit') {
                                $id_motor = $_GET['id_motor'];
                                $motor = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM motor WHERE id_motor='$id_motor'"));
                            } else {
                                $motor = ['id_motor' => '', 'id_jenis_motor' => '', 'nama_motor' => '', 'plat_motor' => '', 'harga_perjam' => '', 'foto' => '', 'detail' => ''];
                            }
                        ?>
                        </div>
                        <form action="crud_motor.php" method="post">
                            <input type="hidden" name="id_motor" value="<?php echo $motor['id_motor']; ?>">
                            <input type="hidden" name="id_jenis_motor" value="<?php echo $motor['id_jenis_motor']; ?>">

                            <label class="my-6 text-sm font-semibold text-gray-700 dark:text-gray-200" for="nama_motor">Nama Motor :</label>
                            <input 
                            class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" 
                            type="text" name="nama_motor" value="<?php echo $motor['nama_motor']; ?>" required><br>

                            <label class="my-6 text-sm font-semibold text-gray-700 dark:text-gray-200" for="plat_motor">No Plat :</label>
                            <input 
                            class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" 
                            type="text" name="plat_motor" value="<?php echo $motor['plat_motor']; ?>" required><br>

                            <label class="my-6 text-sm font-semibold text-gray-700 dark:text-gray-200" for="harga_perjam">Harga Per-Jam:</label>
                            <input 
                            class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" 
                            type="text" name="harga_perjam" value="<?php echo $motor['harga_perjam']; ?>" required><br>

                            <label class="my-6 text-sm font-semibold text-gray-700 dark:text-gray-200" for="foto">Foto :</label>
                            <input 
                            class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" 
                            type="file" name="foto" value="<?php echo $motor['foto']; ?>" required><br>

                            <label class="my-6 text-sm font-semibold text-gray-700 dark:text-gray-200" for="detail">Detail :</label>
                            <input 
                            class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" 
                            type="text" name="detail" value="<?php echo $motor['detail']; ?>" required><br>
                            
                            <button type="submit" name="save" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Save</button>
                          </form>
                          <?php } ?>
                    </main>
                </div>
              </div>
            </body>
          </html>
