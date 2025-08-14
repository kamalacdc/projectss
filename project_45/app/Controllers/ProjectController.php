<?php namespace App\Controllers;

use App\Models\ProjectModel;

class ProjectController extends BaseController
{
    public function index()
    {
        $model = new ProjectModel();
        $data['projects'] = $model->findAll();
        return view('projects/index', $data);
    }

    public function dashboard()
    {
        $model = new ProjectModel();
        $data['total'] = $model->countAll();
        $data['avg_nilai'] = $model->selectAvg('nilai_total_drm')->first();
        $data['area_data'] = $model->select('area, COUNT(*) as jumlah')->groupBy('area')->findAll();
        return view('projects/dashboard', $data);
    }
    public function add()
{
    $model = new \App\Models\ProjectModel();

    $data = $this->request->getPost();

    $model->insert([
        'no_urut' => $data['no_urut'],
        'regional' => $data['regional'],
        'tanggal_terbit' => $data['tanggal_terbit'],
        'type_pekerjaan' => $data['type_pekerjaan'],
        'no_wo' => $data['no_wo'],
        'area' => $data['area'],
        'site_name' => $data['site_name'],
        'pekerjaan' => $data['pekerjaan'],
        'alamat' => $data['alamat'],
        'nilai_icon_sgn' => $data['nilai_icon_sgn'],
        'nilai_total_drm' => $data['nilai_total_drm'],
        'nilai_sgn_mandor' => $data['nilai_sgn_mandor']
    ]);

    return redirect()->to('/projects');
}

}
