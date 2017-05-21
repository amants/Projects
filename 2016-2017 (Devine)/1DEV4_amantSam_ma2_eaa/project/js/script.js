{

let page = 0;
const pageWidth = 96;
const deadTsjer = 'June 21 2017 00:01';
const deadArea = 'June 23 2017 00:01';
const deadSnake = 'June 25 2017 00:01';
const deadForbidden = 'June 27 2017 00:01';
const deadKremlin = 'June 29 2017 00:01';

const getTimeRemaining = (endtime) => {
  const t = Date.parse(endtime) - Date.parse(new Date());
  const sec = Math.floor((t/1000)%60);
  const min = Math.floor((t/1000/60)%60);
  const hour = Math.floor((t/(1000*60*60))%24);
  const days = Math.floor((t/(1000*60*60*24)));
  return {
    'total':t,
    'days': days,
    'hours' : hour,
    'minutes': min,
    'seconds': sec
  };
}

const initializeTimer = (id, endtime, div) => {
  const timers = document.getElementById(id);
    const updateTimer = () => {
    const clock = getTimeRemaining(endtime);
    let hours = "";
    if (clock.hours < 10) {
      hours = "0" + clock.hours;
    } else {
      hours = clock.hours;
    }
    let minutes = "";
    if (clock.minutes < 10) {
      minutes = "0" + clock.minutes;
    } else {
      minutes = clock.minutes;
    }
    let seconds = "";
    if (clock.seconds < 10) {
      seconds = "0" + clock.seconds;
    } else {
      seconds = clock.seconds;
    }
    const $timer = document.querySelector(`.${div}`);
    $timer.innerHTML = clock.days + ' dagen ' +
      hours + ':' +
      minutes + ':' +
      seconds;
      if (clock.total <= 0) {
        clearInterval(timeinterval);
        $timer.innerHTML = 'Veiling is beeindigd'
      }
    }

    updateTimer();
    const timeinterval = setInterval(updateTimer, 1000);
  }

initializeTimer('timer', deadTsjer, "countTjer");
initializeTimer('timer', deadArea, "countArea");
initializeTimer('timer', deadSnake, "countSnake");
initializeTimer('timer', deadForbidden, "countForbidden");
initializeTimer('timer', deadKremlin, "countKremlin");

nextObject = () => {
  page++;
  if (page == 0) {
      document.querySelector(`.previous`).style.display = "none";
  } else if (page == 4) {
      document.querySelector(`.next`).style.display = "none";
  } else {
      document.querySelector(`.next`).style.display = "block";
      document.querySelector(`.previous`).style.display = "block";
  }
  document.querySelector(`.veilingen__container`).style.marginLeft = "-" + page*pageWidth + "rem";
}

prevObject = () => {
  page--;
  if (page == 0) {
      document.querySelector(`.previous`).style.display = "none";
  } else if (page == 4) {
      document.querySelector(`.next`).style.display = "none";
  } else {
      document.querySelector(`.next`).style.display = "block";
      document.querySelector(`.previous`).style.display = "block";
  }
  document.querySelector(`.veilingen__container`).style.marginLeft = "-" + page*pageWidth + "rem";
}

document.querySelector(`.next`).addEventListener(`click`, nextObject);

document.querySelector(`.previous`).addEventListener(`click`, prevObject);



}
