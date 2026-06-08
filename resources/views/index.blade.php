
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistem Manajemen Puding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">PUDDING</a>

            <div class="d-flex align-items-center ms-auto gap-2">
                <button
                    class="btn btn-outline-warning btn-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#wishlistModal"
                >
                    ⭐ Wishlist (<span id="wishlist-count">0</span>)
                </button>
                <button id="btn-theme" class="btn btn-outline-light btn-sm">
                    Mode Gelap
                </button>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            Logout
                        </button>
                    </form>
            </div>
        </div>
    </nav>

    <div id="hero" class="hero text-center text-white d-flex align-items-center">
        <div class="container">
        <h1>COFFE SHOP PUDING</h1>
        <p>rasakan kelembutan dan manisnya melimpah di mulut</p>
    </div>
</div>

    <div class="container mt-5">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card dashboard-card">
                    <div class="card-body">
                        <h5>Total Produk</h5>
                        <h2>12</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card dashboard-card">
                    <div class="card-body">
                        <h5>Stok Tersedia</h5>
                        <h2>85</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card dashboard-card">
                    <div class="card-body">
                        <h5>Kategori</h5>
                        <h2>3</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row" id="container-barang">

        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100">

                @if($product->gambar)
                    <img src="{{ asset('storage/' . $product->gambar) }}"
                        class="card-img-top"
                        style="height:250px; object-fit:cover;">
                @endif

                <div class="card-body">

                    <h5>{{ $product->nama_produk }}</h5>

                    <p>Rp {{ number_format($product->harga,0,',','.') }}</p>

                    <p>Kategori: {{ $product->category->nama_category }}</p>
                    <p>Brand: {{ $product->brand->nama_brand }}</p>

                    <div class="d-flex gap-2 mb-2">
                        <button class="btn btn-warning btn-sm edit-btn"
                                data-id="{{ $product->id }}">
                            Edit
                        </button>

                        <form action="{{ route('products.destroy', $product->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus?')">
                                Delete
                            </button>
                        </form>
                    </div>

                    <!-- FORM EDIT -->
                    <div id="edit-form-{{ $product->id }}"
                        style="display:none;">

                        <form method="POST"
                            action="{{ route('products.update', $product->id) }}"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <input type="text" name="nama_produk"
                                value="{{ $product->nama_produk }}"
                                class="form-control mb-2">

                            <input type="number" name="harga"
                                value="{{ $product->harga }}"
                                class="form-control mb-2">

                            <select name="category_id" class="form-control mb-2">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->nama_category }}
                                    </option>
                                @endforeach
                            </select>

                            <select name="brand_id" class="form-control mb-2">
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->brand_id }}"
                                        {{ $product->brand_id == $brand->brand_id ? 'selected' : '' }}>
                                        {{ $brand->nama_brand }}
                                    </option>
                                @endforeach
                            </select>

                            <input type="file" name="gambar" class="form-control mb-2">

                            <button class="btn btn-success btn-sm">
                                Update
                            </button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>

    <div class="modal fade" id="wishlistModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">⭐ Daftar Wishlist Saya</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group" id="daftar-wishlist">
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-danger" onclick="hapusWishlist()">Kosongkan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5" id="form-pesanan">
        <h3 class="mb-4">Tambah Pesanan</h3>
        <div class="card p-4">
            <form method="POST"
                action="{{ route('products.store') }}"
                enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label>Nama Produk</label>
                    <input type="text"
                        name="nama_produk"
                        class="form-control">
                </div>

                <div class="mb-3">
                <label>Harga</label>
                <input type="number"
                    name="harga"
                    class="form-control"
                    placeholder="Contoh: 10000">
            </div>

                <div class="mb-3">
                    <label>Kategori</label>

                    <select name="category_id"
                            class="form-control">

                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->nama_category }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label>Brand</label>

                    <select name="brand_id"
                            class="form-control">

                        @foreach($brands as $brand)
                            <option value="{{ $brand->brand_id }}">
                                {{ $brand->nama_brand }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label>Gambar Produk</label>

                    <input type="file"
                        name="gambar"
                        class="form-control">
                </div>

                <button type="submit"
                        class="btn btn-success">
                    Simpan
                </button>

            </form>
        </div>
    </div>

    <footer class="bg-dark text-white text-center p-3">
        &copy; 2026 Sistem Manajemen Puding. All rights reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                let id = this.getAttribute('data-id');

                let form = document.getElementById('edit-form-' + id);

                if (form.style.display === 'none') {
                    form.style.display = 'block';
                } else {
                    form.style.display = 'none';
                }
            });
        });
    </script>   
</body>
</html>