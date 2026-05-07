@props ([
    'title' => 'todo laravel practice'
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="absolute left-0 right-0 top-0 bottom-0 -z-10">
        <img
            src="https://plus.unsplash.com/premium_photo-1683309568772-57011d6c1b7b?fm=jpg&q=60&w=3000&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8dG8lMjBkbyUyMGxpc3R8ZW58MHx8MHx8fDA%3D"
            alt="background"
            class="h-full w-full object-cover object-left-top opacity-75"
        />
    </div>

    <div class="w-screen h-screen flex flex-col">
        <nav class="flex justify-end gap-2 py-2 px-5">
            <a class="bg-neutral-200/70 hover:bg-neutral-200/90 border border-neutral-300 rounded-lg cursor-pointer py-1 px-2" href="/login">log in</a>
            <a class="bg-neutral-200/70 hover:bg-neutral-200/90 border border-neutral-300 rounded-lg cursor-pointer py-1 px-2" href="/register">sign up</a>
        </nav>

        <div class="flex flex-col justify-center items-center gap-5 flex-1">
            {{ $slot }}
        </div>
    </div>


</body>
</html>