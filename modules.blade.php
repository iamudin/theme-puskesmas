<?php
<<<<<<< HEAD
use_module([
  'download' => ['web' => ['auto_query' => true]],
  'kepegawaian' => [
    'web' => ['detail' => true],
  ]
]);


if (!function_exists('logo_upt')) {
  function logo_upt($text)
  {
=======
if(!function_exists('logo_upt')){
  function logo_upt($text){
>>>>>>> 9bd7cbb5818c1035ad399d0a200fca65d7290d4d
    $prefix = "UPT Puskesmas";

    // pastikan ada prefix "UPT Puskesmas"
    if (stripos($text, $prefix) === 0) {
      $instansi = $prefix;
      // ambil sisa kalimat setelah "UPT Puskesmas"
      $lokasi = trim(substr($text, strlen($prefix)));
    } else {
      // fallback kalau format tidak sesuai
      $instansi = $text;
      $lokasi = '';
    }

    return [$instansi, $lokasi];
  }
<<<<<<< HEAD
}



add_route('admin', [
  'title' => 'Pendaftaran Anggota',
  'name' => 'pendaftaran',
  'icon' => 'fa-list',
  'path' => 'pendaftaran',
  'method' => ['get'],
  'function' => 'index',
  'controller' => \App\Http\Controllers\DataController::class,
  'show_in_sidebar' => true,
]);
add_route('admin', [
  'title' => 'Pendaftaran Guru',
  'name' => 'pendaftaran.guru',
  'icon' => 'fa-list',
  'path' => 'pendaftaran-guru',
  'method' => ['get'],
  'function' => 'index',
  'controller' => \App\Http\Controllers\DataController::class,
  'show_in_sidebar' => true,
]);
add_route('admin', [
  'title' => 'Pendaftaran Guru',
  'name' => 'pendaftaran.guru',
  'icon' => 'fa-list',
  'path' => 'pendaftaran-guru',
  'method' => ['get'],
  'function' => 'index',
  'controller' => \App\Http\Controllers\DataController::class,
  'show_in_sidebar' => true,
]);

add_route('admin', [
  'title' => 'Lihat',
  'name' => 'pendaftaran',
  'icon' => 'fa-list',
  'path' => 'pendaftaran/show',
  'method' => ['get'],
  'function' => 'index',
  'controller' => \App\Http\Controllers\DataController::class,
  'show_in_sidebar' => false,
]);

add_route('public', [
  'name' => 'register.user',
  'path' => 'pendaftaran',
  'method' => ['get'],
  'function' => 'fungsisaya',
  'controller' => \App\Http\Controllers\DataController::class,
]);



add_option('jadwal_pelayanan',
  array(
    ['Rawat Jalan', 'break'],
    ['rawat_jalan_senin_kamis', 'text'],
    ['rawat_jalan_jumat', 'text'],
    ['rawat_jalan_sabtu', 'text'],
    ['Pendaftaran', 'break'],
    ['pendaftaran_senin_kamis', 'text'],
    ['pendaftaran_jumat', 'text'],
    ['pendaftaran_sabtu', 'text'],
    ['IGD', 'text']
  )
);

add_option(
  'profile_puskesmas',
  array(
    ['Rawat Jalan', 'break'],
    ['rawat_jalan_senin_kamis', 'text'],
    ['rawat_jalan_jumat', 'text'],
    ['rawat_jalan_sabtu', 'text'],
    ['Pendaftaran', 'break'],
    ['pendaftaran_senin_kamis', 'text'],
    ['pendaftaran_jumat', 'text'],
    ['pendaftaran_sabtu', 'text'],
    ['IGD', 'text']
  )
);

add_option('template_asset',[
['background_header','file','image/png,image/jpeg']
]);
=======
  }

add_option('template_asset',
array(['Header Background','file','image/png,image/jpeg,image/webp'])
);
add_option('jadwal_pelayanan',[
  ['rawat_jalan', 'break'],
  ['rawat_jalan_senin_kamis', 'text'],
  ['rawat_jalan_jumat', 'text'],
  ['rawat_jalan_sabtu', 'text'],
  ['pendaftarn', 'break'],
  ['pendaftaran_senin_kamis', 'text'],
  ['pendaftaran_jumat', 'text'],
  ['pendaftarn_sabtu', 'text'],
  ['inap', 'text'],
  ['IGD', 'text']
]);
   use_module([
	   'layanan'=>true,
	   'sambutan'=>true,
	   'faq'=>['active'=>true],
	   'kepegawaian'=> ['form'=>[ 'custom_field' => [
                    ['NIP','text'],
                    ['Kelahiran','text'],
                    ['Jabatan','text'],
                    ['Pangkat/Golongan','text'],
                    ['Pendidikan','text'],
                    ['Tahun Mulai','text'],
                    ['Motivasi','textarea'],
                    ['Media Sosial', 'break'],
                    ['Facebook', 'text'],
                    ['Twitter', 'text'],
                    ['Instagram', 'text'],
                ]]]
   ]);
      
>>>>>>> 9bd7cbb5818c1035ad399d0a200fca65d7290d4d
