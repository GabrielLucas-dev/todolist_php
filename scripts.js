// let id_php = checkbox.getAttribute('data-id')

function handleCheckbox(checkbox){
    
    const task = checkbox.closest('.task')
    const taskTitle = task.querySelector('.task_title')

    if(checkbox.checked){
        taskTitle.style.textDecoration = "line-through"
    } else{
        taskTitle.style.textDecoration = "none"
    }

    // console.log(checkbox.dataset.id)
}

// const editBtn = document.getElementById('edit')
// const editInput = document.querySelector('.hidden')

function handlePut(editBtn){
    const task = editBtn.closest('.task')
    const editInput = task.querySelector('.edit_input')
    
    editInput.classList.toggle('hidden')
}

