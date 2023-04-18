<?php

    require "app_lista_tarefas/tarefas.php";
    require "app_lista_tarefas/conexao.php";
    require "app_lista_tarefas/tarefas.service.php";


    $acao = isset( $_GET['acao']) ? $_GET['acao'] : $acao;

    $tarefa = new Tarefa();    
    $conexao = new Conexao();


    if($acao=="inserir"){
    
    $tarefa->__set('tarefa', $_POST['tarefa']);



    $tarefaService = new TarefaService($conexao, $tarefa);

    $tarefaService->inserir();

    header('Location: nova_tarefa.php?inclusao=1');

    }else if($acao == 'recuperar'){
        
        $tarefaService = new TarefaService($conexao, $tarefa);

        $todasTarefas = $tarefaService->recuperar();

    }else if($acao=="atualizar"){
        
        $tarefa->__set('id', $_POST['id']);

        $tarefa->__set('tarefa', $_POST['tarefa']);

        $tarefaService = new TarefaService($conexao, $tarefa);
        if( $todasTarefas = $tarefaService->atualizar()){
            if($_GET['pag'] == 'todas'){
            header('Location: todas_tarefas.php');
            } else if($_GET['pag'] == 'index'){
            header('Location: index.php');
            }
        }

    }else if($acao=="remover"){

        $tarefa->__set('id', $_GET['id']);


        $tarefaService = new TarefaService($conexao, $tarefa);

        $tarefaService->remover();

        if($_GET['pag'] == 'todas'){
            header('Location: todas_tarefas.php');
            } else if($_GET['pag'] == 'index'){
            header('Location: index.php');
            }

    }else if($acao == "marcarRealizada"){

        $tarefa->__set('id', $_GET['id']);

        $tarefa->__set('id_status', 2);


        $tarefaService = new TarefaService($conexao, $tarefa);

        $tarefaService->marcarRealizada();

        if($_GET['pag'] == 'todas'){
            header('Location: todas_tarefas.php');
            } else if($_GET['pag'] == 'index'){
            header('Location: index.php');
            }


    }

?>