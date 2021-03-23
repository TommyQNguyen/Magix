let canvas = null;
let ctx = null;

let spriteList = [];

window.addEventListener("load", () => {
    canvas = document.querySelector("canvas");
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    ctx = canvas.getContext("2d");

    // spriteList.push(new Background());


    tick();
})

const tick = () => {
    ctx.clearRect(0, 0, canvas.width, canvas.width);

    if (Math.random() < 0.2) {
        spriteList.push(new Raindrop());
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

class Background {
    constructor() {
        this.img = new Image();
        this.img.src = "images/landscape.png";
    }

    tick() {
        if (this.img.complete) {
            ctx.drawImage(this.img, 0, 0);
        }

        return true;
    }
}

class Raindrop {
    constructor() {
        this.x = Math.random() * canvas.width;
        this.y = -15;
        this.size = 2 + Math.random() * 5;
        this.speed = this.size/2;
    }

    tick() {
        let alive = true;

        this.y += this.speed;
        ctx.fillStyle = "blue";
        ctx.fillRect(this.x, this.y, this.size, this.size);

        if (this.y > canvas.height) {
            alive = false;
        }

        return alive;
    }
}