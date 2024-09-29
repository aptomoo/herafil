// Toggle class active untuk hamburger menu
const navbarNav = document.querySelector('.navbar-nav');
// ketika hamburger menu di klik
document.querySelector('#hamburger-menu').onclick = () => {
  navbarNav.classList.toggle('active');
};

// Toggle class active untuk search form
const searchForm = document.querySelector('.search-form');
const searchBox = document.querySelector('#search-box');

document.querySelector('#search-button').onclick = (e) => {
  searchForm.classList.toggle('active');
  searchBox.focus();
  e.preventDefault();
};

// Toggle class active untuk shopping cart
const shoppingCart = document.querySelector('.shopping-cart');
document.querySelector('#shopping-cart-button').onclick = (e) => {
  shoppingCart.classList.toggle('active');
  e.preventDefault();
};

// Klik di luar elemen
const hm = document.querySelector('#hamburger-menu');
const sb = document.querySelector('#search-button');
const sc = document.querySelector('#shopping-cart-button');

document.addEventListener('click', function (e) {
  if (!hm.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove('active');
  }

  if (!sb.contains(e.target) && !searchForm.contains(e.target)) {
    searchForm.classList.remove('active');
  }

  if (!sc.contains(e.target) && !shoppingCart.contains(e.target)) {
    shoppingCart.classList.remove('active');
  }
});

// Script untuk menampilkan detail produk dalam modal box
const itemDetailModal = document.querySelector('#item-detail-modal');
const itemDetailButtons = document.querySelectorAll('.item-detail-button');

itemDetailButtons.forEach((btn) => {
  btn.addEventListener('click', (e) => {
    e.preventDefault();
    const productData = JSON.parse(btn.closest('.produk-content').querySelector('.product-data').value);
    const productName = productData.nama_menu;
    const productImage = "img/" + productData.gambar;
    const productDescription = productData.deskripsi;
    const productPrice = productData.harga;

    // Mengisi konten modal dengan detail produk
    document.getElementById('modal-product-image').src = productImage;
    document.getElementById('modal-product-name').textContent = productName;
    document.getElementById('modal-product-description').textContent = productDescription;
    document.getElementById('modal-product-price').textContent = 'Rp. ' + productPrice;

    // Menampilkan modal
    itemDetailModal.style.display = 'flex';
  });
});


// Klik tombol close modal
document.querySelector('.modal .close-icon').onclick = () => {
  itemDetailModal.style.display = 'none';
};

// Klik di luar modal
window.onclick = (e) => {
  if (e.target === itemDetailModal) {
    itemDetailModal.style.display = 'none';
  }
};





