<!DOCTYPE html>
<html>
<head>
    <title>Data Product</title>
    <style>
        table{
            border-collapse: collapse;
            width: 80%;
        }

        th, td{
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th{
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>Data Product</h2>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Category</th>
            <th>Brand</th>
        </tr>

        @foreach($products as $product)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->nama_produk }}</td>
            <td>Rp {{ number_format($product->harga,0,',','.') }}</td>
            <td>{{ $product->category->nama_category }}</td>
            <td>{{ $product->brand->nama_brand }}</td>
        </tr>
        @endforeach

    </table>

</body>
</html>