<?php

namespace App\Controllers;

use App\Models\UserModel;

class ProfileController extends BaseController
{
    public function show()
    {
        $userId = $this->data['user']['userID'] ?? null;
        if (!$userId) {
            session()->destroy();
            return redirect()->to('/login');
        }

        $userModel = new UserModel();
        $user = $userModel->find($userId);

        if (!$user) {
            session()->destroy();
            return redirect()->to('/login');
        }

        $this->data['user'] = array_merge($this->data['user'], $user);
        return view('profile/show', $this->data);
    }

    public function edit()
    {
        $userId = $this->data['user']['userID'] ?? null;
        if (!$userId) {
            return redirect()->to('/login');
        }

        $userModel = new UserModel();
        $user = $userModel->find($userId);

        if (!$user) {
            return redirect()->to('/login');
        }

        $this->data['user'] = array_merge($this->data['user'], $user);
        return view('profile/edit', $this->data);
    }

    public function update()
    {
        $userId = $this->data['user']['userID'] ?? null;
        if (!$userId) {
            return redirect()->to('/login');
        }

        $userModel = new UserModel();
        $user = $userModel->find($userId);

        if (!$user) {
            return redirect()->to('/login');
        }

        // Validation
        $rules = [
            'fullname' => 'required|min_length[3]',
            'username' => "required|is_unique[users.username,id,{$userId}]",
            'student_id' => 'permit_empty|max_length[20]',
            'course' => 'permit_empty|max_length[100]',
            'year_level' => 'permit_empty|integer|greater_than[0]|less_than[6]',
            'section' => 'permit_empty|max_length[50]',
            'phone' => 'permit_empty|max_length[20]',
            'address' => 'permit_empty',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $updateData = [
            'fullname' => $this->request->getPost('fullname'),
            'username' => $this->request->getPost('username'),
            'student_id' => $this->request->getPost('student_id'),
            'course' => $this->request->getPost('course'),
            'year_level' => $this->request->getPost('year_level'),
            'section' => $this->request->getPost('section'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
        ];

        // Handle image upload
        $file = $this->request->getFile('profile_image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $validationRule = [
                'profile_image' => 'uploaded[profile_image]|is_image[profile_image]|mime_in[profile_image,image/jpg,image/jpeg,image/png,image/webp]|max_size[profile_image,2048]'
            ];

            if ($this->validate($validationRule)) {
                // Delete old image
                if (!empty($user['profile_image'])) {
                    $oldImagePath = FCPATH . 'uploads/profiles/' . $user['profile_image'];
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                // Generate unique filename
                $ext = $file->getExtension();
                $newName = 'avatar_' . $userId . '_' . time() . '.' . $ext;
                
                // Move file
                $file->move(FCPATH . 'uploads/profiles/', $newName);
                $updateData['profile_image'] = $newName;
            }
        }

        // Update profile
        $userModel->updateProfile($userId, $updateData);

        // Update session
        $updatedUser = $this->ApplicationModel->getUser(userID: $userId);
        session()->set([
            'username' => $updatedUser['username'],
            'role' => $updatedUser['role_id']
        ]);

        return redirect()->to('/profile')->with('success', 'Profile updated successfully!');
    }
}
