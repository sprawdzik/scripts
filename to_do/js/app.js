//zmienne
var newTaskForm = document.querySelector('.new-task-container form');
var tasksContainer = document.querySelector('.tasks-container ul');

// sprawdza czy zaladowano strone, DOM
document.addEventListener('DOMContentLoaded', function () {
    date_clock();
    bindAddTaskEvents();
    showTasks();
});

// date and clock
function date_clock() {

    var h4 = document.querySelector('h4');
    var timeNow = '';
    var timeText = '12 : 12: 12';

    var clock = setInterval(function () {
        timeNow = new Date();

        var day = add_zero(timeNow.getDate());
        var month = add_zero(timeNow.getMonth() + 1);
        var year = add_zero(timeNow.getFullYear());

        var hours = add_zero(timeNow.getHours());
        var minutes = add_zero(timeNow.getMinutes());
        var seconds = add_zero(timeNow.getSeconds());

        timeText = day + '.' + month + '.' + year + ' # ' + hours + ' : ' + minutes + ' : ' + seconds;

        h4.textContent = timeText;
    }, 1000);
}

function add_zero(variable) {
    if (variable < 10) variable = "0" + variable;
    return variable;
}