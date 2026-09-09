<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>swagify</title>

	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
	<script src="https://unpkg.com/vue@3"></script>

	<style>
		/* @import "tailwindcss"; */

		.btn-scale-color:hover {
			transform: scale(1.05);
			color: oklch(0.872 0.01 258.338);
			cursor: pointer
		}

		.library:hover #libraryicon {
			display: block;
		}

		.current-div:hover .shover {
			display: block;
		}

		#listDiv > div:hover #playicon {
			display:block;
		}

		.toggle-hidden {
			display:none;
		}

		#searchResultsDiv > div:hover svg {
			display: block;
		}

		#currDurBar {
			transition: width 50ms;
		}

		
	</style>
	
</head>
<body class="h-full bg-black">
	<div id="app" class="text-neutral-300 h-screen flex flex-col">
		<header class="flex pt-2 px-3 items-center">
			<!-- left header swagify icon -->
			<div class="flex-1">
				<svg id="toggleVisibilityBtn" class="cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><path fill="currentColor" d="M17.9 10.9C14.7 9 9.35 8.8 6.3 9.75c-.5.15-1-.15-1.15-.6c-.15-.5.15-1 .6-1.15c3.55-1.05 9.4-.85 13.1 1.35c.45.25.6.85.35 1.3c-.25.35-.85.5-1.3.25m-.1 2.8c-.25.35-.7.5-1.05.25c-2.7-1.65-6.8-2.15-9.95-1.15c-.4.1-.85-.1-.95-.5s.1-.85.5-.95c3.65-1.1 8.15-.55 11.25 1.35c.3.15.45.65.2 1m-1.2 2.75c-.2.3-.55.4-.85.2c-2.35-1.45-5.3-1.75-8.8-.95c-.35.1-.65-.15-.75-.45c-.1-.35.15-.65.45-.75c3.8-.85 7.1-.5 9.7 1.1c.35.15.4.55.25.85M12 2A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2"/></svg>
			</div>

			<!-- middle header home/search -->
			<div class="flex flex-1 gap-2">
				<!-- home icon -->
				<div id="homeBtn" class="bg-neutral-800 rounded-full flex justify-center items-center hover:scale-110 hover:bg-neutral-700 cursor-pointer">
					<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><path fill="currentColor" d="M5 19v-8.692q0-.384.172-.727t.474-.565l5.385-4.078q.423-.323.966-.323t.972.323l5.385 4.077q.303.222.474.566q.172.343.172.727V19q0 .402-.299.701T18 20h-3.384q-.344 0-.576-.232q-.232-.233-.232-.576v-4.769q0-.343-.232-.575q-.233-.233-.576-.233h-2q-.343 0-.575.233q-.233.232-.233.575v4.77q0 .343-.232.575T9.385 20H6q-.402 0-.701-.299T5 19"/></svg>
				</div>

				<!-- search bar -->
				<div class="bg-neutral-800 hover:bg-neutral-700 cursor-pointer text-neutral-400 rounded-full flex justify-center items-center px-3 gap-3">
					<!-- magnifying glass -->
					<div class="hover:text-neutral-300 hover:scale-110">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256"><path fill="currentColor" d="m229.66 218.34l-50.07-50.06a88.11 88.11 0 1 0-11.31 11.31l50.06 50.07a8 8 0 0 0 11.32-11.32M40 112a72 72 0 1 1 72 72a72.08 72.08 0 0 1-72-72"/></svg>
					</div>

					<input id="searchInput" class="min-w-xs focus:outline-0" placeholder="What do you want to play?" />
					
					<!-- folder icon -->
					<div class="toggle-hidden border-l border-solid border-inherit pl-3">
						<svg class="hover:text-neutral-300 hover:scale-110" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.5"><path d="M19.562 7a2.132 2.132 0 0 0-2.1-2.5H6.538a2.132 2.132 0 0 0-2.1 2.5M17.5 4.5c.028-.26.043-.389.043-.496a2 2 0 0 0-1.787-1.993C15.65 2 15.52 2 15.26 2H8.74c-.26 0-.391 0-.497.011a2 2 0 0 0-1.787 1.993c0 .107.014.237.043.496"/><path stroke-linecap="round" d="M15 18H9"/><path d="M2.384 13.793c-.447-3.164-.67-4.745.278-5.77C3.61 7 5.298 7 8.672 7h6.656c3.374 0 5.062 0 6.01 1.024s.724 2.605.278 5.769l-.422 3c-.35 2.48-.525 3.721-1.422 4.464s-2.22.743-4.867.743h-5.81c-2.646 0-3.97 0-4.867-.743s-1.072-1.983-1.422-4.464z"/></g></svg>
					</div>
				</div>
			</div>

			<!-- right header -->
			<div class="text-neutral-400 flex flex-1 gap-5 min-w-3xs justify-end items-center">
				<!-- install -->
				<div class="toggle-hidden">
					<div class="flex gap-1 items-center hover:cursor-pointer hover:text-neutral-300 hover:scale-110">
						<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 14 14"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"><path d="M4.5 8L7 10.5L9.5 8M7 10.5v-7"/><path d="M7 13.5a6.5 6.5 0 1 0 0-13a6.5 6.5 0 0 0 0 13"/></g></svg>
						<p class="text-sm">Install App</p>
					</div>
				</div>

				<!-- notification bell -->
				<svg class="toggle-hidden hover:text-neutral-300 hover:cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.019 17h-6.04m6.04 0h3.614c1.876 0 1.559-1.86.61-2.804C15.825 10.801 20.68 3 11.999 3s-3.825 7.8-7.243 11.196c-.913.908-1.302 2.804.61 2.804H8.98m6.039 0c0 1.925-.648 4-3.02 4s-3.02-2.075-3.02-4"/></svg>
				
				<!-- users -->
				<svg class="toggle-hidden hover:text-neutral-300 hover:cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256"><path fill="currentColor" d="M243.6 148.8a6 6 0 0 1-8.4-1.2A53.58 53.58 0 0 0 192 126a6 6 0 0 1 0-12a26 26 0 1 0-25.18-32.5a6 6 0 0 1-11.62-3a38 38 0 1 1 59.91 39.63a65.7 65.7 0 0 1 29.69 22.27a6 6 0 0 1-1.2 8.4M189.19 213a6 6 0 0 1-2.19 8.2a5.9 5.9 0 0 1-3 .81a6 6 0 0 1-5.2-3a59 59 0 0 0-101.62 0a6 6 0 1 1-10.38-6a70.1 70.1 0 0 1 36.2-30.46a46 46 0 1 1 50.1 0A70.1 70.1 0 0 1 189.19 213M128 178a34 34 0 1 0-34-34a34 34 0 0 0 34 34m-58-58a6 6 0 0 0-6-6a26 26 0 1 1 25.18-32.51a6 6 0 1 0 11.62-3a38 38 0 1 0-59.91 39.63A65.7 65.7 0 0 0 11.2 140.4a6 6 0 1 0 9.6 7.2A53.58 53.58 0 0 1 64 126a6 6 0 0 0 6-6"/></svg>
				
				<!-- user -->
				<div class="rounded-full border-8 border-solid border-neutral-800 hover:border-neutral-700 hover:scale-110 size-12 overflow-hidden flex justify-center items-center cursor-pointer" title="user1">
					<img class="size-full object-cover" src="data:image/jpeg;base64,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">
				</div>
			</div>
		</header>

		<!-- main section -->
		<section class="flex-1 min-h-0 m-2 flex gap-2">
			<!-- your library -->
			<section class="library bg-neutral-900 w-xs overflow-x-hidden rounded-md flex flex-col">
				<!-- top part -->
				<!-- shadow that separates top and bottom -->
				<div class="shadow-black shadow-lg pt-4 px-3">
					<!-- first layer -->
					<div class="flex justify-between items-center">
						<!-- left part of first layer -->
						<div class="flex gap-2 cursor-pointer">			
							<svg id="libraryicon" class="hidden text-neutral-400 hover:text-neutral-300" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M4 6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm5-2v16"/><path d="m15 10l-2 2l2 2"/></g></svg>
							<p class="font-semibold">Your Library</p>
						</div>

						<!-- right part of first layer -->
						<div class="toggle-hidden">
							<div class="flex items-center gap-5">
								<div class="flex items-center gap-2 bg-neutral-800 hover:bg-neutral-700 cursor-pointer rounded-full px-5 py-2 text-sm font-semibold">
									<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"><path fill="currentColor" fill-rule="evenodd" d="M8 1a1 1 0 0 0-2 0v5H1a1 1 0 0 0 0 2h5v5a1 1 0 1 0 2 0V8h5a1 1 0 1 0 0-2H8z" clip-rule="evenodd"/></svg>
									<p>Create</p>
								</div>
		
								<div class="hover:bg-neutral-800 cursor-pointer rounded-full p-1">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17 2a1 1 0 1 0 0 2h1.586l-4.293 4.293a1 1 0 0 0 1.414 1.414L20 5.414V7a1 1 0 1 0 2 0V3a1 1 0 0 0-1-1zM4 18.586V17a1 1 0 1 0-2 0v4a1 1 0 0 0 1 1h4a1 1 0 1 0 0-2H5.414l4.293-4.293a1 1 0 0 0-1.414-1.414z"/></svg>
								</div>
							</div>
						</div>
					</div>

					<!-- 2nd layer -->
					<div class="flex gap-2 items-center text-sm font-light pt-4 pb-2 overflow-x-auto">
						<a href="/feartist" class="bg-neutral-800 hover:bg-neutral-700 cursor-pointer rounded-full px-4 py-1">Artists</a>
						<a href="/fealbum" class="bg-neutral-800 hover:bg-neutral-700 cursor-pointer rounded-full px-4 py-1">Albums</a>
						<a href="/fesong" class="bg-neutral-800 hover:bg-neutral-700 cursor-pointer rounded-full px-4 py-1">Songs</a>
						<p class="toggle-hidden bg-neutral-800 hover:bg-neutral-700 cursor-pointer rounded-full px-4 py-1">Podcasts</p>
					</div>

				</div>

				<!-- bottom part -->
				<div class="flex-1 overflow-y-auto">
					<div class="px-2">
						<!-- search bar -->
						<div class="flex items-center justify-between">
							<!-- search -->
							<div class="text-neutral-400 hover:text-neutral-300 hover:bg-neutral-700 rounded-full p-1 cursor-pointer">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256"><path fill="currentColor" d="m229.66 218.34l-50.07-50.06a88.11 88.11 0 1 0-11.31 11.31l50.06 50.07a8 8 0 0 0 11.32-11.32M40 112a72 72 0 1 1 72 72a72.08 72.08 0 0 1-72-72"/></svg>
							</div>
			
							<!-- recents -->
							<div  class="text-sm font-light text-neutral-400 hover:text-neutral-300 hover:scale-105 cursor-pointer flex gap-2 items-center">
								<p>Recents</p>
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24"><path fill="currentColor" d="M4.32 4.75a1.25 1.25 0 0 0 0 2.5h.01a1.25 1.25 0 1 0 0-2.5zm3.99.5a.75.75 0 1 0 0 1.5h12a.75.75 0 1 0 0-1.5zm0 12a.75.75 0 0 0 0 1.5h12a.75.75 0 1 0 0-1.5zM7.56 12a.75.75 0 0 1 .75-.75h12a.75.75 0 1 1 0 1.5h-12a.75.75 0 0 1-.75-.75m-4.49 0c0-.69.56-1.25 1.25-1.25h.01a1.25 1.25 0 1 1 0 2.5h-.01c-.69 0-1.25-.56-1.25-1.25m1.25 4.75a1.25 1.25 0 1 0 0 2.5h.01a1.25 1.25 0 1 0 0-2.5z"/></svg>
							</div>
						</div>
			
						<!-- list of playlists/albums/etc -->
						<div id="listDiv" class="flex-1 overflow-y-auto">
							<!-- per item -->
							
							<!-- song card template -->
							<!-- item repeat -->
							<!-- item repeat -->
							<!-- <a href="/feartist" id="playlist" class="hover:bg-neutral-800 cursor-pointer rounded-md h-16 w-full flex items-center px-2 gap-2">
								thumbnail
								<div class="size-12 rounded overflow-hidden relative">
									<img class="size-full object-cover" src="https://upload.wikimedia.org/wikipedia/en/e/ef/Bad_Bunny_-_Deb%C3%AD_Tirar_M%C3%A1s_Fotos.png">
									<div id="playicon" class="absolute top-0 bottom-0 right-0 left-0 hidden">
										<div class="w-full h-full flex justify-center items-center bg-neutral-800/70">
											<svg  class="text-neutral-300 hover:scale-105" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.906 4.537A.6.6 0 0 0 6 5.053v13.894a.6.6 0 0 0 .906.516l11.723-6.947a.6.6 0 0 0 0-1.032z"/></svg>
										</div>
									</div>
								</div>
			
								details
								<div>
									title
									<div>
										<p class="text-neutral-300 font-light">DtMF radio</p>
									</div>
			
									sub details
									<div>
										<p class="text-neutral-400 text-sm font-light">Playlist • Spotify</p>
									</div>
								</div>
							</a> -->
							<!-- item repeat -->
							<!-- item repeat -->
							
			
						</div>
					</div>
				</div>
			</section>
			
			<!-- MAIN NAVIGATION SECTION -->
			<section class="bg-neutral-900 flex-1 rounded-md overflow-hidden px-10 overflow-y-auto">
				<nav class="flex gap-2 mt-3 text-neutral-300 font-light text-sm sticky">
					<p class="toggle-hidden bg-neutral-800 hover:bg-neutral-700 cursor-pointer rounded-full px-3 py-1">All</p>
					<p class="toggle-hidden bg-neutral-800 hover:bg-neutral-700 cursor-pointer rounded-full px-3 py-1">Music</p>
					<p class="toggle-hidden bg-neutral-800 hover:bg-neutral-700 cursor-pointer rounded-full px-3 py-1">Podcasts</p>
					<p class="bg-neutral-800 hover:bg-neutral-700 cursor-pointer rounded-full px-3 py-1">Albums</p>
				</nav>

				<!-- 8 recently played playlist cards -->
				<div id="albumsDiv" class="mt-4 flex flex-wrap gap-2">
					<!-- per card -->

					<!-- album card template -->
					<!-- repeat card 8 -->
					<!-- <div class="flex bg-neutral-800 hover:bg-neutral-700 cursor-pointer rounded overflow-hidden flex-1 min-w-36">
						<div class="size-12 ">
							<img class="w-12 object-cover" src="/storage/song_image/HyPzDVlctstGUklZbo0Yomn02dRGd17juiyvyoLj.png">
						</div>

						<div class="flex-1 h-12 text-ellipsis">
							<p class="ml-2 text-md font-medium">We Are Your Friends (Album)</p>
						</div>
					</div> -->
					<!-- repeat card 8 -->

				</div>

				<!-- main navigation -->
				
				<!-- repeating style different playlists -->
				<div class="bg-pink mt-5">
					<p class="text-xs"></p> <!--Made for-->
					<div class="flex justify-between items-end mb-3">
						<a href="/" class="text-xl font-semibold hover:underline">Search results</a> <!--made for user-->
						<a href="/" class="toggle-hidden text-sm hover:underline">Show all</a>
					</div>


					<!-- div for search results -->
					<div id="searchResultsDiv" class="flex flex-wrap">
						<!-- large card template-->
						<!-- large card template-->
						<!-- <div class="w-56 hover:bg-neutral-800 cursor-pointer rounded-2xl p-4"> -->
							<!-- <div class="size-48 rounded-2xl overflow-hidden relative"> -->
								<!-- <img class="size-full object-cover" src="/storage/default_song.png"> -->
		
								<!-- play icon on hover -->
								<!-- svg changed -->
							<!-- </div> -->
		
							<!-- <div class="mt-1 overflow-x-hidden font-medium text-neutral-400"> -->
								<!-- <p>Song name</p> -->
								<!-- <p>Artist</p> -->
							<!-- </div> -->
		
						<!-- </div> -->
						<!-- large card template-->
						<!-- large card template-->

					</div>
				</div>


			</section>

			<!-- CURRENT SONG SECTION -->
			<section class="w-xs rounded-md overflow-hidden relative bg-neutral-900/35 hover:bg-neutral-900/5">

				<!-- bg color behind image div -->
				<div class="h-full w-full absolute top-0 left-0 -z-20 bg-neutral-900"></div>
				<!-- image div -->
				<div class="h-2/3 absolute top-0 left-0 -z-10">
					<img
						id="currentDivImg"
						src="/storage/default_song.png"
						class="h-full min-w-xs object-cover mask-b-from-90%"
					/>


				</div>

				<!-- current song div -->
				<!-- <div class="current-div h-full bg-neutral-900/35 hover:bg-neutral-900/5 pt-4 px-3 overflow-y-auto"> -->
				<div class="current-div h-full pt-4 px-3 overflow-y-auto">
					<!-- top part -->
					<div class="flex h-8 justify-between cursor-pointer text-neutral-50">
						<div class="flex gap-2">
							<svg class="shover hidden -scale-x-100 text-neutral-50" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M4 6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm5-2v16"/><path d="m15 10l-2 2l2 2"/></g></svg>
							<p id="currentDivAlbum" class="font-semibold">Album name</p>
						</div>

						<div class="flex gap-2">
							<div class="shover hidden hover:bg-neutral-800 cursor-pointer rounded-full p-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32">
									<path d="M0 0h32v32H0z" fill="none" />
									<path fill="none" stroke="currentColor" stroke-width="2" d="M8 17a1 1 0 1 0 0-2a1 1 0 0 0 0 2Zm8 0a1 1 0 1 0 0-2a1 1 0 0 0 0 2Zm8 0a1 1 0 1 0 0-2a1 1 0 0 0 0 2Z" />
								</svg>
							</div>


							<div class="shover hidden hover:bg-neutral-800 cursor-pointer rounded-full p-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
									<path fill="currentColor" d="M17 2a1 1 0 1 0 0 2h1.586l-4.293 4.293a1 1 0 0 0 1.414 1.414L20 5.414V7a1 1 0 1 0 2 0V3a1 1 0 0 0-1-1zM4 18.586V17a1 1 0 1 0-2 0v4a1 1 0 0 0 1 1h4a1 1 0 1 0 0-2H5.414l4.293-4.293a1 1 0 0 0-1.414-1.414z"/>
								</svg>
							</div>
						</div>
					</div>

					<!-- dynamic space for image -->
					<div class="h-1/2"></div>

					<div>
						<p id="currentDivSong" class="font-bold text-2xl cursor-pointer hover:underline text-neutral-50">Song Name</p>
						<p id="currentDivArtist" class="font-semibold text-lg cursor-pointer hover:underline text-neutral-400">Artist Name</p>
					</div>


					<div class="bg-neutral-800 rounded-lg h-44 mt-5 relative overflow-hidden">

						<div class="h-2/3 w-full top-0 m-auto overflow-hidden">
							<img
								id="currentDivArtistImg"
								src=""
								class="w-full object-cover -z-10"
								
							/>

						</div>

						<p id="currentDivArtistAbout" class="font-semibold ml-5">Artist name</p>


						<p class="z-20 font-bold text-lg absolute top-2 left-4">About the artist</p>
					</div>
					

				</div>


			</section>
		</section>	

		<!-- playbar -->
		<section class="h-20 flex justify-between px-5">
			<!-- current song details -->
			<div class="flex flex-1 items-center gap-4">
				<!-- song image -->
				<div class="size-16 rounded overflow-hidden cursor-pointer">
					<img id="playbarImg" class="size-full object-cover" src="/storage/default_song.png">
				</div>

				<!-- song details -->
				<div>
					<p id="playbarSong" class="text-sm text-neutral-300 hover:underline cursor-pointer">Song Name</p>
					<p id="playbarArtist" class="text-xs text-neutral-400 hover:underline cursor-pointer">Artist Name</p>
				</div>

				<div class="toggle-hidden text-neutral-400">
					<svg class="btn-scale-color" xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 16 16"><path fill="currentColor" d="M8 15c-3.86 0-7-3.14-7-7s3.14-7 7-7s7 3.14 7 7s-3.14 7-7 7M8 2C4.69 2 2 4.69 2 8s2.69 6 6 6s6-2.69 6-6s-2.69-6-6-6"/><path fill="currentColor" d="M8 11.5c-.28 0-.5-.22-.5-.5V5c0-.28.22-.5.5-.5s.5.22.5.5v6c0 .28-.22.5-.5.5"/><path fill="currentColor" d="M11 8.5H5c-.28 0-.5-.22-.5-.5s.22-.5.5-.5h6c.28 0 .5.22.5.5s-.22.5-.5.5"/></svg>
				</div>
			</div>

			<!-- audio buttons and progress bar -->
			<div class="text-neutral-400 flex flex-1 flex-col justify-center items-center">
				<!-- audio buttons -->
				<div class="flex gap-5 items-center justify-center">
					<!-- shuffle -->
					<svg class="btn-scale-color" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M2 16.25a.75.75 0 0 0 0 1.5zm8.748-2.163l-.643-.386zm2.504-4.174l.643.386zM22 7l.53.53a.75.75 0 0 0 0-1.06zm-2.53 1.47a.75.75 0 0 0 1.06 1.06zm1.06-4a.75.75 0 1 0-1.06 1.06zm-5.31 2.92l-.369-.653zM2 17.75h3.603v-1.5H2zm9.39-3.277l2.505-4.174l-1.286-.772l-2.504 4.174zm7.007-6.723H22v-1.5h-3.603zm3.073-1.28l-2 2l1.06 1.06l2-2zm1.06 0l-2-2l-1.06 1.06l2 2zm-8.635 3.829c.434-.724.734-1.22 1.006-1.589c.263-.355.468-.543.689-.668l-.739-1.305c-.467.264-.82.627-1.155 1.08c-.326.44-.668 1.011-1.087 1.71zm4.502-4.049c-.815 0-1.48 0-2.025.052c-.562.055-1.054.17-1.521.435l.739 1.305c.22-.125.487-.204.927-.247c.456-.044 1.036-.045 1.88-.045zM5.603 17.75c.815 0 1.48 0 2.025-.052c.562-.055 1.054-.17 1.521-.435l-.739-1.305c-.22.125-.487.204-.927.247c-.456.044-1.036.045-1.88.045zm4.502-4.049c-.435.724-.734 1.22-1.006 1.589c-.263.355-.468.543-.689.668l.74 1.305c.466-.264.819-.627 1.154-1.08c.326-.44.668-1.011 1.087-1.71zM2 6.25a.75.75 0 0 0 0 1.5zM22 17l.53.53a.75.75 0 0 0 0-1.06zm-1.47-2.53a.75.75 0 1 0-1.06 1.06zm-1.06 4a.75.75 0 1 0 1.06 1.06zm-3.345-1.525l.144-.736zm-1.682-2.33a.75.75 0 1 0-1.286.77zm.025 1.391l.558-.501zm-6.593-8.95l.143-.737zm1.682 2.33a.75.75 0 0 0 1.286-.772zm-.025-1.393l-.558.502zM2 7.75h4.668v-1.5H2zm15.332 10H22v-1.5h-4.668zm5.198-1.28l-2-2l-1.06 1.06l2 2zm-1.06 0l-2 2l1.06 1.06l2-2zm-4.138-.22c-.645 0-.867-.003-1.063-.041l-.287 1.472c.372.072.765.069 1.35.069zm-4.175-.864c.3.502.5.84.754 1.122l1.115-1.003c-.134-.149-.25-.337-.583-.89zm3.112.823a2.25 2.25 0 0 1-1.243-.704l-1.115 1.003a3.75 3.75 0 0 0 2.071 1.173zM6.668 7.75c.645 0 .867.003 1.063.041l.287-1.472c-.372-.072-.765-.069-1.35-.069zm4.175.864c-.3-.502-.5-.84-.754-1.122L8.974 8.495c.134.149.25.337.583.89zm-3.112-.823c.48.094.916.34 1.243.704l1.115-1.003a3.75 3.75 0 0 0-2.071-1.173z"/></svg>
		
					<!-- previous -->
					<svg class="btn-scale-color -scale-x-100" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M2.538 4.113a1 1 0 0 1 1.035.068l10 7a1 1 0 0 1 0 1.638l-10 7A1 1 0 0 1 2 19V5a1 1 0 0 1 .538-.887M16 5.8A1.8 1.8 0 0 1 17.8 4h1.4A1.8 1.8 0 0 1 21 5.8v12.4a1.8 1.8 0 0 1-1.8 1.8h-1.4a1.8 1.8 0 0 1-1.8-1.8z" clip-rule="evenodd"/></svg>
					
					<!-- play -->
					<div id="playBtn" class="size-7 bg-neutral-300 hover:scale-110 hover:bg-neutral-400 text-black cursor-pointer rounded-full flex justify-center items-center text-xl">
						<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path fill="currentColor" d="M6.51 18.87c.15.09.32.13.49.13s.36-.05.51-.14l10-6c.3-.18.49-.51.49-.86s-.18-.68-.49-.86l-10-6a.99.99 0 0 0-1.01-.01c-.31.18-.51.51-.51.87v12c0 .36.19.69.51.87Z"/></svg>
					</div>

					<!-- pause -->
					<div id="pauseBtn" class="size-7 bg-neutral-300 hover:scale-110 hover:bg-neutral-400 text-black cursor-pointer rounded-full flex justify-center items-center hidden">
						<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path fill="currentColor" d="M4.8 3h4.4a.8.8 0 0 1 .8.8v16.4a.8.8 0 0 1-.8.8H4.8a.8.8 0 0 1-.8-.8V3.8a.8.8 0 0 1 .8-.8m10 0h4.4a.8.8 0 0 1 .8.8v16.4a.8.8 0 0 1-.8.8h-4.4a.8.8 0 0 1-.8-.8V3.8a.8.8 0 0 1 .8-.8"/></svg>
					</div>
					
					<!-- next -->
					<svg class="btn-scale-color" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M2.538 4.113a1 1 0 0 1 1.035.068l10 7a1 1 0 0 1 0 1.638l-10 7A1 1 0 0 1 2 19V5a1 1 0 0 1 .538-.887M16 5.8A1.8 1.8 0 0 1 17.8 4h1.4A1.8 1.8 0 0 1 21 5.8v12.4a1.8 1.8 0 0 1-1.8 1.8h-1.4a1.8 1.8 0 0 1-1.8-1.8z" clip-rule="evenodd"/></svg>

					<!-- repeat -->
					<svg class="btn-scale-color" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5"><path stroke-linejoin="round" d="m19 5l2 2m0 0l-2 2m2-2H7M5 19l-2-2m0 0l2-2m-2 2h14"/><path d="M3 11a4 4 0 0 1 4-4m14 6a4 4 0 0 1-4 4"/></g></svg>
					<svg class="hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5"><path stroke-linejoin="round" d="M21 9V4l-2 1m-4 2H7M5 19l-2-2m0 0l2-2m-2 2h14"/><path d="M3 11a4 4 0 0 1 4-4m14 6a4 4 0 0 1-4 4"/></g></svg>
				</div>

				<!-- progress bar -->
				<div class="flex gap-3 items-center">
					<p id="currDur">00:00</p>
					
					<div class="relative w-100 h-1 rounded-2xl overflow-hidden flex">
						<div class="size-full bg-neutral-600"></div>

						<div id="currDurBar" class="h-full w-0/100 rounded-2xl bg-neutral-300 absolute left-0 flex"></div>
					</div>

					<p id="totalDur">00:00</p>
				</div>
			</div>

			<!-- other settings -->
			<div class="text-neutral-400 flex flex-1 justify-end items-center gap-3">
				<!-- lyrics -->
				<svg class="toggle-hidden btn-scale-color" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M19.09 4.909a5.66 5.66 0 0 0-9.602 4.823l.029.196l-5.72 6.632a2.25 2.25 0 0 0 .112 3.06l.469.47a2.25 2.25 0 0 0 3.06.112l6.633-5.72l.196.028a5.66 5.66 0 0 0 4.823-9.602m-6.943 1.06a4.16 4.16 0 1 1 2.574 7.085l-3.777-3.777a4.15 4.15 0 0 1 1.203-3.308M4.932 17.54l5.628-6.524l2.424 2.423l-6.525 5.628a.75.75 0 0 1-1.02-.037l-.47-.469a.75.75 0 0 1-.037-1.02" clip-rule="evenodd"/></svg>

				<!-- queue -->
				<svg class="toggle-hidden btn-scale-color" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75"/></svg>

				<!-- connect device -->
				<svg class="toggle-hidden btn-scale-color" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8.5 20v-2H4.616q-.691 0-1.153-.462T3 16.384V5.616q0-.691.463-1.153T4.615 4h14.77q.69 0 1.152.463T21 5.616V7.23h-1V5.616q0-.27-.173-.443T19.384 5H4.616q-.27 0-.443.173T4 5.616v10.769q0 .269.173.442t.443.173h6.769v3zm7.27-5.23q.582-.581 1.422-.581t1.423.581t.581 1.422t-.582 1.423t-1.422.581t-1.422-.582t-.581-1.422q0-.84.581-1.422M20.154 9q.367 0 .607.24q.239.239.239.606v9.308q0 .367-.24.607q-.239.239-.606.239H14.23q-.367 0-.607-.24q-.24-.239-.24-.606V9.846q0-.367.24-.607q.24-.239.607-.239zm-3.873 1.204q-.358.357-.358.911t.358.912t.911.358t.912-.358t.358-.912t-.358-.911t-.912-.358t-.911.358m3.014 8.091q.859-.858.859-2.103t-.859-2.102q-.858-.86-2.103-.86t-2.102.86q-.86.858-.86 2.102t.86 2.103t2.102.859t2.103-.859"/></svg>
				
				<!-- volume -->
				<svg class="toggle-hidden btn-scale-color" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5"><path stroke-linejoin="round" d="M4.603 14.088V9.912c0-.416.143-.814.396-1.108c.253-.293.596-.458.954-.458h1.89c.237-.001.47-.073.675-.21l3.97-2.63c.205-.135.437-.205.672-.204s.467.074.671.212c.204.137.373.334.491.57c.118.237.18.506.182.78v10.273a1.8 1.8 0 0 1-.182.778a1.5 1.5 0 0 1-.49.571c-.205.137-.436.21-.672.212a1.2 1.2 0 0 1-.672-.204l-3.97-2.631a1.23 1.23 0 0 0-.675-.209h-1.89c-.358 0-.701-.165-.954-.459a1.7 1.7 0 0 1-.396-1.107"/><path stroke-miterlimit="10" d="M17.831 15.715a5.344 5.344 0 0 0 0-7.559"/></g></svg>
				<svg class="hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5"><path stroke-miterlimit="10" d="m20.951 9.554l-4.902 4.902m0-4.902l4.902 4.902"/><path stroke-linejoin="round" d="M3.049 14.088V9.912c0-.416.142-.814.395-1.108c.253-.293.597-.458.955-.458h1.89c.236-.001.469-.073.675-.21l3.969-2.63c.205-.135.437-.205.672-.204s.467.074.671.212c.204.137.374.334.492.57c.118.237.18.506.18.78v10.273c0 .273-.062.542-.18.778a1.5 1.5 0 0 1-.492.571c-.203.137-.435.21-.67.212a1.2 1.2 0 0 1-.673-.204l-3.97-2.631a1.23 1.23 0 0 0-.674-.209h-1.89c-.358 0-.702-.165-.955-.459a1.7 1.7 0 0 1-.395-1.107"/></g></svg>

				<!-- miniplayer -->
				<svg class="toggle-hidden btn-scale-color" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><rect width="20" height="16" x="2" y="4" rx="2"/><rect width="9" height="7" x="13" y="13" rx="2"/></g></svg>

				<!-- full screen -->
				<svg class="btn-scale-color" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M5 19h2q.425 0 .713.288T8 20t-.288.713T7 21H4q-.425 0-.712-.288T3 20v-3q0-.425.288-.712T4 16t.713.288T5 17zm14 0v-2q0-.425.288-.712T20 16t.713.288T21 17v3q0 .425-.288.713T20 21h-3q-.425 0-.712-.288T16 20t.288-.712T17 19zM5 5v2q0 .425-.288.713T4 8t-.712-.288T3 7V4q0-.425.288-.712T4 3h3q.425 0 .713.288T8 4t-.288.713T7 5zm14 0h-2q-.425 0-.712-.288T16 4t.288-.712T17 3h3q.425 0 .713.288T21 4v3q0 .425-.288.713T20 8t-.712-.288T19 7z"/></svg>
				<svg class="hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6 18H4q-.425 0-.712-.288T3 17t.288-.712T4 16h3q.425 0 .713.288T8 17v3q0 .425-.288.713T7 21t-.712-.288T6 20zm12 0v2q0 .425-.288.713T17 21t-.712-.288T16 20v-3q0-.425.288-.712T17 16h3q.425 0 .713.288T21 17t-.288.713T20 18zM6 6V4q0-.425.288-.712T7 3t.713.288T8 4v3q0 .425-.288.713T7 8H4q-.425 0-.712-.288T3 7t.288-.712T4 6zm12 0h2q.425 0 .713.288T21 7t-.288.713T20 8h-3q-.425 0-.712-.288T16 7V4q0-.425.288-.712T17 3t.713.288T18 4z"/></svg>
			</div>
		</section>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/howler@2.2.4/dist/howler.min.js"></script>
    <script>
		// let app = {
		// 	data() {
		// 		return {
		// 			helloputa: 'biatch'
		// 		};
		// 	}

		// };

		
		let dockedSong;
		let songAudio;
		const listDiv = document.querySelector('#listDiv');
		const backendURL = "http://127.0.0.1:8000";


		homeBtnEl = document.querySelector('#homeBtn');
		homeBtnEl.addEventListener('click', () => {
			location.reload();
		});


        function createSongCard(song) {
            // full div
            const newDiv = document.createElement('div');
            newDiv.id = 'song-' + song.id;
			newDiv.addEventListener('click', function () {
				dockSong(song);
			});
            newDiv.classList.add('hover:bg-neutral-800', 'cursor-pointer', 'rounded-md', 'h-16', 'w-full', 'flex', 'items-center', 'px-2', 'gap-2');
    
            // thumbnail div
            const thumbnailDiv = document.createElement('div');
            thumbnailDiv.classList.add('size-12', 'rounded', 'overflow-hidden', 'relative');

            // img
            const newImg = document.createElement('img');
            newImg.classList.add('size-full', 'object-cover');
            newImg.src = song.image;

            // play icon div
            const playIcon = document.createElement('div');
            playIcon.id = 'playicon';
            playIcon.classList.add('absolute', 'top-0', 'bottom-0', 'right-0', 'left-0', 'hidden');

            // svg div
            const svgDiv = document.createElement('div');
            svgDiv.classList.add('w-full', 'h-full', 'flex', 'justify-center', 'items-center', 'bg-neutral-800/70');

            // svg of play hover
            const svgNS = "http://www.w3.org/2000/svg";

            const svg = document.createElementNS(svgNS, "svg");
            svg.setAttribute("class", "text-neutral-300 hover:scale-105");
            svg.setAttribute("width", "24");
            svg.setAttribute("height", "24");
            svg.setAttribute("viewBox", "0 0 24 24");

            const path = document.createElementNS(svgNS, "path");
            path.setAttribute("fill", "currentColor");
            path.setAttribute("stroke", "currentColor");
            path.setAttribute("stroke-linecap", "round");
            path.setAttribute("stroke-linejoin", "round");
            path.setAttribute("stroke-width", "1.5");
            path.setAttribute("d", "M6.906 4.537A.6.6 0 0 0 6 5.053v13.894a.6.6 0 0 0 .906.516l11.723-6.947a.6.6 0 0 0 0-1.032z");

            svg.appendChild(path);

            // append thumbnail div children
            svgDiv.appendChild(svg);
            playIcon.appendChild(svgDiv);
            thumbnailDiv.appendChild(newImg);
            thumbnailDiv.appendChild(playIcon);
            newDiv.appendChild(thumbnailDiv);


            // details div
            const detailsDiv = document.createElement('div');

            // title div
            const titleDiv = document.createElement('div');

            // details
            const songName = document.createElement('p');
            songName.innerText = song.name;
            songName.classList.add('text-neutral-300', 'font-light');

            titleDiv.appendChild(songName);
            detailsDiv.appendChild(titleDiv);

            // subDetails div
            const subDetailsDiv = document.createElement('div');

            const albumName = document.createElement('p');
            albumName.innerText = song.album.name + " • " + song.artist.name;
            albumName.classList.add('text-neutral-400', 'text-sm', 'font-light');

            subDetailsDiv.appendChild(albumName);
            detailsDiv.appendChild(subDetailsDiv);

            
            newDiv.appendChild(detailsDiv);

    
            return newDiv;
        }


		function createAlbumCard(album) {
			const newAlbumCard = document.createElement('div');
			newAlbumCard.classList.add('flex', 'bg-neutral-800', 'hover:bg-neutral-700', 'cursor-pointer', 'rounded', 'overflow-hidden', 'flex-1', 'min-w-36');
			newAlbumCard.addEventListener('click', () => {
				fetch(`${backendURL}/swagify/playlist/` + album.id)
				.then(response => {
					if (!response.ok) {
						throw new Error("can't fetch playlist " + response.status);
					}
					
					return response.json();
				}).then(songs => {
					dockLibrary(songs);
				}).catch(error => console.error(error));

			});

			const newImgDiv = document.createElement('div');
			newImgDiv.classList.add('size-12');

			const newImg = document.createElement('img');
			newImg.classList.add('size-12', 'object-cover');
			newImg.src = album.image;

			newImgDiv.appendChild(newImg);
			newAlbumCard.appendChild(newImgDiv);

			const newAlbumDiv = document.createElement('div');
			newAlbumDiv.classList.add('flex-1', 'h-12', 'text-ellipsis');

			const newAlbum = document.createElement('p');
			newAlbum.classList.add('ml-2', 'text-md', 'font-medium');
			newAlbum.innerHTML = album.name;

			newAlbumDiv.appendChild(newAlbum);
			newAlbumCard.appendChild(newAlbumDiv);


			return newAlbumCard
		}


		function createLargeCard(song) {
			// full div
            const newDiv = document.createElement('div');
            newDiv.id = 'searchSong-' + song.id;
			newDiv.addEventListener('click', function () {
				dockSong(song);	
			});
            newDiv.classList.add('w-56', 'hover:bg-neutral-800', 'cursor-pointer', 'rounded-2xl', 'p-4');

			// thumbnail div
            const thumbnailDiv = document.createElement('div');
            thumbnailDiv.classList.add('size-48', 'rounded-2xl', 'overflow-hidden', 'relative');

            // img
            const newImg = document.createElement('img');
            newImg.classList.add('size-full', 'object-cover');
            newImg.src = song.image;

			// svg div
            const svgDiv = document.createElement('div');
            svgDiv.classList.add('text-green-600', 'text-6xl', 'absolute', 'right-2', 'bottom-2');

			// svg of play hover
            const svgNS = "http://www.w3.org/2000/svg";

            const svg = document.createElementNS(svgNS, "svg");
            svg.setAttribute("class", "hidden text-neutral-800 hover:scale-105 bg-green-500 rounded-full p-3");
            svg.setAttribute("width", "1em");
            svg.setAttribute("height", "1em");
            svg.setAttribute("viewBox", "0 0 24 24");

            const path = document.createElementNS(svgNS, "path");
            path.setAttribute("fill", "currentColor");
            path.setAttribute("stroke", "currentColor");
            path.setAttribute("stroke-linecap", "round");
            path.setAttribute("stroke-linejoin", "round");
            path.setAttribute("stroke-width", "1.5");
            path.setAttribute("d", "M6.906 4.537A.6.6 0 0 0 6 5.053v13.894a.6.6 0 0 0 .906.516l11.723-6.947a.6.6 0 0 0 0-1.032z");

            svg.appendChild(path);

			svgDiv.appendChild(svg);



			thumbnailDiv.appendChild(newImg);
			thumbnailDiv.appendChild(svgDiv);
			newDiv.appendChild(thumbnailDiv);


			// details div
            const detailsDiv = document.createElement('div');
            detailsDiv.classList.add('mt-1', 'overflow-x-hidden', 'font-medium', 'text-neutral-400');

			const songName = document.createElement('p');
            songName.innerText = song.name;

			const artistName = document.createElement('p');
            artistName.innerText = song.artist.name;

			detailsDiv.appendChild(songName);
			detailsDiv.appendChild(artistName);

			newDiv.appendChild(detailsDiv);
			
			return newDiv;
		}


		function clearSearchResults() {
			const searchResultsDiv = document.querySelector('#searchResultsDiv');
			searchResultsDiv.replaceChildren();
		}

		function printSearchResultSongs(search) {
			clearSearchResults();

			fetch(`${backendURL}/swagify?search=` + search)
            .then(response => {
                if (!response.ok) {
                    throw new Error("can't fetch song " + response.status);
                }
                
                return response.json();
            }).then(songs => {
				for (song of songs) {
					searchResultsDiv.appendChild(createLargeCard(song));
				}
            }).catch(error => console.error(error));
		}

		const searchInput = document.querySelector('#searchInput')
		searchInput.addEventListener('input', (key) => {
			clearSearchResults();
			
			if (key.target.value != "") {
				printSearchResultSongs(key.target.value);
			}
		});


        function initialLoad() {
			// const listDiv = document.querySelector('#listDiv');


            fetch(`${backendURL}/swagify`)
            .then(response => {
                if (!response.ok) {
                    throw new Error("can't fetch song " + response.status);
                }
                
                return response.json();
            }).then(songs => {
				dockSong(songs[0]);

				dockLibrary(songs);
            }).catch(error => console.error(error));


			const albumsDiv = document.querySelector('#albumsDiv');

			fetch(`${backendURL}/swagifyalbums`)
			.then(response => {
				if (!response.ok) {
					throw new Error("can't fetch albums" + response.status);
				}

				return response.json();
			}).then(albums => {
				for (album of albums) {
					albumsDiv.appendChild(createAlbumCard(album));
				}
			}).catch(error => console.error(error));
        }

		function dockLibrary(songs) {
			listDiv.replaceChildren();

			for (song of songs) {
				listDiv.appendChild(createSongCard(song));
			}
		}

		function dockSong(song) {
			// resets progress bar
			currDurBarEl.style.width = 0;
			currDurEl.innerHTML = formatSeconds(0);
			clearInterval(songProgress);
			pauseBtn.classList.add('hidden');
			playBtn.classList.remove('hidden');
			songProgressNow = 0;

			// stops current song
			if (songAudio) {
				songAudio.stop();
			}

			dockedSong = song;

			songAudio = new Howl({
				src: [dockedSong.song_file],
				onload: function() {
					// songDuration = Math.trunc(songAudio.duration() / 1);
					songDuration = Math.round(songAudio.duration() * 100) / 100;
					console.log(songDuration);
					console.log(songAudio.duration());
					totalDurEl.innerHTML = formatSeconds(songDuration);
					// perSec = (1 / songDuration) * 100;
					// songDuration = (1 / songDuration) * 100;
					perSec = Math.round(((1 / songDuration) * 100) * 100) / 100;
					console.log("perSec: " + perSec);
				},
			});

			const currentDivSong = document.querySelector('#currentDivSong');
			const currentDivAlbum = document.querySelector('#currentDivAlbum');
			const currentDivArtist = document.querySelector('#currentDivArtist');
			const currentDivImg = document.querySelector('#currentDivImg');
			const currentDivArtistImg = document.querySelector('#currentDivArtistImg');
			const currentDivArtistAbout = document.querySelector('#currentDivArtistAbout');

			currentDivSong.innerHTML = song.name;
			currentDivAlbum.innerHTML = song.album.name;
			currentDivArtist.innerHTML = song.artist.name;
			currentDivImg.src = song.image;
			currentDivArtistImg.src = song.artist.image;
			currentDivArtistAbout.innerHTML = song.artist.name;


			const playbarSong = document.querySelector('#playbarSong');
			const playbarArtist = document.querySelector('#playbarArtist');
			const playbarImg = document.querySelector('#playbarImg');

			playbarSong.innerHTML = song.name;
			playbarArtist.innerHTML = song.artist.name;
			playbarImg.src = song.image;

			// totalDurEl.innerHTML = formatSeconds(songDuration);
		}

		
		const toggleVisibilityBtnEl = document.querySelector('#toggleVisibilityBtn');
		toggleVisibilityBtnEl.addEventListener('click', function() {
			const toggleClass = document.querySelector('.toggle-hidden');
			const visibility = window.getComputedStyle(toggleClass).display;
			const elements = document.querySelectorAll('.toggle-hidden');
	
			if (visibility == 'none') {
				elements.forEach(element => {
					element.style.display = 'block';
				});
			} else {
				elements.forEach(element => {
					element.style.display = 'none';
				});
	
			}
		});


		// manipulating docked song
		const playBtn = document.querySelector('#playBtn');
		const pauseBtn = document.querySelector('#pauseBtn');
		const currDurBarEl = document.querySelector('#currDurBar');
		const currDurEl = document.querySelector('#currDur');
		const totalDurEl = document.querySelector('#totalDur');
		let songProgress;
		let songProgressNow = 0;
		let songDuration;
		let perSec; // computes how may % progress per second

		playBtn.addEventListener('click', () => {
			playBtn.classList.add('hidden');
			pauseBtn.classList.remove('hidden');

			console.log(dockedSong);
			songAudio.play();


			let i = songProgressNow;

			songProgress = setInterval(() => {
				let width = perSec * (i);

				currDurEl.innerHTML = formatSeconds(i);

				currDurBarEl.style.width = width + '%';

				i++;
				songProgressNow = i;

				if (i > songDuration) {
					clearInterval(songProgress);
				}
			}, 1000);
		});

		pauseBtn.addEventListener('click', () => {
			pauseBtn.classList.add('hidden');
			playBtn.classList.remove('hidden');

			songAudio.pause();

			clearInterval(songProgress);
		});

		// copied from google hehe
		function formatSeconds(totalSeconds) {
			const minutes = Math.floor(totalSeconds / 60);
			const seconds = Math.trunc(totalSeconds % 60);

			// Pads single digits with a leading '0'
			const paddedMinutes = String(minutes).padStart(2, '0');
			const paddedSeconds = String(seconds).padStart(2, '0');

			return `${paddedMinutes}:${paddedSeconds}`;
		}


        initialLoad();

		// songAudio = new Howl({
		// 	src: [dockedSong.song_file],
		// });
		// Vue.createApp(app).mount('#app');
    </script>
</body>
</html>