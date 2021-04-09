const state = () => {
    fetch("ajaxState.php", {       // Il faut créer cette page et son contrôleur appelle 
        method : "POST",            // l’API (games/state)
        credentials: "include"
        })
    .then(response => response.json())
    .then(data => {
        console.log(data);          // contient les cartes/état du jeu.

        // setTimeout(state, 1000);    // Attendre 1 seconde avant de relancer l’appel

        const NODE_REMAINING_TURN_TIME = document.querySelector("#remaining-turn-time");
        NODE_REMAINING_TURN_TIME.innerText = data.remainingTurnTime;


        /* -------------------------------------------------------------------------- */
        /*                                Section Enemy                               */
        /* -------------------------------------------------------------------------- */
        const NODE_ENEMY_CARDS = document.querySelector("#enemy-cards-container");
        for (let i = 0; i < data.opponent.handSize; i++) {
            let div = document.createElement("div");
            div.className = "enemy-card";
            div.style.height = "100px";
            div.style.width = "50px";
            div.style.backgroundColor = "magenta";
            div.style.margin = "5px";
            
            NODE_ENEMY_CARDS.append(div);
        }

        document.querySelector(".enemy-hp").innerText = data.opponent.hp;
        document.querySelector(".enemy-user").innerText = data.opponent.username;
        document.querySelector(".enemy-mp").innerText = data.opponent.mp;

        document.querySelector(".enemy-remaining-cards").innerText = data.opponent.remainingCardsCount;



        /* -------------------------------------------------------------------------- */
        /*                                Section Player                              */
        /* -------------------------------------------------------------------------- */
        document.getElementById("player-cards-container").innerHTML = "";

        let templateHTML = document.querySelector("#player-cards-template").innerHTML;

        for (let i = 0; i < data.hand.length; i++) {
            let div = document.createElement("div");
            div.className = "player-card";
            div.innerHTML = templateHTML;
            div.querySelector(".attack").innerText = data.hand[i].atk;
            div.querySelector(".hp").innerText = data.hand[i].hp;
            div.querySelector(".cost").innerText = data.hand[i].cost;
            div.querySelector(".mechanics").innerText = data.hand[i].mechanics[0];
    
            document.getElementById("player-cards-container").append(div);
        }

        document.querySelector(".player-hp").innerText = data.hp;
        document.querySelector(".player-mp").innerText = data.mp;
        document.querySelector(".player-remaining-cards").innerText = data.remainingCardsCount;


    })
    .catch(console.log);
}

window.addEventListener("load", () => {
    setTimeout(state, 1000);        // Appel initial (attendre 1 seconde)
});
