<?php

use Livewire\Component;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

new class extends Component
{
    public $showModal = false;
    public $title = '';
    public $content = '';
    public $category = '';
    public $categories = ['Workout', 'Recovery', 'Cardio', 'Nutrition', 'Mental'];

    protected function rules()
    {
        return [
            'content'  => 'required|string|min:5',
            'category' => 'required|string',
            'title'    => 'nullable|string|max:100',
        ];
    }

    public function openModal() {
        $this->reset(['title', 'content', 'category']);
        $this->showModal = true;
    }

    public function closeModal() {
        $this->showModal = false;
    }

    public function saveNote() {
        $this->validate();

        Note::create([
            'user_id'  => Auth::id(),
            'title'    => $this->title,
            'content'  => $this->content,
            'category' => $this->category,
        ]);

        $this->closeModal();
        session()->flash('success', 'Note saved!');
    }

    public function render()
    {
        return view('livewire.NoteManager', [
            'notes' => Note::where('user_id', Auth::id())->latest()->get()
        ]);
    }
};
?>

<div>
    {{-- Flash Message --}}
    @if (session()->has('success'))
        <div class="text-cyan-400 text-sm mb-4">{{ session('success') }}</div>
    @endif

    {{-- Notes Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @forelse ($notes as $note)
            <div class="bg-gray-900 border border-gray-700 p-5 rounded">
                <p class="text-cyan-400 text-xs tracking-widest mb-2">
                    {{ strtoupper($note->created_at->format('F j, Y')) }}
                </p>
                @if ($note->title)
                    <p class="text-white font-semibold mb-1">{{ $note->title }}</p>
                @endif
                <p class="text-gray-300 text-sm mb-4">{{ $note->content }}</p>
                @if ($note->category)
                    <span class="border border-gray-500 text-gray-400 text-xs px-2 py-1 uppercase tracking-widest">
                        {{ $note->category }}
                    </span>
                @endif
            </div>
        @empty
            <p class="text-gray-500 text-sm col-span-3">No notes yet. Start writing!</p>
        @endforelse
    </div>

    {{-- Modal --}}
    @if ($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50">
            <div class="bg-gray-900 border border-gray-700 rounded p-6 w-full max-w-lg">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-white font-bold tracking-widest">NEW NOTE</h2>
                    <button wire:click="closeModal" class="text-gray-400 hover:text-white text-xl">&times;</button>
                </div>

                <input wire:model="title" type="text" placeholder="Title (optional)"
                    class="w-full bg-gray-800 text-white border border-gray-600 rounded px-3 py-2 text-sm mb-3 focus:outline-none focus:border-cyan-400" />

                <textarea wire:model="content" rows="5" placeholder="Write your note..."
                    class="w-full bg-gray-800 text-white border border-gray-600 rounded px-3 py-2 text-sm mb-3 focus:outline-none focus:border-cyan-400"></textarea>
                @error('content') <p class="text-red-400 text-xs mb-2">{{ $message }}</p> @enderror

                <select wire:model="category"
                    class="w-full bg-gray-800 text-white border border-gray-600 rounded px-3 py-2 text-sm mb-4 focus:outline-none focus:border-cyan-400">
                    <option value="">Select Category</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat }}">{{ $cat }}</option>
                    @endforeach
                </select>
                @error('category') <p class="text-red-400 text-xs mb-2">{{ $message }}</p> @enderror

                <div class="flex justify-end gap-3">
                    <button wire:click="closeModal" class="text-gray-400 text-sm hover:text-white">Cancel</button>
                    <button wire:click="saveNote"
                        class="bg-cyan-400 text-black px-4 py-2 text-sm font-semibold hover:bg-cyan-300 transition">
                        Save Note
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
