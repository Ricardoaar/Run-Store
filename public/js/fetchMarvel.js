import config from './config.js';

const apiPublic_key = config.apiPublic_key;
const ts = 1;
const hash = config.hash;
let content = document.querySelector('#row')
const fullUrl = `https://gateway.marvel.com:443/v1/public/characters?ts=${ts}&apikey=${apiPublic_key}&hash=${hash}`;

let htmlContent = "";
const chargeContent = async () => {
    try {
        const result = await fetch(fullUrl);
        console.log(result);


        const data = await result.json();
        const characters = data.data.results;
        console.log(characters)

        for (let i = 0; i < characters.length; i += 1) {
            console.log(characters[i].name);


            htmlContent += `


                <div class= "col-sm d-flex justify-content-center">
                    <div class="card _card mt-3">
                        <img src="${characters[i].thumbnail.path}.${characters[i].thumbnail.extension}" class="card-img-top" alt="...">
                     <div class="card-body">
                        <h5 class="card-title">${characters[i].name}</h5>
                     </div>
                    </div>
                </div>
            `


        }

        content.innerHTML = htmlContent;


    } catch (error) {
        console.log(error);
    }


}


chargeContent();
