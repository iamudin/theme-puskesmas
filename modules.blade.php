<?php
use_module([
'link-terkait' => ['active'=>true,'form'=>['category'=>true],'web'=>['sortable'=>true]],
'download' => ['web'=>['auto_query'=>true]],
'faq'=>['active'=>true],
'kepegawaian'=>['web'=>['detail'=>true]]
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