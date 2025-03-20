<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Transaksi</title>
    <style>
        body { 
            font-family: 'Courier New', Courier, monospace; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
            background-color: #f8f8f8;
        }
        .receipt-container { 
            width: 320px; 
            padding: 15px; 
            border: 2px solid black; 
            background: white; 
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            border-radius: 8px;
        }
        .title { font-size: 20px; font-weight: bold; margin-bottom: 5px; }
        .info, .total { font-size: 14px; margin: 5px 0; }
        .items { text-align: left; margin-top: 10px; font-size: 14px; }
        .total { font-size: 16px; font-weight: bold; }
        .button-container { margin-top: 15px; }
        button { 
            padding: 8px 15px; 
            font-size: 14px; 
            border: none; 
            cursor: pointer; 
            border-radius: 5px; 
            margin: 5px;
        }
        .btn-print { background-color: #28a745; color: white; }
        .btn-back { background-color: #dc3545; color: white; }
    </style>
</head>
<body onload="printNota()">
    <div class="receipt-container">
        <p class="title">JayaMart</p>
        <p class="info">Order ID: <span id="order-id"></span></p>
        <p class="info">Pelanggan: <span id="pelanggan"></span></p>
        <hr>
        <div class="items" id="items-list"></div>
        <hr>
        <p class="total">Subtotal: Rp<span id="subtotal"></span></p>
        <p class="total">Diskon: Rp<span id="diskon"></span></p>
        <p class="total">Total: Rp<span id="grand-total"></span></p>
        <p class="total">Bayar: Rp<span id="bayar"></span></p>
        <p class="total">Kembalian: Rp<span id="kembalian"></span></p>
        <hr>
        <p>Terima Kasih! Selamat Belanja Kembali</p>
    </div>
    
    <div class="button-container">
        <button class="btn-print" onclick="window.print()">Cetak Lagi</button>
        <button class="btn-back" onclick="window.history.back()">Kembali</button>
    </div>
    <script>
        function printNota() {
            // Ambil data dari sessionStorage
            let data = JSON.parse(sessionStorage.getItem("notaTransaksi"));
            if (!data) {
                alert("Data transaksi tidak ditemukan!");
                window.close();
                return;
            }

            // Tampilkan data di halaman
            document.getElementById("order-id").innerText = data.orderId;
            document.getElementById("pelanggan").innerText = data.pelanggan;
            document.getElementById("subtotal").innerText = data.subtotal;
            document.getElementById("diskon").innerText = data.diskon;
            document.getElementById("grand-total").innerText = data.grandTotal;
            document.getElementById("bayar").innerText = data.bayar;
            document.getElementById("kembalian").innerText = data.kembalian;

            let itemsHtml = "";
            data.items.forEach(item => {
                itemsHtml += `<p>${item.nama_produk} x${item.jumlah} - Rp${item.harga}</p>`;
            });
            document.getElementById("items-list").innerHTML = itemsHtml;

            // Cetak otomatis saat halaman terbuka
            setTimeout(() => {
                window.print();
            }, 500);
        }
    </script>
</body>
</html>
