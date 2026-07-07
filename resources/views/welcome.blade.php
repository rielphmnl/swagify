<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fetch</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-neutral-800">
    <div class="w-screen h-screen bg-neutral-800 text-neutral-200 p-3">
        <div class="border border-fuchsia-600 rounded-xl p-3">
            <p class="text-fuchsia-600 px-3 text-xl font-bold">Artist</p>

            <!-- get -->
            <div class="border border-fuchsia-600 rounded-xl w-sm p-3 mt-3 flex flex-col gap-2">
                <p class="text-fuchsia-600 px-3 text-lg font-semibold mb-2">get</p>
                <label for="get_artist_id">
                    ID:
                    <span id="get_artist_id" class="text-fuchsia-600"></span>
                </label>
    
                <label for="get_artist_name">
                    Name:
                    <span id="get_artist_name" class="text-fuchsia-600"></span>
                </label>
    
                <label for="get_image_path">
                    Image path:
                    <span id="get_image_path" class="text-fuchsia-600"></span>
                </label>
    
                <div class="flex justify-center gap-5 mt-2">
                    <input id="getArtistId" class="border border-fuchsia-600 rounded-4xl px-5 w-20" placeholder="id" type="number"/>
                    <button id="getArtistBtn" class="border border-fuchsia-600 rounded-full hover:cursor-pointer hover:bg-neutral-700 active:bg-fuchsia-800 px-5 py-2">get artist</button>
                </div>
            </div>


            <!-- post -->
            <div class="border border-fuchsia-600 rounded-xl w-sm p-3 mt-3 flex flex-col gap-2">
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



        </div>
    </div>


    <script>
        function getArtistById() {
            const artistId = document.querySelector('#getArtistId').value;
            fetch(`http://127.0.0.1:8000/artists/${artistId}`)
            .then(response => {
                if (!response.ok){
                    throw new Error("can't fetch artist");
                }
                
                return response.json();
            })
            .then(data => {
                console.log("data idddddddd is " + data.id);
    
                document.querySelector('#get_artist_id').innerHTML = data.id;
                document.querySelector('#get_artist_name').innerHTML = data.name;
                document.querySelector('#get_image_path').innerHTML = data.image;
            })
            .catch(error => console.error(error));
            // alert(`http://127.0.0.1:8000//artists/${artistId}`);
        }

        function postArtist() {
            const name = document.querySelector('#post_artist_name').value;
            const file = document.querySelector('#postImage');
            const image = file.files[0];

            ////////????????
            const formData = new formData();
            formData.append('image', image);

            //////////////////////////
            //////////////////////////
            /////// how to send file /////
            //////////////////////////

            fetch("http://127.0.0.1:8000/artists", {
                method: 'post',
                body: ///////??????
            })
                .then(response => {
                    if (!response.ok){
                        throw new Error("can't fetch artist");
                    }
                    
                    return response.json();
                })
                .then(
                    data => console.log(data)

                )
                .catch(error => console.error(error));
        }

        document.querySelector('#getArtistBtn').addEventListener('click', getArtistById);
        document.querySelector('#postArtistBtn').addEventListener('click', postArtist);
    </script>
</body>
</html>