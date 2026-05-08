<x-layout>
    <form method="POST" action="/login">
        <div class="bg-neutral-200/70 rounded-xl p-5 flex flex-col gap-2">
    
            <div class="flex justify-end items-center gap-2">
                <label for="email">e-mail:</label>
                <div>
                    <input class="bg-neutral-200/70 rounded w-3xs py-1 px-2" type="email" id="email" type="email" name="email" />
                    <x-error name="email" />
                </div>
            </div>
    
            <div class="flex justify-end items-center gap-2">
                <label for="password">password:</label>
                <div>
                    <input class="bg-neutral-200/70 rounded w-3xs py-1 px-2" type="text" id="password" name="password" />
                    <x-error name="password" />
                </div>
            </div>
    
            <button type="sumbit" class="bg-neutral-200/70 hover:bg-neutral-200/90 border border-neutral-300 rounded-lg cursor-pointer py-1 px-2">Log in</button>
        </div>
    </form>
</x-layout>