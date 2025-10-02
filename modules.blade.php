<?php
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
      