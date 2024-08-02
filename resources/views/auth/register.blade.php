@vite(['resources/css/app.css', 'resources/js/app.js'])

<section class="bg-white dark:bg-gray-800 relative z-10 py-8 px-4 sm:px-6 lg:py-12 lg:px-8">
  <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
    <!-- Bagian Gambar dan Informasi -->
    <section class="relative flex h-32 items-end bg-gray-900 lg:col-span-5 lg:h-full xl:col-span-6">
      <img
        alt=""
        src="../img/regist.jpeg"
        class="absolute inset-0 h-full w-full object-cover opacity-80"
      />

      <div class="hidden lg:relative lg:block lg:p-12">
        <a class="block text-white" href="#">
          <span class="sr-only">Beranda</span>
          <svg
            class="h-8 sm:h-10"
            viewBox="0 0 28 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <!-- SVG Path -->
          </svg>
        </a>

        <h2 class="mt-6 text-2xl font-bold text-white sm:text-3xl md:text-4xl">
          Selamat Datang!! 🖊️
        </h2>

        <p class="mt-4 text-white/90 leading-relaxed">
          Silakan lengkapi biodata Anda agar kami dapat mengenal Anda lebih baik.<br> Karena belum dikenal berarti belum berkenalan.
        </p>
      </div>
    </section>

    <!-- Bagian Formulir -->
    <main class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6">
      <div class="max-w-xl lg:max-w-3xl">
        <h2 class="text-2xl font-bold mb-6">Silakan Lengkapi Registrasi Anda!</h2>
        <form method="POST" action="{{ route('register') }}" class="space-y-6">
          @csrf

          <!-- Nama -->
          <div class="relative z-0 w-full mb-5 group">
            <x-input-label for="name" :value="__('Nama')" />
            <x-text-input id="name" class="block w-full px-0 bg-transparent border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600" type="text" name="name" :value="old('name')" autocomplete="name" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>

          <!-- Tanggal Lahir -->
          <div class="relative z-0 w-full mb-5 group">
            <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
            <x-text-input id="tanggal_lahir" class="block w-full px-0 bg-transparent border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600" type="date" name="tanggal_lahir" :value="old('tanggal_lahir')" required />
            <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
          </div>

          <!-- Email -->
          <div class="relative z-0 w-full mb-5 group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full px-0 bg-transparent border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600" type="email" name="email" :value="old('email')" autocomplete="email" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>

          <!-- Password -->
          <div class="relative z-0 w-full mb-5 group">
            <x-input-label for="password" :value="__('Kata Sandi')" />
            <x-text-input id="password" class="block w-full px-0 bg-transparent border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>

          <!-- Konfirmasi Password -->
          <div class="relative z-0 w-full mb-5 group">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" />
            <x-text-input id="password_confirmation" class="block w-full px-0 bg-transparent border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
          </div>

          <!-- Kelas -->
          <div class="relative z-0 w-full mb-5 group">
            <x-input-label for="kelas" :value="__('Kelas')" />
            <x-text-input id="kelas" class="block w-full px-0 bg-transparent border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600" type="text" name="kelas" :value="old('kelas')" required />
            <x-input-error :messages="$errors->get('kelas')" class="mt-2" />
          </div>

          <!-- Alamat -->
          <div class="relative z-0 w-full mb-5 group">
            <x-input-label for="alamat" :value="__('Alamat')" />
            <x-text-input id="alamat" class="block w-full px-0 bg-transparent border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600" type="text" name="alamat" :value="old('alamat')" required />
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
          </div>

          <!-- Jenjang Pendidikan -->
          <div class="relative z-0 w-full mb-5 group">
            <x-input-label for="jenjang_pendidikan" :value="__('Jenjang Pendidikan')" />
            <x-text-input id="jenjang_pendidikan" class="block w-full px-0 bg-transparent border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600" type="text" name="jenjang_pendidikan" :value="old('jenjang_pendidikan')" required />
            <x-input-error :messages="$errors->get('jenjang_pendidikan')" class="mt-2" />
          </div>

          <!-- Submit Button -->
          <x-primary-button>
            {{ __('Daftar') }}
          </x-primary-button>
        </form>
      </div>
    </main>
  </div>
</section>
