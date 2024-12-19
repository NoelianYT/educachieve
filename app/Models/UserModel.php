<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';    
    
    protected $allowedFields = ['username', 'password', 'email', 'level', 'created_at', 'updated_at', 'profile_picture'];

    protected $validationRules = [
        'username' => 'required|min_length[3]|max_length[20]|is_unique[users.username]',
        'password' => 'required|min_length[8]|max_length[20]',
        'email' => 'required|valid_email|is_unique[users.email]',
        'level' => 'required',
        'profile_picture' => 'permit_empty|is_image[profile_picture]|max_size[profile_picture,1024]'
    ];
    protected $validationMessages = [
        'username' => [
            'required' => 'Username is required.',
            'is_unique' => 'Username already exists.'
        ],
        'email' => [
            'required' => 'Email is required.',
            'valid_email' => 'Email must be valid.',
            'is_unique' => 'Email already exists.'
        ],
        'password' => [
            'required' => 'Password is required.'
        ],
        'level' => [
            'required' => 'Level is required.'
        ],
        'profile_picture' => [
            'is_image' => 'The selected file must be an image.',
            'max_size' => 'The image size must not exceed 1 MB.'
        ]
    ];
    public function uploadPhoto($photo)
    {
        if ($photo->isValid() && !$photo->hasMoved()) {
            $newName = $photo->getRandomName();
            $path = WRITEPATH . 'uploads' . DIRECTORY_SEPARATOR . $newName;

            if ($photo->move(WRITEPATH . 'uploads', $newName)) {
                return $newName;
            }
        }
        return false;
    }
}