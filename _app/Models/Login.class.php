<?php

/**
 * Login.class [ MODEL ]
 * Responável por autenticar, validar, e checar usuário do sistema de login!
 * 
 * @copyright (c) 2014, Robson V. Leite UPINSIDE TECNOLOGIA
 */
class Login {

    private $Level;
    private $Email;
    private $Senha;
    private $Error;
    private $Result;

    /**
     * <b>Informar Level:</b> Informe o nível de acesso mínimo para a área a ser protegida.
     * @param INT $Level = Nível mínimo para acesso
     */
    function __construct($Level) {
        $this->Level = (int) $Level;
    }

    /**
     * <b>Efetuar Login:</b> Envelope um array atribuitivo com índices STRING user [email], STRING pass.
     * Ao passar este array na ExeLogin() os dados são verificados e o login é feito!
     * @param ARRAY $UserData = user [email], pass
     */
    public function ExeLogin(array $UserData) {
        $this->Email = (string) strip_tags(trim($UserData['inputUsuario']));
        $this->Senha = (string) strip_tags(trim($UserData['inputSenha']));
        $this->setLogin();
    }

    /**
     * <b>Verificar Login:</b> Executando um getResult é possível verificar se foi ou não efetuado
     * o acesso com os dados.
     * @return BOOL $Var = true para login e false para erro
     */
    public function getResult() {
        return $this->Result;
    }

    /**
     * <b>Obter Erro:</b> Retorna um array associativo com uma mensagem e um tipo de erro WS_.
     * @return ARRAY $Error = Array associatico com o erro
     */
    public function getError() {
        return $this->Error;
    }

    /**
     * <b>Checar Login:</b> Execute esse método para verificar a sessão USERLOGIN e revalidar o acesso
     * para proteger telas restritas.
     * @return BOLEAM $login = Retorna true ou mata a sessão e retorna false!
     */
    public function CheckLogin() {
        if (empty($_SESSION['userlogin']) || $_SESSION['userlogin']['Nivel'] < $this->Level):
            unset($_SESSION['userlogin']);
            return false;
        else:
            return true;
        endif;
    }

    /*
     * ***************************************
     * **********  PRIVATE METHODS  **********
     * ***************************************
     */

    //Valida os dados e armazena os erros caso existam. Executa o login!
    private function setLogin() {
        if (!$this->Email || !$this->Senha): // || !Check::Email($this->Email)):
            $this->Error = ['Informe seu nome de usuário e senha para efetuar o login!', FAF_INFO];
            $this->Result = false;
        elseif (!$this->getUser()):
            $this->Error = ['Os dados informados não são compatíveis!', FAF_WARNING];
            $this->Result = false;
        elseif ($this->Result['Nivel'] < $this->Level):
            $this->Error = ["Desculpe {$this->Result['Nome']}, você não tem permissão para acessar esta área!", FAF_DANGER];
            $this->Result = false;
        else:
            $this->Execute();
        endif;
    }

    //Vetifica usuário e senha no banco de dados!
    private function getUser() {
        $this->Senha = md5($this->Senha);

        $read = new Read;
        $read->ExeRead("tblUsuario", "WHERE Login = :e AND  Senha = :p", "e={$this->Email}&p={$this->Senha}");

        if ($read->getResult()):
            $this->Result = $read->getResult()[0];
            return true;
        else:
            return false;
        endif;
    }

    //Executa o login armazenando a sessão!
    private function Execute() {
        if (!session_id()):
            session_start();
        endif;

        $_SESSION['userlogin'] = $this->Result;

        $this->Error = ["Olá {$this->Result['user_name']}, seja bem vindo(a). Aguarde redirecionamento!", WS_ACCEPT];
        $this->Result = true;
    }

}
