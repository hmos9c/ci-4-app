<?php namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
    $data = [
      'title' => 'Home | Web hmos9c'
    ];
    return view('pages/home', $data);
	}

  public function about()
  {
    $data = [
      'title' => 'About | Web hmos9c'
    ];
    return view('pages/about', $data);
  }

  public function contact()
  {
    $data = [
      'title' => 'Contact Us',
      'alamat' => [
        [
          'tipe' => 'Rumah',
          'alamat' => 'Jl. abc No 123',
          'kota' => 'Bogor'
        ],
        [
          'tipe' => 'Kantor',
          'alamat' => 'Jl. Cileungsi No 123',
          'kota' => 'Bogor'
        ]
      ]
    ];

    return view('pages/contact', $data);
  }
	//--------------------------------------------------------------------

}
