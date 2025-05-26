
const gifList = [
    'assets/img/gif1.gif',
    'assets/img/gif2.gif',
    'assets/img/gif3.gif',
    'assets/img/gif4.gif',
    'assets/img/gif5.gif',
    'assets/img/gif7.gif',
    'assets/img/gif8.gif',
    'assets/img/gif9.gif',
    'assets/img/gif10.gif'

];
let current = 0;
const bgDiv = document.querySelector('.dynamic-bg');
function cycleGif() {
    bgDiv.style.backgroundImage = `url('${gifList[current]}')`;
    current = (current + 1) % gifList.length;
}
cycleGif();
setInterval(cycleGif, 4500); // Change GIF every 5 seconds
