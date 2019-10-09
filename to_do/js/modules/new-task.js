// wysiwetlanie listy zadan

function addNewTask(task){
    var taskLi = document.createElement('li');

    taskLi.classList.add('single-task');
    taskLi.innerHTML = prepareTaskHTML(task);

    // events - zmiany stanow i usuwanie zadan
    var toggleCompleteBtn = taskLi.querySelector('.toggle-complete-btn');
    var deleteBtn = taskLi.querySelector('.delete-task-btn');

    toggleCompleteBtn.addEventListener('click',function(){
        toggleTaskComplete(this);
    });

    deleteBtn.addEventListener('click',function(){
        deleteTask(this);
    });

    // dodanie zadania do DOM
    tasksContainer.appendChild(taskLi);
}

function prepareTaskHTML(task){
    return '<div class="input-group">'+
    '<span class="input-group-btn">'+
    '<button class="btn btn-primary toggle-complete-btn">'+
    '<i class="fa fa-check-square"></i></button></span>'+

    '<input type="text" class="form-control" value="'+task+'" disabled>'+

    '<span class="input-group-btn">'+
    '<button class="btn btn-danger delete-task-btn">'+
    '<i class="fa fa-trash"></i>'+
    '</button>'+
    '</span>'+
    '</div>';
}



// dodawanie nowych zadan 

function bindAddTaskEvents(){
    // on submit
    newTaskForm.addEventListener('submit',function(event){
        //brak akcji przeladowania strony 'submit'
        event.preventDefault();

        var title = this.querySelector('input').value;
        if(title){
            addNewTask(title);

            document.querySelector('input').value = "";
            document.querySelector('input').autofocus;
        }
        else alert('Podaj zadanie');

    });

}