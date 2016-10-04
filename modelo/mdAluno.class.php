<?php

/**
 * mdAluno.class.php [ MODELO ]
 * Responsável por gerenciar a tabela aluno no sistema do egresso administrativo
 * @copyright (c) 2016, Fabiano Falcão
 */
class mdAluno {
    private $Data;
    private $DataAluno;
    private $DataEndereco;
    private $idAluno;
    private $Pesquisa;
    
    private $Limit;
    private $Offset;
    
    private $Error;
    private $Result;
    
    const Tabela = 'tblAluno';
    
    public function ExeCreate(array $Data) {
        $this->Data = $Data;
        if($this->Data['Nome'] == '' OR $this->Data['CPF'] == '' OR $this->Data['Email'] == ''
                OR $this->Data['idCidade'] == '' OR $this->Data['idEstado'] == '' OR $this->Data['Logradouro'] == ''):
            $this->Result = false;
            $this->Error = ["<b>Erro ao cadastrar.</b> Para se cadastrar como aluno preencha os campos obigatórios! ['Nome','CPF', 'E-mail', 'Estado', 'Cidade', 'Logradouro']", FAF_WARNING];
        elseif(!Check::Email($this->Data['Email'])):
            $this->Result = false;
            $this->Error = ["<b>Erro ao cadastrar.</b> Para se cadastrar como aluno preencha um e-mail válido!", FAF_DANGER];
        elseif(!Check::validaCPF($this->Data['CPF'])):
            $this->Result = false;
            $this->Error = ["<b>Erro ao cadastrar.</b> Para se cadastrar como aluno preencha um CPF válido!", FAF_DANGER];
        else:
            $this->setData();
            $this->Create();
        endif;
    }
    
    public function ExeUpdate($idAluno, array $Data) {
        $this->idAluno = (int) $idAluno;
        $this->Data = $Data;
        if($this->Data['Nome'] == '' OR $this->Data['CPF'] == '' OR $this->Data['Email'] == ''
                OR $this->Data['idCidade'] == '' OR $this->Data['idEstado'] == '' OR $this->Data['Logradouro'] == ''):
            $this->Result = false;
            $this->Error = ["<b>Erro ao cadastrar.</b> Para se cadastrar como aluno preencha os campos obigatórios! ['Nome','CPF', 'E-mail', 'Estado', 'Cidade', 'Logradouro']", FAF_WARNING];
        elseif(!Check::Email($this->Data['Email'])):
            $this->Result = false;
            $this->Error = ["<b>Erro ao cadastrar.</b> Para se cadastrar como aluno preencha um e-mail válido!", FAF_DANGER];
        elseif(!Check::validaCPF($this->Data['CPF'])):
            $this->Result = false;
            $this->Error = ["<b>Erro ao cadastrar.</b> Para se cadastrar como aluno preencha um CPF válido!", FAF_DANGER];
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
        $this->DataAluno = [
            "Nome" => $this->Data['Nome'],
            "CPF" => preg_replace('/[^0-9]/', '', $this->Data['CPF']),
            "Apelido" => $this->Data['Apelido'],
            "Telefone" => preg_replace('/[^0-9]/', '', $this->Data['Telefone']),
            "Celular" => preg_replace('/[^0-9]/', '', $this->Data['Celular']),
            "Email" => $this->Data['Email'],
        ];
        $this->DataEndereco = [
            "idCidade" => $this->Data['idCidade'],
            "Logradouro" => $this->Data['Logradouro'],
            "Numero" => $this->Data['Numero'],
            "Complemento" => $this->Data['Complemento'],
            "Bairro" => $this->Data['Bairro'],
            "CEP" => preg_replace('/[^0-9]/', '', $this->Data['CEP']),
        ];
        if(isset($this->Data['idAluno'])):
            $this->DataAluno['idAluno'] = $this->Data['idAluno'];
            $this->DataEndereco['idAluno'] = $this->Data['idAluno'];
        endif;
    }
    
    private function Create() {
        $Create = new Create;
        $Create->ExeCreate(self::Tabela, $this->DataAluno);
        if($Create->getResult()):
            $this->DataEndereco['idAluno'] = $Create->getResult();
            $Create->ExeCreate("tblEndereco", $this->DataEndereco);
            if($Create->getResult()):
                $this->Result = $Create->getResult();
                $this->Error = ["<b>Sucesso ao inserir.</b> O Aluno <b>{$this->Data['Nome']}</b> foi cadastrado no sistema", FAF_SUCCESS];
            endif;
        endif;
    }
    
    private function Update() {
        $Update = new Update;
        $Update->ExeUpdate(self::Tabela, $this->DataAluno, "WHERE idAluno = :id", "id={$this->idAluno}");
        var_dump($Update->getResult());
        if($Update->getResult()):
            $Update->ExeUpdate("tblEndereco", $this->DataEndereco, "WHERE idAluno = :id", "id={$this->idAluno}");
            if($Update->getResult()):
                $this->Result = true;
                $this->Error = ["<b>Sucesso ao alterar.</b> A os dados do aluno <b>{$this->Data['Nome']}</b> foram alterados no sistema", FAF_SUCCESS];
            endif;
        endif;
    }

    private function Delete() {
        $Delete = new Delete;
        $Delete->ExeDelete("tblEndereco", "WHERE idAluno = :id", "id={$this->idAluno}");
        $Delete->ExeDelete(self::Tabela, "WHERE idAluno = :id", "id={$this->idAluno}");
        if($Delete->getResult()):
            $this->Result = true;
            $this->Error = ["<b>Sucesso ao excluir.</b> O aluno foi excluído do sistema", FAF_SUCCESS];
        endif;        
    }
    
    private function Read() {
        $Read = new Read;
        $Read->FullRead("SELECT a.idAluno, UPPER(a.Nome) as Nome, a.Apelido, a.CPF, a.Telefone, a.Celular,
                            a.Email, e.idCidade, c.Nome AS NomeCidade, es.idEstado, es.Nome as NomeEstado,
                            es.Sigla, e.Logradouro, e.Numero, e.Complemento, e.Bairro, e.CEP
                            FROM tblAluno a
                            JOIN tblEndereco e ON a.idAluno = e.idAluno
                            JOIN tblCidade c ON e.idCidade = c.idCidade
                            JOIN tblEstados es ON c.idEstado = es.idEstado
                        WHERE (a.Nome LIKE '%".$this->Pesquisa."%' OR a.CPF LIKE '%".$this->Pesquisa."%' OR c.Nome LIKE '%".$this->Pesquisa."%') ORDER BY a.Nome LIMIT ".$this->Limit." OFFSET " .$this->Offset);
        if($Read->getRowCount() > 0){
            $this->Result = $Read->getResult();
        }else{
            $this->Result = false;
            $this->Error = ['<b>Erro ao pesquisar.</b> A pesquisa não retornou nenhum resultado!', FAF_WARNING];
        }
    }  
}
