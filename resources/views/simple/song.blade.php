<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>front end song</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-neutral-800">
    <div class="w-screen h-screen bg-neutral-800 text-neutral-200 p-3">
        <div class="border border-fuchsia-600 rounded-xl p-3">
            <p class="text-fuchsia-600 px-3 text-xl font-bold">Song</p>

            <!-- get -->
            <div class="border border-fuchsia-600 rounded-xl w-sm p-3 mt-3 flex flex-col gap-2">
                <p class="text-fuchsia-600 px-3 text-lg font-semibold mb-2">get</p>

                <div id="get_image_div" class="size-24 border border-fuchsia-600 rounded-xl mx-auto overflow-hidden p-1 hidden">
                    <img id="get_image" src=""/>
                </div>

                <label>
                    ID:
                    <span id="get_song_id" class="text-fuchsia-600"></span>
                </label>
    
                <label>
                    Name:
                    <span id="get_song_name" class="text-fuchsia-600"></span>
                </label>

                <label>
                    Artist ID:
                    <span id="get_artist_id" class="text-fuchsia-600"></span>
                </label>

                <label>
                    Album ID:
                    <span id="get_album_id" class="text-fuchsia-600"></span>
                </label>
    
                <label class="w-full overflow-x-auto">
                    Image path:
                    <span id="get_image_path" class="text-fuchsia-600"></span>
                </label>

                <label class="w-full overflow-x-auto">
                    File path:
                    <span id="get_file_path" class="text-fuchsia-600"></span>
                </label>
    
                <div class="flex justify-center gap-5 mt-2">
                    <input id="getSongId" class="border border-fuchsia-600 rounded-4xl px-5 w-20" placeholder="id" type="number"/>
                    <button id="getSongBtn" class="border border-fuchsia-600 rounded-full hover:cursor-pointer hover:bg-neutral-700 active:bg-fuchsia-800 px-5 py-2">get song</button>
                </div>
            </div>


            <!-- post -->
            <div class="border border-fuchsia-600 rounded-xl w-sm p-3 mt-3 flex flex-col gap-2">
                <p class="text-fuchsia-600 px-3 text-lg font-semibold mb-2">post</p>

                <label for="post_song_name">
                    Name:
                    <input id="post_song_name" class="text-fuchsia-600 border border-fuchsia-600 rounded-lg" />
                </label>

                <label for="post_artist_id">
                    Artist ID:
                    <input id="post_artist_id" class="text-fuchsia-600 border border-fuchsia-600 rounded-lg" type="number" />
                </label>

                <label for="post_album_id">
                    Album ID:
                    <input id="post_album_id" class="text-fuchsia-600 border border-fuchsia-600 rounded-lg" type="number" />
                </label>
    
                <label for="post_image">
                    Image:
                    <input id="post_image" type="file" accept="image/*" class="bg-fuchsia-600 rounded hover:cursor-pointer hover:bg-neutral-700"/>
                </label>

                <label for="post_song_file">
                    Song File:
                    <input id="post_song_file" type="file" accept="audio/*" class="bg-fuchsia-600 rounded hover:cursor-pointer hover:bg-neutral-700"/>
                </label>
    
                <div class="flex justify-center gap-5 mt-2">
                    <button id="postSongBtn" class="border border-fuchsia-600 rounded-full hover:cursor-pointer hover:bg-neutral-700 active:bg-fuchsia-800 px-5 py-2">post song</button>
                </div>

                <div id="postDiv"></div>
            </div>


            <!-- put -->
            <div class="border border-fuchsia-600 rounded-xl w-sm p-3 mt-3 flex flex-col gap-2">
                <p class="text-fuchsia-600 px-3 text-lg font-semibold mb-2">put</p>

                <label for="put_song_id">
                    ID:
                    <input id="put_song_id" class="text-fuchsia-600 border border-fuchsia-600 rounded-lg" type="number" />
                </label>

                <label for="put_song_name">
                    Name:
                    <input id="put_song_name" class="text-fuchsia-600 border border-fuchsia-600 rounded-lg" />
                </label>

                <label for="put_artist_id">
                    Artist ID:
                    <input id="put_artist_id" class="text-fuchsia-600 border border-fuchsia-600 rounded-lg" type="number" />
                </label>
    
                <label for="put_image">
                    Image:
                    <input id="put_image" type="file" accept="image/*" class="bg-fuchsia-600 rounded hover:cursor-pointer hover:bg-neutral-700"/>
                </label>
    
                <div class="flex justify-center gap-5 mt-2">
                    <button id="putSongBtn" class="border border-fuchsia-600 rounded-full hover:cursor-pointer hover:bg-neutral-700 active:bg-fuchsia-800 px-5 py-2">put song</button>
                </div>

                <div id="putDiv">
                    
                </div>
            </div>


            <!-- delete -->
            <div class="border border-fuchsia-600 rounded-xl w-sm p-3 mt-3 flex flex-col gap-2">
                <p class="text-fuchsia-600 px-3 text-lg font-semibold mb-2">delete</p>

                <div id="delete_image_div" class="size-24 border border-fuchsia-600 rounded-xl mx-auto overflow-hidden p-1 hidden">
                    <img id="delete_image" src="" class="opacity-30"/>
                </div>

                <div class="flex justify-center gap-5">
                    <input id="deleteSongId" class="border border-fuchsia-600 rounded-4xl px-5 w-20" placeholder="id" type="number"/>
                    <button id="deleteSongBtn" class="border border-fuchsia-600 rounded-full hover:cursor-pointer hover:bg-neutral-700 active:bg-fuchsia-800 px-5 py-2">delete song</button>
                </div>
            </div>


            <!-- all aongs -->
            <div id="allSongsDiv" class="border border-fuchsia-600 rounded-xl w-sm p-3 mt-3 flex flex-col gap-2">
                <p class="text-fuchsia-600 px-3 text-lg font-semibold mb-2">all songs</p>

                <!-- div template -->
                <!-- <div class="border border-fuchsia-600 rounded-xl w-xs px-2 flex gap-2">
                    <div class="size-24 overflow-hidden flex items-center">
                        <img src="/storage/song_image/e0zWFZgOt2sD3cYlXxv4p3vF3ccBJAegcHkfkQj3.png"/>
                    </div>

                    <div class="h-24 flex-1 overflow-hidden flex flex-col justify-center">
                         <p>id: </p>
                         <p>name: </p>
                         <p>image path: </p>
                    </div>
                </div> -->

                

            </div>


            


        </div>
    </div>


    <script>
        function getSongById() {
            const songId = document.querySelector('#getSongId').value;
            clearElements();

            fetch(`http://127.0.0.1:8000/songs/${songId}`)
            .then(response => {
                if (!response.ok){
                    throw new Error("can't fetch song " + response.status);
                }
                
                return response.json();
            })
            .then(data => {
                console.log("data idddddddd is " + data.id);
    
                document.querySelector('#get_song_id').innerHTML = data.id;
                document.querySelector('#get_song_name').innerHTML = data.name;
                document.querySelector('#get_artist_id').innerHTML = data.artist_id;
                document.querySelector('#get_album_id').innerHTML = data.album_id;
                document.querySelector('#get_image_path').innerHTML = data.image;
                document.querySelector('#get_file_path').innerHTML = data.song_file;

                document.querySelector('#get_image').src = data.image;
                document.querySelector('#get_image_div').classList.replace('hidden', 'block');

            })
            .catch(error => console.error(error));
            // alert(`http://127.0.0.1:8000//songs/${songId}`);
        }

        function postSong() {
            // name of song
            const name = document.querySelector('#post_song_name').value;
            // artist id
            const artistId = document.querySelector('#post_artist_id').value;
            // image of song
            const file = document.querySelector('#post_image');
            // div element
            const divEl = document.querySelector('#postDiv');

            const image = file.files[0];

            // create form to submit
            const formData = new FormData();
            formData.append('name', name);
            formData.append('artist_id', artistId);
            formData.append('image', image);

            clearElements();


            fetch("http://127.0.0.1:8000/songs", {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                }
            })
                .then(response => {
                    if (!response.ok){
                        throw new Error("can't fetch song " + response.status);
                    }
                    
                    return response.json();
                })
                .then(
                    song => {
                    console.log(song);

                    divEl.appendChild(createSongDiv(song));

                    refreshSongsList();
                })
                .catch(error => console.error(error));
        }

        function putSong() {
            // name of song
            const id = document.querySelector('#put_song_id').value;
            // name of song
            const name = document.querySelector('#put_song_name').value;
            // artist id of song
            const artistId = document.querySelector('#put_artist_id').value;
            // image of song
            const file = document.querySelector('#put_image');
            // div element
            const divEl = document.querySelector('#putDiv');

            const image = file.files[0];

            // create form to submit
            const formData = new FormData();
            formData.append('id', id);
            formData.append('name', name);
            formData.append('artist_id', artistId);

            if (image) {
                formData.append('image', image);
            };

            formData.append('_method', 'PUT');

            console.log('!!!!!!!!!!!!!!!!!!!');
            console.log(formData);
            console.log('!!!!!!!!!!!!!!!!!!!');
            // why walang laman formData ko grrrrr

            clearElements();

            fetch(`http://127.0.0.1:8000/songs/${id}`, {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                }
            })
                .then(response => {
                    if (!response.ok){
                        throw new Error("can't fetch song " + response.status);
                    }

                    return response.json();
                })
                .then(
                    song => {
                        divEl.appendChild(createSongDiv(song));

                        refreshSongsList();
                })
                .catch(error => console.error(error));
        }

        function deleteSong() {
            const songId = document.querySelector('#deleteSongId').value;

            clearElements();

            ///////// how to change link domain
            fetch(`http://127.0.0.1:8000/songs/${songId}`, {
                method: 'delete',
                body: songId,
            })
                .then(response => {
                    if(!response.ok) {
                        throw new Error("song not found " + response.status);
                    }

                    return response.json();
                })
                .then(data => {
                    console.log(data);

                    document.querySelector('#delete_image').src = data.image;
                    document.querySelector('#delete_image_div').classList.replace('hidden', 'block');

                    refreshSongsList();

                    return data;
                    /// delete image
                })
                .catch(error => console.error(error));

        }

        function clearElements() {
            document.querySelector('#get_song_id').innerHTML = "";
            document.querySelector('#get_song_name').innerHTML = "";
            document.querySelector('#get_artist_id').innerHTML = "";
            document.querySelector('#get_album_id').innerHTML = "";
            document.querySelector('#get_image_path').innerHTML = "";
            document.querySelector('#get_file_path').innerHTML = "";
            document.querySelector('#getSongId').value = "";
            
            document.querySelector('#get_image_div').classList.replace('block', 'hidden');

            document.querySelector('#post_song_name').value = "";
            document.querySelector('#post_artist_id').value = "";
            document.querySelector('#post_image').value = "";

            document.querySelector('#postDiv').replaceChildren();

            document.querySelector('#put_song_id').value = "";
            document.querySelector('#put_song_name').value = "";
            document.querySelector('#put_artist_id').value = "";
            document.querySelector('#put_image').value = "";

            document.querySelector('#putDiv').replaceChildren();

            document.querySelector('#deleteSongId').value = "";

            document.querySelector('#delete_image_div').classList.replace('block', 'hidden');
            
            console.log('elements cleared');            
        }

        function createSongDiv(song) {
            // full div
            const newDiv = document.createElement('div');
            newDiv.id = 'song-' + song.id;
            newDiv.classList.add('border', 'border-fuchsia-600', 'rounded-xl', 'w-xs', 'px-2', 'py-1', 'flex', 'gap-2');
    
            // left div
            const leftDiv = document.createElement('div');
            leftDiv.classList.add('size-36', 'overflow-hidden', 'flex', 'items-center');

            // img
            const newImg = document.createElement('img');
            newImg.src = song.image;

            // append left part to main div
            leftDiv.appendChild(newImg);
            newDiv.appendChild(leftDiv);


            // right div
            const rightDiv = document.createElement('div');
            rightDiv.classList.add('h-36', 'flex-1', 'overflow-auto', 'flex', 'flex-col', 'justify-center');

            // details
            const newId = document.createElement('p');
            newId.innerText = song.id;

            const newName = document.createElement('p');
            newName.innerText = song.name;

            const newArtistId = document.createElement('p');
            newArtistId.innerText = "Artist ID: " + song.artist_id;

            const newAlbumId = document.createElement('p');
            newAlbumId.innerText = "Album ID: " + song.album_id;

            const newImagePath = document.createElement('p');
            newImagePath.innerText = song.image;

            const newFilePath = document.createElement('p');
            newFilePath.innerText = song.song_file;

            // append right part to main div
            rightDiv.appendChild(newId);
            rightDiv.appendChild(newName);
            rightDiv.appendChild(newArtistId);
            rightDiv.appendChild(newAlbumId);
            rightDiv.appendChild(newImagePath);
            rightDiv.appendChild(newFilePath);
            newDiv.appendChild(rightDiv);

    
            return newDiv;
        }
        

        function refreshSongsList() {
            const divEl = document.querySelector('#allSongsDiv');

            divEl.replaceChildren();

            intitialLoad();
        }


        function intitialLoad() {
            const divEl = document.querySelector('#allSongsDiv');

            // make div per song
            fetch('http://127.0.0.1:8000/songs')
                .then(response => {
                    if(!response.ok) {
                        throw new Error('songs not found');
                    }

                    return response.json();
                })
                .then(songs => {
                    for (const song of songs) {
                        divEl.appendChild(createSongDiv(song));
                    }
                })
                .catch(error => console.error(error))
        }


        document.querySelector('#getSongBtn').addEventListener('click', getSongById);
        document.querySelector('#postSongBtn').addEventListener('click', postSong);
        document.querySelector('#putSongBtn').addEventListener('click', putSong);
        document.querySelector('#deleteSongBtn').addEventListener('click', deleteSong);

        intitialLoad();
    </script>
</body>
</html>