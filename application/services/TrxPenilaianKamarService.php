<?php
namespace application\services;
class TrxPenilaianKamarService {
    public function __construct() {
        // Lakukan inisialisasi atau pengaturan awal di sini
        $this->load->model('MasterKamar_model');
    }

    public function getRankKamarPerMonth() {
        // Logika bisnis atau fungsi yang ingin Anda masukkan di sini
        $listDataKamar = $this->MasterKamar_model->getListDataKamar()->result();
        $mapKamar = collect($listDataKamar);
        dd($mapKamar);
        $dataKamar = collect($this->TrxPenilaianKamar_model->getNilaiKamarById(1)->result())->map(function($item) {
			return $item;
		});
    }
}