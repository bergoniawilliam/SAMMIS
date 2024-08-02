<?php

namespace App\Livewire\ReportedMotorcycles\Edit;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\ReportedMotorcycleStatus;
use Illuminate\Support\Facades\Auth;

class Status extends Component
{
    public $status;
    public $remarks;
    public $results;
    public $reportmotorcycleId;
    public $reported_motorcycles;

    public function render()
    {
        $this->reported_motorcycles = ReportedMotorcycleStatus::where('reported_motorcycles_id', $this->reportmotorcycleId)->get();
        return view('livewire.reported-motorcycles.edit.status', [
        'reported_motorcycles' => $this->reported_motorcycles,
        ]);
    }
     protected function rules()
    {
        return [
          
           'status' => ['required', 'string'],
           'remarks' => ['required', 'string'],
           
        ];
    }
    #[On('validate-status')] 
    public function validateStatus()
    {
        
        $this->validate();
        $this->dispatch('validation-success'); //dispatch nya yung validation-success. Check Page.php line 34 
    }
    #[On('populate-StatusForm')]
public function populateStatusForm($reportmotorcycleId)
{
    $this->reportedmotorcyclestatus = ReportedMotorcycleStatus::where('reported_motorcycles_id', $reportmotorcycleId)
        ->orderBy('created_at', 'desc')  // Assuming you have a 'created_at' column
        ->first();

    if ($this->reportedmotorcyclestatus) {
        $this->status = $this->reportedmotorcyclestatus->status;
        $this->remarks = $this->reportedmotorcyclestatus->remarks;
        $this->reportmotorcycleId = $this->reportedmotorcyclestatus->reported_motorcycles_id;
    }
}

    #[On('update-status')]
public function updateStatus()
{
    $this->validate();

    $this->reportedmotorcyclestatus = ReportedMotorcycleStatus::where('reported_motorcycles_id', $this->reportmotorcycleId)->orderBy('created_at', 'desc')  // Assuming you have a 'created_at' column
        ->first();

    // Store old values
    $oldValues = [
        'status' => $this->reportedmotorcyclestatus->status,
        'remarks' => $this->reportedmotorcyclestatus->remarks,
    ];

    // Store new values
    $newValues = [
        'status' => $this->status,
        'remarks' => $this->remarks,
    ];
    //  dd($oldValues,$newValues);

    // Compare old and new values
    if ($oldValues['status'] !== $newValues['status'] And $oldValues['remarks'] !== $newValues['remarks']) {
        // If there is a change, update the record
        // dd("save new record");
         ReportedMotorcycleStatus::create([
            'reported_motorcycles_id' => $this->reportmotorcycleId,
            'status' =>  $this->status,
            'remarks' => $this->remarks,
            'created_by_id' => Auth::user()->id,
            'updated_by_id' => Auth::user()->id,
        ]);
        session()->flash('message', 'Reported Motorcycle has been updated successfully!');
        return redirect('reported-motorcycles');

        // Add to the audit table or perform other actions as needed
    }elseif($oldValues['status'] === $newValues['status'] And $oldValues['remarks'] === $newValues['remarks']) {
    //dd("walang gagawin");
        session()->flash('message', 'Reported Motorcycle has been updated successfully!');
        return redirect('reported-motorcycles');
    }elseif($oldValues['status'] === $newValues['status'] And $oldValues['remarks'] !== $newValues['remarks']) {
        // $this->reportedmotorcyclestatus->status = $newValues['status'];
        // $this->reportedmotorcyclestatus->remarks = $newValues['remarks'];
        // $this->reportedmotorcyclestatus->updated_by_id = Auth::user()->id;
        // $this->reportedmotorcyclestatus->save();
        //  dd("mag add in kasi nabago remarks");
        ReportedMotorcycleStatus::create([
            'reported_motorcycles_id' => $this->reportmotorcycleId,
            'status' =>  $this->status,
            'remarks' => $this->remarks,
            'created_by_id' => Auth::user()->id,
            'updated_by_id' => Auth::user()->id,
        ]);
        session()->flash('message', 'Reported Motorcycle has been updated successfully!');
        return redirect('reported-motorcycles');
    }elseif($oldValues['status'] !== $newValues['status'] And $oldValues['remarks'] === $newValues['remarks']) {
        // $this->reportedmotorcyclestatus->status = $newValues['status'];
        // $this->reportedmotorcyclestatus->remarks = $newValues['remarks'];
        // $this->reportedmotorcyclestatus->updated_by_id = Auth::user()->id;
        // $this->reportedmotorcyclestatus->save();
        // dd("mag add in kasi nabago status");
        ReportedMotorcycleStatus::create([
            'reported_motorcycles_id' => $this->reportmotorcycleId,
            'status' =>  $this->status,
            'remarks' => $this->remarks,
            'created_by_id' => Auth::user()->id,
            'updated_by_id' => Auth::user()->id,
        ]);
        session()->flash('message', 'Reported Motorcycle has been updated successfully!');
        return redirect('reported-motorcycles');
    }

}

    
}
