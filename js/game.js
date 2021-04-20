
const state = () => {
    fetch("ajaxState.php", {       // Il faut créer cette page et son contrôleur appelle 
        method : "POST",           // l’API (games/state)
        credentials: "include"
        })
    .then(response => response.json())
    .then(data => {
        console.log(data);          // contient les cartes/état du jeu.

        // setTimeout(state, 1000);    // Attendre 1 seconde avant de relancer l’appel

        if (data !== "WAITING") {

            const NODE_REMAINING_TURN_TIME = document.querySelector("#remaining-turn-time");
            NODE_REMAINING_TURN_TIME.innerText = data.remainingTurnTime;

            const NODE_YOUR_TURN = document.querySelector("#your-turn");
            NODE_YOUR_TURN.innerText = `Your turn: ${data.yourTurn}`;


            
            /* -------------------------------------------------------------------------- */
            /*                                Section Enemy                               */
            /* -------------------------------------------------------------------------- */
            const NODE_ENEMY_CARDS = document.querySelector("#enemy-cards-container");
            NODE_ENEMY_CARDS.innerHTML = "";
            for (let i = 0; i < data.opponent.handSize; i++) {
                let div = document.createElement("div");
                div.className = "enemy-card";
                div.style.height = "100px";
                div.style.width = "50px";
                div.style.backgroundColor = "magenta";
                div.style.margin = "5px";
                
                NODE_ENEMY_CARDS.append(div);
            }

            
            // Template pour les cartes du jeu
            let templateHTML = document.querySelector("#cards-template").innerHTML;

            // Map a travers l'array du board enemie pour render les cartes

            const NODE_ENEMY_BOARD = document.querySelector("#enemy-board-cards-container");
            NODE_ENEMY_BOARD.innerHTML = "";

            data.opponent.board.map( (enemyCard) => {
                console.log(enemyCard);
                let div = document.createElement("div");
                div.className = "enemy-board-card";
                div.innerHTML = templateHTML;
                div.querySelector(".attack").innerText = `${enemyCard.atk}⚔️`;
                div.querySelector(".hp").innerText = `${enemyCard.hp}❤️`;
                div.querySelector(".cost").innerText = `${enemyCard.cost}⭐`;

                const cardMechanics = enemyCard.mechanics.map (mechanic => mechanic);

                div.querySelector(".mechanics").innerText = cardMechanics;
        
                NODE_ENEMY_BOARD.append(div);
            })


            // Enemy stats
            document.querySelector(".enemy-hp").innerText = `${data.opponent.hp}❤️`;
            document.querySelector(".enemy-user").innerText = data.opponent.username;
            document.querySelector(".enemy-mp").innerText = data.opponent.mp;
            document.querySelector(".enemy-remaining-cards").innerText = data.opponent.remainingCardsCount;


            /* -------------------------------------------------------------------------- */
            /*                                Section Player                              */
            /* -------------------------------------------------------------------------- */

            // Player Board

            const NODE_PLAYER_BOARD = document.querySelector("#player-board-cards-container");
            NODE_PLAYER_BOARD.innerHTML = "";

            data.board.map( (playerBoardCard) => {
                let div = document.createElement("div");
                div.className = "player-board-card";
                div.innerHTML = templateHTML;
                div.querySelector(".attack").innerText = playerBoardCard.atk;
                div.querySelector(".hp").innerText = playerBoardCard.hp;
                div.querySelector(".cost").innerText = playerBoardCard.cost;

                const cardMechanics = playerBoardCard.mechanics.map (mechanic => mechanic);

                div.querySelector(".mechanics").innerText = cardMechanics;
        
                NODE_PLAYER_BOARD.append(div);
            })


            // Player Hand
            const NODE_PLAYER_CARDS = document.getElementById("player-cards-container");
            NODE_PLAYER_CARDS.innerHTML = "";

            data.hand.map( (playerCard) => {
                let card = document.createElement("div");
                card.className = "player-card";
                card.innerHTML = templateHTML;
                card.querySelector(".attack").innerText = `${playerCard.atk}⚔️`;
                card.querySelector(".hp").innerText = `${playerCard.hp}❤️`;
                card.querySelector(".cost").innerText = `${playerCard.cost}⭐`;

                const cardMechanics = playerCard.mechanics.map(mechanic => mechanic);
                card.querySelector(".mechanics").innerText = cardMechanics;
                card.addEventListener("click", () => { playEvent(playerCard.uid); console.log(playerCard.uid)});

                NODE_PLAYER_CARDS.append(card);
            })

            // Player stats
            document.querySelector(".player-hp").innerText = `${data.hp}❤️`;
            document.querySelector(".player-mp").innerText = `${data.mp} MP`;
            document.querySelector(".player-remaining-cards").innerText = `${data.remainingCardsCount} cards remaining`;
    }


    })
    .catch(console.log);
}

/* ------------------------------------------------------------------------------------------------------------------- */

            /* -------------------------------------------------------------------------- */
            /*                                Section Actions                             */
            /* -------------------------------------------------------------------------- */

const endTurnEvent = () => {

    console.log("Starting endTurnEvent call");
    let formData = new FormData();
    formData.append("type", "END_TURN");

    fetch("ajaxPlayer.php", {       // Il faut créer cette page et son contrôleur appelle 
        method : "POST",            // l’API (games/action)
        credentials: "include",
        body : formData,
        })
    .then(response => response.json())
    .then(data => {
        console.log(data);          // contient les cartes/état du jeu.
    })
    .catch(console.log);
}

const heroPowerEvent = () => {

    console.log("Starting heroPowerEvent call");
    let formData = new FormData();
    formData.append("type", "HERO_POWER");

    fetch("ajaxPlayer.php", {       
        method : "POST",            
        credentials: "include",
        body : formData,
        })
    .then(response => response.json())
    .then(data => {
        console.log(data);          // contient les cartes/état du jeu.
    })
    .catch(console.log);
}

const playEvent = (cardId) => {

    console.log("Starting playEvent call");
    let formData = new FormData();
    formData.append("type", "PLAY");
    formData.append("cardId", cardId);

    fetch("ajaxPlayer.php", {       
        method : "POST",            
        credentials: "include",
        body : formData,
        })
    .then(response => response.json())
    .then(data => {
        console.log(data);          // contient les cartes/état du jeu.
    })
    .catch(console.log);
}

const consoleLogTest = (cardId) => {
    console.log("ConsoleLogTest function works! Card id is: " + cardId);
}

window.addEventListener("load", () => {
    setTimeout(state, 1000);        // Appel initial (attendre 1 seconde)
    
    const NODE_BUTTON_END_TURN = document.querySelector("#end-turn");
    const NODE_BUTTON_HERO_POWER = document.querySelector("#hero-power");

    NODE_BUTTON_END_TURN.addEventListener("click", endTurnEvent);
    NODE_BUTTON_HERO_POWER.addEventListener("click", heroPowerEvent);
});
