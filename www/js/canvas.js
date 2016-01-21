window.onload = function() {
    var canvas = document.querySelector( '#field' );
    var context = canvas.getContext( '2d' );

    canvas.width = 500;
    canvas.height = 300;
    context.lineWidth = 2;
    context.strokeStyle = 'red';
    context.fillStyle = 'yellow';

    context.beginPath();
    context.moveTo( 50, 50 );
    context.lineTo( 50, 100 );
    context.lineTo( 150, 150);
    context.lineTo( 50, 50 );
    context.stroke();
    context.fill();
    context.closePath();

    context.beginPath();
    context.rect( 120, 50, 50, 50 );
    context.stroke();
    context.closePath();

    context.fillRect( 200, 50, 50, 50 );
    context.strokeRect( 260, 50, 50, 50 );

    context.beginPath();
    context.arc( 250, 100, 50, 0, Math.PI);
    context.stroke();
    context.closePath()
}