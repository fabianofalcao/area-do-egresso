<?php

/**
 * mdModalidade.class.php [ MODELO ]
 * Responsável por gerenciar as modalidades dos cursos no sistema do egresso administrativo
 * @copyright (c) 2016, Fabiano Falcão
 */
class mdModalidade {
    private $Data;
    private $idModalidade;
    private $Pesquisa;
    
    private $Limit;
    private $Offset;
    
    private $Error;
    private $Result;
    
    const Tabela = 'tblModalidadeCurso';
    
    public function ExeCreate(array $Data) {
        $this->Data = $Data;
        if(in_array('', $this->Data)):
            $this->Result = false;
            $this->Error = ["<b>Erro ao cadastrar.</b> Para cadastrar uma modalidade de curso preencha todos os campos", FAF_WARNING];
        else:
            $this->setData();
            $this->Create();
        endif;
    }
    
    public function ExeUpdate($idModalidade, array $Data) {
        $this->idModalidade = (int) $idModalidade;
        $this->Data = $Data;
        if(in_array('', $this->Data)):
            $this->Result = false;
            $this->Error = ["<b>Erro ao atualizar.</b> Para atualizar a modalidade de curso {$this->Data['Descricao']} preencha todos os campos", FAF_WARNING];
        else:
            $this->setData();
            $this->Update();
        endif;
    }
    
    public function ExeDelete($idModalidade) {
         $this->idModalidade = (int) $idModalidade;
         $this->Delete();         
    }
    
    public function ExeReadByDescricao($Descricao, $Limit, $Offset) {
        $Descricao = trim(strip_tags($Descricao));
        $Limit = (int) $Limit;
        $Offset = (int) $Offset;
        $this->Read("WHERE Descricao LIKE :id LIMIT :limit OFFSET :offset", "id=%{$Descricao}%&limit={$Limit}&offset={$Offset}");
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
            $this->Error = ["<b>Sucesso ao inserir.</b> A modalidade de curso <b>{$this->Data['Descricao']}</b> foi cadastrada no sistema", FAF_SUCCESS];
        endif;
    }
    
    private function Update() {
        $Update = new Update;
        $Update->ExeUpdate(self::Tabela, $this->Data, "WHERE idModalidadeCurso = :id", "id={$this->idModalidade}");
        if($Update->getResult()):
            $this->Result = true;
            $this->Error = ["<b>Sucesso ao alterar.</b> A modalidade de curso <b>{$this->Data['Descricao']}</b> foi alterada no sistema", FAF_SUCCESS];
        endif;
    }

    private function Delete() {
        $Delete = new Delete;
        $Delete->ExeDelete(self::Tabela, "WHERE idModalidadeCurso = :id", "id={$this->idModalidade}");
        if($Delete->getResult()):
            $this->Result = true;
            $this->Error = ["<b>Sucesso ao excluir.</b> A modalidade de curso foi excluída do sistema", FAF_SUCCESS];
        endif;        
    }
    
    private function Read($Termos = null, $ParseString = null) {
        $Read = new Read;
        $Read->ExeRead(self::Tabela, $Termos, $ParseString);
        if($Read->getRowCount() > 0){
            $this->Result = $Read->getResult();
        }else{
            $this->Result = false;
            $this->Erro = ['<b>Erro ao pesquisar.</b> A pesquisa não retornou nenhum resultado!', FAF_WARNING];
        }
    }
}
