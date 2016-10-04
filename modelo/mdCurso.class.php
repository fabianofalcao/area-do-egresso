<?php

/**
 * mdCurso.class.php [ MODELO ]
 * Responsável por gerenciar os cursos no sistema do egresso administrativo
 * @copyright (c) 2016, Fabiano Falcão
 */
class mdCurso{
    private $Data;
    private $idCurso;
    private $Pesquisa;
    
    private $Limit;
    private $Offset;
    
    private $Error;
    private $Result;
    
    const Tabela = "tblCurso";
    
    public function ExeCreate(array $Data) {
        $this->Data = $Data;
        if(in_array('', $this->Data)):
            $this->Result = false;
            $this->Error = ["<b>Erro ao cadastrar.</b> Para cadastrar um curso preencha todos os campos", FAF_WARNING];
        else:
            $this->setData();
            $this->Create();
        endif;
    }
    
    public function ExeUpdate($idCurso, array $Data) {
        $this->idCurso = (int) $idCurso;
        $this->Data = $Data;
        if(in_array('', $this->Data)):
            $this->Result = false;
            $this->Error = ["<b>Erro ao atualizar.</b> Para atualizar o curso {$this->Data['Nome']} preencha todos os campos", FAF_WARNING];
        else:
            $this->setData();
            $this->Update();
        endif;
    }
    
    public function ExeDelete($idCurso) {
         $this->idCurso = (int) $idCurso;
         $this->Delete();         
    }    
    
    public function ExeRead($Nome, $Limit, $Offset) {
        $this->Pesquisa = trim($Nome);
        $this->Limit = (int) $Limit;
        $this->Offset = (int) $Offset;
        $this->Read();
    }    
    
    public function getError() {
        return $this->Error;
    }

    public function getResult() {
        return $this->Result;
    }
    
    private function setData() {
        $this->Data = array_map('strip_tags', $this->Data);
        $this->Data = array_map('trim', $this->Data);
    }
    
    private function Create() {
        $Create = new Create;
        $Create->ExeCreate(self::Tabela, $this->Data);
        if($Create->getResult()):
            $this->Result = $Create->getResult();
            $this->Error = ["<b>Sucesso ao inserir.</b> O curso <b>{$this->Data['Nome']}</b> foi cadastrado no sistema", FAF_SUCCESS];
        endif;
    }
    
    private function Update() {
        $Update = new Update;
        $Update->ExeUpdate(self::Tabela, $this->Data, "WHERE idCurso = :id", "id={$this->idCurso}");
        if($Update->getResult()):
            $this->Result = true;
            $this->Error = ["<b>Sucesso ao alterar.</b> O curso <b>{$this->Data['Nome']}</b> foi alterado no sistema", FAF_SUCCESS];
        endif;
    }

    private function Delete() {
        $Delete = new Delete;
        $Delete->ExeDelete(self::Tabela, "WHERE idCurso = :id", "id={$this->idCurso}");
        if($Delete->getResult()):
            $this->Result = true;
            $this->Error = ["<b>Sucesso ao excluir.</b>  Curso excluído do sistema", FAF_SUCCESS];
        endif;        
    }    
    
    private function Read($Termos = null, $ParseString = null) {
        $Read = new Read;
        $Read->FullRead("SELECT 
                            c.idCurso, c.idModalidadeCurso, m.Descricao AS Modalidade, c.Nome
                        FROM
                            tblCurso c
                        JOIN
                            tblModalidadeCurso m ON c.idModalidadeCurso = m.idModalidadecurso
                        WHERE (c.Nome LIKE :p OR m.Descricao LIKE :p) LIMIT :limit OFFSET :offset", "p=%{$this->Pesquisa}%&limit={$this->Limit}&offset={$this->Offset}");
        if($Read->getRowCount() > 0){
            $this->Result = $Read->getResult();
        }else{
            $this->Result = false;
            $this->Error = ['<b>Erro ao pesquisar.</b> A pesquisa não retornou nenhum resultado!', FAF_WARNING];
        }
    }    
}
