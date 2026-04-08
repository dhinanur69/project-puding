
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
                    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
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

    <div class="container mt-5" id="daftar-puding">
    <h3 class="mb-4">Daftar Puding</h3>
    <div class="row" id="container-barang"> <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('assets/CARAMEL.jpg') }}" class="card-img-top" alt="puding"/>
                <div class="card-body">
                    <h5 class="card-title">Caramel</h5>
                    <p class="card-text">Harga: Rp 499.000</p>
                    <p class="card-text">Stok: 10</p>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary w-50 me-2">Beli</button>
                        <button class="btn btn-outline-danger w-50">❤️ Wishlist</button>
                    </div>
                </div> </div> </div> <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('assets/CHOCOLATE.jpg') }}" class="card-img-top" alt="puding"/>
                <div class="card-body">
                    <h5 class="card-title">Chocolate</h5>
                    <p class="card-text">Harga: Rp 420.000</p>
                    <p class="card-text">Stok: 7</p>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary w-50 me-2">Beli</button>
                        <button class="btn btn-outline-danger w-50">❤️ Wishlist</button>
                    </div>
                </div> </div> </div> <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('assets/COCONAT.jpg') }}" class="card-img-top" alt="puding"/>
                <div class="card-body">
                    <h5 class="card-title">Coconat</h5>
                    <p class="card-text">Harga: Rp 329.000</p>
                    <p class="card-text">Stok: 10</p>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary w-50 me-2">Beli</button>
                        <button class="btn btn-outline-danger w-50">❤️ Wishlist</button>
                    </div>
                </div> 
            </div> 
        </div> 
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
            <form>
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" placeholder="Masukkan rasa puding" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" class="form-control" placeholder="Masukkan harga" />
                </div>
                <div class="mb-3">
                   
                <label class="form-label">Stok</label>
                    <input type="number" class="form-control" placeholder="Masukkan Stok" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select class="form-select">
                        <option>Dingin</option>
                        <option>Panas</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>

    <footer class="bg-dark text-white text-center p-3">
        &copy; 2026 Sistem Manajemen Puding. All rights reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>