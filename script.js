// === 1. SELEKSI ELEMEN DOM (Wajib di paling atas) ===
const pilihanMenu = document.getElementById('calc-menu') || document.getElementById('pilihan-menu');
const jumlahPorsi = document.getElementById('calc-qty') || document.getElementById('jumlah-porsi');
const totalHargaDisplay = document.getElementById('calc-total') || document.getElementById('total-harga');

const filterButtons = document.querySelectorAll('.btn-filter');
const menuItems = document.querySelectorAll('.menu-item');
const calcMenu = document.getElementById('calc-menu');
const calcQty = document.getElementById('calc-qty');
const calcTotal = document.getElementById('calc-total');


// === 2. LOGIKA FITUR KALKULATOR TOTAL ORDER ===
function hitungTotal() {
  if (!pilihanMenu || !jumlahPorsi || !totalHargaDisplay) return;
  
  const harga = parseInt(pilihanMenu.value) || 0;
  const porsi = parseInt(jumlahPorsi.value) || 0;
  const total = harga * porsi;

  totalHargaDisplay.innerText = "Rp " + total.toLocaleString('id-ID');
}

// Event Listener untuk Kalkulator
if (pilihanMenu && jumlahPorsi) {
  pilihanMenu.addEventListener('change', hitungTotal);
  jumlahPorsi.addEventListener('input', hitungTotal);
}


// === 3. LOGIKA FITUR FILTER KATEGORI MENU ===
filterButtons.forEach(button => {
  button.addEventListener('click', () => {
    // Menghapus kelas aktif dari tombol lain dan tambah ke tombol yang diklik
    filterButtons.forEach(btn => btn.classList.remove('active'));
    button.classList.add('active');
    
    const targetCategory = button.getAttribute('data-category');

    // Logika memperbarui manipulasi DOM pada list menu
    menuItems.forEach(item => {
      const itemCategory = item.getAttribute('data-category');
      if (targetCategory === 'semua' || targetCategory === itemCategory) {
        item.classList.remove('hide');
      } else {
        item.classList.add('hide');
      }
    });
  }); 
});

// Selesai! Kode duplikat di bawah baris ini yang sebelumnya error sudah dihapus bersih.