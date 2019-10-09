// lista zadan
function showTasks(){
    tasks.forEach(function(task){
        addNewTask(task);
    });
}

//toggle complete
function toggleTaskComplete(btnToogle){
    btnToogle.classList.toggle('btn-success');
};

//delete task
function deleteTask(btnDel){
    //najblizszy znacznik li
    var liToDelete = btnDel.closest('li');
    btnDel.closest('ul').removeChild(liToDelete);
};