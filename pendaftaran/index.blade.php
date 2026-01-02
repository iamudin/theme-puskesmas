                                                    <section class="max-w-7xl mx-auto p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
  <!-- Kolom Berita Utama (2/3 lebar) -->
  <div class="md:col-span-2 space-y-6">
    <!-- Daftar Berita -->
    <div class="grid gap-6">
      <!-- Card Berita -->
      <h3 class="text-xl font-bold text-green-800"> <i class="fa fa-newspaper"></i> Daftar Berita</h3>

      <!-- Card Berita lainnya -->
      <div class="bg-white shadow-md rounded-xl p-4 ">
		  @isset($_POST['kirim'])
              @php 
                      $field = [
                            'alamat'=>request('alamat'),
                            'nohp'=>request('nohp')
                  ];
                     $data =  query()->create([
                          'type'=>'pendaftaran',
                        'user_id'=>1,
                          'title'=>request('nama'),
                          'data_field'=> $field
                      ]);

                      if($data && request()->hasFile('surat_keterangan')){
                        $field['surat_keterangan'] = $data->addFile([
                            'file'=>request()->file('surat_keterangan'),
                            'purpose'=>'file milik '.str(request('nama')),
                            'mime_type'=>['image/png','image/jpeg']
                      ]);
                      $gambar = $field['surat_keterangan'];
                      $data->update(['data_field'=>$field,'media'=>$gambar]);
                      }
              @endphp
              <script>
                window.location.href='{{url()->current()}}';
              </script>
          @endisset
		  <form action="" method="post" enctype="multipart/form-data">
			  @csrf
			  <input name="nama">
			  <input name="alamat">
			  <input name="nohp">
			  <input type="file" name="surat_keterangan">
			  <button type="submit" name="kirim">Kirim</button>
		  </form>
  </div>
  </div>
  </div>

  <!-- Sidebar: Berita Terbaru, Pengumuman, Agenda -->
</section>
                                                    