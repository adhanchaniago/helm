<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'HomeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// login
// $route['home']['get'] = 'AduanController/home';
// $route['login']['POST'] = 'aduanController/index';
// $route['masuk']['get'] = 'aduanController/masuk';
// $route['logout']['GET'] = 'aduanController/logout';

// Backend/login
$route['admin']['GET'] = 'Backend/HomeController/index';
$route['admin/aksilogin']['POST'] = 'Backend/HomeController/index';
$route['admin/login']['GET'] = 'Backend/HomeController/login';
$route['admin/masuk']['get'] = 'Backend/HomeController/masuk';
$route['admin/logout']['GET'] = 'Backend/HomeController/logout';

// backend/registrasi
$route['admin/registrasi']['GET'] = 'Backend/HomeController/registrasi';
$route['admin/aksiregistrasi']['POST'] = 'Backend/HomeController/aksiregistrasi';

// backend/home
$route['admin/dashboard']['GET'] = 'Backend/HomeController/home';

// Backend/merk
$route['admin/merk']['GET'] = 'Backend/MerkController/tampilMerk';
$route['admin/merk/tambah']['GET'] = 'Backend/MerkController/tambahMerk';
$route['admin/merk/add']['POST'] = 'Backend/MerkController/addMerk';
$route['admin/merk/edit/(:num)']['GET'] = 'Backend/MerkController/editMerk/$1';
$route['admin/merk/update']['POST'] = 'Backend/MerkController/updateMerk/';
$route['admin/merk/hapus/(:num)']['GET'] = 'Backend/MerkController/hapusMerk/$1';


// Backend/kategori
$route['admin/kategori']['GET'] = 'Backend/KategoriController/tampilKategori';
$route['admin/kategori/tambah']['GET'] = 'Backend/KategoriController/tambahKategori';
$route['admin/kategori/add']['POST'] = 'Backend/KategoriController/addKategori';
$route['admin/kategori/edit/(:num)']['GET'] = 'Backend/KategoriController/editKategori/$1';
$route['admin/kategori/update']['POST'] = 'Backend/KategoriController/updateKategori/';
$route['admin/kategori/hapus/(:num)']['GET'] = 'Backend/KategoriController/hapusKategori/$1';


// Backend/merk
$route['admin/merk']['GET'] = 'Backend/MerkController/tampilMerk';
$route['admin/merk/tambah']['GET'] = 'Backend/MerkController/tambahMerk';
$route['admin/merk/add']['POST'] = 'Backend/MerkController/addMerk';
$route['admin/merk/edit/(:num)']['GET'] = 'Backend/MerkController/editMerk/$1';
$route['admin/merk/update']['POST'] = 'Backend/MerkController/updateMerk/';
$route['admin/merk/hapus/(:num)']['GET'] = 'Backend/MerkController/hapusMerk/$1';

// Backend/ukuran
$route['admin/ukuran']['GET'] = 'Backend/UkuranController/tampilUkuran';
$route['admin/ukuran/tambah']['GET'] = 'Backend/UkuranController/tambahUkuran';
$route['admin/ukuran/add']['POST'] = 'Backend/UkuranController/addUkuran';
$route['admin/ukuran/edit/(:num)']['GET'] = 'Backend/UkuranController/editUkuran/$1';
$route['admin/ukuran/update']['POST'] = 'Backend/UkuranController/updateUkuran/';
$route['admin/ukuran/hapus/(:num)']['GET'] = 'Backend/UkuranController/hapusUkuran/$1';

// Backend/warna
$route['admin/warna']['GET'] = 'Backend/WarnaController/tampilWarna';
$route['admin/warna/tambah']['GET'] = 'Backend/WarnaController/tambahWarna';
$route['admin/warna/add']['POST'] = 'Backend/WarnaController/addWarna';
$route['admin/warna/edit/(:num)']['GET'] = 'Backend/WarnaController/editWarna/$1';
$route['admin/warna/update']['POST'] = 'Backend/WarnaController/updateWarna/';
$route['admin/warna/hapus/(:num)']['GET'] = 'Backend/WarnaController/hapusWarna/$1';


// Backend/supplier
$route['admin/supplier']['GET'] = 'Backend/SupplierController/tampilSupplier';
$route['admin/supplier/tambah']['GET'] = 'Backend/SupplierController/tambahSupplier';
$route['admin/supplier/add']['POST'] = 'Backend/SupplierController/addSupplier';
$route['admin/supplier/edit/(:num)']['GET'] = 'Backend/SupplierController/editSupplier/$1';
$route['admin/supplier/update']['POST'] = 'Backend/SupplierController/updateSupplier/';
$route['admin/supplier/hapus/(:num)']['GET'] = 'Backend/SupplierController/hapusSupplier/$1';

// Backend/produk
$route['admin/produk']['GET'] = 'Backend/ProdukController/tampilProduk';
$route['admin/produk/tambah']['GET'] = 'Backend/ProdukController/tambahProduk';
$route['admin/produk/add']['POST'] = 'Backend/ProdukController/addProduk';
$route['admin/produk/edit/(:num)']['GET'] = 'Backend/ProdukController/editProduk/$1';
$route['admin/produk/update']['POST'] = 'Backend/ProdukController/updateProduk/';
$route['admin/produk/hapus/(:num)']['GET'] = 'Backend/ProdukController/hapusProduk/$1';

// Backend/gambar
$route['admin/produk/gambar/(:num)']['GET'] = 'Backend/GambarController/tampilGambar/$1';
$route['admin/produk/gambar/tambah']['GET'] = 'Backend/GambarController/tambahGambar';
$route['admin/produk/gambar/add']['POST'] = 'Backend/GambarController/addGambar';
$route['admin/produk/gambar/edit/(:num)']['GET'] = 'Backend/GambarController/editGambar/$1';
$route['admin/produk/gambar/update']['POST'] = 'Backend/GambarController/updateGambar/';
$route['admin/produk/gambar/hapus/(:num)']['GET'] = 'Backend/GambarController/hapusGambar/$1';


// Backend/slider
$route['admin/slide']['GET'] = 'Backend/SlideController/tampilSlide';
$route['admin/slide/tambah']['GET'] = 'Backend/SlideController/tambahSlide';
$route['admin/slide/add']['POST'] = 'Backend/SlideController/addSlide';
$route['admin/slide/edit/(:num)']['GET'] = 'Backend/SlideController/editSlide/$1';
$route['admin/slide/update']['POST'] = 'Backend/SlideController/updateSlide/';
$route['admin/slide/hapus/(:num)']['GET'] = 'Backend/SlideController/hapusSlide/$1';
