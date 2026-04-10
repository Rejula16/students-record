<?php

namespace App\Services;

use App\Models\Student;
use Illuminate\Support\Facades\Storage;

class StudentService
{
    public function store($data)
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('students', 'public');
        }

        return Student::create($data);
    }

    public function update($student, $data)
    {
        if (isset($data['image'])) {

            if ($student->image) {
                Storage::disk('public')->delete($student->image);
            }

            $data['image'] = $data['image']->store('students', 'public');
        }

        return $student->update($data);
    }

    public function delete($student)
    {
        if ($student->image) {
            Storage::disk('public')->delete($student->image);
        }

        return $student->delete();
    }
}
