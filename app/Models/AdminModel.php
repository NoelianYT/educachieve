<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table            = 'admins';
    protected $primaryKey       = 'admin_id';
    protected $useTimestamps    = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id', 'first_name', 'last_name', 'phone_number'
    ];

    public function getAdmin($id = false) {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->where(['admin_id' => $id])->first();
        }
    }

    public function saveAdmin($data) {
        if (isset($data['user_id'])) {
            $existingAdmin = $this->where('user_id', $data['user_id'])->first();
            if ($existingAdmin) {
                return $this->updateAdmin($existingAdmin['admin_id'], $data);
            }
        }
        
        return $this->insert($data);
    }

    public function updateAdmin($id, $data) {
        return $this->update($id, $data);
    }

    public function deleteAdmin($id) {
        return $this->delete($id);
    }

    public function getAdminByUserId($userId) {
        return $this->where('user_id', $userId)->first();
    }
}