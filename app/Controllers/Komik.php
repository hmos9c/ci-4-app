<?php namespace App\Controllers;

use App\Models\KomikModel;
use CodeIgniter\Validation\Validation;

class Komik extends BaseController
{
  protected $komikModel;
  public function __construct()
  {
    $this->komikModel = new KomikModel();
  }
  public function index()
  {
    // $komik = $this->komikModel->findAll();

    $data = [
      'title' => 'Daftar Komik',
      'komik' => $this->komikModel->getKomik()
    ];

    // $komikModel = new \App\Models\KomikModel();
    // $komikModel = new KomikModel();

    return view('komik/index', $data);
  }

  public function detail($slug)
  {
    $data = [
      'title' => 'Detail Komik',
      'komik' => $this->komikModel->getKomik($slug)
    ];

    // jika komik tidak ada di tabel
    if(empty($data['komik'])){
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul komik ' . $slug . ' tidak ditemukan.');
    }

    return view('komik/detail', $data);
  }

  public function create()
  {
    // session();
    $data = [
      'title' => 'Form Tambah Data Komik',
      'validation' =>\Config\Services::validation()
    ];

    return view('komik/create', $data);
  }

  public function save()
  {
    // validasi input
    if(!$this->validate([
      'judul' => [
        'rules' => 'required|is_unique[komik.judul]',
        'errors' => [
          'required' => '{field} komik harus diisi',
          'is_unique' => '{field} komik sudah terdaftar'
        ]
        ],
      'penulis' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} komik harus diisi'
        ]
      ],
      'penerbit' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} komik harus diisi'
        ]
      ],
      'sampul' => [
        'rules' => 'max_size[sampul,2024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
        'errors' => [  
          'max_size' => 'Ukuran gambar terlalu besar',
          'is_image' => 'Yang anda pilih bukan gambar',
          'mime_in' => 'Yang anda pilih bukan gambar'
        ]
      ]
    ])){
      // $validation = \Config\Services::validation();
      // return redirect()->to(base_url().'/komik/create')->withInput()->with('validation', $validation);
      return redirect()->to(base_url().'/komik/create')->withInput();
    }
    
    // ambil gambar
    $fileSampul = $this->request->getFile('sampul');
    // apakah tidak ada gambar yang diupload
    if($fileSampul->getError()==4){
      $namaSampul = 'default.png';
    }else{
      // generate nama sampul random
      $namaSampul = $fileSampul->getRandomName();
      // pindahkan file ke folder img
      $fileSampul->move('img', $namaSampul);
    }

    $slug = url_title($this->request->getVar('judul'), '-', true);
    $this->komikModel->save([
      'judul' => $this->request->getVar('judul'),
      'slug' => $slug,
      'penulis' => $this->request->getVar('penulis'),
      'penerbit' => $this->request->getVar('penerbit'),
      'sampul' => $namaSampul
    ]);

    session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

    return redirect()->to(base_url().'/komik');
  }

  public function delete($id)
  {
    // cari gambar berdasarkan id
    $komik = $this->komikModel->find($id);
    // cek jika file gambarnya default.png
    if($komik['sampul']!='default.png'){
      // hapus gambar
      unlink('img/' . $komik['sampul']);
    }

    $this->komikModel->delete($id);
    session()->setFlashdata('pesan', 'Data berhasil dihapus');
    return redirect()->to(base_url().'/komik');
  }

  public function edit($slug)
  {
    $data = [
      'title' => 'Form Ubah Data Komik',
      'validation' =>\Config\Services::validation(),
      'komik' => $this->komikModel->getKomik($slug)
    ];

    return view('komik/edit', $data);
  }

  public function update($id)
  {
    // cek judul
    $komikLama = $this->komikModel->getKomik($this->request->getVar('slug'));
    if($komikLama['judul'] == $this->request->getVar('judul')) {
      $rule_judul = 'required';
    }else{
      $rule_judul = 'required|is_unique[komik.judul]';
    }

    if(!$this->validate([
      'judul' => [
        'rules' => $rule_judul,
        'errors' => [
          'required' => '{field} komik harus diisi',
          'is_unique' => '{field} komik sudah terdaftar'
        ]
        ],
      'penulis' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} komik harus diisi'
        ]
      ],
      'penerbit' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} komik harus diisi'
        ]
      ],
      'sampul' => [
        'rules' => 'max_size[sampul,2024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
        'errors' => [  
          'max_size' => 'Ukuran gambar terlalu besar',
          'is_image' => 'Yang anda pilih bukan gambar',
          'mime_in' => 'Yang anda pilih bukan gambar'
        ]
      ]  
    ])){
      return redirect()->to(base_url().'/komik/edit/'.$this->request->getVar('slug'))->withInput();
    }

    $fileSampul = $this->request->getFile('sampul');

    //cek gambar, apakah tetap gambar lama
    if($fileSampul->getError()==4){
      $namaSampul = $this->request->getVar('sampulLama');
    }else{
      // generate nama file random
      $namaSampul = $fileSampul->getRandomName();
      // pindahkan gambar
      $fileSampul->move('img', $namaSampul);
      // hapus file lama
      unlink('img/' . $this->request->getVar('sampulLama'));
    }

    $slug = url_title($this->request->getVar('judul'), '-', true);
    $this->komikModel->save([
      'id' => $id,
      'judul' => $this->request->getVar('judul'),
      'slug' => $slug,
      'penulis' => $this->request->getVar('penulis'),
      'penerbit' => $this->request->getVar('penerbit'),
      'sampul' => $namaSampul
    ]);

    session()->setFlashdata('pesan', 'Data berhasil diubah');

    return redirect()->to(base_url().'/komik');
  }
}