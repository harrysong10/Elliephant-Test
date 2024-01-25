@extends('layout')
   
@section('content')
    
<div class="flex flex-row flex-wrap justify-center min-w-full">
  @foreach($products as $product)
    <div class="w-64 rounded overflow-hidden shadow-lg m-4">
      <!-- Product Image -->
      <img class="w-full h-24 object-cover" src="/storage/{{ $product->feature_image }}" alt="Product Image">

      <!-- Product Information -->
      <div class="px-6 py-2">
          <div class="font-bold text-xl mb-2">{{ $product->name }}</div>
          <p class="text-gray-600 text-sm mb-4 h-10 max-h-10">{{ $product->description }}</p>
          <p class="text-gray-700 text-base mb-2">Price: ${{ $product->price }}</p>
          <p class="text-gray-700 text-base">Shipping: {{ $product->shipping_cost }}</p>
      </div>

      <div class="flex flex-row justify-center gap-1 px-6 pt-2 pb-2">
        <button class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">
          <a href="{{ route('products.show', $product->id) }}">
            <i class="fa fa-eye" aria-hidden="true"></i>
          </a>
        </button>
      
        <!-- Edit Icon Button -->
        <button class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">
          <a href="{{ route('products.edit', $product->id) }}">
            <i class="fa fa-edit"></i>
          </a>
        </button>
      
        <!-- Delete Icon Button -->
        <form class="inline" action="{{ route('products.destroy', $product->id) }}" method="POST">
          @csrf
          @method('DELETE')

          <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">
            <i class="fa fa-trash" aria-hidden="true"></i>
          </button>
        </form>
      
        <!-- Download Icon Button -->
        <button class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600">
          <a href="{{ route('generate-product-pdf', $product->id)}}">
            <i class="fa fa-download"></i>
          </a>
        </button>
      </div>
    </div>
  @endforeach
</div>
    
@endsection