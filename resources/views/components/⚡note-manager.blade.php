<?php

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

/*

NoteManager Component

This Livewire component allows users to create, view, and manage their notes.
Each note can have an optional title, content, and category. Users can also
view their existing notes in a grid format.

*/

/*

LIVEWIRE components used:

wire:model  :   makes it easy to bind a component property's value with form inputs, so when the user types
                into an input, the corresponding property in the component is automatically updated.

wire:click  :   a directive for calling component methods (aka actions) when a user clicks a
                specific element on the page. In this case, when the user clicks the "Save Note" button in
                the modal, the saveNote() method in the component will be executed, which will handle the
                logic for validating and saving the note to the database.

*/

new class extends Component
{
    public $notes = [];
    public $showModal = false;
    public $title = '';
    public $content = '';
    public $category = '';
    public $categories = ['Workout', 'Recovery', 'Cardio', 'Nutrition', 'Mental'];

    public function mount()
    {
        $this->notes = Note::where('user_id', Auth::id())->latest()->get();
    }

    #[On('open-modal')]
    public function openModal()
    {
        $this->reset(['title', 'content', 'category']);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function saveNote()
    {
        $this->validate([
            'content'  => 'required|string|min:5',
            'category' => 'required|string',
        ]);

        Note::create([
            'user_id'  => Auth::id(),
            'title'    => $this->title,
            'content'  => $this->content,
            'category' => $this->category,
        ]);

        $this->notes = Note::where('user_id', Auth::id())->latest()->get();
        $this->closeModal();
    }

/*

[ADDED] "deleteNote()" to handle note deletion. It verifies ownership, 
deletes the note, and refreshes the list — with a confirmation prompt to prevent accidental deletions

*/

     public function deleteNote($id)
    {
        Note::where('id', $id)->where('user_id', Auth::id())->delete();
        $this->notes = Note::where('user_id', Auth::id())->latest()->get();
    }
};
?>

<div>
    {{--A Message will flash--}}
    @if (session()->has('success'))
        <div class="text-cyan-400 text-sm mb-4">{{ session('success') }}</div>
    @endif

    {{-- Notes Grid --}}
    <div class="notes-grid">
        @forelse ($notes as $note)
            <div class="note-card" style="position: relative; padding-bottom: 40px;">

                <div class="note-date">{{ $note->created_at->format('F j, Y') }}</div>
                @if ($note->title)
                    <div class="note-title">{{ $note->title }}</div>
                @endif
                <div class="note-body">{{ $note->content }}</div>
                @if ($note->category)
                    <span class="note-tag">{{ $note->category }}</span>
                @endif
                
                <button wire:click="deleteNote({{ $note->id }})"
                    wire:confirm="Delete this note forever?"
                    style="position: absolute; bottom: 12px; right: 12px; background: rgba(177, 0, 0, 0.719); color: white; padding: 2px 8px; border-radius: 4px; font-size: 12px; cursor: pointer; border: none;">
                    Delete Note
                </button>
            </div>
        @empty
            <p style="color: gray;">No notes yet. Start writing!</p>
        @endforelse
    </div>

    {{-- 
    A "MODAL" is a popup window that appears on top of the current page, 
    blocking interaction with the rest of the page until you close it.
    --}}
    
    @if ($showModal)
        <div class="modal-overlay open">
            <div class="modal">
                <div class="modal-header">
                    <span class="modal-title">NEW NOTE</span>
                    <button class="modal-close" wire:click="closeModal">✕</button>
                </div>

                <div class="field">
                    <label>Title (optional)</label>
                    <input wire:model="title" type="text" placeholder="Title..." />
                </div>

                <div class="field">
                    <label>Note</label>
                    <textarea wire:model="content" rows="5" placeholder="Write your note..."></textarea>
                    @error('content') <p style="color:red; font-size:12px;">{{ $message }}</p> @enderror
                </div>

                <div class="field">
                    <label>Category</label>
                    <select wire:model="category">
                        <option value="">Select Category</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat }}">{{ $cat }}</option>
                        @endforeach
                    </select>
                    @error('category') <p style="color:red; font-size:12px;">{{ $message }}</p> @enderror
                </div>

                <div class="modal-footer">
                    <button class="btn-cancel" wire:click="closeModal">Cancel</button>
                    <button class="btn-save" wire:click="saveNote">Save Note</button>
                </div>
            </div>
        </div>
    @endif
</div>
