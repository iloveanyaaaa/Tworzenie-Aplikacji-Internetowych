const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");

let angle = 0;

function drawShapes() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    ctx.save();
    ctx.translate(100, 100);
    ctx.rotate(angle);
    ctx.fillStyle = 'blue';
    ctx.fillRect(-50, -50, 100, 100);
    ctx.restore();

    ctx.save();
    ctx.translate(250, 150);
    ctx.rotate(angle);
    ctx.fillStyle = 'green';
    ctx.beginPath();
    ctx.arc(0, 0, 50, 0, Math.PI * 2);
    ctx.fill();
    ctx.restore();

    ctx.save();
    ctx.translate(150, 350);
    ctx.rotate(angle);
    ctx.fillStyle = 'red';
    ctx.beginPath();
    ctx.moveTo(-50, -50);
    ctx.lineTo(-100, 50);
    ctx.lineTo(50, 50);
    ctx.closePath();
    ctx.fill();
    ctx.restore();

    angle += 0.01;
}

function animate() {
    drawShapes();
    requestAnimationFrame(animate);
}

animate();
