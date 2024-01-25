<!DOCTYPE html>
<html>
<head>
    <title>Elliephant</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-KJ3ev5JSm9s+3nM96bRzo+VcC+d3jd9Jdg0zdP+3ZSSKZrO0jH+Xea2yNUWt/uaUdXWxXRF+7MGFSib2tQq5Cw==" crossorigin="anonymous" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="sticky top-0">
  <div class="bg-gray-800 text-white p-4">
    <div class="container mx-auto flex items-center justify-between">
      <!-- Logo or Branding -->
      <div class="text-xl font-bold">
          <a href="#" class="text-white">Your Logo</a>
      </div>

      <!-- Navigation Links -->
      <nav class="space-x-4">
          <a href="/products" class="hover:text-gray-300">Products</a>
          <a
            href="/products/create"
            class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"
          >
              Add Product
          </a>
      </nav>
    </div>
  </div>
</div>
<div class="container min-w-full">
  
    {{-- @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
    @endif --}}
  
    @yield('content')
</div>
  
@yield('scripts')
     
</body>
</html>