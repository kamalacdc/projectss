<?php namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'no_urut', 'regional', 'tanggal_terbit', 'type_pekerjaan',
        'no_wo', 'area', 'site_name', 'pekerjaan', 'alamat',
        'nilai_icon_sgn', 'nilai_total_drm', 'nilai_sgn_mandor'
    ];
}
