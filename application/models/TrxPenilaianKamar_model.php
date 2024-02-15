<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TrxPenilaianKamar_model extends CI_Model
{   
    public function getNilaiKamarPerMonthById($id)
    {
        $this->db->select('kamarId, kriteriaId, nilai, createdAt');
        $this->db->from('trx_penilaian_kamar');
        $this->db->where("MONTH(createdAt) = MONTH(CURRENT_DATE())");
        return $this->db->where('kamarId', $id)->get();
    }
    public function getNilaiKamarPerYearById($id)
    {
        $this->db->select('kamarId, kriteriaId, nilai, createdAt');
        $this->db->from('trx_penilaian_kamar');
        $this->db->where("YEAR(createdAt) = YEAR(CURRENT_DATE())");
        return $this->db->where('kamarId', $id)->get();
    }

    public function getRankKamarByMonthParams($id, $month, $year)
    {
        dd($month);
        $this->db->select('kamarId, kriteriaId, nilai, createdAt');
        $this->db->from('trx_penilaian_kamar');
        $this->db->where("MONTH(createdAt)",$month);
        $this->db->where("YEAR(createdAt)",$year);
        return $this->db->where('kamarId', $id)->get();
    }

    public function getRankKamarByMonth()
    {
        $dataKamar = $this->MasterKamar_model->getListDataKamar()->result();
        $data = collect($dataKamar)->map(function ($item) {
			$getNilaiKamar = collect($this->getNilaiKamarPerMonthById($item->kamarId)->result())->reduce(function ($i,$v) {
				return $i + $v->nilai;
			});
			
			return [
				'kamarId' => $item->kamarId,
                'namaAsrama' => $item->namaAsrama,
                'namaKamar' => $item->namaKamar,
                'aliasKamar' => $item->aliasKamar,
                'pembinaKamar' => $item->namaPembina,
				'jumlahNilai' => $getNilaiKamar,
				'createdAt' => date('Y-m', strtotime($item->createdAt))
			];
		});
        return $data;
    }

    public function getRankKamarByMonthReport($month, $year)
    {
        $dataKamar = $this->MasterKamar_model->getListDataKamar()->result();
        $data = collect($dataKamar)->map(function ($item) use($month,$year) {
			$getNilaiKamar = collect($this->getRankKamarByMonthParams($item->kamarId,$month, $year)->result())->reduce(function ($i,$v) {
				return $i + $v->nilai;
			});
			return [
				'kamarId' => $item->kamarId,
                'namaAsrama' => $item->namaAsrama,
                'namaKamar' => $item->namaKamar,
                'aliasKamar' => $item->aliasKamar,
                'pembinaKamar' => $item->namaPembina,
				'jumlahNilai' => $getNilaiKamar,
				'createdAt' => date('Y-m', strtotime($item->createdAt))
			];
		});
        return $data;
    }

    public function getRankKamarByYear()
    {
        $dataKamar = $this->MasterKamar_model->getListDataKamar()->result();
        $data = collect($dataKamar)->map(function ($item) {
			$getNilaiKamar = collect($this->getNilaiKamarPerYearById($item->kamarId)->result())->reduce(function ($i,$v) {
				return $i + $v->nilai;
			});
			
			return [
				'kamarId' => $item->kamarId,
                'namaAsrama' => $item->namaAsrama,
                'namaKamar' => $item->namaKamar,
                'aliasKamar' => $item->aliasKamar,
                'pembinaKamar' => $item->namaPembina,
				'jumlahNilai' => $getNilaiKamar,
				'createdAt' => date('Y-m', strtotime($item->createdAt))
			];
		});
        return $data;
    }
}