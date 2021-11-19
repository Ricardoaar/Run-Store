const apiPublic_key = 'ed8599b17d9bb3e410eac755081493a3';
const apiPrivate_key = 'a65ed4407b87816c725e542a8418377b45d4512c'
const ts = 1;
const hash = '9c288eb92b6ad7da2c0802710487b0dd'
let content = document.querySelector('#container')
let contenthtml = "";

//1a65ed4407b87816c725e542a8418377b45d4512ced8599b17d9bb3e410eac755081493a3
const chargeContent = async () => {
    try {
        const result = await fetch('https://gateway.marvel.com:443/v1/public/characters?ts=1&apikey=ed8599b17d9bb3e410eac755081493a3&hash=9c288eb92b6ad7da2c0802710487b0dd');
        console.log(result);


        const data = await result.json();
        const characters = data.data.results;
        console.log(characters)

        for (let i = 0; i < characters.length; i += 1) {
            console.log(characters[i].name);
            const pic = characters[i].thumbnail.path + ".jpg"

            contenthtml += `
             <div class= "container">
             <div class= "card-deck">
             <div class="card">
             <img src="${pic}" class="card-img-top" alt="...">
             <div class="card-body">
             <h5 class="card-title">${characters[i].name}</h5>

          </div>
          </div>
            `


        }

        content.innerHTML = contenthtml;


    } catch (error) {
        console.log(error);
    }


}


chargeContent();
