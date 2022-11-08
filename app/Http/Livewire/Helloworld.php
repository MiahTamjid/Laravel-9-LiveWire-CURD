<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use Livewire\WithFileUploads;

class Helloworld extends Component
{
    use WithFileUploads;

    public $nickname = 'Anik';
    public $name, $email, $image, $s_id, $imageup;
    public $update=false;
    
    public function render()
    {
        return view('livewire.helloworld');
    }

    public function savedata(){
        $student = new Student;

        $student->name=$this->name;
        $student->email=$this->email;
        
        $imagename=$this->image->store('photos','public');

        $student->image=$imagename;
        //use this command
        //php artisan storage:link

        $student->save();
        $this->mount();
        $this->reset(['name','email','image']);


    }

    public function mount()
    {
        $this->student=Student::all();
    }

    public function deletestudent($id){
        $data = Student::find($id);
        $data->delete();
        // for reload
        $this->mount();
    }

    public function updatestudent($id){
        $student = Student::find($id);

        $this->s_id=$student->id;
        $this->name=$student->name;
        $this->email=$student->email;
        $this->image=$student->image;

        $this->update=true;
    }

    public function updata()
    {
        $data = Student::find($this->s_id);
        $data->name=$this->name;
        $data->email=$this->email;
        if($this->imageup)
        {
        $imagename = $this->imageup->store('photos','public');
        $data->image=$imagename;
        }
        $data->save();
        $this->imageup='';
        $this->mount();
        $this->update=false;
       
    }
}   
