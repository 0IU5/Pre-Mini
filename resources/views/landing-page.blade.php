<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0" defer></script>
    </head>
    <body class="flex flex-col min-h-screen bg-gray-600">
        <!-- Navbar -->
        <div class="navbar bg-base-100 mx-auto flex items-center px-5 py-8 shadow-lg w-full max-h-10">
            <!-- Tombol StarClass -->
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="mr-3" width="28" height="28" viewBox="0 0 24 24" style="fill: rgba(228, 224, 15, 1); filter: drop-shadow(0 0 15px rgba(255, 255, 0, 0.8));">
                    <path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"/>
                </svg>
                <a href="{{ route('logout') }}" class="text-2xl text-white">StarClass</a>
            </div>


            <!-- Konten Navbar -->
            <div class="navbar-content ml-auto flex items-center">
                <!-- Search -->
                <div class="form-control relative">
                    <input type="text" placeholder="Search" class="input input-bordered w-64 md:w-96 pl-10 mr-40 bg-white text-black" />
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(1, 0, 0, 1);" class="absolute left-3 top-1/2 transform -translate-y-1/2">
                        <path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path>
                        <path d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z"></path>
                    </svg>
                </div>
                <!-- Teks Pengenalan -->
                <div class="text-white text-sm mr-4">
                    <p>Selamat datang di platform belajar kami!</p>
                </div>

                <!-- Profile -->
                <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                    <img
                        alt="Tailwind CSS Navbar component"
                        src="./img/vector_profile.jpeg" />
                    </div>
                </div>
                <ul     
                    tabindex="0"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                    <li class="mb-2">
                        <span class="text-sm"></span>
                    </li>
                    <li>
                    <a href="{{ route('logout') }}" class="justify-between">
                        Login
                        <span class="badge">New</span>
                    </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="justify-between">Log out
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgba(128, 128, 128, 0.5);"><path d="M16 13v-2H7V8l-5 4 5 4v-3z"></path><path d="M20 3h-9c-1.103 0-2 .897-2 2v4h2V5h9v14h-9v-4H9v4c0 1.103.897 2 2 2h9c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2z"></path></svg>
                        </a>
                    </li>
                </ul>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="bg-gray-100 text-black body-font">
        <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
          <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero" src="./img/dash.jpeg">
          <div class="text-center lg:w-2/3 w-full">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Selamat Datang di Website Kami!!</h1>
            <p class="mb-8 leading-relaxed">Di Bimbel, kami percaya bahwa setiap siswa mempunyai potensi untuk berprestasi. Misi kami adalah menyediakan layanan bimbingan belajar yang dipersonalisasi dan efektif yang memenuhi kebutuhan unik setiap pelajar, membantu mereka mencapai tujuan akademik dan seterusnya.</p>
            <div class="flex justify-center">
            <button class="inline-flex text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg" onclick="window.location.href='{{ route('logout') }}'">Ayo Mulai!!</button>
            </div>
          </div>
        </div>

        <!-- pencapaian -->
        <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-20">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Pencapaian Kami</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Kami sudah menghasilkan beberapa calon anak-anak sukses yang telah berlangganan di bimbel ini..</p>
    </div>
    <div class="flex flex-wrap -m-4">
        <div class="lg:w-1/3 sm:w-1/2 p-4">
            <div class="flex relative">
                <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center" src="./img/img-LP/mat.jpeg">
                <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-gray-300 opacity-0 hover:opacity-100">
                    <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">MATEMATIKA</h2>
                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Bintang Pelajar</h1>
                    <p class="leading-relaxed">Dengan bimbingan kami, siswa ini berhasil meraih juara olimpiade matematika tingkat nasional.</p>
                </div>
            </div>
        </div>
        <div class="lg:w-1/3 sm:w-1/2 p-4">
            <div class="flex relative">
                <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center" src="./img/img-LP/penulis.jpeg">
                <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-gray-300 opacity-0 hover:opacity-100">
                    <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">BAHASA INDONESIA</h2>
                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Penulis Berbakat</h1>
                    <p class="leading-relaxed">Siswa ini telah memenangkan beberapa lomba menulis esai dan puisi di berbagai kompetisi.</p>
                </div>
            </div>
        </div>
        <div class="lg:w-1/3 sm:w-1/2 p-4">
            <div class="flex relative">
                <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center" src="./img/img-LP/ps.jpeg">
                <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-gray-300 opacity-0 hover:opacity-100">
                    <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">BAHASA INGGRIS</h2>
                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Pembicara Publik</h1>
                    <p class="leading-relaxed">Berkat latihan intensif, siswa ini mampu menjadi pembicara terbaik dalam debat bahasa Inggris tingkat internasional.</p>
                </div>
            </div>
        </div>
        <div class="lg:w-1/3 sm:w-1/2 p-4">
            <div class="flex relative">
                <img alt="gallery" class="absolute inset-0 w-full h-full object-cover" src="./img/img-LP/fisika.jpeg">
                <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-gray-300 opacity-0 hover:opacity-100">
                    <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">FISIKA</h2>
                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Ilmuwan Muda</h1>
                    <p class="leading-relaxed">Siswa ini berhasil membuat proyek ilmiah yang diakui di berbagai ajang lomba sains internasional.</p>
                </div>
            </div>
        </div>
        <div class="lg:w-1/3 sm:w-1/2 p-4">
            <div class="flex relative">
                <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center" src="./img/img-LP/kimia.jpeg">
                <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-gray-300 opacity-0 hover:opacity-100">
                    <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">KIMIA</h2>
                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Peneliti Muda</h1>
                    <p class="leading-relaxed">Dengan bimbingan kami, siswa ini mampu melakukan penelitian yang dipublikasikan di jurnal ilmiah terkemuka.</p>
                </div>
            </div>
        </div>
        <div class="lg:w-1/3 sm:w-1/2 p-4">
            <div class="flex relative">
                <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center" src="./img/img-LP/biology.jpeg">
                <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-gray-300 opacity-0 hover:opacity-100">
                    <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">BIOLOGI</h2>
                    <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Dokter Muda</h1>
                    <p class="leading-relaxed">Siswa ini telah diterima di fakultas kedokteran ternama berkat prestasi akademiknya yang gemilang.</p>
                </div>
            </div>
        </div>
    </div>
</div>


        <div class="container px-5 py-24 mx-auto flex flex-wrap">
        <div class="flex flex-col text-center w-full mb-20">
          <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Our Services</h1>
          <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Kami menyediakan beberapa pilihan pelayanan untuk murid..</p>
        </div>
          <div class="lg:w-1/2 w-full mb-10 lg:mb-0 rounded-lg overflow-hidden">
            <img alt="feature" class="object-cover object-center h-full w-full" src="./img/img-LP/services.jpeg">
          </div>
          <div class="flex flex-col flex-wrap lg:py-6 -mb-10 lg:w-1/2 lg:pl-12 lg:text-left text-center">
            <div class="flex flex-col mb-10 lg:items-start items-center">
              <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-indigo-100 text-blue-500 mb-5">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                  <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                </svg>
              </div>
              <div class="flex-grow">
                <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Menyediakan Private CLass</h2>
                <p class="leading-relaxed text-base">Jadi private class dikhusus kan bagi anak murid yang ingin belajar namun hanya sendiri tidak bersama teman.</p>
                <a href="{{ route('logout') }}" class="mt-3 text-blue-500 inline-flex items-center">Learn More
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                  </svg>
                </a>
              </div>
            </div>
            <div class="flex flex-col mb-10 lg:items-start items-center">
              <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-indigo-100 text-blue-500 mb-5">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                  <circle cx="6" cy="6" r="3"></circle>
                  <circle cx="6" cy="18" r="3"></circle>
                  <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                </svg>
              </div>
              <div class="flex-grow">
                <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Terhubung dengan RoboGuru</h2>
                <p class="leading-relaxed text-base">Untuk menunjang dan meningkatkan cara belajar, kami juga terhubung dengan roboGuru</p>
                <a href="{{ route('logout') }}" class="mt-3 text-blue-500 inline-flex items-center">Learn More
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                  </svg>
                </a>
              </div>
            </div>
            <div class="flex flex-col mb-10 lg:items-start items-center">
              <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-indigo-100 text-blue-500 mb-5">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                  <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                  <circle cx="12" cy="7" r="4"></circle>
                </svg>
              </div>
              <div class="flex-grow">
                <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Konseling</h2>
                <p class="leading-relaxed text-base">Jadi kami juga menyediakan bimbingan konseling untuk murid - murid.</p>
                <a href="{{ route('logout') }}" class="mt-3 text-blue-500 inline-flex items-center">Learn More
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>

        </section>
</body>
</html>

