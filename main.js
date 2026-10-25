document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const kodeInput = document.getElementById("kode");
    const jumlahInput = document.getElementById("jumlah");

    // 1. Validasi Formulir Saat Disubmit
    form.addEventListener("submit", function (event) {
        let isValid = true;
        let errorMessage = "";

        // Validasi Kode Barang: Wajib diawali "BRG-"
        const kodeValue = kodeInput.value.trim();
        if (!kodeValue.startsWith("BRG-")) {
            isValid = false;
            errorMessage += "Kode Barang harus diawali dengan prefiks 'BRG-' (Contoh: BRG-001).\n";
        }

        // Validasi Jumlah Barang: Harus numerik positif (> 0)
        const jumlahValue = parseInt(jumlahInput.value);
        if (isNaN(jumlahValue) || jumlahValue <= 0) {
            isValid = false;
            errorMessage += "Jumlah Barang harus berupa angka positif lebih dari 0.\n";
        }

        if (!isValid) {
            alert("Validasi Gagal:\n\n" + errorMessage);
            event.preventDefault(); // Mencegah form terkirim jika tidak valid
        } else {
            alert("Berhasil! Formulir sukses divalidasi.");
        }
    });

    // 2. Fitur Interaksi DOM: Pencarian/Filter Tabel Real-Time
    const inventarisSection = document.getElementById("inventaris");
    
    // Membuat elemen input pencarian secara dinamis di atas tabel
    const searchWrapper = document.createElement("div");
    searchWrapper.style.marginBottom = "15px";
    searchWrapper.innerHTML = `
        <label for="searchBar" style="font-weight: bold; display: block; margin-bottom: 5px;">Cari Barang:</label>
        <input type="text" id="searchBar" placeholder="Ketik nama atau kode barang..." style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
    `;
    
    const table = inventarisSection.querySelector("table");
    inventarisSection.insertBefore(searchWrapper, table);

    const searchBar = document.getElementById("searchBar");
    searchBar.addEventListener("keyup", function () {
        const keyword = searchBar.value.toLowerCase();
        const rows = table.querySelectorAll("tbody tr");

        rows.forEach(row => {
            const textContent = row.textContent.toLowerCase();
            if (textContent.includes(keyword)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
});