<form method="POST"
      action="{{ route('products.update', $product->id) }}"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <input type="text" name="nama_produk" value="{{ $product->nama_produk }}">
    <input type="number" name="harga" value="{{ $product->harga }}">

    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->nama_category }}
            </option>
        @endforeach
    </select>

    <select name="brand_id">
        @foreach($brands as $brand)
            <option value="{{ $brand->brand_id }}"
                {{ $product->brand_id == $brand->brand_id ? 'selected' : '' }}>
                {{ $brand->nama_brand }}
            </option>
        @endforeach
    </select>

    <input type="file" name="gambar">

    <button type="submit">Update</button>
</form>