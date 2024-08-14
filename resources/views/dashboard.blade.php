@extends('layouts.app')

@section('content')
<section class="bg-white text-black body-font">
    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Selamat Datang {{ auth()->user()->name }}
        <br class="hidden lg:inline-block">di website kami!!
      </h1>
      <p class="mb-8 leading-relaxed">Di StarClass ⭐, kami percaya bahwa setiap siswa mempunyai potensi untuk berprestasi. Misi kami adalah menyediakan layanan bimbingan belajar yang dipersonalisasi dan efektif yang memenuhi kebutuhan unik setiap pelajar, membantu mereka mencapai tujuan akademik dan seterusnya.</p>
      <div class="flex justify-center">
        <a href="{{ route('payment.index') }}" class="inline-flex text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg ">Mulai!!</a>        
      </div>
    </div>
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
      <img class="object-cover object-center rounded" alt="hero" src="./img/dash.jpeg">
    </div>
  </div>

  <!-- pencapaian -->
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-20">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Pencapaian Kami</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Kami sudah menghasilkan beberapa calon anak-anak sukses yang telah berlangganan di bimbel ini..</p>
    </div>
    <div class="flex flex-wrap -m-4 ">
        <div class="lg:w-1/3 sm:w-1/2 p-4 z-0">
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
        <div class="lg:w-1/3 sm:w-1/2 p-4 z-0">
          <div class="flex relative">
              <img 
                  alt="gallery" 
                  class="absolute inset-0 w-full h-full object-cover "
                  src="./img/img-LP/fisika.jpeg">
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
          <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Layanan Kami</h1>
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
                <a href="{{ route('payment.index') }}" class="mt-3 text-blue-500 inline-flex items-center">Lebih lanjut
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
                <a href="{{ route('payment.index') }}" class="mt-3 text-blue-500 inline-flex items-center">Lebih lanjut
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
                <a href="{{ route('payment.index') }}" class="mt-3 text-blue-500 inline-flex items-center">Lebih lanjut
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>

    
</section>
@endsection
