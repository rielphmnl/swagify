<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fetch</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="w-screen h-screen bg-neutral-800 text-neutral-200 p-3">
        <div class="border border-fuchsia-600 rounded-xl w-sm p-3">
            <p class="text-fuchsia-600 px-3 text-xl font-bold">Artist</p>

            <label for="artist_id">
                ID:
                <span id="artist_id" class="text-fuchsia-600"></span>
            </label>

            <br>

            <label for="artist_name">
                Name:
                <span id="artist_name" class="text-fuchsia-600"></span>
            </label>

            <br>

            <label for="image_path">
                Image path:
                <span id="image_path" class="text-fuchsia-600"></span>
            </label>

            <div class="flex justify-center gap-5 mt-2">
                <input id="getArtistId" class="border border-fuchsia-600 rounded-4xl px-5 w-20" placeholder="id" type="number"/>
                <button id="getArtistBtn" class="border border-fuchsia-600 rounded-full hover:cursor-pointer hover:bg-neutral-700 active:bg-fuchsia-800 px-5 py-2">get artist</button>
            </div>
        </div>
    </div>


    <script>
        // const getArtistEl = document.querySelector('#getArtistBtn');
        // const getArtistIdEl = document.querySelector('#getArtistId').value;

        function getArtistById() {
            const artistId = document.querySelector('#getArtistId').value
            fetch(`http://127.0.0.1:8000/artists/${artistId}`)
            .then(response => {
                if (!response.ok){
                    throw new Error("can't fetch artist");
                }
                
                return response.json();
            })
            .then(data => {
                console.log("data idddddddd is " + data.id);
    
                document.querySelector('#artist_id').innerHTML = data.id;
                document.querySelector('#artist_name').innerHTML = data.name;
                document.querySelector('#image_path').innerHTML = data.image;
            })
            .catch(error => console.error(error));
            // alert(`http://127.0.0.1:8000//artists/${artistId}`);
        }

        document.querySelector('#getArtistBtn').addEventListener('click', getArtistById);
    </script>
</body>
</html>