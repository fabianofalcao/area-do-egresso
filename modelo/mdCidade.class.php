<?php

/**
 * mdCidade.class.php [ MODELO ]
 * Responsável por gerenciar as cidades no sistema do egresso administrativo
 * @copyright (c) 2016, Fabiano Falcão
 */
class mdCidade{
    private $Data;
    private $idCidade;
    private $Pesquisa;
    
    private $Limit;
    private $Offset;
    
    private $Error;
    private $Result;
    
    const Tabela = "tblCidade";
    
    public function ExeCreate(array $Data) {
        $this->Data = $Data;
        if(in_array('', $this->Data)):
            $this->Result = false;
            $this->Error = ["<b>Erro ao cadastrar.</b> Para cadastrar uma cidade preencha todos os campos", FAF_WARNING];
        else:
            $this->setData();
            $this->Create();
        endif;
    }
    
    public function ExeUpdate($idCidade, array $Data) {
        $this->idCidade = (int) $idCidade;
        $this->Data = $Data;
        if(in_array('', $this->Data)):
            $this->Result = false;
            $this->Error = ["<b>Erro ao atualizar.</b> Para atualizar a cidade {$this->Data['Nome']} preencha todos os campos", FAF_WARNING];
        else:
            $this->setData();
            $this->Update();
        endif;
    }
    
    public function ExeDelete($idCidade) {
         $this->idCidade = (int) $idCidade;
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
            $this->Error = ["<b>Sucesso ao inserir.</b> O cidade <b>{$this->Data['Nome']}</b> foi cadastrada no sistema", FAF_SUCCESS];
        endif;
    }
    
    private function Update() {
        $Update = new Update;
        $Update->ExeUpdate(self::Tabela, $this->Data, "WHERE idCidade = :id", "id={$this->idCidade}");
        if($Update->getResult()):
            $this->Result = true;
            $this->Error = ["<b>Sucesso ao alterar.</b> A cidade <b>{$this->Data['Nome']}</b> foi alterada no sistema", FAF_SUCCESS];
        endif;
    }

    private function Delete() {
        $Delete = new Delete;
        $Delete->ExeDelete(self::Tabela, "WHERE idCidade = :id", "id={$this->idCidade}");
        if($Delete->getResult()):
            $this->Result = true;
            $this->Error = ["<b>Sucesso ao excluir.</b>  Cidade excluída do sistema", FAF_SUCCESS];
        endif;        
    }    
    
    private function Read($ParseString = null) {
        $Read = new Read;
        $Read->FullRead("SELECT 
                            c.idCidade, c.idEstado, e.Nome AS Estado, e.Sigla, c.Nome
                        FROM
                            tblCidade c
                        JOIN
                            tblEstados e ON c.idEstado = e.idEstado
                        WHERE (c.Nome LIKE :p OR e.Nome LIKE :p OR e.Sigla LIKE :p) ORDER BY e.Nome, c.Nome LIMIT :limit OFFSET :offset", "p=%{$this->Pesquisa}%&limit={$this->Limit}&offset={$this->Offset}");
        if($Read->getRowCount() > 0){
            $this->Result = $Read->getResult();
        }else{
            $this->Result = false;
            $this->Error = ['<b>Erro ao pesquisar.</b> A pesquisa não retornou nenhum resultado!', FAF_WARNING];
        }
    }    
}
