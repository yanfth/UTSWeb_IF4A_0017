const pilihanMenu = document.getElementById('pilihan-menu');
const jumlahPorsi = document.getElementById('jumlah-porsi');
const totalHargaDisplay = document.getElementById('total-harga');

function hitungTotal() {
  const harga = parseInt(pilihanMenu.value);
  const porsi = parseInt(jumlahPorsi.value) || 0;
  const total = harga * porsi;

  totalHargaDisplay.innerText = "Rp " + total.toLocaleString('id-ID');
}

pilihanMenu.addEventListener('change', hitungTotal);
jumlahPorsi.addEventListener('input', hitungTotal);

const filterButtons = document.querySelectorAll('.btn-filter');
const menuItems = document.querySelectorAll('.menu-item');