@extends('layouts.app')

@section('content')
<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex justify-between items-center mb-12">
      <h1 class="text-3xl font-medium title-font text-white">Testimoni</h1>
      <a href="{{ route('feedback.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
        Tambah Masukkan
      </a>
    </div>
    <div class="flex flex-wrap -m-4 relative z-0">
      <!-- Loop for displaying feedback -->
      @forelse ($feedback as $item)
      <div class="p-4 md:w-1/2 w-full relative">
        <div class="h-full bg-gray-300 p-8 rounded">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-400 mb-4" viewBox="0 0 975.036 975.036">
            <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
          </svg>
          <p class="leading-relaxed mb-6">{{ $item->feedback }}</p>
          <a class="inline-flex items-center">
            <img alt="testimonial" src="./img/vector_profile.jpeg" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
            <span class="flex-grow flex flex-col pl-4">
              <span class="title-font font-medium text-gray-900">{{ $item->email }}</span>
              <span class="text-gray-500 text-sm">{{ $item->nama }}</span>
            </span>
          </a>
          <div class="absolute top-2 right-2 flex space-x-2">
            <a href="{{ route('feedback.edit', $item->id_feedback) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">Edit</a>
            <form action="{{ route('feedback.destroy', $item->id_feedback) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="button" onclick="showModal({{ $item->id_feedback }})" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">Hapus</button>
            </form>
          </div>
          <!-- Modal -->
          <div id="popup-modal-{{ $item->id_feedback }}" tabindex="-1" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
            <div class="relative p-4 w-full max-w-md mx-auto bg-white rounded-lg shadow dark:bg-gray-700">
              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="hideModal({{ $item->id_feedback }})">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
              </button>
              <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this feedback?</h3>
                <form action="{{ route('feedback.destroy', $item->id_feedback) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Yes, I'm sure
                  </button>
                </form>
                <button onclick="hideModal({{ $item->id_feedback }})" type="button" class="py-2.5 px-5 ml-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      @empty
      <div class="w-full text-center text-white">Tidak ada data feedback.</div>
      @endforelse
    </div>
  </div>
</section>
<script>
  function showModal(feedbackId) {
    document.getElementById('popup-modal-' + feedbackId).classList.remove('hidden');
  }

  function hideModal(feedbackId) {
    document.getElementById('popup-modal-' + feedbackId).classList.add('hidden');
  }
</script>
@endsection
