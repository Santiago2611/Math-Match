<?php

namespace App\Http\Livewire\Admin;

use App\Models\Classroom;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class ClassroomIndex extends Component
{

    use WithPagination;

    public $search;
    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.classroom-index',[
            'classrooms' => Classroom::where('nombre_clase', 'like','%' . $this->search.'%')
            ->paginate(10),
        ]);
    }
}
