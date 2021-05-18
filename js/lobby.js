const applyStyles = iframe => {
	let styles = {
		fontColor : "#333",
		backgroundColor : "rgba(255, 192, 205, 0.5)",
		fontGoogleName : "Source Code Pro",
		fontSize : "20px",
		hideIcons : true,
		inputBackgroundColor : "rgba(255, 255, 255, 0.2)",
		inputFontColor : "black"
	}
	
	iframe.contentWindow.postMessage(JSON.stringify(styles), "*");	
}

let canvas = null;
let ctx = null;

let spriteList = [];

window.addEventListener("load", () => {

    // const NODE_INDEX_BUTTON = document.querySelector("#index-button");
    // const NODE_INDEX_USERNAME = document.querySelector("#username");

    // NODE_INDEX_BUTTON.addEventListener("onclick", () => {
    //     console.log(NODE_INDEX_USERNAME.value);
    // })

    canvas = document.querySelector("canvas");
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    ctx = canvas.getContext("2d");

    tick();
})

const tick = () => {
    ctx.clearRect(0, 0, canvas.width, canvas.width);

    if (Math.random() < 0.2) {
        spriteList.push(new Firefly());
    }

    for (let i = 0; i < spriteList.length; i++) {
        const sprite = spriteList[i];
        let alive = sprite.tick();

        if (!alive) {
            spriteList.splice(i, 1);
            i--;
        }
    }

    window.requestAnimationFrame(tick);
}

// Base de code de Fred, a voir comment utiliser createRadialGradient
class Firefly {
    constructor() {
        this.x = Math.random() * canvas.width;
        this.y = canvas.height + 20;
        this.size = 2 + Math.random() * 5;
        this.speed = this.size/2;

    }

    tick() {
        let alive = true;

        this.y -= this.speed;
        ctx.fillStyle = "gold";
        ctx.fillRect(this.x, this.y, this.size, this.size);
        // this.x = this.x + 4;
        // var grd = ctx.createRadialGradient(75, 50, 5, 90, 60, 100);
        // var grd = ctx.createRadialGradient(this.x, this.y, 30, this.x, this.y, 80);
        // grd.addColorStop(0, "white");
        // grd.addColorStop(1, "red");

        // Fill with gradient
        // ctx.fillStyle = grd;
        // ctx.fillRect(this.x, this.y, this.size, this.size);


        if (this.y < -10) {
            alive = false;
        }

        return alive;
    }
}