<div wire:key="{{$item->id}}" drag-item="{{$item->id}}" id="{{$item->id}}" class="w-full {{ $item->lead_prefix ? 'bg-stone-300' : 'bg-white' }} mb-2 text-left rounded-md cursor-pointer border border-gray-200 drop-shadow-lg">
    <div class="p-2">
        @if($editingTodoId === $item->id)
            <div>
                <input 
                    type="text" name="editingTodoName" wire:model='editingTodoName' 
                    class="border border-gray-400 text-gray-900 text-sm rounded-md block w-full p-2"
                >
                <textarea name="editingTodoNote" wire:model='editingTodoNote' placeholder="Notatka..."
                class="border border-gray-400 text-gray-900 text-sm rounded-md block w-full p-2 mt-2" row="4"
                >
                    @if($item->note)
                        {{$item->note}}
                    @endif
                </textarea>
                @error('editingTodoName') 
                    <span class="text-red-500 text-xs mt-3 block ">{{$message}}</span>
                @enderror
            </div>
        @else 
            
            <div>{{$item->name}}</div>
            @if($item->note)
                <div class="text-sm p-2 mt-2">
                    @php 
                    print_r(nl2br($item->note));
                    @endphp
                </div>
            @endif
        @endif
    </div>
    @if($editingTodoId === $item->id)
        <div class="mt-3 text-xs text-gray-700 p-2">
            <button 
            wire:click="update"
            class="mt-3 px-4 py-2 bg-teal-500 text-white font-semibold rounded hover:bg-teal-600">
                Update
            </button>
            <button
            wire:click="cancelEdit" 
            class="mt-3 px-4 py-2 bg-red-500 text-white font-semibold rounded hover:bg-red-600">
                Cancel
            </button>
        </div>
    @endif
    <div class="flex justify-end bg-slate-500 rounded-b-md p-2">
        @if ($item->lead_prefix)
        <a href="#" target="_blank" title="Zobacz zamówienie">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
              </svg>
            </a>
        @endif             
        <button type="button" wire:click="edit({{ $item->id }})" >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
              </svg>
        </button>
        <button type="button" wire:click ="delete({{ $item->id }})" >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-red-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
              </svg>
        </button>
    </div>
</div>