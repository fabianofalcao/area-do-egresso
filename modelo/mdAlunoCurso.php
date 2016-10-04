<?php

/**
 * mdAluno.class.php [ MODELO ]
 * Responsável por gerenciar a tabela aluno no sistema do egresso administrativo
 * @copyright (c) 2016, Fabiano Falcão
 */
class mdAlunoCurso {
    private $Data;
    private $idAluno;
    private $idCurso;
    private $Pesquisa;
    
    private $Limit;
    private $Offset;
    
    private $Error;
    private $Result;
    
    const Tabela = 'tblAlunoCurso';
    
    public function ExeCreate(array $Data) {
        $this->Data = $Data;
        if($this->Data['idAluno'] == '' OR $this->Data['idCurso'] == '' 
           OR $this->Data['AnoIngresso'] == '' OR $this->Data['AnoFormacao'] == ''):
            $this->Result = false;
            $this->Error = ["<b>Erro ao cadastrar.</b> Para cadastrar um curso realizado no IFMG-SJE preencha os campos obigatórios! ['Nome','CPF', 'E-mail', 'Estado', 'Cidade', 'Logradouro']", FAF_WARNING];
        elseif($this->Data['AnoFormacao'] <= $this->Data['AnoIngresso']):
            $this->Result = false;
            $this->Error = ["<b>Erro ao cadastrar.</b> Ano de ingresso não pode ser maior que ano de formação!", FAF_DANGER];
        else:
            $this->setData();
            $this->Create();
        endif;
    }
    
    public function ExeUpdate($idAluno, $idCurso, array $Data) {
        $this->idAluno = (int) $idAluno;
        $this->idCurso = (int) $idCurso;
        $this->Data = $Data;
        if($this->Data['idAluno'] == '' OR $this->Data['idCurso'] == '' 
           OR $this->Data['AnoIngresso'] == '' OR $this->Data['AnoFormacao'] == ''):
            $this->Result = false;
            $this->Error = ["<b>Erro ao alterar.</b> Para alterar um curso realizado no IFMG-SJE preencha os campos obigatórios! ['Nome','CPF', 'E-mail', 'Estado', 'Cidade', 'Logradouro']", FAF_WARNING];
        elseif($this->Data['AnoFormacao'] <= $this->Data['AnoIngresso']):
            $this->Result = false;
            $this->Error = ["<b>Erro ao alterar.</b> Ano de ingresso não pode ser maior que ano de formação!", FAF_DANGER];
        else:
            $this->setData();
            $this->Update();
        endif;
    }
    
    public function ExeDelete($idAluno, $idCurso) {
         $this->idAluno = (int) $idAluno;
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
            $this->Error = ["<b>Sucesso ao inserir.</b> Curso relizado no IFMG-SJE de código<b>{$this->Data['idCurso']}</b> foi cadastrado no sistema!", FAF_SUCCESS];
        endif;
    }
    
    private function Update() {
        $Update = new Update;
        $Update->ExeUpdate(self::Tabela, $this->Data, "WHERE idAluno = :idA AND idCurso = :idC", "idA={$this->idAluno}&idC={$this->idCurso}");
        if($Update->getResult()):
            $this->Result = true;
            $this->Error = ["<b>Sucesso ao alterar.</b> Curso realizado no IFMG-SJE de código <b>{$this->Data['idCurso']}</b> foi alterados no sistema", FAF_SUCCESS];
        endif;
    }

    private function Delete() {
        $Delete = new Delete;
        $Delete->ExeDelete(self::Tabela, "WHERE idAluno = :idA AND idCurso = :idC", "idA={$this->idAluno}&idC={$this->idCurso}");
        if($Delete->getResult()):
            $this->Result = true;
            $this->Error = ["<b>Sucesso ao excluir.</b> Curso realizado no IFMG-SJE de cófigo <b>{$this->idCurso}</b> foi excluído do sistema", FAF_SUCCESS];
        endif;        
    }
    
    private function Read() {
        $Read = new Read;
        $Read->FullRead("SELECT a.idAluno, UPPER(a.Nome) as Nome, c.idCurso, c.Nome AS NomeCurso, ac.AnoIngresso, ac.AnoFormacao
                            FROM tblAluno a
                            JOIN tblAlunoCurso ac ON a.idAluno = ac.idAluno
                            JOIN tblCurso c ON ac.idCurso = c.idCurso
                            WHERE (a.Nome LIKE '%".$this->Pesquisa."%' OR c.Nome LIKE '%".$this->Pesquisa."%') ORDER BY a.Nome, ac.AnoFormacao LIMIT ".$this->Limit." OFFSET " .$this->Offset);
        if($Read->getRowCount() > 0){
            $this->Result = $Read->getResult();
        }else{
            $this->Result = false;
            $this->Error = ['<b>Erro ao pesquisar.</b> A pesquisa não retornou nenhum resultado!', FAF_WARNING];
        }
    }  
}

