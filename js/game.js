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

        
        // Template pour les cartes du jeu
        let templateHTML = document.querySelector("#cards-template").innerHTML;

        // Map a travers l'array du board enemie pour render les cartes
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
    
            const NODE_ENEMY_BOARD = document.querySelector("#enemy-board-cards-container");
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
        data.board.map( (playerBoardCard) => {
            let div = document.createElement("div");
            div.className = "player-board-card";
            div.innerHTML = templateHTML;
            div.querySelector(".attack").innerText = playerBoardCard.atk;
            div.querySelector(".hp").innerText = playerBoardCard.hp;
            div.querySelector(".cost").innerText = playerBoardCard.cost;

            const cardMechanics = playerBoardCard.mechanics.map (mechanic => mechanic);

            div.querySelector(".mechanics").innerText = cardMechanics;
    
            const NODE_ENEMY_BOARD = document.querySelector("#enemy-board-cards-container");
            NODE_ENEMY_BOARD.append(div);
        })


        // Player Hand
        document.getElementById("player-cards-container").innerHTML = "";

        data.hand.map( (playerCard) => {
            let div = document.createElement("div");
            div.className = "player-card";
            div.innerHTML = templateHTML;
            div.querySelector(".attack").innerText = `${playerCard.atk}⚔️`;
            div.querySelector(".hp").innerText = `${playerCard.hp}❤️`;
            div.querySelector(".cost").innerText = `${playerCard.cost}⭐`;

            const cardMechanics = playerCard.mechanics.map (mechanic => mechanic);
            div.querySelector(".mechanics").innerText = cardMechanics;

            document.getElementById("player-cards-container").append(div);
        })

        // Player stats
        document.querySelector(".player-hp").innerText = `${data.hp}❤️`;
        document.querySelector(".player-mp").innerText = data.mp;
        document.querySelector(".player-remaining-cards").innerText = data.remainingCardsCount;


    })
    .catch(console.log);
}

window.addEventListener("load", () => {
    setTimeout(state, 1000);        // Appel initial (attendre 1 seconde)
});
