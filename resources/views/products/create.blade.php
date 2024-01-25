@extends('layout')

@section('content')
<div class="container mx-auto p-4">
    <div class="max-w-lg mx-auto bg-white p-4 border shadow-lg">
        @if ($errors->any())
            <div class="w-full mb-6 bg-red-400 p-4">
                <strong>Whoops!</strong> There were some problems with your input.
                <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        
        @if (isset($product))
            <h2 class="text-2xl font-bold mb-6">Edit a Product</h2>
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Product Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Product Name:</label>
                    <input type="text" name="name" id="name" class="w-full border border-b border-solid border-grey-300 rounded" value="{{ $product->name }}" required>
                </div>

                <!-- Product Price -->
                <div class="mb-4">
                    <label for="price" class="block text-sm font-semibold text-gray-700 mb-1">Price:</label>
                    <input type="number" name="price" id="price" class="form-input w-full border border-gray-300 rounded" step="0.01" value="{{ $product->price }}" required>
                </div>

                <!-- Product Description -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Description:</label>
                    <textarea name="description" id="description" class="form-textarea w-full border border-gray-300 rounded" rows="3">{{ $product->description }}</textarea>
                </div>

                <!-- Shipping Cost -->
                <div class="mb-4">
                    <label for="shipping_cost" class="block text-sm font-semibold text-gray-700 mb-1">Shipping Cost:</label>
                    <input type="number" name="shipping_cost" id="shipping_cost" class="form-input w-full border border-gray-300 rounded" step="0.01" value="{{ $product->shipping_cost }}">
                </div>

                <!-- Feature Image Upload and Preview -->
                <div class="mb-4">
                    <label for="feature_image" class="block text-sm font-semibold text-gray-700 mb-1">Feature Image</label>
                    <input type="file" name="feature_image" id="feature_image" class="hidden" accept="image/*">
                    <div>
                        <div id="feature_image_preview" class="mb-1">
                            <img src="/storage/{{ $product->feature_image }}" class="w-20 h-20 object-cover">
                        </div>
                        <label for="feature_image" class="cursor-pointer bg-blue-500 text-white py-[2px] px-2 rounded">Browse</label>
                    </div>
                </div>

                <!-- Gallery Image Upload and Preview (Repeat as needed) -->
                <div class="mb-4">
                    <label for="gallery_images" class="block text-sm font-semibold text-gray-700 mb-1">Gallery Image</label>
                    <input type="file" name="gallery_images[]" id="gallery_images" class="hidden" accept="image/*" multiple>
                    <div>
                        <div id="gallery_image_preview" class="w-full overflow-x-auto flex mb-1">
                            @foreach ($gallery_images as $image)
                                <img src="/storage/{{ $image->file_name }}" class="w-20 h-20 object-cover mr-2">
                            @endforeach
                        </div>
                        <label for="gallery_images" class="cursor-pointer bg-blue-500 text-white py-[2px] px-2 rounded">Browse</label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="cancel()">Cancel</button>
                </div>
            </form>
        @else
            <h2 class="text-2xl font-bold mb-6">Create a New Product</h2>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Product Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Product Name:</label>
                    <input type="text" name="name" id="name" class="w-full border border-b border-solid border-grey-300 rounded" required>
                </div>

                <!-- Product Price -->
                <div class="mb-4">
                    <label for="price" class="block text-sm font-semibold text-gray-700 mb-1">Price:</label>
                    <input type="number" name="price" id="price" class="form-input w-full border border-gray-300 rounded" step="0.01" required>
                </div>

                <!-- Product Description -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Description:</label>
                    <textarea name="description" id="description" class="form-textarea w-full border border-gray-300 rounded" rows="3"></textarea>
                </div>

                <!-- Shipping Cost -->
                <div class="mb-4">
                    <label for="shipping_cost" class="block text-sm font-semibold text-gray-700 mb-1">Shipping Cost:</label>
                    <input type="number" name="shipping_cost" id="shipping_cost" class="form-input w-full border border-gray-300 rounded" step="0.01">
                </div>

                <!-- Feature Image Upload and Preview -->
                <div class="mb-4">
                    <label for="feature_image" class="block text-sm font-semibold text-gray-700 mb-1">Feature Image</label>
                    <input type="file" name="feature_image" id="feature_image" class="hidden" accept="image/*">
                    <div>
                        <div id="feature_image_preview" class="mb-1"></div>
                        <label for="feature_image" class="cursor-pointer bg-blue-500 text-white py-[2px] px-2 rounded">Browse</label>
                    </div>
                </div>

                <!-- Gallery Image Upload and Preview (Repeat as needed) -->
                <div class="mb-4">
                    <label for="gallery_images" class="block text-sm font-semibold text-gray-700 mb-1">Gallery Image</label>
                    <input type="file" name="gallery_images[]" id="gallery_images" class="hidden" accept="image/*" multiple>
                    <div>
                        <div id="gallery_image_preview" class="w-full overflow-x-auto flex mb-1"></div>
                        <label for="gallery_images" class="cursor-pointer bg-blue-500 text-white py-[2px] px-2 rounded">Browse</label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Product</button>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="cancel()">Cancel</button>
                </div>
            </form>
        @endif
    </div>
</div>

<script>
    document.getElementById('feature_image').addEventListener('change', function() {
        var preview = document.getElementById('feature_image_preview');
        preview.innerHTML = '';

        var file = this.files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('w-20', 'h-20', 'object-cover');
                preview.appendChild(img);
            }

            reader.readAsDataURL(file);
        }
    });

    document.getElementById('gallery_images').addEventListener('change', function() {
        var preview = document.getElementById('gallery_image_preview');
        preview.innerHTML = '';

        var files = this.files;

        for (var i = 0; i < files.length; i++) {
            var file = files[i];

            var reader = new FileReader();

            reader.onload = function(e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('w-20', 'h-20', 'object-cover', 'mr-2');
                preview.appendChild(img);
            }

            reader.readAsDataURL(file);
        }
    });

    function cancel() {
        window.history.back();
    }
</script>
@endsection
