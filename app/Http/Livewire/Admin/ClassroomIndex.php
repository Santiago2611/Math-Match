<?php

namespace App\Http\Livewire\Admin;

use App\Models\Classroom;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ClassroomIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $classrooms = Classroom::paginate();
        return view('livewire.admin.classroom-index', compact('classrooms'));
    }
}
