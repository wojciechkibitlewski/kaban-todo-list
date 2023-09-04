<div class="grid grid-cols-5 gap-4 w-full text-xs">
    <div class="bg-slate-300 rounded-t-xl p-2">
        <div class="text-center mb-[70px] uppercase font-black">Pomysły i plany</div>
        
        @include('livewire.includes.create-kaban-box')
        
        <div id="idea" class="w-full min-h-[300px] p-2 text-base">
            @if($ideaList)
            @foreach ($ideaList as $item)
                
                @include('livewire.includes.show-kaban-box')
                
            @endforeach
            @endif
        </div>
    </div>
    <div class="col-span-3 grid grid-cols-3 gap-4 bg-stone-300 rounded-t-xl pb-2 place-content-start">
        <div class="col-span-3 text-center p-4 h-[28px] uppercase font-black">W trakcie realizacji</div>

        <div class="bg-white p-2 ml-2 rounded-xl ">
            <div class="text-center mb-4 uppercase font-black">Najbliższy tydzień</div>
            <div id="thisWeek" class="w-full min-h-[300px] p-2 text-base">
                @if($thisWeekList)
                @foreach ($thisWeekList as $item)
                    
                    @include('livewire.includes.show-kaban-box')
                    
                @endforeach
                @endif
            </div>
        </div>
        <div class="bg-white p-2 rounded-xl">
            <div class="text-center mb-4 uppercase font-black">Czeka</div>
            <div id="waiting" class="w-full min-h-[300px] p-2 text-base">
                @if($waitingList)
                @foreach ($waitingList as $item)
                    
                    @include('livewire.includes.show-kaban-box')
                    
                @endforeach
                @endif
            </div>
        </div>
        <div class="bg-white p-2 mr-2 rounded-xl">
            <div class="text-center mb-4 uppercase font-black">Dziś robię</div>
            <div id="working" class="w-full min-h-[300px] p-2 text-base">
                @if($workingList)
                @foreach ($workingList as $item)
                    
                    @include('livewire.includes.show-kaban-box')
                    
                @endforeach
                @endif

            </div>
        </div>
    </div>
    <div class="bg-slate-300 rounded-t-xl p-2">
        <div class=" text-center mb-[70px] uppercase font-black">Zrealizowane</div>
        <div id="done" class="w-full min-h-[300px] p-2 text-base">
            @if($doneList)
            @foreach ($doneList as $item)
                
                @include('livewire.includes.show-kaban-box')
                
            @endforeach
            @endif

        </div>
    </div>
    <script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>

    <script>
    var idea = document.querySelector("#idea");
    var thisWeek = document.querySelector("#thisWeek");
    var waiting = document.querySelector("#waiting");
    var working = document.querySelector("#working");
    var done = document.querySelector("#done");
    
    new Sortable(idea, {
        group: 'shared', // set both lists to same group
        animation: 150,
        onAdd: function (evt) {
            let orderIds = Array.from(idea.querySelectorAll('[drag-item]'))
                .map(itemEl => itemEl.getAttribute('drag-item'));
            let toKaban = 'idea';
            console.log(orderIds);
            // Wywołanie funkcji reorder() w Livewire, aby zaktualizować dane w bazie danych
            @this.reorder(orderIds, toKaban);

	    },
        onSort: function (evt) {
		    // same properties as onEnd
            let orderIds = Array.from(idea.querySelectorAll('[drag-item]'))
                .map(itemEl => itemEl.getAttribute('drag-item'));
            let toKaban = 'idea';
            // @this.reorder(orderIds, toKaban);

            console.log(orderIds)
	    },
    });
    
    new Sortable(thisWeek, {
        group: 'shared',
        animation: 150,
        onAdd: function (evt) {
            let orderIds = Array.from(thisWeek.querySelectorAll('[drag-item]'))
                .map(itemEl => itemEl.getAttribute('drag-item'));
            let toKaban = 'thisWeek';
            
            // Wywołanie funkcji reorder() w Livewire, aby zaktualizować dane w bazie danych
            @this.reorder(orderIds, toKaban);

	    },
        onRemove: function (evt) {
            // same properties as onEnd
            console.log('coś usunięto')
        },
        onSort: function (evt) {
		    // same properties as onEnd
            //console.log('sortowanie')
	    },
    });
    new Sortable(waiting, {
        group: 'shared',
        animation: 150,
        onAdd: function (evt) {
            let orderIds = Array.from(waiting.querySelectorAll('[drag-item]'))
                .map(itemEl => itemEl.getAttribute('drag-item'));
            let toKaban = 'waiting';
            
            // Wywołanie funkcji reorder() w Livewire, aby zaktualizować dane w bazie danych
            @this.reorder(orderIds, toKaban);

	    },

    });
    
    new Sortable(working, {
        group: 'shared',
        animation: 150,
        onAdd: function (evt) {
            let orderIds = Array.from(working.querySelectorAll('[drag-item]'))
                .map(itemEl => itemEl.getAttribute('drag-item'));
            let toKaban = 'working';
            
            // Wywołanie funkcji reorder() w Livewire, aby zaktualizować dane w bazie danych
            @this.reorder(orderIds, toKaban);

	    },

    });
    
    new Sortable(done, {
        group: 'shared',
        animation: 150,
        onAdd: function (evt) {
            let orderIds = Array.from(done.querySelectorAll('[drag-item]'))
                .map(itemEl => itemEl.getAttribute('drag-item'));
            let toKaban = 'done';
            
            // Wywołanie funkcji reorder() w Livewire, aby zaktualizować dane w bazie danych
            @this.reorder(orderIds, toKaban);

	    },

    });
    
    </script>
</div>

