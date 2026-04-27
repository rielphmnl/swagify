<x-layout>
    <div class="bg-neutral-200/50 hover:bg-neutral-200/80 border border-neutral-400 px-2 py-1 rounded cursor-pointer">
        <a href="/">back</a>
    </div>    

    <p class="text-2xl">create new todo</p>

    <div class="bg-neutral-200/70 rounded-xl p-5">
        <form method="POST" action="/todos" class="flex flex-col gap-2">
            <input class="bg-neutral-200/50 px-2 py-1" name="todo" placeholder="todo" autofocus>
    
            <div>
                <label for="isDone">Is task done?</label>
                <input type="checkbox" id="isDone" name="isDone">
            </div>
            
            <button type="submit" class="bg-neutral-200/50 hover:bg-neutral-200/80 border border-neutral-400 px-2 py-1 rounded cursor-pointer">add new todo</button>
        </form>
    </div>
</x-layout>