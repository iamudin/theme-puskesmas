<?php
use_module([
'download' => ['web'=>['auto_query'=>true]],
'kepegawaian'=>['web'=>['detail'=>true],
]
]);

$config['option'] = ['Jadwal Rawat Jalan'=>[
  ['Rawat Jalan Senin Kamis', 'text'],
  ['Rawat Jalan Jumat', 'text'],
  ['Rawat Jalan Sabtu', 'text']
],
'Jadwal Pendaftaran'=>[
  ['Pendaftaran Senin Kamis', 'text'],
  ['Pendaftaran Jumat', 'text'],
  ['Pendaftaran Sabtu', 'text'],
],
'Jadwal Rawat Inap'=>[
  ['Rawat Inap', 'text']
]
];

if(!function_exists('logo_upt')){
  function logo_upt($text){
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

    return [$instansi,$lokasi];
  }
}