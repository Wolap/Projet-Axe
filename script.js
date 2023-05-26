
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
const btnJV = document.querySelector('#btn-JV');
const btnArt = document.querySelector('#btn-art');
const btnTemps = document.querySelector('#btn-temps');
const btnNews = document.querySelector('#btn-news');
const btnApprendre = document.querySelector('#btn-apprendre');
const btnMood = document.querySelector('#btn-mood');
const btnGuerre = document.querySelector('#btn-guerre');
const btnReset = document.querySelector('#btn-reset');

const containerMid = document.querySelector('#container-mid');
const containerInscription = document.querySelector('#container-inscription');
const containerPartage = document.querySelector('#container-partage');
const containerSuppr = document.querySelector('#container-suppr');
const containerPostCode = document.querySelector('#container-post-code');
const containerPostMusique = document.querySelector('#container-post-musique');
const containerPostTrash = document.querySelector('#container-post-trash');
const containerPostJv = document.querySelector('#container-post-jv');
const containerPostArt = document.querySelector('#container-post-art');
const containerPostTemps = document.querySelector('#container-post-temps');
const containerPostNews = document.querySelector('#container-post-news');
const containerPostApprendre = document.querySelector('#container-post-apprendre');
const containerPostMood = document.querySelector('#container-post-mood');
const containerPostGuerre = document.querySelector('#container-post-guerre');

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

/* btn tags */

btnCode.addEventListener('click', function(){
    console.log('code');
    body.classList.remove('bg-musique');
    body.classList.remove('bg-poubelle');
    body.classList.remove('bg-JV');
    body.classList.remove('bg-art');
    body.classList.remove('bg-temps');
    body.classList.remove('bg-news');
    body.classList.remove('bg-apprendre');
    body.classList.remove('bg-mood');
    body.classList.remove('bg-guerre');

    body.classList.add('bg-code'); 
    containerMid.style.display = 'none';
    containerPostCode.style.display = 'block';
});

btnMusique.addEventListener('click', function(){
    console.log('musique');  
    body.classList.remove('bg-code'); 
    body.classList.remove('bg-poubelle');
    body.classList.remove('bg-JV');
    body.classList.remove('bg-art');
    body.classList.remove('bg-temps');
    body.classList.remove('bg-news');
    body.classList.remove('bg-apprendre');
    body.classList.remove('bg-mood');
    body.classList.remove('bg-guerre');

    body.classList.add('bg-musique');
    containerMid.style.display = 'none';
    containerPostMusique.style.display = 'block';
});

btnPoubelle.addEventListener('click', function(){
    console.log('poubelle');
    body.classList.remove('bg-code');
    body.classList.remove('bg-musique');
    body.classList.remove('bg-JV');
    body.classList.remove('bg-art');
    body.classList.remove('bg-temps');
    body.classList.remove('bg-news');
    body.classList.remove('bg-apprendre');
    body.classList.remove('bg-mood');
    body.classList.remove('bg-guerre');

    body.classList.add('bg-poubelle');
    containerMid.style.display = 'none';
    containerPostTrash.style.display = 'block';
});

btnJV.addEventListener('click', function(){
    console.log('jv');
    body.classList.remove('bg-code');
    body.classList.remove('bg-musique');
    body.classList.remove('bg-poubelle');
    body.classList.remove('bg-art');
    body.classList.remove('bg-temps');
    body.classList.remove('bg-news');
    body.classList.remove('bg-apprendre');
    body.classList.remove('bg-mood');
    body.classList.remove('bg-guerre');

    body.classList.add('bg-JV');
    containerMid.style.display = 'none';
    containerPostJv.style.display = 'block';
});

btnArt.addEventListener('click', function(){
    console.log('art');
    body.classList.remove('bg-code');
    body.classList.remove('bg-musique');
    body.classList.remove('bg-JV');
    body.classList.remove('bg-poubelle');
    body.classList.remove('bg-temps');
    body.classList.remove('bg-news');
    body.classList.remove('bg-apprendre');
    body.classList.remove('bg-mood');
    body.classList.remove('bg-guerre');

    body.classList.add('bg-art');
    containerMid.style.display = 'none';
    containerPostArt.style.display = 'block';
});

btnTemps.addEventListener('click', function(){
    console.log('temps');
    body.classList.remove('bg-code');
    body.classList.remove('bg-musique');
    body.classList.remove('bg-JV');
    body.classList.remove('bg-art');
    body.classList.remove('bg-poubelle');
    body.classList.remove('bg-news');
    body.classList.remove('bg-apprendre');
    body.classList.remove('bg-mood');
    body.classList.remove('bg-guerre');

    body.classList.add('bg-temps');
    containerMid.style.display = 'none';
    containerPostTemps.style.display = 'block';
});

btnNews.addEventListener('click', function(){
    console.log('news');
    body.classList.remove('bg-code');
    body.classList.remove('bg-musique');
    body.classList.remove('bg-JV');
    body.classList.remove('bg-art');
    body.classList.remove('bg-temps');
    body.classList.remove('bg-poubelle');
    body.classList.remove('bg-apprendre');
    body.classList.remove('bg-mood');
    body.classList.remove('bg-guerre');

    body.classList.add('bg-news');
    containerMid.style.display = 'none';
    containerPostNews.style.display = 'block';
});

btnApprendre.addEventListener('click', function(){
    console.log('apprendre');
    body.classList.remove('bg-code');
    body.classList.remove('bg-musique');
    body.classList.remove('bg-JV');
    body.classList.remove('bg-art');
    body.classList.remove('bg-temps');
    body.classList.remove('bg-news');
    body.classList.remove('bg-poubelle');
    body.classList.remove('bg-mood');
    body.classList.remove('bg-guerre');

    body.classList.add('bg-apprendre');
    containerMid.style.display = 'none';
    containerPostApprendre.style.display = 'block';
});

btnMood.addEventListener('click', function(){
    console.log('mood');
    body.classList.remove('bg-code');
    body.classList.remove('bg-musique');
    body.classList.remove('bg-JV');
    body.classList.remove('bg-art');
    body.classList.remove('bg-temps');
    body.classList.remove('bg-news');
    body.classList.remove('bg-apprendre');
    body.classList.remove('bg-poubelle');
    body.classList.remove('bg-guerre');

    body.classList.add('bg-mood');
    containerMid.style.display = 'none';
    containerPostMood.style.display = 'block';
});

btnGuerre.addEventListener('click', function(){
    console.log('guerre');
    body.classList.remove('bg-code');
    body.classList.remove('bg-musique');
    body.classList.remove('bg-JV');
    body.classList.remove('bg-art');
    body.classList.remove('bg-temps');
    body.classList.remove('bg-news');
    body.classList.remove('bg-apprendre');
    body.classList.remove('bg-mood');
    body.classList.remove('bg-poubelle');

    body.classList.add('bg-guerre');
    containerMid.style.display = 'none';
    containerPostGuerre.style.display = 'block';
});

btnReset.addEventListener('click', function(){
    console.log('remove');

    body.classList.remove('bg-code');
    body.classList.remove('bg-musique');
    body.classList.remove('bg-poubelle');
    body.classList.remove('bg-JV');
    body.classList.remove('bg-art');
    body.classList.remove('bg-temps');
    body.classList.remove('bg-news');
    body.classList.remove('bg-apprendre');
    body.classList.remove('bg-mood');
    body.classList.remove('bg-guerre');

    containerPostCode.style.display = 'none';
    containerPostMusique.style.display = 'none';
    containerPostTrash.style.display = 'none';
    containerMid.style.display = 'block';
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

/* test local storage */

function StoreTweetNotSent (event) {

    let storagetweet = tweet.value;
    let storagetag = tagSelect.value
    
    /* on met l'array dans localstorage */
    localStorage.setItem('StockTweet', storagetweet);
    localStorage.setItem('StockTag', storagetag);
    console.log(localStorage.getItem('StockTweet')); /* test */
    console.log(localStorage.getItem('StockTag')); 
    

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

btnPost.addEventListener('click', function() {
    if (containerPartage.style.display == 'none') {
        containerPartage.style.display = 'block';
        leftpart.style.filter = 'blur(2px)';
        rightpart.style.filter = 'blur(2px)';      
    }
});

btnDelete.addEventListener('click', function(){
    if (containerSuppr.style.display =='none' ){
        containerSuppr.style.display = 'block';
    }
});

btnNon.addEventListener('click',  function(){
    containerSuppr.style.display = 'none';
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

window.addEventListener("load", (event) => {
    console.log('in the window after load');

    if(tweet.value != '') {
        console.log('maybe block');
        containerPartage.style.display = "block"; 
    }
}); 



