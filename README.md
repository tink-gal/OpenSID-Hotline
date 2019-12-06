# OpenSID-Hotline-Widge
--------

1. Download File yang ada di folder donjo-app.
2. paste ke folder donjo-app website semua isinya
3. import hotline.sql di database openSID dengan phpmyadmin untuk membuat table hotline dan menambah baris di tabel system_modul
4. buka file Web_widget_model.php di folder donjo-app/models
5. tambahkan baris
		$data['hotline'] = $this->hotline_model->isi_hotline();
setelah 
	 	$data['widget_keuangan'] = $this->keuangan_grafik_model->widget_keuangan();
  
dan lihat baris paling atas
--> 		$this->load->model('keuangan_grafik_model');
tambahkan dibawahnya script
		$this->load->model('hotline_model');
6. simpan
