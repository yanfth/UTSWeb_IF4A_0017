const pilihanMenu =
  document.getElementById("calc-menu") ||
  document.getElementById("pilihan-menu");
const jumlahPorsi =
  document.getElementById("calc-qty") ||
  document.getElementById("jumlah-porsi");
const totalHargaDisplay =
  document.getElementById("calc-total") ||
  document.getElementById("total-harga");

const filterButtons = document.querySelectorAll(".btn-filter");
const menuItems = document.querySelectorAll(".menu-item");
const calcMenu = document.getElementById("calc-menu");
const calcQty = document.getElementById("calc-qty");
const calcTotal = document.getElementById("calc-total");

function hitungTotal() {
  if (!pilihanMenu || !jumlahPorsi || !totalHargaDisplay) return;

  const harga = parseInt(pilihanMenu.value) || 0;
  const porsi = parseInt(jumlahPorsi.value) || 0;
  const total = harga * porsi;

  totalHargaDisplay.innerText = "Rp " + total.toLocaleString("id-ID");
}

function hitungEstimasi() {
  const harga = parseInt(calcMenu.value);
  const qty = parseInt(calcQty.value) || 0;
  const total = harga * qty;

  calcTotal.innerText = "Rp " + total.toLocaleString("id-ID");
}

if (pilihanMenu && jumlahPorsi) {
  pilihanMenu.addEventListener("change", hitungTotal);
  jumlahPorsi.addEventListener("input", hitungTotal);
}

filterButtons.forEach((button) => {
  button.addEventListener("click", () => {
    filterButtons.forEach((btn) => btn.classList.remove("active"));
    button.classList.add("active");

    const targetCategory = button.getAttribute("data-category");

    menuItems.forEach((item) => {
      const itemCategory = item.getAttribute("data-category");
      if (targetCategory === "semua" || targetCategory === itemCategory) {
        item.classList.remove("hide");
      } else {
        item.classList.add("hide");
      }
    });
  });
});

calcMenu.addEventListener("change", hitungEstimasi);
calcQty.addEventListener("input", hitungEstimasi);

document
  .getElementById("contact-form")
  .addEventListener("submit", function (e) {
    e.preventDefault();
    const nama = document.getElementById("form-nama").value;
    alert("Halo " + nama + ", pesan Anda berhasil dikirim! Terima kasih.");
    this.reset();
  });
