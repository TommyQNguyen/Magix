let spriteList = [];

window.addEventListener("load", () => {

    const NODE_INDEX_BUTTON = document.querySelector("#index-button");
    const NODE_INDEX_USERNAME = document.querySelector("#username");

    // NODE_INDEX_USERNAME.value = "Test";

    NODE_INDEX_BUTTON.addEventListener("click", () => {
        
        // console.log(NODE_INDEX_USERNAME.value);
        window.localStorage.setItem('username', JSON.stringify(NODE_INDEX_USERNAME.value));
        console.log(window.localStorage.getItem('username'));
    })
    
    spriteList.push(new Umbrella(0, 0));
    spriteList.push(new Umbrella(0, 375));
    spriteList.push(new Umbrella(500, 0));
    spriteList.push(new Umbrella(500, 375));
    spriteList.push(new Umbrella(1000, 0));
    spriteList.push(new Umbrella(1000, 375));

    tick();
})


// 60fps
const tick = () => {
    for (let i = 0 ; i < spriteList.length; i++) {
        spriteList[i].tick();
    }

    window.requestAnimationFrame(tick);
}

class Umbrella {
    constructor(x, y) {
        this.node = document.createElement("IMG");
        this.node.setAttribute("src", "images/umbrella.png");
        this.node.setAttribute("width", "500");
        this.node.setAttribute("height", "500");
        this.node.setAttribute("alt", "The Pulpit Rock");
        this.node.style.left = x + "px";
        this.node.style.top = y + "px";
        this.degree = Math.random() * 360;
        this.node.style.transform = "rotate(" + this.degree + "deg)";
        this.node.style.position = "absolute";
        this.speed = 5;
        this.acceleration = -0.1;

        document.body.append(this.node);
    }

    tick() {
        let currentY = this.node.offsetTop;
        let alive = true;

        this.degree += this.speed;
        this.node.style.transform = "rotate(" + this.degree + "deg)";
        this.speed += this.acceleration; // velocity
        currentY += this.speed / 5;
        this.node.style.top = currentY + "px";

        if (currentY < -500) {
            alive = false;
            this.node.remove();
        }

        return alive;
    }
}