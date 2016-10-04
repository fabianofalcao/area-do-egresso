<?php

/**
 * mdNIvelSatisfacao.class [ Modelo ]
 * Responsavel por gerenciar os níveis de satisfação no sistema administrativo
 * @copyright (c) 2016, Fabiano Falcão
 */
class mdNIvelSatisfacao {
    private $Data;
    private $idNivelSatisfacao;
    private $Error;
    private $Result;
    
    const Tabela = 'tblNivelSatisfacao';
    
    public function ExeCreate(array $Data) {
        $this->Data = $Data;
        if(in_array('', $this->Data)):
            $this->Result = false;
            $this->Error = ["<b>Erro ao cadastrar.</b> Para cadastrar um nível de satisfação preencha todos os campos", FAF_WARNING];
        else:
            $this->setData();
            $this->Create();
        endif;
    }
    
    public function ExeUpdate($idNivelSatisfacao, array $Data) {
        $this->idNivelSatisfacao = (int) $idNivelSatisfacao;
        $this->Data = $Data;
        if(in_array('', $this->Data)):
            $this->Result = false;
            $this->Error = ["<b>Erro ao atualizar.</b> Para atualizar o nível de satisfação {$this->Data['Descricao']} preencha todos os campos", FAF_WARNING];
        else:
            $this->setData();
            $this->Update();
        endif;
    }
    
    public function ExeDelete($idNivelSatisfacao, array $Data) {
         $this->idNivelSatisfacao = (int) $idNivelSatisfacao;
         $this->Data = $Data;
         $this->setData();
         $this->Delete();         
    }
    
    public function ExeReadById($idNivelSatisfacao) {
        $this->idNivelSatisfacao = (int) $idNivelSatisfacao;
        $this->Read("WHERE idNivelSatisfacao = :id", "id={$this->idNivelSatisfacao}");
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
            $this->Error = ["<b>Sucesso ao inserir.</b> O nível de satisfação <b>{$this->Data['Descricao']}</b> foi cadastrado no sistema", FAF_SUCCESS];
        endif;
    }
    
    private function Update() {
        $Update = new Update;
        $Update->ExeUpdate(self::Tabela, $this->Data, "WHERE idNivelSatisfacao = :id", "id={$this->idNivelSatisfacao}");
        if($Update->getResult()):
            $this->Result = true;
            $this->Error = ["<b>Sucesso ao alterar.</b> O nível de satisfação <b>{$this->Data['Descricao']}</b> foi alterado no sistema", FAF_SUCCESS];
        endif;
    }

    private function Delete() {
        $Delete = new Delete;
        $Delete->ExeDelete(self::Tabela, "WHERE idNivelSatisfacao = :id", "id={$this->idNivelSatisfacao}");
        if($Delete->getResult()):
            $this->Result = true;
            $this->Error = ["<b>Sucesso ao excluir.</b> O nível de satisfação foi excluído do sistema", FAF_SUCCESS];
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
