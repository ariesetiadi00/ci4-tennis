<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 't_members';
    protected $useTimestamp = true;
    protected $allowedFields = ['nama', 'foto', 'slug', 'tmp_lahir', 'tgl_lahir', 'tgl_join'];

    public function getMember($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        } else {
            return $this->where(['slug' => $slug])->first();
        }
    }
    public function search($key)
    {
        return $this->table('t_members')->like('nama', $key)->get();
        // $builder = $this->table('t_members');
        // $builder->like('nama', $key);
        // return $builder;
        // return $this->like('nama', $key);
    }
}
