<?php

namespace App\Http\Livewire\Admin;

use App\Models\Classroom;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ClassroomIndex extends Component
{
    public $search;
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public function updatinSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $classrooms = Classroom::where('nombre_clase', 'LIKE' , '%' . $this->search . '%')
        ->paginate();
        return view('livewire.admin.classroom-index', compact('classrooms'));
    }
}
