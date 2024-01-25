@extends('layout')

@section('content')

<div class="container mx-auto p-4">
  <!-- Product Information Section -->
  <div class="flex flex-wrap -mx-4 mb-4">
      <div class="w-full md:w-1/3 px-4 max-h-80">
          <h1 class="text-3xl font-semibold mb-4">{{ $product->name }}</h1>
          <p class="text-gray-600 mb-4">{{ $product->description }}</p>
          <p class="text-gray-800 mb-4">Price: ${{ $product->price }}</p>
          <p class="text-gray-800 mb-4">Shipping Cost: ${{ $product->shipping_cost }}</p>
          <p class="text-gray-800 mb-4">Status: {{ $product->status }}</p>
          <button class="bg-blue-500 text-white px-4 py-2 rounded">Add to Cart</button>
      </div>
      <div class="w-full md:w-2/3 px-4 mb-8 bg-contain bg-clip-content bg-no-repeat" style="background-image: url('/storage/{{ $product->feature_image }}')">          {{-- <img src="/storage/{{ $product->feature_image }}" alt="Product Image" class="w-full rounded-lg shadow-lg"> --}}
      </div>
  </div>

  <!-- Product Gallery Section -->
  <div class="mb-8">
      <h2 class="text-2xl font-semibold mb-4">Product Gallery</h2>
      <div class="flex flex-row gap-3 overflow-auto -mx-2">
          @foreach ($galleryImages as $image)
            <img src="/storage/{{ $image->file_name }}" class="w-32 h-32">
          @endforeach
      </div>
  </div>

  <!-- Live PDF Section (Assuming a link/button to generate PDF) -->
  <div class="mb-8">
      <a href="{{ route('generate-product-pdf', $product->id) }}" class="bg-green-500 text-white px-4 py-2 Fnded">Generate PDF</a>
      <a href="{{ route('products.edit', $product->id) }}" class="bg-green-500 text-white px-4 py-2 rounded">Edit</a>
      <form class="inline" action="{{ route('products.destroy', $product->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Remove</button>
      </form>
  </div>
</div>

@endsection