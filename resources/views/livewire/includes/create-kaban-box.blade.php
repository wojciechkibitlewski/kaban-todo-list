<form class="bg-slate-400 p-2 rounded-md mb-4">
    <div class="mb-2">
        <input wire:model='name' type="text" id="name" placeholder="Nowe zadanie... "
        class="bg-gray-100 text-gray-900 text-sm rounded block w-full p-2.5">
        @error('name') 
            <span class="text-red-500 text-xs mt-3 block ">{{$message}}</span>
        @enderror
    </div>
    <button 
    wire:click.prevent="create" 
    type="submit" 
    class="w-full px-4 py-2 bg-slate-500 text-sm text-white font-semibold rounded drop-shadow-lg hover:bg-gray-700">
        Dodaj
    </button>
    @if(session('success'))    
        <span class="text-green-500 text-xs">{{ session('success') }}</span>
    @endif

</form>