<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todo laravel practice</title>
    <style>
        .bgdiv {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            z-index: -10;
        }

        .bgpic {
            height: 100%;
            width: 100%;
            object-fit: cover;
            object-position: left top;
        }

        .app {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 5px;
            width: 100vw;
            height: 100vh;
            padding: 0;
        }

        .app > div {
            background: rgba(255,255,255,.3);
            border-radius: 10px;
            padding: 10px;
        }


    </style>
</head>
<body style="margin: 0;">
    <div class="bgdiv">
        <img
            src="https://plus.unsplash.com/premium_photo-1683309568772-57011d6c1b7b?fm=jpg&q=60&w=3000&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8dG8lMjBkbyUyMGxpc3R8ZW58MHx8MHx8fDA%3D"
            alt="background"
            class="bgpic"
        />
    </div>

    <div class="app">
        <p>TODO LIST</p>

        <div>
            <ul>
                <?php foreach ($todos as $todo) : ?>
                    <div style="display: flex; gap: 5px; border: 1px solid black; margin-top: 2px;">
                        <li>{{ $todo->todo }}</li>
                        <a href="/todo/{{ $todo->id }}">edit</a>
                    </div>
                <?php endforeach ?>
            </ul>
        </div>

        <a href="/create">create new todo</a>
    </div>

</body>
</html>