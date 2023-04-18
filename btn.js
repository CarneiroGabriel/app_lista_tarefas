function editar(id, textTarefa, pag = 'todas' ){
			
    //form
    let form = document.createElement('form')
    form.action = 'tarefa_controler.php?pag='+pag+'&acao=atualizar'
    form.method = 'post'
    form.className = "row"
    //input
    let inputTarefa = document.createElement('input')
    inputTarefa.type = 'text'
    inputTarefa.name = 'tarefa'
    inputTarefa.className = 'col-9 form-control'
    inputTarefa.value = textTarefa

    //guarda id tarefa
    let inputId = document.createElement('input')
    inputId.type = 'hidden'
    inputId.name = 'id'
    inputId.value = id


    //button
    let button = document.createElement('button')
    button.type = 'submit'
    button.className = 'btn btn-info col-3'
    button.innerHTML = 'Atualizar'

    //criar arvore do doc
    form.appendChild(inputTarefa)
    form.appendChild(inputId)
    form.appendChild(button)
    
    let tarefa = document.getElementById('tarefa_'+id)

    tarefa.innerHTML = ''
    tarefa.insertBefore(form, tarefa[0])

    
}

function remover(id, pag = 'todas'){
    location.href = 'todas_tarefas.php?pag='+pag+'&acao=remover&id='+id;
}

function marcarRealizada(id, pag = 'todas'){
    location.href = 'todas_tarefas.php?pag='+pag+'&acao=marcarRealizada&id='+id;
}