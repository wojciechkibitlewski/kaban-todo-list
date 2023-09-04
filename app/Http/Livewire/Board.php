<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;

use App\Models\Todo;
use Exception;


class Board extends Component
{
    #[Rule('required|min:3|max:50')]
    public $name;

    public $kaban;
    public $note;

    public $editingTodoId;

    #[Rule('required|min:3|max:50')]
    public $editingTodoName;
    
    public $editingTodoNote;
    public $orderedIds;
    public $fromKaban;
    public $toKaban;

    ///////////////////
    // sortowanie i zapisywanie danych po przesunięciu elementów

    public function reorder($orderedIds, $toKaban)
    {
        foreach ($orderedIds as $key => $id) {
            Todo::where('id', $id)->update([
                'kaban' => $toKaban,
                'order' => $key + 1, // Aktualizuj nową kolejność
            ]);
        }
    }
    
    ///////////

    public function edit($todoId)
    {
         try 
         {
             $todo = Todo::findOrFail($todoId);
             $this->editingTodoId = $todo->id;
             $this->editingTodoName = $todo->name;
             $this->editingTodoNote = $todo->note;
         
         } 
         catch(Exception $e) 
         {
             session()->flash('error', 'Failed to edit todo!');
             return;
         }    
    }

    public function cancelEdit()
   {
        $this->reset('editingTodoId', 'editingTodoName', 'editingTodoNote');
   }
    
    public function update()
    {
         try 
         {
             $todo = Todo::findOrFail($this->editingTodoId) -> update(
                 [
                     'name' => $this->editingTodoName,
                     'note' => $this->editingTodoNote,
                 ] 
             );
             $this->cancelEdit();
         } 
         catch(Exception $e) 
         {
             session()->flash('error', 'Failed to update todo!');
             return;
         }    
    }    
    public function create()
    {
        //$validated = $this->validateOnly('name');
        $maxOrder = Todo::where('kaban', 'idea')->max('order');
        if ($maxOrder === null) {
            $order = 1;
        } else {
            $order = $maxOrder + 1;
        }

        $todo = new Todo();
        $todo->name = $this->name;
        $todo->kaban = 'idea';
        $todo->note = '';
        $todo->order = $order;
        $todo->save();

        $this->reset('name');
    }

    public function delete($todoId)
    {
            try {
                Todo::findOrFail($todoId)->delete();
            
            } catch(Exception $e) {
                session()->flash('error', 'Failed to delete todo!');
                return;
            }
            
    }

    public function render()
    {
        $ideaList = Todo::latest()->where('kaban','idea')->get();
        $thisWeekList = Todo::latest()->where('kaban','thisWeek')->get();
        $waitingList = Todo::latest()->where('kaban','waiting')->get();
        $workingList = Todo::latest()->where('kaban','working')->get();
        $doneList = Todo::latest()->where('kaban','done')->get();
        //dd($ideaList);
        return view('livewire.board', [
            'ideaList' =>  $ideaList,
            'thisWeekList' =>  $thisWeekList,
            'waitingList' =>  $waitingList,
            'workingList' =>  $workingList,
            'doneList' =>  $doneList,
        ]);
    }
}
