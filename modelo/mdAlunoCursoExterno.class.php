<?php

/**
 * mdAluno.class.php [ MODELO ]
 * Responsável por gerenciar a tabela aluno no sistema do egresso administrativo
 * @copyright (c) 2016, Fabiano Falcão
 */
class mdAlunoCursoExterno {
    private $Data;
    private $idAluno;
    private $Pesquisa;
    
    private $Limit;
    private $Offset;
    
    private $Error;
    private $Result;
    
    const Tabela = 'tblAlunoCursoExterno';
    
    public function ExeCreate(array $Data) {
        $this->Data = $Data;
        if($this->Data['idAluno'] == '' OR $this->Data['NomeCursoExterno'] == '' 
           OR $this->Data['idModalidade'] == '' OR $this->Data['Instituicao'] == ''):
            $this->Result = false;
            $this->Error = ["<b>Erro ao cadastrar.</b> Para cadastrar curso realizado pós IFMG-SJE preencha os campos obigatórios!", FAF_WARNING];
        else:
            $this->setData();
            $this->Create();
        endif;
    }
    
    public function ExeUpdate($idAluno, array $Data) {
        $this->idAluno = (int) $idAluno;
        $this->Data = $Data;
        if($this->Data['idAluno'] == '' OR $this->Data['NomeCursoExterno'] == '' 
           OR $this->Data['idModalidade'] == '' OR $this->Data['Instituicao'] == ''):
            $this->Result = false;
            $this->Error = ["<b>Erro ao alterar.</b> Para alterar curso realizado pós IFMG-SJE preencha os campos obigatórios!", FAF_WARNING];
        else:
            $this->setData();
            $this->Update();
        endif;
    }
    
    public function ExeDelete($idAluno) {
         $this->idAluno = (int) $idAluno;
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
            $this->Error = ["<b>Sucesso ao inserir.</b> Curso <b>{$this->Data['NomeCursoExterno']}</b>, relizado pós IFMG-SJE foi cadastrado no sistema!", FAF_SUCCESS];
        endif;
    }
    
    private function Update() {
        $Update = new Update;
        $Update->ExeUpdate(self::Tabela, $this->Data, "WHERE idAluno = :id", "id={$this->idAluno}");
        if($Update->getResult()):
            $this->Result = true;
            $this->Error = ["<b>Sucesso ao alterar.</b> Curso <b>{$this->Data['NomeCursoExterno']}</b>, realizado pós IFMG-SJE foi alterado no sistema", FAF_SUCCESS];
        endif;
    }

    private function Delete() {
        $Delete = new Delete;
        $Delete->ExeDelete(self::Tabela, "WHERE idAluno = :id", "idA={$this->idAluno}");
        if($Delete->getResult()):
            $this->Result = true;
            $this->Error = ["<b>Sucesso ao excluir.</b> O curso realizado pós IFMG-SJE foi excluído do sistema!", FAF_SUCCESS];
        endif;        
    }
    
    private function Read() {
        $Read = new Read;
        $Read->FullRead("SELECT a.idAluno, UPPER(a.Nome) as Nome, c.NomeCursoExterno, m.idModalidadeCurso, m.Descricao, c.Instituicao
                            FROM tblAluno a
                            JOIN tblCursoExterno c ON a.idAluno = c.idAluno
                            JOIN tblModalidadeCurso m ON c.idModalidadeCurso = m.idModalidadeCurso
                            WHERE (a.Nome LIKE '%".$this->Pesquisa."%' OR c.NomeCursoExterno LIKE '%".$this->Pesquisa."%') ORDER BY a.Nome, c.NomeCursoExterno LIMIT ".$this->Limit." OFFSET " .$this->Offset);
        if($Read->getRowCount() > 0){
            $this->Result = $Read->getResult();
        }else{
            $this->Result = false;
            $this->Error = ['<b>Erro ao pesquisar.</b> A pesquisa não retornou nenhum resultado!', FAF_WARNING];
        }
    }  
}

