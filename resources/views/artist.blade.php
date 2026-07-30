<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>front end artist</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-neutral-800">
    <div class="w-screen h-screen bg-neutral-800 text-neutral-200 p-3">
        <div class="border border-fuchsia-600 rounded-xl p-3">
            <p class="text-fuchsia-600 px-3 text-xl font-bold">Artist</p>

            <!-- get -->
            <div class="border border-fuchsia-600 rounded-xl w-sm p-3 mt-3 flex flex-col gap-2">
                <p class="text-fuchsia-600 px-3 text-lg font-semibold mb-2">get</p>

                <div id="get_image_div" class="size-24 border border-fuchsia-600 rounded-xl mx-auto overflow-hidden p-1 hidden">
                    <img id="get_image" src=""/>
                </div>

                <label>
                    ID:
                    <span id="get_artist_id" class="text-fuchsia-600"></span>
                </label>
    
                <label>
                    Name:
                    <span id="get_artist_name" class="text-fuchsia-600"></span>
                </label>
    
                <label>
                    Image path:
                    <span id="get_image_path" class="text-fuchsia-600"></span>
                </label>
    
                <div class="flex justify-center gap-5 mt-2">
                    <input id="getArtistId" class="border border-fuchsia-600 rounded-4xl px-5 w-20" placeholder="id" type="number"/>
                    <button id="getArtistBtn" class="border border-fuchsia-600 rounded-full hover:cursor-pointer hover:bg-neutral-700 active:bg-fuchsia-800 px-5 py-2">get artist</button>
                </div>
            </div>


            <!-- post -->
            <div id="postDiv" class="border border-fuchsia-600 rounded-xl w-sm p-3 mt-3 flex flex-col gap-2">
                <p class="text-fuchsia-600 px-3 text-lg font-semibold mb-2">post</p>

                <label for="post_artist_name">
                    Name:
                    <input id="post_artist_name" class="text-fuchsia-600 border border-fuchsia-600 rounded-lg" />
                </label>
    
                <label for="post_image">
                    Image:
                    <input id="post_image" type="file" accept="image/*" class="bg-fuchsia-600 rounded hover:cursor-pointer hover:bg-neutral-700"/>
                </label>
    
                <div class="flex justify-center gap-5 mt-2">
                    <button id="postArtistBtn" class="border border-fuchsia-600 rounded-full hover:cursor-pointer hover:bg-neutral-700 active:bg-fuchsia-800 px-5 py-2">post artist</button>
                </div>
            </div>


            <!-- put -->
            <div class="border border-fuchsia-600 rounded-xl w-sm p-3 mt-3 flex flex-col gap-2">
                <p class="text-fuchsia-600 px-3 text-lg font-semibold mb-2">put</p>

                <label for="put_artist_id">
                    ID:
                    <input id="put_artist_id" class="text-fuchsia-600 border border-fuchsia-600 rounded-lg" type="number" />
                </label>

                <label for="put_artist_name">
                    Name:
                    <input id="put_artist_name" class="text-fuchsia-600 border border-fuchsia-600 rounded-lg" />
                </label>
    
                <label for="put_image">
                    Image:
                    <input id="put_image" type="file" accept="image/*" class="bg-fuchsia-600 rounded hover:cursor-pointer hover:bg-neutral-700"/>
                </label>
    
                <div class="flex justify-center gap-5 mt-2">
                    <button id="putArtistBtn" class="border border-fuchsia-600 rounded-full hover:cursor-pointer hover:bg-neutral-700 active:bg-fuchsia-800 px-5 py-2">put artist</button>
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
                    <input id="deleteArtistId" class="border border-fuchsia-600 rounded-4xl px-5 w-20" placeholder="id" type="number"/>
                    <button id="deleteArtistBtn" class="border border-fuchsia-600 rounded-full hover:cursor-pointer hover:bg-neutral-700 active:bg-fuchsia-800 px-5 py-2">delete artist</button>
                </div>
            </div>


            <!-- all artists -->
            <div id="allArtistsDiv" class="border border-fuchsia-600 rounded-xl w-sm p-3 mt-3 flex flex-col gap-2">
                <p class="text-fuchsia-600 px-3 text-lg font-semibold mb-2">all artists</p>

                <!-- div template -->
                <!-- <div class="border border-fuchsia-600 rounded-xl w-xs px-2 flex gap-2">
                    <div class="size-24 overflow-hidden flex items-center">
                        <img src="/storage/artist_image/e0zWFZgOt2sD3cYlXxv4p3vF3ccBJAegcHkfkQj3.png"/>
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
        function getArtistById() {
            const artistId = document.querySelector('#getArtistId').value;
            clearElements();

            fetch(`http://127.0.0.1:8000/artists/${artistId}`)
            .then(response => {
                if (!response.ok){
                    throw new Error("can't fetch artist " + response.status);
                }
                
                return response.json();
            })
            .then(data => {
                console.log("data idddddddd is " + data.id);
    
                document.querySelector('#get_artist_id').innerHTML = data.id;
                document.querySelector('#get_artist_name').innerHTML = data.name;
                document.querySelector('#get_image_path').innerHTML = data.image;

                document.querySelector('#get_image').src = data.image;
                document.querySelector('#get_image_div').classList.replace('hidden', 'block');

            })
            .catch(error => console.error(error));
            // alert(`http://127.0.0.1:8000//artists/${artistId}`);
        }

        function postArtist() {
            // name of artist
            const name = document.querySelector('#post_artist_name').value;
            // image of artist
            const file = document.querySelector('#post_image');
            // div element
            const divEl = document.querySelector('#postDiv');

            const image = file.files[0];

            // create form to submit
            const formData = new FormData();
            formData.append('name', name);
            formData.append('image', image);

            clearElements();

            fetch("http://127.0.0.1:8000/artists", {
                method: 'post',
                body: formData,
            })
                .then(response => {
                    if (!response.ok){
                        throw new Error("can't fetch artist " + response.status);
                    }
                    
                    return response.json();
                })
                .then(
                    artist => {
                    console.log(artist);

                    divEl.appendChild(createArtistDiv(artist));

                    refreshArtistsList();
                })
                .catch(error => console.error(error));
        }

        function putArtist() {
            // name of artist
            const id = document.querySelector('#put_artist_id').value;
            // name of artist
            const name = document.querySelector('#put_artist_name').value;
            // image of artist
            const file = document.querySelector('#put_image');
            // div element
            const divEl = document.querySelector('#putDiv');

            const image = file.files[0];

            // create form to submit
            const formData = new FormData();
            formData.append('id', id);
            formData.append('name', name);

            if (image) {
                formData.append('image', image);
            };

            formData.append('_method', 'PUT');

            console.log('!!!!!!!!!!!!!!!!!!!');
            console.log(formData);
            console.log('!!!!!!!!!!!!!!!!!!!');
            // why walang laman formData ko grrrrr

            clearElements();

            fetch(`http://127.0.0.1:8000/artists/${id}`, {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                }
            })
                .then(response => {
                    if (!response.ok){
                        throw new Error("can't fetch artist " + response.status);
                    }

                    return response.json();
                })
                .then(
                    artist => {
                        divEl.appendChild(createArtistDiv(artist));

                        refreshArtistsList();
                })
                .catch(error => console.error(error));
        }

        function deleteArtist() {
            const artistId = document.querySelector('#deleteArtistId').value;

            clearElements();

            ///////// how to change link domain
            fetch(`http://127.0.0.1:8000/artists/${artistId}`, {
                method: 'delete',
                body: artistId,
            })
                .then(response => {
                    if(!response.ok) {
                        throw new Error("artist not found " + response.status);
                    }

                    return response.json();
                })
                .then(data => {
                    console.log(data);

                    document.querySelector('#delete_image').src = data.image;
                    document.querySelector('#delete_image_div').classList.replace('hidden', 'block');

                    refreshArtistsList();

                    return data;
                    /// delete image
                })
                .catch(error => console.error(error));

        }

        function clearElements() {
            document.querySelector('#get_artist_id').innerHTML = "";
            document.querySelector('#get_artist_name').innerHTML = "";
            document.querySelector('#get_image_path').innerHTML = "";
            document.querySelector('#getArtistId').value = "";
            
            document.querySelector('#get_image_div').classList.replace('block', 'hidden');

            document.querySelector('#post_artist_name').value = "";
            document.querySelector('#post_image').value = "";

            document.querySelector('#put_artist_id').value = "";
            document.querySelector('#put_artist_name').value = "";
            document.querySelector('#put_image').value = "";

            document.querySelector('#putDiv').replaceChildren();

            document.querySelector('#deleteArtistId').value = "";

            document.querySelector('#delete_image_div').classList.replace('block', 'hidden');
            
            console.log('elements cleared');            
        }

        function createArtistDiv(artist) {
            // full div
            const newDiv = document.createElement('div');
            newDiv.id = 'artist-' + artist.id;
            newDiv.classList.add('border', 'border-fuchsia-600', 'rounded-xl', 'w-xs', 'px-2', 'py-1', 'flex', 'gap-2');
    
            // left div
            const leftDiv = document.createElement('div');
            leftDiv.classList.add('size-24', 'overflow-hidden', 'flex', 'items-center');

            // img
            const newImg = document.createElement('img');
            newImg.src = artist.image;

            // append left part to main div
            leftDiv.appendChild(newImg);
            newDiv.appendChild(leftDiv);


            // right div
            const rightDiv = document.createElement('div');
            rightDiv.classList.add('h-24', 'flex-1', 'overflow-auto', 'flex', 'flex-col', 'justify-center');

            // details
            const newId = document.createElement('p');
            newId.innerText = artist.id;

            const newName = document.createElement('p');
            newName.innerText = artist.name;

            const newPath = document.createElement('p');
            newPath.innerText = artist.image;

            // append right part to main div
            rightDiv.appendChild(newId);
            rightDiv.appendChild(newName);
            rightDiv.appendChild(newPath);
            newDiv.appendChild(rightDiv);

    
            return newDiv;
        }
        

        function refreshArtistsList() {
            const divEl = document.querySelector('#allArtistsDiv');

            divEl.replaceChildren();

            intitialLoad();
        }


        function intitialLoad() {
            const divEl = document.querySelector('#allArtistsDiv');

            // make div per artist
            fetch('http://127.0.0.1:8000/artists')
                .then(response => {
                    if(!response.ok) {
                        throw new Error('artists not found');
                    }

                    return response.json();
                })
                .then(artists => {
                    for (const artist of artists) {
                        divEl.appendChild(createArtistDiv(artist));
                    }
                })
                .catch(error => console.error(error))
        }


        document.querySelector('#getArtistBtn').addEventListener('click', getArtistById);
        document.querySelector('#postArtistBtn').addEventListener('click', postArtist);
        document.querySelector('#putArtistBtn').addEventListener('click', putArtist);
        document.querySelector('#deleteArtistBtn').addEventListener('click', deleteArtist);

        intitialLoad();
    </script>
</body>
</html>