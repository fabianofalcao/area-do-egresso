<?php
require_once '../_app/Config.inc.php';
require_once '../_app/Conn/Conn.class.php';
require_once '../_app/Conn/Read.class.php';

$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if($post):
    $descricao = '%'.$post['descricao'].'%';
else:
    $descricao = '%';
endif;

$data = '   <div class="table-responsive col-md-12">
                 <table class="table table-striped" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th style="width: 10%;">Id</th>
                            <th style="width: 70%;">Nivel de satisfação</th>
                            <th style="width: 20%;"class="actions text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>';


$read = new Read;

$read->ExeRead("tblNivelSatisfacao", "WHERE Descricao LIKE :l", "l=$descricao");
if($read->getResult()):
    foreach ($read->getResult() as $res):
        $data .= '      <tr>
                            <td>'.$res['idNivelSatisfacao'].'</td>
                            <td>'.$res['Descricao'].'</td>
                            <td class="actions text-center">
                                <a class="btn btn-success btn-xs " href="view.html">Visualizar</a>
                                <a class="btn btn-warning btn-xs  " href="edit.html">Editar</a>
                                <a class="btn btn-danger btn-xs "  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
                            </td>
                        </tr>';
    endforeach;
else:
    $data .= '<tr style="text-align: center;"><td colspan="5">A consulta não retornou resultados!</td></tr>';
endif;

$data .= '          </tbody>
                </table>
            </div>';

echo $data;












/*




                    <tbody>

                        <tr>
                            <td>1001</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing</td>
                            <td class="actions text-center">
                                <a class="btn btn-success btn-xs " href="view.html">Visualizar</a>
                                <a class="btn btn-warning btn-xs  " href="edit.html">Editar</a>
                                <a class="btn btn-danger btn-xs "  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>'

*/