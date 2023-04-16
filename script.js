
const btnPost = document.querySelector('#btn-post ');
const btnEnvoyer = document.querySelector('#btn-envoyer');
const btnAnnuler = document.querySelector('#btn-annuler');
const btnDelete = document.querySelector('#btn-delete');
const btnNon = document.querySelector('#btn-non');
const btnOui = document.querySelector('#btn-oui');
const btnSideNav = document.querySelector('#btn-sidenav');
const btnCloseNav = document.querySelector('#btn-closenav');
const btnCode = document.querySelector('#btn-code');
const btnMusique = document.querySelector('#btn-musique');
const btnPoubelle = document.querySelector('#btn-poubelle');
const btnReset = document.querySelector('#btn-reset');

const containerMid = document.querySelector('#container-mid');
const containerInscription = document.querySelector('#container-inscription');
const containerPartage = document.querySelector('#container-partage');
const containerSuppr = document.querySelector('#container-suppr');
const containerPostCode = document.querySelector('#container-post-code');
const containerPostMusique = document.querySelector('#container-post-musique');
const containerPostTrash = document.querySelector('#container-post-trash');


const LogoSite = document.querySelector('#logo-site');
const UserPart = document.querySelector('#user-part');
const UserMenu = document.querySelector('#user-menu');
const UserMenu2 = document.querySelector('#user-menu-2');
const UserMenu3 = document.querySelector('#user-menu-3');
const UserMenu4 = document.querySelector('#user-menu-4');

const tweet = document.querySelector('#input-tweet');
const fichier = document.querySelector('#fichier');
const loadImg = document.querySelector('#load-img');
const tagSelect = document.querySelector('#select');

const body = document.querySelector('#body');
const leftpart = document.querySelector('#left-part');
const rightpart = document.querySelector('#right-part');
const MidPart = document.querySelector('#mid-part');


window.addEventListener('scroll', () => {
    const ScrollPosition = window.scrollY;
    console.log(ScrollPosition);

    /* if : math.ceil = arrondir au sup */
    if (Math.ceil(ScrollPosition) > 100) {
        containerInscription.style.display = 'block';
        body.style.opacity = 0.75;
        containerInscription.style.opacity = 1;
        /*
        leftpart.style.filter = 'blur(3px)';
        rightpart.style.filter = 'blur(3px)';
        containerPost.style.filter = 'blur(3px)';
        */
    }
});

/* Trucs qui fonctionnent */

btnPost.addEventListener('click', function() {
    if (containerPartage.style.display == 'none') {
        containerPartage.style.display = 'block';
        leftpart.style.filter = 'blur(2px)';
        rightpart.style.filter = 'blur(2px)';      
    }
});



btnAnnuler.addEventListener('click', function() {
    containerPartage.style.display = 'none';
    leftpart.style.filter = 'blur(0px)';
    rightpart.style.filter = 'blur(0px)';
});

btnEnvoyer.addEventListener('click', function() {
    containerPartage.style.display = 'none';
    leftpart.style.filter = 'blur(0px)';
    rightpart.style.filter = 'blur(0px)';
});




/* 
const lectureIMG = new FileReader();
*/
/* On converti l'img en base 64 */
/*
lectureIMG.readAsDataURL(fichier);
console.log(lectureIMG);

lectureIMG.addEventListener("load", function() {
    console.log('aled img');
   loadImg = lectureIMG.result;
});
*/

btnDelete.addEventListener('click', function(){
    if (containerSuppr.style.display =='none' ){
        containerSuppr.style.display = 'block';
    }
});

btnNon.addEventListener('click',  function(){
    containerSuppr.style.display = 'none';
});



btnCode.addEventListener('click', function(){
    console.log('bleu');
    body.classList.add('bg-bleu'); 
    containerMid.style.display = 'none';
    containerPostCode.style.display = 'block';
});

btnMusique.addEventListener('click', function(){
    console.log('jaune');
    body.classList.add('bg-jaune');
    containerMid.style.display = 'none';
    containerPostMusique.style.display = 'block';
});

btnPoubelle.addEventListener('click', function(){
    console.log('gris');
    body.classList.add('bg-gris');
    containerMid.style.display = 'none';
    containerPostTrash.style.display = 'block';
});

btnReset.addEventListener('click', function(){
    console.log('remove');

    body.classList.remove('bg-bleu');
    body.classList.remove('bg-jaune');
    body.classList.remove('bg-gris');

    containerPostCode.style.display = 'none';
    containerPostMusique.style.display = 'none';
    containerPostTrash.style.display = 'none';
    containerMid.style.display = 'block';
});



btnSideNav.addEventListener('click', function() {
    console.log('ça click');

    leftpart.style.display = "grid";
    btnSideNav.style.display = "none";
    btnCloseNav.style.transform = "translatex(200px)"
    btnCloseNav.style.display = "block";    
});

btnCloseNav.addEventListener('click', function() {
    leftpart.style.display = "none";
    btnSideNav.style.display = "grid";
    btnCloseNav.style.transform = "translateX(-200px)";
    btnCloseNav.style.display = "none"; 
})

/* test local storage */

function StoreTweetNotSent (event) {

    let storagetweet = tweet.value;
    let storagetag = tagSelect.value
    
    /* on met l'array dans localstorage */
    localStorage.setItem('StockTweet', storagetweet);
    localStorage.setItem('StockTag', storagetag);
    console.log(localStorage.getItem('StockTweet')); /* test */
    

    btnEnvoyer.addEventListener('click', function() {
        localStorage.clear();
    });

    btnAnnuler.addEventListener('click', function() {
        localStorage.clear();
    });   
}

let localTweet = localStorage.getItem('StockTweet');
let localTag = localStorage.getItem('StockTag');
tweet.value = localTweet;
tagSelect.value = localTag;

window.addEventListener("load", (event) => {
    console.log('in the window after load');

    if(tweet.value != '') {
        console.log('maybe block');
        containerPartage.style.display = "block"; 
    }
}); 



