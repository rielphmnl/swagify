<x-layout>
        <div class="bg-neutral-200/30 rounded-lg p-5 flex flex-col gap-3">
                <div>
                        <div class="bg-neutral-200/50 hover:bg-neutral-200/80 border border-neutral-400 px-2 py-1 rounded cursor-pointer w-fit">
                                <a href="/">back</a>
                        </div>
                </div>
                
                <input type="hidden" name="id" value="{{ $todo->id }}">

                <input class="bg-neutral-200/50 text-2xl px-2 py-1 rounded border border-neutral-200/80" name="todo" placeholder="{{ $todo->todo }}" value="{{ $todo->todo }}" autofocus>
                
                <div class="flex gap-2">
                        <label for="isDone">Is task done?: </label>
                        <input type="checkbox" name="isDone" id="isDone" <?= $todo->isDone === 1 ? 'checked' : '' ?> >
                </div>

                <div class="flex justify-center gap-5">
                        <button class="bg-neutral-200/50 hover:bg-neutral-200/80 border border-neutral-400 px-2 py-1 rounded cursor-pointer w-fit">save</button>
                        <button class="bg-neutral-200/50 hover:bg-neutral-200/80 border border-neutral-400 px-2 py-1 rounded cursor-pointer w-fit">delete</button>
                </div>



        </div>
</x-layout>

