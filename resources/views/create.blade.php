<x-layout>
    <div class="bg-neutral-200/50 hover:bg-neutral-200/80 border border-neutral-400 px-2 py-1 rounded cursor-pointer">
        <a href="/">back</a>
    </div>    

    
    <div class="bg-neutral-200/70 rounded-xl p-5">
        <p class="text-2xl">create new todo</p>

        <form method="POST" action="/todos" class="flex flex-col gap-2 mt-5">
            <textarea class="bg-neutral-200/50 px-2 py-1" name="todo" placeholder="create new todo" autofocus></textarea>
            <x-error name='todo' />
    
            <div>
                <label for="isDone">Is task done?</label>
                <input type="checkbox" id="isDone" name="isDone">
            </div>
            
            <button type="submit" class="bg-neutral-200/50 hover:bg-neutral-200/80 border border-neutral-400 px-2 py-1 rounded cursor-pointer">add new todo</button>
        </form>
    </div>
</x-layout>