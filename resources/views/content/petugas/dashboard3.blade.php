<html lang="en">
    
    <x-petugas.app title="Menu Transaksi">

        <!-- Main Content -->
        <div class="w-full lg:w-2/4 p-4">
         <div class="flex justify-between items-center mb-4">
          <h2 class="text-xl font-semibold">
           Transaksi
          </h2>

          <div class="flex items-center rounded-lg p-2 w-full lg:w-1/2">
                <!-- Input Pencarian -->
            <div class="flex items-center border rounded-lg p-2 w-full">
                <input 
                    id="searchInput"
                    class="p-2 border-none outline-none w-full" 
                    placeholder="Search a product by name or barcode" 
                    type="text"
                    onkeyup="searchProduct()"
                />
                <i id="searchIcon" class="fas fa-search text-gray-500 ml-2 cursor-pointer"></i>
            </div>

            <!-- Hasil Pencarian -->
            <div id="searchResultsContainer" class="relative">
                <ul id="searchResults" class="absolute left-0 bg-white shadow-lg rounded-lg mt-2 max-h-60 overflow-y-auto z-50 hidden px-2 py-1 w-auto min-w-[200px]"></ul>
            </div>
          </div>
        </div>
        <div class="flex justify-center">
            <div id="reader" style="width: 500px"></div>
        </div>
        <p>Result: <span id="result"></span></p>

        <!-- Tambahkan elemen audio -->
        <audio
            id="successSound"
            src="{{asset('sounds/scanner_beep.mp3')}}"
            
        ></audio>
         <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @if ($products->count() > 0)
                @foreach ($products as $produk)
                    <div class="bg-white p-4 rounded-lg shadow-md relative">
                        <!-- Label Kategori -->
                        <span class="absolute top-2 left-2 bg-yellow-500 text-white text-xs font-semibold px-2 py-1 rounded">
                            {{ $produk->kategori->nama_kategori ?? 'Uncategorized' }}
                        </span>
                        <img alt="{{ $produk->nama_produk }}" class="rounded-lg mb-2" height="200" src="{{ asset('storage/' . $produk->foto_produk) }}" width="300"/>
                        <h3 class="text-lg font-semibold">{{ $produk->nama_produk }}</h3>

                        <div class="flex justify-between items-center">
                            <div>
                                @php
                                    $harga_awal = $produk->harga_jual;
                                    $harga_setelah_diskon = $produk->harga_jual - ($produk->harga_jual * ($produk->diskon ?? 0) / 100);
                                    $harga_setelah_potongan = $produk->harga_jual - ($produk->potongan_harga ?? 0);
                                @endphp

                                @if ($produk->diskon > 0 || $produk->potongan_harga > 0)
                                    <span class="text-sm text-red-500 line-through">
                                        Rp{{ number_format($harga_awal, 0, ',', '.') }}
                                    </span>
                                @endif

                                <span class="text-lg font-semibold text-gray-900">
                                    @if ($produk->diskon > 0)
                                        Rp{{ number_format($harga_setelah_diskon, 0, ',', '.') }}
                                    @elseif ($produk->potongan_harga > 0)
                                        Rp{{ number_format($harga_setelah_potongan, 0, ',', '.') }}
                                    @else
                                        Rp{{ number_format($harga_awal, 0, ',', '.') }}
                                    @endif
                                </span>

                                @if ($produk->diskon > 0)
                                    <span class="text-xs bg-green-500 text-white px-2 py-1 rounded ml-2">
                                        Diskon {{ $produk->diskon }}%
                                    </span>
                                @elseif ($produk->potongan_harga > 0)
                                    <span class="text-xs bg-blue-500 text-white px-2 py-1 rounded ml-2">
                                        Potongan Rp{{ number_format($produk->potongan_harga, 0, ',', '.') }}
                                    </span>
                                @endif
                            </div>

                            <!-- Tombol Tambah Produk -->
                            <button class="bg-blue-500 text-white p-2 rounded-lg" 
                                onclick="addProductToOrder({
                                    id: '{{ $produk->id_produk }}',
                                    nama: '{{ $produk->nama_produk }}',
                                    harga: '{{ $produk->harga_jual }}',
                                    diskon_persen: '{{ $produk->diskon ?? 0 }}',
                                    diskon_nominal: '{{ $produk->potongan_harga ?? 0 }}',
                                    gambar: '{{ asset('storage/' . $produk->foto_produk) }}'
                                })">
                                +
                            </button>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-gray-500 text-center mt-4">Tidak ada produk dalam kategori ini.</p>
            @endif
        </div>
        </div>
        <!-- Order Summary -->
        <div x-data="{ showPayment: false }"
        class="w-full lg:w-1/2 bg-white p-4 rounded-lg shadow-md">
           <!-- Header -->
            <div  class="flex justify-between items-center mb-4">
                @php
                    $orderNumber = now()->setTimezone('Asia/Jakarta')->format('YmdHis') . rand(100, 999);
                @endphp

                <!-- Informasi Member -->
                <div>
                    <h2 class="text-xl font-semibold">Member</h2>
                    <p class="text-gray-500">Order #{{ $orderNumber }} | Transaksi</p>
                    <p class="text-gray-500" id="currentTime"></p>
                </div>

                <!-- Informasi Petugas -->
                <div class="flex items-center">
                <img
                    alt="Profile picture"
                    class="w-12 h-12 rounded-full mr-4"
                    src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('storage/public/profiles/default.png') }}"
                    width="100" height="100"
                />
                <div class="text-right">
                    <h2 class="text-xl font-semibold">{{ Auth()->user()->usernama }} </h2>
                    <p class="text-gray-500">Petugas Kasir</p>
                </div>
                </div>
            </div>
            <h3 class="text-lg font-semibold mb-4">Order Detail</h3>
            <ul id="order-list" class="mb-4">

            </ul>
            <div class="flex justify-between items-center mb-4">
                <span class="text-3xl font-semibold">Total</span>
                <span class="text-3xl font-semibold" id="total-harga">Rp 0</span>
            </div>

            <button @click="showPayment = true; updateModalOrder();" class="bg-yellow-500 text-white w-full p-2 rounded-lg">
            Proceed Order
            </button>
             <!-- Modal Pembayaran -->
            <div x-show="showPayment" x-transition class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center w-full h-full p-4">
                <div class="bg-white rounded-lg shadow-lg w-full max-w-4.5xl p-4 max-h-[80vh] overflow-y-auto">
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-2xl font-bold">
                            Jaya Cashier Payment
                        </h1>
                 </h1>
                 <div class="flex items-center space-x-4">
                    <div class="relative w-80">
                        <input id="search" class="border rounded-lg px-4 py-2 w-full" placeholder="Search member..." type="text" />
                        <button id="searchButton"><i class="fas fa-search absolute right-3 top-3 text-gray-500"></i></button>
                        
                        <ul id="searchResults" class="absolute bg-white shadow-lg rounded-lg mt-2 w-full max-h-40 overflow-y-auto z-50 hidden"></ul>
                    </div>
                    <!-- <div id="selectedMember" class="mt-4"></div> -->
                    
                  <!-- <i class="fas fa-wifi text-green-500"></i> -->
                  <button class="bg-orange-500 text-white px-4 py-2 rounded-lg">
                   Select Table
                  </button>
                 </div>
                </div>
                <!-- konte modal -->
                <div class="flex space-x-4">
                    <!-- bagian order -->
                 <div class="w-1/2 bg-white rounded-lg shadow p-4 max-h-[70vh] overflow-y-auto">
                  <button @click="showPayment = false" class="text-orange-500 mb-4">
                   <i class="fas fa-arrow-left"> </i>
                   Back
                  </button>
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold">Order ID: {{ $orderNumber }}</h3>
                        <p id="selectedMember"></p>
                        <button id="redeemPointsButton" class="bg-yellow-500 text-white px-4 py-1 rounded-lg hidden">
                            Tukar Poin
                        </button>
                    </div>
                    <!-- Modal Tukar Poin -->
                    <div id="redeemModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center w-full h-full p-4 hidden">
                        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-4">
                            <h2 class="text-lg font-semibold mb-2">Tukar Poin</h2>
                            <p>Anda memiliki <span id="currentPoints">0</span> poin.</p>
                            <!-- <p>Setiap 50 poin bisa ditukar dengan diskon Rp5000.</p> -->
                            <p><strong>Poin yang bisa ditukar:</strong> <span id="redeemablePoints">0</span></p>
                            <p><strong>Sisa poin setelah tukar:</strong> <span id="remainingPoints">0</span></p>
                            <p>Anda bisa mendapatkan diskon <span id="calculatedDiscount">0</span></p>
                            <div class="flex space-x-4 mt-4">
                                <button id="confirmRedeem" class="bg-green-500 text-white px-4 py-2 rounded-lg">
                                    Oke
                                </button>
                                <button id="closeRedeemModal" class="bg-gray-500 text-white px-4 py-2 rounded-lg">
                                    Batal
                                </button>
                            </div>
                        </div>
                    </div>

                  <div class="border-t border-b py-2">
                    <ul id="modal-order-list">
                        <!-- Produk akan ditampilkan di sini -->
                    </ul>
                  </div>
                  <div class="py-2">
                   <div class="flex justify-between py-2">
                    <p>Subtotal</p>
                    <p>Rp <span id="modal-subtotal">0</span></p>
                   </div>
                   <div class="flex justify-between py-2">
                    <p >Member Discount</p>
                    <p><span  id="discountMember">0</span></p>
                   </div>
                   <div class="flex justify-between py-2 font-bold">
                    <p> Grand Total </p>
                    <p><span id="modal-grand-total">0</span></p>
                   </div>
                  </div>
                  <div class="flex space-x-4 mt-4">
                   <button onclick="confirmPayment()" class="bg-green-500 text-white w-1/2 py-2 rounded-lg">
                    <i class="fas fa-check"> </i>
                    Confirm Payment
                   </button>
                   <button id="print-receipt" class="bg-blue-500 text-white w-1/2 py-2 rounded-lg">
                    <i class="fas fa-print"> </i>
                    Cetak Nota
                   </button>
                  </div>
                 </div>
                 <!-- Bagian Pembayaran -->
                 <div class="w-1/2 bg-white rounded-lg shadow p-4 max-h-[70vh] overflow-y-auto">
                  <div class="flex justify-between items-center mb-4">
                   <div>
                    <p class="text-gray-500"> Payable Amount </p>
                    <p class="text-2xl font-bold text-green-500"><span id="payable-amount">0</span></p>
                   </div>
                    <div class="mb-4">
                        <label class="text-gray-500">Change (Kembalian)</label>
                        <p class="text-2xl font-bold text-red-500"><span id="change-amount">0</span></p>
                    </div>
                
                   <div class="flex items-center space-x-2">
                    <img alt="User profile picture" class="rounded-full" height="40" src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('storage/public/profiles/default.png') }}" width="40"/>
                    <div>
                     <p>{{ Auth()->user()->usernama }}</p>
                     <p class="text-gray-500"> Petugas Kasir </p>
                    </div>
                    <!-- <i class="fas fa-trash text-gray-500"> </i> -->
                   </div>
                  </div>
                  <div class="flex border-b mb-4">
                   <button class="w-1/2 py-2 text-center border-r text-orange-500"> Cash </button>
                   <button class="w-1/2 py-2 text-center text-gray-500"> Other Modes </button>
                  </div>
                  <div class="mb-4">
                   <input id="input-payment" class="w-full border rounded-lg px-4 py-2 text-2xl text-center" type="text" placeholder="Masukkan nominal pembayaran"/>
                  </div>
                  <div class="grid grid-cols-3 gap-4 mb-4">
                   <button class="bg-gray-200 py-4 text-xl">  1 </button>
                   <button class="bg-gray-200 py-4 text-xl"> 2 </button>
                   <button class="bg-gray-200 py-4 text-xl"> 3 </button>
                   <button class="bg-gray-200 py-4 text-xl"> 4 </button>
                   <button class="bg-gray-200 py-4 text-xl"> 5 </button>
                   <button class="bg-gray-200 py-4 text-xl"> 6 </button>
                   <button class="bg-gray-200 py-4 text-xl"> 7 </button>
                   <button class="bg-gray-200 py-4 text-xl"> 8 </button>
                   <button class="bg-gray-200 py-4 text-xl"> 9 </button>
                   <button class="bg-gray-200 py-4 text-xl"> 00 </button>
                   <button class="bg-gray-200 py-4 text-xl">
                    <i class="fas fa-backspace"> </i>
                   </button>
                   <button class="bg-gray-200 py-4 text-xl"> . </button>
                  </div>
                  <button  @click="showPayment = false"  class="bg-gray-200 py-4 text-xl w-full">
                   Cancel
                  </button>
                 </div>
                </div>
            </div>
        </div>
    </x-petugas.app>
  </div>
  <script>
    //bagian nota
    document.getElementById("print-receipt").addEventListener("click", function () {
        let orderId = "{{ $orderNumber }}";
        let pelanggan = document.getElementById("selectedMember")?.innerText || "Umum";
        let subtotal = document.getElementById("modal-subtotal").innerText;
        let diskon = document.getElementById("discountMember").innerText;
        let grandTotal = document.getElementById("modal-grand-total").innerText;
        let bayar = document.getElementById("input-payment").value;
        let kembalian = document.getElementById("change-amount").innerText;

        let items = [];
        document.querySelectorAll("#modal-order-list li").forEach(item => {
            let nama_produk = item.innerText.split("-")[0].trim();
            let harga = item.getAttribute("data-subtotal");
            let jumlah = item.getAttribute("data-quantity");
            let harga_saat_transaksi = parseFloat(item.getAttribute("data-harga")) || 0;
            let potongan_saat_transaksi = parseFloat(item.getAttribute("data-potongan")) || 0;
            let diskon_saat_transaksi = parseFloat(item.getAttribute("data-diskon")) || 0;
            items.push({ nama_produk,harga_saat_transaksi, potongan_saat_transaksi, diskon_saat_transaksi, jumlah, harga });
        });

        let dataNota = {
            orderId: orderId,
            pelanggan: pelanggan,
            subtotal: subtotal,
            diskon: diskon,
            grandTotal: grandTotal,
            bayar: bayar,
            kembalian: kembalian,
            items: items
        };

        // Simpan data ke sessionStorage
        sessionStorage.setItem("notaTransaksi", JSON.stringify(dataNota));

        // Arahkan ke halaman nota
        window.location.href = "/nota";
    });
    //bagian paymant
    function confirmPayment() {
        console.log("Mengonfirmasi pembayaran...");
        let modalGrandTotal = document.getElementById("modal-grand-total");
        let inputPayment = document.getElementById("input-payment");
        let modalOrderList = document.querySelector("#modal-order-list");

        console.log("modal-grand-total:", modalGrandTotal);
        console.log("input-payment:", inputPayment);
        console.log("modal-order-list:", modalOrderList);

        if (!modalGrandTotal || !inputPayment || !modalOrderList) {
            console.error("Salah satu elemen tidak ditemukan!");
            return;
        }
        //kode trnsaksi tetap berjalan kerika semua elemen tersedia
        let totalHarga = parseFloat(modalGrandTotal.innerText.replace("Rp", "").replace(".", "").trim());
        let bayar = parseFloat(inputPayment.value);
        let kembalian = bayar - totalHarga;
    
        if (isNaN(bayar) || bayar < totalHarga) {
            alert("Nominal pembayaran tidak cukup!");
            return;
        }
    
        let items = [];
        modalOrderList.querySelectorAll("li").forEach((item) => {
            let id_produk = item.getAttribute("data-id");
            let jumlah = parseInt(item.getAttribute("data-quantity"));
            let subtotal = parseFloat(item.getAttribute("data-subtotal"));
            let harga_saat_transaksi = parseFloat(item.getAttribute("data-harga")) || 0;
            let potongan_saat_transaksi = parseFloat(item.getAttribute("data-potongan")) || 0;
            let diskon_saat_transaksi = parseFloat(item.getAttribute("data-diskon")) || 0;
            if (id_produk && jumlah && subtotal) {
                items.push({ id_produk, harga_saat_transaksi, potongan_saat_transaksi, diskon_saat_transaksi, jumlah, subtotal });
            }
        });
        let id_pelanggan = window.getSelectedMemberId() || null; // Ambil id pelanggan
        let diskonMember = getMemberDiscount(); // Ambil diskon dari poin member
        let data = {
            id_penjualan: "{{ $orderNumber }}",
            id_pelanggan: id_pelanggan, // Atur sesuai dengan data pelanggan jika ada
            diskon: diskonMember, // Tambahkan diskon jika ada
            total_harga: totalHarga,
            bayar: bayar,
            kembalian: kembalian,
            items: items
        };
    
        fetch("/transaksi/store", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(result => {
            console.log("Response dari server:", result);  // Cek isi respon di console
            if (result.message === "Transaksi berhasil disimpan") {
                alert("Pembayaran berhasil!");
                location.reload();
            } else {
                alert("Terjadi kesalahan: " + result.message);
            }
            //try {
                //let jsonResult = JSON.parse(result);  // Coba parse sebagai JSON
                //if (jsonResult.message === "Transaksi berhasil disimpan") {
                    //alert("Pembayaran berhasil!");
                    //location.reload();
                //} else {
                    //alert("Terjadi kesalahan: " + jsonResult.message);
                //}
            //} catch (error) {
                //console.error("Respon bukan JSON, mungkin terjadi error di backend:", error);
                //alert("Terjadi kesalahan di server. Cek konsol untuk detail.");
            //}
        })
        .catch(error => console.error("Error:", error));
    }

    //bagian search member    
    document.addEventListener("DOMContentLoaded", function () {
        const inputPayment = document.getElementById("input-payment");
        const payableAmountElement = document.getElementById("payable-amount");
        const changeAmountElement = document.getElementById("change-amount");
    
        inputPayment.addEventListener("input", function () {
            let payableAmount = parseInt(payableAmountElement.textContent.replace(/\D/g, "")) || 0;
            let paymentAmount = parseInt(inputPayment.value.replace(/\D/g, "")) || 0;
            let change = paymentAmount >= payableAmount ? (paymentAmount - payableAmount) : 0;
    
            changeAmountElement.textContent = `Rp ${change.toLocaleString("id-ID")}`;
        });
    });
    let selectecMemberId = null; // Variabel global untuk menyimpan id_pelanggan
    $(document).ready(function () {
        function updateGrandTotal() {
            let subtotal = parseInt($('#modal-subtotal').text().replace(/\D/g, '')) || 0;
            // Simpan nilai awal Grand Total sebelum diskon
            if (initialGrandTotal === 0) {
                initialGrandTotal = subtotal;
            }
             // Jika member tidak dipilih, diskon = 0
            let discount = selectedMemberId ? memberDiscount : 0;

            let grandTotal = initialGrandTotal - discount; // Hanya kurangi diskon jika ada member
            $('#modal-grand-total').text(`Rp${grandTotal.toLocaleString()}`);
            $('#payable-amount').text(`Rp${grandTotal.toLocaleString()}`);
        }
        let selectedMember = null;
        let memberDiscount = 0;
        let initialGrandTotal = 0; // Simpan grand total sebelum diskon
        // Event listener untuk input pencarian
        
        $('#search').on('input', function () {
            let query = $(this).val().trim();
            if (query.length > 0) {
                $.ajax({
                    url: '/petugas/search-member', // Endpoint pencarian
                    type: 'GET',
                    data: { query: query },
                    success: function (response) {
                        let dropdown = $('#searchResults');
                        dropdown.empty();
                        if (response.members.length > 0) {
                            response.members.forEach(member => {
                                dropdown.append(`
                                    <li class="p-2 hover:bg-gray-200 cursor-pointer" data-id="${member.id_pelanggan}" data-nama="${member.nama}" data-point="${member.point}">
                                        ${member.nama} - <span class="text-green-500">Point: ${member.point}</span>
                                    </li>
                                `);
                            });
                            dropdown.show();
                        } else {
                            dropdown.hide();
                        }
                    }
                });
            } else {
                $('#searchResults').hide();
            }
        });
    
        // Event listener untuk memilih member dari dropdown
        $(document).on('click', '#searchResults li', function () {
            selectedMemberId = $(this).data('id'); // Simpan id_pelanggan ke variabel global
            let nama = $(this).data('nama');
            let point = $(this).data('point');
            selectedMember = { id: selectedMemberId, nama, point };
            $('#search').val(nama);
            $('#searchResults').hide();
            // Tampilkan nama dan poin member yang dipilih
            $('#selectedMember').html(
                `<p><strong>Nama Member:</strong> ${selectedMember.nama}</p>
                <p><strong>Point:</strong> ${selectedMember.point}</p>`
            );

            // Tampilkan tombol "Tukar Poin" jika punya poin
            if (selectedMember.point >= 50) {
                $('#redeemPointsButton').removeClass('hidden');
            } else {
                $('#redeemPointsButton').addClass('hidden');
            }

            // **Pastikan memilih member tidak memotong Grand Total**
            updateGrandTotal();
        });
        // Pastikan selectedMember bisa diakses oleh confirmPayment()
        window.getSelectedMemberId = function () {
            return selectedMemberId;
        };
        window.getMemberDiscount = function () {
            return memberDiscount;
        };
        
        // Event listener untuk menampilkan modal tukar poin
        $('#redeemPointsButton').on('click', function () {
            if (selectedMember) {
                let points = selectedMember.point;
                let redeemablePoints = Math.floor(points / 50) * 50; // Hanya kelipatan 50 yang bisa ditukar
                let remainingPoints = points - redeemablePoints; // Sisa poin setelah ditukar
                let discount = (redeemablePoints / 50) * 5000; // 50 poin = Rp5000

                $('#currentPoints').text(points);
                $('#redeemablePoints').text(redeemablePoints);
                $('#remainingPoints').text(remainingPoints);
                $('#calculatedDiscount').text(`Rp${discount.toLocaleString()}`);

                $('#redeemModal').removeClass('hidden');
            }
        });
        
        // Event listener untuk menutup modal
        $('#closeRedeemModal').on('click', function () {
            $('#redeemModal').addClass('hidden');
        });

        // Event listener untuk konfirmasi tukar poin
        $('#confirmRedeem').on('click', function () {
            if (selectedMember) {
                let points = selectedMember.point;
                let redeemablePoints = Math.floor(points / 50) * 50;
                let remainingPoints = points - redeemablePoints;
                let discount = (redeemablePoints / 50) * 5000;
    
                memberDiscount = discount;
    
                $('#discountMember').text(`Rp${discount.toLocaleString()}`);
    
                selectedMember.point = remainingPoints;
                $('#selectedMember').html(
                    `<p><strong>Nama Member:</strong> ${selectedMember.nama}</p>
                     <p><strong>Point:</strong> ${selectedMember.point}</p>`
                );
    
                updateGrandTotal(); // Perbarui total setelah tukar poin
    
                $('#redeemModal').addClass('hidden');
    
                if (selectedMember.point < 50) {
                    $('#redeemPointsButton').addClass('hidden');
                }
            }
        });
        // Pastikan saat pertama kali halaman dimuat, Grand Total = Subtotal
        updateGrandTotal();
        // Event listener untuk menampilkan hasil pencarian setelah klik tombol search
        $('#searchButton').on('click', function () {
            if (selectedMember) {
                $('#selectedMember').html(
                    `<p><strong>Nama Member:</strong> ${selectedMember.nama}</p>
                     <p><strong>Point:</strong> ${selectedMember.point}</p>`
                );
            } else {
                alert('Silakan pilih member terlebih dahulu!');
            }
        });
    });
    
    

    function updateClock() {
        let now = new Date();
        let options = { weekday: 'short', month: 'short', day: 'numeric', year: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true };
        let formattedTime = now.toLocaleString('id-ID', options);
        
        document.getElementById("currentTime").textContent = formattedTime;
    }

    // Jalankan saat halaman dimuat
    updateClock();

    // Perbarui waktu setiap detik
    setInterval(updateClock, 1000);

    let selectedProduct = null;
    document.getElementById('searchInput').addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault(); // Mencegah form submit jika ada
            searchProduct(true); // Jalankan pencarian dengan mode scanner
        }
    });
    function searchProduct(isScanner = false) {
        let query = document.getElementById('searchInput').value.trim();
        let resultsContainer = document.getElementById('searchResults');
    
        if (query.length > 1) {
            fetch(`/search-product?q=${query}`)
                .then(response => response.json())
                .then(data => {
                    resultsContainer.innerHTML = '';
                    
                    if (data.length > 0) {
                        if (isScanner && data.length === 1) {
                            // Jika scanner hanya menemukan 1 hasil, otomatis pilih
                            selectProduct(data[0]);
                            addProductToOrder(data[0]);
                        } else {
                            resultsContainer.classList.remove('hidden');
                            data.forEach(product => {
                                let li = document.createElement('li');
                                li.className = "p-2 border-b cursor-pointer hover:bg-gray-100 whitespace-nowrap";
                                li.textContent = `${product.nama} - ${product.barcode}`;
                                li.onclick = () => selectProduct(product);
                                resultsContainer.appendChild(li);
                            });
                        }
                    } else {
                        alert("Produk tidak ditemukan!");
                        resultsContainer.classList.add('hidden');
                    }
                })
                .catch(error => console.error("Error fetching data:", error));
        } else {
            resultsContainer.classList.add('hidden');
        }
    }

    function selectProduct(product) {
        //alert(`Produk Dipilih: ${product.nama_produk}`);
        //addProductToOrder(product);
        selectedProduct = product;
        document.getElementById('searchInput').value = product.nama;
        document.getElementById('searchResults').classList.add('hidden');
    }

    document.getElementById('searchIcon').addEventListener('click', function() {
        let query = document.getElementById('searchInput').value.trim();
    
        if (!query) {
            alert("Silakan ketik nama produk atau pilih dari daftar!");
            return;
        }
    
        if (selectedProduct) {
            console.log("Menggunakan selectedProduct:", selectedProduct);
            addProductToOrder(selectedProduct);
            selectedProduct = null; // Reset setelah menambahkan
        } else {
            console.log("Mencari produk berdasarkan query:", query);
    
            fetch(`/search-product?q=${query}`)
                .then(response => response.json())
                .then(data => {
                    console.log("Hasil pencarian:", data);
    
                    if (data.length === 1) {
                        selectedProduct = data[0];
                        console.log("Produk yang dipilih otomatis:", selectedProduct);
                        addProductToOrder(selectedProduct);
                    } else if (data.length > 1) {
                        alert("Silakan pilih produk dari daftar hasil pencarian.");
                    } else {
                        alert("Produk tidak ditemukan, silakan pilih dari daftar!");
                    }
                })
                .catch(error => console.error("Error fetching data:", error));
        }
    });
                
    //dari livewire
    //document.addEventListener("DOMContentLoaded", function () {
        //Livewire.on("produkDikirim", function (product) {
            //console.log("Produk diterima di dashboard:", product);
            //addProductToOrder(product);
        //});
    //});
    
    let totalHarga = 0;
    function onScanSuccess(decodedText, decodedResult) {
        document.getElementById("result").textContent = decodedText;

        const successSound = document.getElementById('successSound');
        successSound.play();

        // Kirim permintaan AJAX untuk mencari produk berdasarkan barcode
        fetch(`/get-product/${decodedText}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    addProductToOrder(data.product);
                } else {
                    alert("Produk tidak ditemukan!");
                }
            })
            .catch(error => console.error("Error:", error));
    }

    function onScanError(errorMessage) {
        console.log(errorMessage);
    }

    var html5QrcodeScanner = new Html5QrcodeScanner("reader", {
        fps: 10,
        qrbox: 250,
    });

    html5QrcodeScanner.render(onScanSuccess, onScanError);

    function addProductToOrder(product) {
        // Tambahkan produk ke dalam keranjang belanja
        const orderList = document.getElementById("order-list");
        const modalOrderList = document.getElementById("modal-order-list");
        let existingProduct = document.querySelector(`[data-id='${product.id}']`);
    
        let hargaAsli = parseInt(product.harga.replace('.', ''));
        let hargaSetelahDiskon = hargaAsli - (hargaAsli * (product.diskon_persen || 0) / 100);
        hargaSetelahDiskon -= product.diskon_nominal || 0;
        hargaSetelahDiskon = Math.max(hargaSetelahDiskon, 0); // Pastikan harga tidak negatif

        let adaDiskon = product.diskon_persen > 0 || product.diskon_nominal > 0;
    
        if (existingProduct) {
            // Jika produk sudah ada di Order Detail, tambah jumlahnya
            let qtySpan = existingProduct.querySelector(".qty");
            let qty = parseInt(qtySpan.innerText.replace('x', '')) + 1;
            qtySpan.innerText = `x${qty}`;
            
            if (adaDiskon){
                // Perbarui harga sebelum diskon (harga coret)
                let strikePriceSpan = existingProduct.querySelector(".strike-price");
                strikePriceSpan.innerText = `Rp ${(qty * hargaAsli).toLocaleString('id-ID')}`;
            }
    
            // Perbarui subtotal harga setelah diskon
            let subtotalSpan = existingProduct.querySelector(".subtotal");
            subtotalSpan.innerText = (qty * hargaSetelahDiskon).toLocaleString('id-ID');
            // Perbarui juga di modal pembayaran
            updateModalOrder();
        } else {
            // Jika belum ada, tambahkan produk ke daftar
            let listItem = document.createElement("li");
            listItem.className = "flex justify-between items-center mb-2";
            listItem.setAttribute("data-id", product.id);
            listItem.setAttribute("data-quantity", "1"); // Default jumlah awal
            listItem.setAttribute("data-subtotal", hargaSetelahDiskon); // Harga awal setelah diskon
            listItem.setAttribute("data-harga", hargaAsli);
            listItem.setAttribute("data-potongan", product.diskon_nominal || 0);
            listItem.setAttribute("data-diskon", product.diskon_persen || 0);


            let strikePriceHTML = adaDiskon ? `<span class="strike-price" style="text-decoration: line-through; color: gray;">Rp ${hargaAsli.toLocaleString('id-ID')}</span>` : "";

            listItem.innerHTML = `
                <div class="flex items-center">
                    <img alt="${product.nama}" class="w-12 h-12 rounded-full mr-4" src="${product.gambar}" width="50" height="50"/>
                    <div>
                        <span>${product.nama}</span>
                        ${adaDiskon ? `<div style="color: red;">Diskon: Rp ${product.diskon_persen ? product.diskon_persen.toLocaleString('id-ID') : 0}%</div>` : ""}
                        ${adaDiskon ? `<div style="color: red;">Potongan Harga: ${product.diskon_nominal ? product.diskon_nominal.toLocaleString('id-ID') : 0}</div>` : ""}
                    </div>
                </div>
                <div class="flex items-center">
                    <button class="bg-gray-200 text-gray-700 p-1 rounded-lg" onclick="decreaseQty(${product.id})">-</button>
                    <span class="mx-2 qty">x1</span>
                    <button class="bg-gray-200 text-gray-700 p-1 rounded-lg" onclick="increaseQty(${product.id})">+</button>
                </div>
                <div>
                    ${strikePriceHTML}
                    <span>Rp <span class="subtotal">${hargaSetelahDiskon.toLocaleString('id-ID')}</span></span>
                </div>
            `;
            orderList.appendChild(listItem);
            // Perbarui juga di modal pembayaran
            updateModalOrder();
        }
        updateTotal();
    }
    

    function increaseQty(id) {
        let item = document.querySelector(`[data-id='${id}']`);
        let qtySpan = item.querySelector(".qty");
        let qty = parseInt(qtySpan.innerText.slice(1)) + 1;
        qtySpan.innerText = `x${qty}`;

         // Cek apakah ada elemen strike-price (harga coret)
        let strikePriceSpan = item.querySelector(".strike-price");
        if (strikePriceSpan) {
            let hargaAsli = parseInt(strikePriceSpan.innerText.replace(/\D/g, '')) / (qty - 1);
            strikePriceSpan.innerText = `Rp ${(qty * hargaAsli).toLocaleString('id-ID')}`;
        }
        // Hitung total harga setelah diskon
        let hargaPerItem = parseInt(item.getAttribute("data-subtotal")) / (qty - 1);
        let subtotal = qty * hargaPerItem;
        item.querySelector(".subtotal").innerText = subtotal.toLocaleString('id-ID');
        // Perbarui atribut data
        item.setAttribute("data-quantity", qty);
        item.setAttribute("data-subtotal", subtotal);
        updateTotal();
    }

    function decreaseQty(id) {
        let item = document.querySelector(`[data-id='${id}']`);
        let qtySpan = item.querySelector(".qty");
        let qty = parseInt(qtySpan.innerText.slice(1)) - 1;


        if (qty > 0) {
            qtySpan.innerText = `x${qty}`;
             // Cek apakah ada elemen strike-price (harga coret)
            let strikePriceSpan = item.querySelector(".strike-price");
            if (strikePriceSpan) {
                let hargaAsli = parseInt(strikePriceSpan.innerText.replace(/\D/g, '')) / (qty + 1);
                strikePriceSpan.innerText = `Rp ${(qty * hargaAsli).toLocaleString('id-ID')}`;
            }

            // Perbarui subtotal harga setelah diskon
            let hargaPerItem = parseInt(item.getAttribute("data-subtotal")) / (qty + 1);
            let subtotal = qty * hargaPerItem;
            item.querySelector(".subtotal").innerText = subtotal.toLocaleString('id-ID');
            updateTotal(hargaPerItem, -1);
            // Perbarui atribut data
            item.setAttribute("data-quantity", qty);
            item.setAttribute("data-subtotal", subtotal);
        } else {
            item.remove(); // Hapus produk dari daftar jika qty = 0
        }
        updateTotal();
    }

    function updateTotal(harga, qty) {
        let totalHarga = 0;
        document.querySelectorAll("#order-list li").forEach(item  => {
            let harga = parseInt(item.querySelector(".subtotal").innerText.replace(/\./g, ''));
            totalHarga += harga;
        });
        document.getElementById("total-harga").innerText = `Rp ${totalHarga.toLocaleString('id-ID')}`;
    }

    function updateModalOrder() {
        let orderList = document.getElementById("order-list");
        let modalOrderList = document.getElementById("modal-order-list");
        let modalSubtotal = document.getElementById("modal-subtotal");
        modalOrderList.innerHTML = ""; // Kosongkan dulu
        
        let totalHarga = 0;
        orderList.querySelectorAll("li").forEach(item => {
            let clone = item.cloneNode(true); // Salin elemen dari order summary
            modalOrderList.appendChild(clone);

            let hargaItem = parseInt(clone.querySelector(".subtotal").innerText.replace(/\./g, ''));
            totalHarga += hargaItem;
        });
        modalSubtotal.innerText = totalHarga.toLocaleString('id-ID');
    }
    
</script>
 </body>
</html>