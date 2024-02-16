<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Dompdf\Dompdf;

class Rank extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('validate') && $this->session->userdata('role') != '1') {
			redirect(base_url() . 'login');
		} else if ($this->session->userdata('validate') && $this->session->userdata('role') != '1'){
			redirect(base_url() . 'error-403_override');
		}
		if ($this->session->userdata('validate') ==true) {
			$this->id_user = $this->session->userdata('user_id');
		}

		$this->pdf = new Dompdf();

	}

	// PAGE
	public function index()
	{
		$data['title'] = 'Penilaian Kamar';
		$data['subtitle'] = 'Ranking';
		// $data['bulanIni'] = konversiBulan(date('F')).' '.date('Y');
		$this->tp->mobile('mobile/report/index', $data);
	}

	public function filterPerMonth() 
	{
		$filterBulan = $this->input->get('filterBulan');
		$filterTahun = $this->input->get('filterTahun');

		$data = $this->TrxPenilaiankamar_model->getRankKamarByMonthReport($filterBulan, $filterTahun);
		return $this->response->json($data);
	}

	public function filterPerYear() 
	{
		$filterBulan = $this->input->get('filterBulan');
		$filterTahun = $this->input->get('filterTahun');
		$data = $this->TrxPenilaiankamar_model->getRankKamarByYearReport($filterTahun);
		return $this->response->json($data);
	}

	public function cetakPdf()
	{
		$type = $this->input->get('typePrint');
		
		$filterBulan = $this->input->get('filterBulan');
		$filterTahun = $this->input->get('filterTahun');

		if ($type == '1') {
			$date = formatIndoTextWithoutDay(date('d').'-'.$filterBulan.'-'.$filterTahun);
			$data = $this->TrxPenilaiankamar_model->getRankKamarByMonthReport($filterBulan, $filterTahun);
		} else {
			$date = 'Tahun '.$filterTahun;
			$data = $this->TrxPenilaiankamar_model->getRankKamarByYearReport($filterTahun);
		}
		// Load view ke Dompdf
        $html = $this->load->view('mobile/report/cetakPdf', [
			'dataRank' => sortRankDariYangTerbesar($data,'jumlahNilai'),
			'tgl' => $date
		], true);
        $this->pdf->loadHtml($html);

        // Render PDF
        $this->pdf->render();

        // Tampilkan PDF
        $this->pdf->stream("cetak.pdf", array("Attachment" => false));
	}


}

