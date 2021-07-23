<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Usuario{

  /**
   * Identificador único do usuário
   * @var integer
   */
  public $id;

  /**
   * Nome do Usuário
   * @var string
   */
  public $nome;


  /**
   * Método responsável por cadastrar um novo usuario no banco de dados
   * @return boolean
   */
  public function cadastrar(){
    
    //INSERIR A Usuário NO BANCO
    $obDatabase = new Database('usuarios');
    $this->id = $obDatabase->insert([
                                      'nome'    => $this->nome
                                    ]);

    //RETORNAR SUCESSO
    return true;
  }

  /**
   * Método responsável por atualizar a usuário no banco
   * @return boolean
   */
  public function atualizar(){
    return (new Database('usuarios'))->update('id = '.$this->id,[
                                                                'nome'    => $this->nome
                                                              ]);
  }

  /**
   * Método responsável por excluir a usuário do banco
   * @return boolean
   */
  public function excluir(){
    return (new Database('usuarios'))->delete('id = '.$this->id);
  }

  /**
   * Método responsável por obter os usuários
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getUsuarios($where = null, $order = null, $limit = null){
    return (new Database('usuarios'))->select($where,$order,$limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * Método responsável por buscar uma usuário com base em seu ID
   * @param  integer $id
   * @return Usuario
   */
  public static function getUsuario($id){
    return (new Database('usuarios'))->select('id = '.$id)
                                  ->fetchObject(self::class);
  }

}