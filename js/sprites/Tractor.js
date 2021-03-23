class Tractor {
    constructor () {
        this.x = -700;
        this.y = 200;
    }

    tick () {
        if (tractorImage.complete) {
            ctx.drawImage(tractorImage, this.x, this.y);
        }

        ctx.font = "60px Arial";
        ctx.fillStyle = "white";
        ctx.fillText("Temps : " + ((totalTime)/1000) + "sec", this.x - 500, 370)

        this.x += 3;

        if (this.x > 2000) {
            start();
        }
    }
}