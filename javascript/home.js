const key = "e3c5f092e7a4cfc7d09a643f7f665b97";
const poster = "http://image.tmdb.org/t/p/original";

function getMovies(){
    fetch(`https://api.themoviedb.org/3/movie/now_playing?api_key=${key}`)
    .then(response => response.json())
    .then((data) => {
        data.results.forEach(element => {
            document.querySelector("#div1").insertAdjacentHTML("beforeend",`<img data-id=${element.id} src="${poster}${element.poster_path}" width="150px" style="padding-right:5px">`)
        });
    })

    fetch(`https://api.themoviedb.org/3/movie/popular?api_key=${key}`)
    .then(response => response.json())
    .then((data) => {
        data.results.forEach(element => {
            document.querySelector("#div2").insertAdjacentHTML("beforeend",`<img data-id=${element.id} src="${poster}${element.poster_path}" width="150px"style="padding-right:5px">`)
        });
    })

    fetch(`https://api.themoviedb.org/3/movie/upcoming?api_key=${key}`)
    .then(response => response.json())
    .then((data) => {
        data.results.forEach(element => {
            document.querySelector("#div3").insertAdjacentHTML("beforeend",`<img data-id=${element.id} src="${poster}${element.poster_path}" width="150px" style="padding-right:5px">`)
        });
    })
}

function getvideo(){

    document.querySelectorAll("#div1 img").forEach(element => {
        element.addEventListener("click", function(){
            console.log(element);
            fetch(`https://api.themoviedb.org/3/movie/${element.dataset.id}/videos?api_key=${key}`)
            .then(response => response.json())
            .then((data) => {
                console.log(data);
                let youtubeKey = data.results[0];
                if (youtubeKey != undefined) {
                    document.querySelector("#div1 h1").insertAdjacentHTML("afterend",`
                    <dialog id="video" style="background-color: #272727; color: white" open> 
                        <iframe width="550px" height="370px" src="https://www.youtube.com/embed/${youtubeKey.key}"></iframe>
                        <br>
                        <button class="close" style="color: white">close</button>                        
                    </dialog> 
                    `)
                    document.querySelector(".close").addEventListener("click", function(){
                        document.querySelector("#video").remove();
                    })

                }else{
                    alert("Malheureusement, il n'y a pas de vidéo disponible pour ce film")
                }
            })
        })
    })

    document.querySelectorAll("#div2 img").forEach(element => {
        element.addEventListener("click", function(){
            console.log(element);
            fetch(`https://api.themoviedb.org/3/movie/${element.dataset.id}/videos?api_key=${key}`)
            .then(response => response.json())
            .then((data) => {
                console.log(data);
                let youtubeKey = data.results[0];
                if (youtubeKey != undefined) {
                    document.querySelector("#div2 h1").insertAdjacentHTML("afterend",`
                    <dialog id="video" style="background-color: #272727; color: white" open> 
                        <iframe width="550px" height="370px" src="https://www.youtube.com/embed/${youtubeKey.key}"></iframe>
                        <br>
                        <button class="close" style="color: white">close</button>                        
                    </dialog> 
                    `)
                    document.querySelector(".close").addEventListener("click", function(){
                        document.querySelector("#video").remove();
                    })
                }else{
                    alert("Malheureusement, il n'y a pas de vidéo disponible pour ce film")
                }            
            })
        })
    })

    document.querySelectorAll("#div3 img").forEach(element => {
        element.addEventListener("click", function(){
            fetch(`https://api.themoviedb.org/3/movie/${element.dataset.id}/videos?api_key=${key}`)
            .then(response => response.json())
            .then((data) => {
                console.log(data);
                let youtubeKey = data.results[0];
                if (youtubeKey != undefined) {
                    document.querySelector("#div3 h1").insertAdjacentHTML("afterend",`
                    <dialog id="video" style="background-color: #272727; color: white" open> 
                        <iframe width="550px" height="370px" src="https://www.youtube.com/embed/${youtubeKey.key}"></iframe>
                        <br>
                        <button class="close" style="color: white">close</button>                        
                    </dialog> 
                    `)
                    document.querySelector(".close").addEventListener("click", function(){
                        document.querySelector("#video").remove();
                    })
                }else{
                    alert("Malheureusement, il n'y a pas de vidéo disponible pour ce film")
                }                        
            })
        })
    })

}

function search(){
    document.querySelector("#goSearch").addEventListener("click",function (){
        document.querySelector("#div0").remove();
    
        let search = document.querySelector("#search").value;
    
        document.querySelector("nav").insertAdjacentHTML("afterend",
        `
        <div id="div0" class="posters">
            <h1>results of "${search}":</h1>
        </div>
        `)
    
        fetch(`https://api.themoviedb.org/3/search/movie?api_key=${key}&query=${search}`)
        .then(response => response.json())
        .then((data) => {
            data.results.forEach(element => {
                if (element.poster_path != undefined) {
                    document.querySelector("#div0").insertAdjacentHTML("beforeend",`<img data-id=${element.id} src="${poster}${element.poster_path}" width="150px" style="padding-right:5px">`)
                }
            });
        })
        setTimeout(getvideosearch,500);
    })
    
}

function getvideosearch() {
    document.querySelectorAll("#div0 img").forEach(element => {
        element.addEventListener("click", function(){
            fetch(`https://api.themoviedb.org/3/movie/${element.dataset.id}/videos?api_key=${key}`)
            .then(response => response.json())
            .then((data) => {
                let youtubeKey = data.results[0];
                if (youtubeKey != undefined) {
                    document.querySelector("#div0 h1").insertAdjacentHTML("afterend",`
                    <dialog id="video" style="background-color: #272727; color: white" open> 
                        <iframe width="550px" height="370px" src="https://www.youtube.com/embed/${youtubeKey.key}"></iframe>
                        <br>
                        <button class="close" style="color: white">close</button>                        
                    </dialog> 
                    `)
                    document.querySelector(".close").addEventListener("click", function(){
                        document.querySelector("#video").remove();
                    })            
                }else{
                    alert("Malheureusement, il n'y a pas de vidéo disponible pour ce film")
                }
            })
        })
    })            
}



getMovies();
setTimeout(getvideo,500);

search();














//_________________________________________________________________________

// fetch(`https://api.themoviedb.org/3/genre/movie/list?api_key=${key}`)
// .then(response => response.json())
// .then((data) => {
//     console.log(data);
// })

// let rand = Math.floor(Math.random()*3000)+1
// fetch(`https://api.themoviedb.org/3/movie/${rand}?api_key=${key}&append_to_response=videos`)
// .then(response => response.json())
// .then((data) => {
//     console.log(data);
// })