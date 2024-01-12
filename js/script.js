const search = document.querySelector("#key");
const containerCards = document.querySelector('.cards');


search.addEventListener('keyup', function(){

    let ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function(){
        if (ajax.readyState == 4){
            if (ajax.status == 200){
                // containerCards.innerHTML = ajax.responseText;
                alert('helo');
            }else{
                alert('gaw');
            }
        }
        console.log(ajax.status)    
    }

    ajax.open('GET', `./ajax/cards.php?keyword=${search.value}`, true);
})