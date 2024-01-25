<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
  <div class="container min-w-full">
    <div class="container mx-auto p-12">
      <!-- Product Information Section -->
      <div class="flex flex-wrap -mx-4 mb-4">
          <div class="w-full md:w-1/3 px-4 max-h-80">
              <h1 class="text-3xl font-semibold mb-4">{{ $product['name'] }}</h1>
              <p class="text-gray-600 mb-4">{{ $product['description'] }}</p>
              <p class="text-gray-800 mb-4">Price: ${{ $product['price'] }}</p>
              <p class="text-gray-800 mb-4">Shipping Cost: ${{ $product['shipping_cost'] }}</p>
              <p class="text-gray-800 mb-4">Status: {{ $product['status'] }}</p>
          </div>
          <div class="w-full md:w-2/3 px-4 mb-8 bg-contain bg-clip-content bg-no-repeat" style="background-image: url('{{ public_path("storage/".$product->feature_image) }}')">
          </div>
      </div>
    
      <!-- Product Gallery Section -->
      <div class="mb-8">
          <h2 class="text-2xl font-semibold mb-4">Product Gallery</h2>
          <div class="flex flex-row gap-3 overflow-auto -mx-2">
              @foreach ($galleryImages as $image)
                <img src="{{ public_path('/storage/' . $image->file_name) }}" class="w-32 h-32">
              @endforeach
          </div>
      </div>
    </div>
  </div>
</body>
</html>
