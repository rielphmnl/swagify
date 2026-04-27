<x-layout>
    <p class="text-2xl">TODO LIST</p>

    <div class="bg-neutral-200/30 rounded-lg p-5">
        <ul class="flex flex-col gap-1">
            <?php foreach ($todos as $todo) : ?>
                <div class="bg-neutral-200/50 rounded flex justify-between gap-3 px-2 py-1 items-center">
                    <?= $todo->isDone === 1 ? "<li><s>" . $todo->todo . "</s></li>" : "<li>" . $todo->todo . "</li>" ?>
                    
                    <div class="border-neutral-400 hover:bg-neutral-200/80 border px-2 py-1 rounded text-sm cursor-pointer">
                        <a href="/todo/{{ $todo->id }}">edit</a>
                    </div>
                </div>
            <?php endforeach ?>
        </ul>
    </div>

    <div class="bg-neutral-200/50 hover:bg-neutral-200/80 border border-neutral-400 px-2 py-1 rounded cursor-pointer">
        <a href="/create">create new todo</a>
    </div>
</x-layout>