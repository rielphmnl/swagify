<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>front end album</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-neutral-800">
    <div class="w-screen h-screen bg-neutral-800 text-neutral-200 p-3">
        <div class="border border-fuchsia-600 rounded-xl p-3">
            <p class="text-fuchsia-600 px-3 text-xl font-bold">Album</p>

            <!-- get -->
            <div class="border border-fuchsia-600 rounded-xl w-sm p-3 mt-3 flex flex-col gap-2">
                <p class="text-fuchsia-600 px-3 text-lg font-semibold mb-2">get</p>

                <div id="get_image_div" class="size-24 border border-fuchsia-600 rounded-xl mx-auto overflow-hidden p-1 hidden">
                    <img id="get_image" src=""/>
                </div>

                <label>
                    ID:
                    <span id="get_album_id" class="text-fuchsia-600"></span>
                </label>
    
                <label>
                    Name:
                    <span id="get_album_name" class="text-fuchsia-600"></span>
                </label>

                <label>
                    Artist ID:
                    <span id="get_artist_id" class="text-fuchsia-600"></span>
                </label>
    
                <label class="w-full overflow-x-auto">
                    Image path:
                    <span id="get_image_path" class="text-fuchsia-600"></span>
                </label>
    
                <div class="flex justify-center gap-5 mt-2">
                    <input id="getAlbumId" class="border border-fuchsia-600 rounded-4xl px-5 w-20" placeholder="id" type="number"/>
                    <button id="getAlbumBtn" class="border border-fuchsia-600 rounded-full hover:cursor-pointer hover:bg-neutral-700 active:bg-fuchsia-800 px-5 py-2">get album</button>
                </div>
            </div>


            <!-- post -->
            <div class="border border-fuchsia-600 rounded-xl w-sm p-3 mt-3 flex flex-col gap-2">
                <p class="text-fuchsia-600 px-3 text-lg font-semibold mb-2">post</p>

                <label for="post_album_name">
                    Name:
                    <input id="post_album_name" class="text-fuchsia-600 border border-fuchsia-600 rounded-lg" />
                </label>

                <label for="post_artist_id">
                    Artist ID:
                    <input id="post_artist_id" class="text-fuchsia-600 border border-fuchsia-600 rounded-lg" type="number" />
                </label>
    
                <label for="post_image">
                    Image:
                    <input id="post_image" type="file" accept="image/*" class="bg-fuchsia-600 rounded hover:cursor-pointer hover:bg-neutral-700"/>
                </label>
    
                <div class="flex justify-center gap-5 mt-2">
                    <button id="postAlbumBtn" class="border border-fuchsia-600 rounded-full hover:cursor-pointer hover:bg-neutral-700 active:bg-fuchsia-800 px-5 py-2">post album</button>
                </div>

                <div id="postDiv"></div>
            </div>


            <!-- put -->
            <div class="border border-fuchsia-600 rounded-xl w-sm p-3 mt-3 flex flex-col gap-2">
                <p class="text-fuchsia-600 px-3 text-lg font-semibold mb-2">put</p>

                <label for="put_album_id">
                    ID:
                    <input id="put_album_id" class="text-fuchsia-600 border border-fuchsia-600 rounded-lg" type="number" />
                </label>

                <label for="put_album_name">
                    Name:
                    <input id="put_album_name" class="text-fuchsia-600 border border-fuchsia-600 rounded-lg" />
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
                    <button id="putAlbumBtn" class="border border-fuchsia-600 rounded-full hover:cursor-pointer hover:bg-neutral-700 active:bg-fuchsia-800 px-5 py-2">put album</button>
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
                    <input id="deleteAlbumId" class="border border-fuchsia-600 rounded-4xl px-5 w-20" placeholder="id" type="number"/>
                    <button id="deleteAlbumBtn" class="border border-fuchsia-600 rounded-full hover:cursor-pointer hover:bg-neutral-700 active:bg-fuchsia-800 px-5 py-2">delete album</button>
                </div>
            </div>


            <!-- all albums -->
            <div id="allAlbumsDiv" class="border border-fuchsia-600 rounded-xl w-sm p-3 mt-3 flex flex-col gap-2">
                <p class="text-fuchsia-600 px-3 text-lg font-semibold mb-2">all albums</p>

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
        function getAlbumById() {
            const albumId = document.querySelector('#getAlbumId').value;
            clearElements();

            fetch(`http://127.0.0.1:8000/albums/${albumId}`)
            .then(response => {
                if (!response.ok){
                    throw new Error("can't fetch album " + response.status);
                }
                
                return response.json();
            })
            .then(data => {
                console.log("data idddddddd is " + data.id);
    
                document.querySelector('#get_album_id').innerHTML = data.id;
                document.querySelector('#get_album_name').innerHTML = data.name;
                document.querySelector('#get_artist_id').innerHTML = data.artist_id;
                document.querySelector('#get_image_path').innerHTML = data.image;

                document.querySelector('#get_image').src = data.image;
                document.querySelector('#get_image_div').classList.replace('hidden', 'block');

            })
            .catch(error => console.error(error));
            // alert(`http://127.0.0.1:8000//albums/${albumId}`);
        }

        function postAlbum() {
            // name of album
            const name = document.querySelector('#post_album_name').value;
            // artist id
            const artistId = document.querySelector('#post_artist_id').value;
            // image of album
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


            fetch("http://127.0.0.1:8000/albums", {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                }
            })
                .then(response => {
                    if (!response.ok){
                        throw new Error("can't fetch album " + response.status);
                    }
                    
                    return response.json();
                })
                .then(
                    album => {
                    console.log(album);

                    divEl.appendChild(createAlbumDiv(album));

                    refreshAlbumsList();
                })
                .catch(error => console.error(error));
        }

        function putAlbum() {
            // name of album
            const id = document.querySelector('#put_album_id').value;
            // name of album
            const name = document.querySelector('#put_album_name').value;
            // artist id of album
            const artistId = document.querySelector('#put_artist_id').value;
            // image of album
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

            fetch(`http://127.0.0.1:8000/albums/${id}`, {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                }
            })
                .then(response => {
                    if (!response.ok){
                        throw new Error("can't fetch album " + response.status);
                    }

                    return response.json();
                })
                .then(
                    album => {
                        divEl.appendChild(createAlbumDiv(album));

                        refreshAlbumsList();
                })
                .catch(error => console.error(error));
        }

        function deleteAlbum() {
            const albumId = document.querySelector('#deleteAlbumId').value;

            clearElements();

            ///////// how to change link domain
            fetch(`http://127.0.0.1:8000/albums/${albumId}`, {
                method: 'delete',
                body: albumId,
            })
                .then(response => {
                    if(!response.ok) {
                        throw new Error("album not found " + response.status);
                    }

                    return response.json();
                })
                .then(data => {
                    console.log(data);

                    document.querySelector('#delete_image').src = data.image;
                    document.querySelector('#delete_image_div').classList.replace('hidden', 'block');

                    refreshAlbumsList();

                    return data;
                    /// delete image
                })
                .catch(error => console.error(error));

        }

        function clearElements() {
            document.querySelector('#get_album_id').innerHTML = "";
            document.querySelector('#get_album_name').innerHTML = "";
            document.querySelector('#get_artist_id').innerHTML = "";
            document.querySelector('#get_image_path').innerHTML = "";
            document.querySelector('#getAlbumId').value = "";
            
            document.querySelector('#get_image_div').classList.replace('block', 'hidden');

            document.querySelector('#post_album_name').value = "";
            document.querySelector('#post_artist_id').value = "";
            document.querySelector('#post_image').value = "";

            document.querySelector('#postDiv').replaceChildren();

            document.querySelector('#put_album_id').value = "";
            document.querySelector('#put_album_name').value = "";
            document.querySelector('#put_artist_id').value = "";
            document.querySelector('#put_image').value = "";

            document.querySelector('#putDiv').replaceChildren();

            document.querySelector('#deleteAlbumId').value = "";

            document.querySelector('#delete_image_div').classList.replace('block', 'hidden');
            
            console.log('elements cleared');            
        }

        function createAlbumDiv(album) {
            // full div
            const newDiv = document.createElement('div');
            newDiv.id = 'album-' + album.id;
            newDiv.classList.add('border', 'border-fuchsia-600', 'rounded-xl', 'w-xs', 'px-2', 'py-1', 'flex', 'gap-2');
    
            // left div
            const leftDiv = document.createElement('div');
            leftDiv.classList.add('size-24', 'overflow-hidden', 'flex', 'items-center');

            // img
            const newImg = document.createElement('img');
            newImg.src = album.image;

            // append left part to main div
            leftDiv.appendChild(newImg);
            newDiv.appendChild(leftDiv);


            // right div
            const rightDiv = document.createElement('div');
            rightDiv.classList.add('h-24', 'flex-1', 'overflow-auto', 'flex', 'flex-col', 'justify-center');

            // details
            const newId = document.createElement('p');
            newId.innerText = album.id;

            const newName = document.createElement('p');
            newName.innerText = album.name;

            const newArtistId = document.createElement('p');
            newArtistId.innerText = "Artist ID: " + album.artist_id;

            const newPath = document.createElement('p');
            newPath.innerText = album.image;

            // append right part to main div
            rightDiv.appendChild(newId);
            rightDiv.appendChild(newName);
            rightDiv.appendChild(newArtistId);
            rightDiv.appendChild(newPath);
            newDiv.appendChild(rightDiv);

    
            return newDiv;
        }
        

        function refreshAlbumsList() {
            const divEl = document.querySelector('#allAlbumsDiv');

            divEl.replaceChildren();

            intitialLoad();
        }


        function intitialLoad() {
            const divEl = document.querySelector('#allAlbumsDiv');

            // make div per album
            fetch('http://127.0.0.1:8000/albums')
                .then(response => {
                    if(!response.ok) {
                        throw new Error('albums not found');
                    }

                    return response.json();
                })
                .then(albums => {
                    for (const album of albums) {
                        divEl.appendChild(createAlbumDiv(album));
                    }
                })
                .catch(error => console.error(error))
        }


        document.querySelector('#getAlbumBtn').addEventListener('click', getAlbumById);
        document.querySelector('#postAlbumBtn').addEventListener('click', postAlbum);
        document.querySelector('#putAlbumBtn').addEventListener('click', putAlbum);
        document.querySelector('#deleteAlbumBtn').addEventListener('click', deleteAlbum);

        intitialLoad();
    </script>
</body>
</html>