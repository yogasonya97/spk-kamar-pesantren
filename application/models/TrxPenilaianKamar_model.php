<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TrxPenilaianKamar_model extends CI_Model
{   
    public function getDataTrxByUserWhere($where) 
    {
        $this->db->where($where);
        $this->db->where('DATE(createdAt) = DATE(CURRENT_DATE())', NULL, FALSE);
        return $this->db->get('trx_penilaian_kamar');
    }
    public function getNilaiKamarPerMonthById($id)
    {
        $jenisKelaminUser = $this->session->userdata('jenisKelamin');
        $this->db->select('trx_penilaian_kamar.kamarId, master_kamar.jenisKamar, kriteriaId, nilai, trx_penilaian_kamar.createdAt');
        $this->db->from('trx_penilaian_kamar');
        $this->db->join('master_kamar', 'trx_penilaian_kamar.kamarId = master_kamar.kamarId');
        if($this->session->userdata('role') != '1') {
            $this->db->where("master_kamar.jenisKamar = '{$jenisKelaminUser}'");
        }
        $this->db->where("MONTH(trx_penilaian_kamar.createdAt) = MONTH(CURRENT_DATE())");
        return $this->db->where('trx_penilaian_kamar.kamarId', $id)->get();
    }
    public function getNilaiKamarPerYearById($id)
    {
        $jenisKelaminUser = $this->session->userdata('jenisKelamin');

        $this->db->select('trx_penilaian_kamar.kamarId, master_kamar.jenisKamar, kriteriaId, nilai, trx_penilaian_kamar.createdAt');
        $this->db->from('trx_penilaian_kamar');
        $this->db->join('master_kamar', 'trx_penilaian_kamar.kamarId = master_kamar.kamarId');
        if($this->session->userdata('role') != '1') {
            $this->db->where("master_kamar.jenisKamar = '{$jenisKelaminUser}'");
        }
        $this->db->where("YEAR(trx_penilaian_kamar.createdAt) = YEAR(CURRENT_DATE())");
        return $this->db->where('trx_penilaian_kamar.kamarId', $id)->get();
    }

    public function getNilaiKamarByTodayParams($id)
    {
        $userIdSession = $this->session->userdata('user_id');
        $jenisKelaminUser = $this->session->userdata('jenisKelamin');
        $this->db->select('trx_penilaian_kamar.kamarId, master_kamar.jenisKamar, kriteriaId, nilai, trx_penilaian_kamar.createdAt');
        $this->db->from('trx_penilaian_kamar');
        $this->db->join('master_kamar', 'trx_penilaian_kamar.kamarId = master_kamar.kamarId');
        if($this->session->userdata('role') != '1') {
            $this->db->where("master_kamar.jenisKamar = '{$jenisKelaminUser}'");
        }
        $this->db->where("trx_penilaian_kamar.userIdInput = ".$userIdSession);
        $this->db->where("DATE(trx_penilaian_kamar.createdAt) = DATE(CURRENT_DATE())", NULL, FALSE);
        return $this->db->where('trx_penilaian_kamar.kamarId', $id)->get();
    }

    public function getNilaiKamarByWeekParams($id)
    {
        $userIdSession = $this->session->userdata('user_id');
        $jenisKelaminUser = $this->session->userdata('jenisKelamin');
        $this->db->select('trx_penilaian_kamar.kamarId, master_kamar.jenisKamar, kriteriaId, nilai, trx_penilaian_kamar.createdAt');
        $this->db->from('trx_penilaian_kamar');
        $this->db->join('master_kamar', 'trx_penilaian_kamar.kamarId = master_kamar.kamarId');
        if($this->session->userdata('role') != '1') {
            $this->db->where("master_kamar.jenisKamar = '{$jenisKelaminUser}'");
        }
        $this->db->where("trx_penilaian_kamar.userIdInput = ".$userIdSession);
        $this->db->where("WEEK(trx_penilaian_kamar.createdAt) = WEEK(CURRENT_DATE())", NULL, FALSE);
        return $this->db->where('trx_penilaian_kamar.kamarId', $id)->get();
    }

    public function getRankKamarByMonthParams($id, $month, $year)
    {
        $jenisKelaminUser = $this->session->userdata('jenisKelamin');
        $this->db->select('trx_penilaian_kamar.kamarId, master_kamar.jenisKamar, kriteriaId, nilai, trx_penilaian_kamar.createdAt');
        $this->db->from('trx_penilaian_kamar');
        $this->db->join('master_kamar', 'trx_penilaian_kamar.kamarId = master_kamar.kamarId');
        if($this->session->userdata('role') != '1') {
            $this->db->where("master_kamar.jenisKamar = '{$jenisKelaminUser}'");
        }
        $this->db->where("MONTH(trx_penilaian_kamar.createdAt)",$month);
        $this->db->where("YEAR(trx_penilaian_kamar.createdAt)",$year);
        return $this->db->where('trx_penilaian_kamar.kamarId', $id)->get();
    }

    public function getRankKamarByYearParams($id, $year)
    {
        $jenisKelaminUser = $this->session->userdata('jenisKelamin');
        $this->db->select('trx_penilaian_kamar.kamarId, master_kamar.jenisKamar, kriteriaId, nilai, trx_penilaian_kamar.createdAt');
        $this->db->from('trx_penilaian_kamar');
        $this->db->join('master_kamar', 'trx_penilaian_kamar.kamarId = master_kamar.kamarId');
        if($this->session->userdata('role') != '1') {
        $this->db->where("master_kamar.jenisKamar = '{$jenisKelaminUser}'");
        }
        $this->db->where("YEAR(trx_penilaian_kamar.createdAt)",$year);
        return $this->db->where('trx_penilaian_kamar.kamarId', $id)->get();
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
            if ($getNilaiKamar) {
                $data = [
                    'kamarId' => $item->kamarId,
                    'jenisKamar' => $item->jenisKamar,
                    'namaAsrama' => $item->namaAsrama,
                    'namaKamar' => $item->namaKamar,
                    'aliasKamar' => $item->aliasKamar,
                    'pembinaKamar' => $item->namaPembina,
                    'jumlahNilai' => $getNilaiKamar,
                    'createdAt' => date('Y-m', strtotime($item->createdAt))
                ];
            } else {
                $data = null;
            }
			return $data;
		});
        return collect(collect($data)->filter(function ($v) {
            return $v != null;
        }))->values();
    }

    public function getRankKamarByYearReport($year)
    {
        $dataKamar = $this->MasterKamar_model->getListDataKamar()->result();
        $data = collect($dataKamar)->map(function ($item) use($year) {
			$getNilaiKamar = collect($this->getRankKamarByYearParams($item->kamarId, $year)->result())->reduce(function ($i,$v) {
				return $i + $v->nilai;
			});
            if ($getNilaiKamar) {
                $data = [
                    'kamarId' => $item->kamarId,
                    'jenisKamar' => $item->jenisKamar,
                    'namaAsrama' => $item->namaAsrama,
                    'namaKamar' => $item->namaKamar,
                    'aliasKamar' => $item->aliasKamar,
                    'pembinaKamar' => $item->namaPembina,
                    'jumlahNilai' => $getNilaiKamar,
                    'createdAt' => date('Y-m', strtotime($item->createdAt))
                ];
            } else {
                $data = null;
            }
			return $data;
		});
        return collect(collect($data)->filter(function ($v) {
            return $v != null;
        }))->values();
    }

    public function validationNilaiWeekEntry($kamarId)
    {
        return $this->db->where("userIdInput", $this->session->userdata('user_id'))
        ->where("kamarId", $kamarId)
        ->where("WEEK(createdAt) = WEEK(CURRENT_DATE())", NULL, FALSE)
        ->get('trx_penilaian_kamar')
        ->result();
    }
    public function validationNilaiTodayEntry($kamarId)
    {
        return $this->db->where("userIdInput", $this->session->userdata('user_id'))
        ->where("kamarId", $kamarId)
        ->where("DATE(createdAt) = DATE(CURRENT_DATE())", NULL, FALSE)
        ->get('trx_penilaian_kamar')
        ->result();
    }

    public function getListNilaiKamarByToday()
    {
      
        $dataKamar = $this->MasterKamar_model->getListDataKamarByJenisKamarUser()->result();
        $data = collect($dataKamar)->map(function ($item) {
			$getNilaiKamar = collect($this->getNilaiKamarByTodayParams($item->kamarId)->result())->reduce(function ($i,$v) {
				return $i + $v->nilai;
			});
            if ($getNilaiKamar) {
                $data = [
                    'kamarId' => $item->kamarId,
                    'jenisKamar' => $item->jenisKamar == 'A' ? 'Ahkwat':'Ikhwan',
                    'namaAsrama' => $item->namaAsrama,
                    'namaKamar' => $item->namaKamar,
                    'aliasKamar' => $item->aliasKamar,
                    'namaPembina' => $item->namaPembina,
                    'jumlahNilai' => $getNilaiKamar,
                    'createdAt' => date('Y-m', strtotime($item->createdAt)),
                    'isNilai' => 1
                ];
            } else {
                $data = [
                    'kamarId' => $item->kamarId,
                    'jenisKamar' => $item->jenisKamar == 'A' ? 'Ahkwat':'Ikhwan',
                    'namaAsrama' => $item->namaAsrama,
                    'namaKamar' => $item->namaKamar,
                    'aliasKamar' => $item->aliasKamar,
                    'namaPembina' => $item->namaPembina,
                    'jumlahNilai' => 0,
                    'createdAt' => date('Y-m', strtotime($item->createdAt)),
                    'isNilai' => 0
                ];
            }
			return $data;
		});
        return collect($data)->values();
    }
    public function getListNilaiKamarByWeek()
    {
      
        $dataKamar = $this->MasterKamar_model->getListDataKamarByJenisKamarUser()->result();
        $data = collect($dataKamar)->map(function ($item) {
			$getNilaiKamar = collect($this->getNilaiKamarByWeekParams($item->kamarId)->result())->reduce(function ($i,$v) {
				return $i + $v->nilai;
			});
            if ($getNilaiKamar) {
                $data = [
                    'kamarId' => $item->kamarId,
                    'jenisKamar' => $item->jenisKamar == 'A' ? 'Ahkwat':'Ikhwan',
                    'namaAsrama' => $item->namaAsrama,
                    'namaKamar' => $item->namaKamar,
                    'aliasKamar' => $item->aliasKamar,
                    'namaPembina' => $item->namaPembina,
                    'jumlahNilai' => $getNilaiKamar,
                    'createdAt' => date('Y-m', strtotime($item->createdAt)),
                    'isNilai' => 1
                ];
            } else {
                $data = [
                    'kamarId' => $item->kamarId,
                    'jenisKamar' => $item->jenisKamar == 'A' ? 'Ahkwat':'Ikhwan',
                    'namaAsrama' => $item->namaAsrama,
                    'namaKamar' => $item->namaKamar,
                    'aliasKamar' => $item->aliasKamar,
                    'namaPembina' => $item->namaPembina,
                    'jumlahNilai' => 0,
                    'createdAt' => date('Y-m', strtotime($item->createdAt)),
                    'isNilai' => 0
                ];
            }
			return $data;
		});
        return collect($data)->values();
    }

    public function getTotalKamarYangDinilaiByJenisKamar(Request $request, $id)
}