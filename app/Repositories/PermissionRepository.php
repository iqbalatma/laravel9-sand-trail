<?php

namespace App\Repositories;

use App\Models\Permission;
use Iqbalatma\LaravelExtend\BaseRepository;

class PermissionRepository extends BaseRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Permission();
    }
}
