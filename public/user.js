
    const circle_1 = document.querySelector('.circle-progress_1');
    const circleRadius_1 = circle_1.r.baseVal.value;
    const circumference_1 = 2 * Math.PI * circleRadius_1;
    const circlePercent_1 = document.querySelector('.circle-percent_1');


    circle_1.style.strokeDasharray = `${circumference_1} ${circumference_1}`;
    circle_1.style.strokeDashoffset = circumference_1;
    console.log(circumference_1)

    function setProgress_1(percent) {

        const offsetCount = setInterval(() => {
            if(circle_1.style.strokeDashoffset >= circumference_1) {
                clearInterval(offsetCount);
            } circle_1.style.strokeDashoffset -= 1;
              circle_1.style.strokeDashoffset = circumference_1 - (percent / 100) * circumference_1;
            circlePercent_1.innerHTML = percent + '%';

        }, 100)
    }; 
  
setProgress_1(70);  



const circle_2 = document.querySelector('.circle-progress_2');
const circleRadius_2 = circle_2.r.baseVal.value;
const circumference_2 = 2 * Math.PI * circleRadius_2;
const circlePercent_2 = document.querySelector('.circle-percent_2');
let count = 0;

circle_2.style.strokeDasharray = `${circumference_2} ${circumference_2}`;
circle_2.style.strokeDashoffset = circumference_2;
console.log(circumference_2)
function setProgress_2(percent) {

    const offsetCount = setInterval(() => {
        if(circle_2.style.strokeDashoffset >= circumference_2) {
            clearInterval(offsetCount);
        } circle_2.style.strokeDashoffset -= 1;
          circle_2.style.strokeDashoffset = circumference_2 - (percent / 100) * circumference_2;

        circlePercent_2.innerHTML = percent + '%';

    }, 100)
}; 

setProgress_2(40);  