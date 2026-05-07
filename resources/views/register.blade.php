<x-layout>
    <div class="bg-neutral-200/70 rounded-xl p-5 flex flex-col gap-2">
        <div class="flex justify-end items-center gap-2">
            <label for="username">username:</label>
            <input class="bg-neutral-200/70 rounded w-3xs py-1 px-2" type="text" id="username" name="username" />
        </div>

        <div class="flex justify-end items-center gap-2">
            <label for="email">e-mail:</label>
            <input class="bg-neutral-200/70 rounded w-3xs py-1 px-2" type="email" id="email" type="email" />
        </div>

        <div class="flex justify-end items-center gap-2">
            <label for="password">password:</label>
            <input class="bg-neutral-200/70 rounded w-3xs py-1 px-2" type="text" id="password" type="password" />
        </div>

        <button class="bg-neutral-200/70 hover:bg-neutral-200/90 border border-neutral-300 rounded-lg cursor-pointer py-1 px-2">Register</button>
    </div>
</x-layout>