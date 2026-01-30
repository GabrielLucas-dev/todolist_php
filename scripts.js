const checkbox = document.getElementById('checkbox')
const taskTitle = document.getElementById('task_title')

let checkboxValue = false

function handleCheckbox(){
    if(checkboxValue == false){
        checkboxValue = true
        taskTitle.style.textDecoration = "line-through"
    } else {
        checkboxValue = false
        taskTitle.style.textDecoration = "none"
    }
}

