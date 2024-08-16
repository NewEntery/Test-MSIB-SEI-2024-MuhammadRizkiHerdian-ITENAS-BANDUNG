<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class ProyekController extends CI_Controller {

    private $client;

    public function __construct() {
        parent::__construct();
        
        $this->client = new Client([
            'base_uri' => 'http://localhost:8080/', // Ganti dengan base URI API Anda
            'timeout'  => 2.0,
        ]);
    }

    public function index() {
        $response = $this->client->request('GET', 'proyek');
        $data['proyek_list'] = json_decode($response->getBody()->getContents(), true);

        $response = $this->client->request('GET', 'lokasi');
        $data['lokasi_list'] = json_decode($response->getBody()->getContents(), true);

        $this->load->view('proyek/index', $data);
    }

    public function create() {
        $response = $this->client->request('GET', 'lokasi');
        $data['lokasi_list'] = json_decode($response->getBody()->getContents(), true);

        $this->load->view('proyek/create', $data);
    }

    public function store() {
        $proyek_data = [
            'namaProyek' => $this->input->post('nama_proyek'),
            'client' => $this->input->post('client'),
            'tglMulai' => $this->input->post('tgl_mulai'),
            'tglSelesai' => $this->input->post('tgl_selesai'),
            'pimpinanProyek' => $this->input->post('pimpinan_proyek'),
            'keterangan' => $this->input->post('keterangan'),
            'lokasi' => array_map(function($id) {
                return ['id' => $id]; 
            }, $this->input->post('lokasi')),
        ];
        print_r($proyek_data);
        $response = $this->client->request('POST', 'proyek', [
            'json' => $proyek_data
        ]);

        redirect('proyek');
    }

    public function edit($id) {
        $response = $this->client->request('GET', 'proyek/'.$id);
        $data['proyek'] = json_decode($response->getBody()->getContents(), true);

        $response = $this->client->request('GET', 'lokasi');
        $data['lokasi_list'] = json_decode($response->getBody()->getContents(), true);

        $this->load->view('proyek/edit', $data);
    }

    public function update($id) {
        $proyek_data = [
            'namaProyek' => $this->input->post('nama_proyek'),
            'client' => $this->input->post('client'),
            'tglMulai' => $this->input->post('tgl_mulai'),
            'tglSelesai' => $this->input->post('tgl_selesai'),
            'pimpinanProyek' => $this->input->post('pimpinan_proyek'),
            'keterangan' => $this->input->post('keterangan'),
            'lokasi' => array_map(function($id) {
                return ['id' => $id];
            }, $this->input->post('lokasi')),
        ];

        $response = $this->client->request('PUT', 'proyek/'.$id, [
            'json' => $proyek_data
        ]);

        redirect('proyek');
    }

    public function delete($id) {
        $response = $this->client->request('DELETE', 'proyek/'.$id);
        redirect('proyek');
    }


    public function createlokasi() {
        $response = $this->client->request('GET', 'lokasi');
        

        $this->load->view('proyek/createlokasi');
    }

    public function storelokasi() {
        $proyek_data = [
            'namaLokasi' => $this->input->post('nama_lokasi'),
            'negara' => $this->input->post('Negara'),
            'provinsi' => $this->input->post('Provinsi'),
            'kota' => $this->input->post('Kota'),
        ];
        
        $response = $this->client->request('POST', 'lokasi', [
            'json' => $proyek_data
        ]);
        
        redirect('proyek');
    }

    public function editlokasi($id) {
        $response = $this->client->request('GET', 'lokasi/'.$id);
        $data['lokasi'] = json_decode($response->getBody()->getContents(), true);
        

        

        $this->load->view('proyek/editlokasi', $data);
    }

    public function updatelokasi($id) {
        $proyek_data = [
            'namaLokasi' => $this->input->post('nama_lokasi'),
            'negara' => $this->input->post('Negara'),
            'provinsi' => $this->input->post('Provinsi'),
            'kota' => $this->input->post('Kota'),
            
        ];

        $response = $this->client->request('PUT', 'lokasi/'.$id, [
            'json' => $proyek_data
        ]);

        redirect('proyek');
    }

    public function deletelokasi($id) {
        $response = $this->client->request('DELETE', 'lokasi/'.$id);
        redirect('proyek');
    }
}