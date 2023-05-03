<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Project;
use App\Models\Timer;
use Livewire\Component;

use Carbon\Carbon;


class Projects extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name, $assigned_time, $project_id, $logged_time;

    public $search = '';

    protected function rules()
    {
        return [
            'name' => 'required|min:3',
            'assigned_time' => 'required',
        ];
    }

    public function updated($filds)
    {
        $this->validateOnly($filds);
    }

    public function saveProject(){
        $validatedData = $this->validate();
        $data = array_merge($validatedData, ['user_id' => auth()->user()->id]);
        Project::create($data);
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editProject(Int $project_id){
        $project = Project::find($project_id);
        if($project){
            $this->project_id = $project->id;
            $this->name = $project->name;
            $this->assigned_time = $project->assigned_time;
        } else {
            return redirect()->to('/home');
        }
    }

    public function updateProject() {
        $validatedData = $this->validate();
        Project::where('id', $this->project_id)->update([
            'name' => $this->name,
            'assigned_time' => $this->assigned_time,
        ]);

        session()->flash('message', 'Project Updated Successfuly');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteProject(Int $project_id) {
        $this->project_id = $project_id;
    }

    public function destroyProject()
    {
        $project = Project::find($this->project_id)->delete();

        session()->flash('message', 'Project Deleted Successfuly');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function addTimer(Int $project_id){
        $this->project_id = $project_id;
    }

    public function initializeTimer(){
        $data = [
            'name' => $this->name,
            'user_id' => auth()->user()->id, 
            'project_id' => $this->project_id,
            'start_at' => new Carbon,
        ];
        $newTimer = Timer::create($data);
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('start-timer', ['timer' => $newTimer]);
    }

    public function stopTimeLog(Int $time_id) {
        $time = Timer::find($time_id);
        Timer::where('id', $time_id)->update([
            'stopped_at' => new Carbon,
            'logged_time' => Carbon::parse(new Carbon)->diffInSeconds(Carbon::create($time->start_at))
        ]);
        
    }

    public function deleteTimeLog(Int $time_id){
        $this->time_id = $time_id;
    }

    public function destroyTimeLog(){
        $time = Timer::find($this->time_id)->delete();
        session()->flash('message', 'Time Log Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editTimeLogged(Int $time_id){
        $time = Timer::find($time_id);
        $this->time_id = $time_id;
        $this->logged_time =  $time->logged_time;
    }

    public function updateTime() {
        Timer::where('id',$this->time_id)->update([
            'logged_time' =>  $this->logged_time
        ]);
        $this->dispatchBrowserEvent('close-modal');
    }


    public function closeModal() {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->name = '';
        $this->assigned_time = '';
    }

    public function render()
    {
        $projects = Project::where('name', 'like', '%'.$this->search.'%')->orderBy('id', 'DESC')->paginate(3);
        return view('livewire.projects', ['projects' => $projects]);
    }
}
