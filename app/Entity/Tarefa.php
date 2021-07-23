<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Tarefa{

  /**
   * Identificação dos atributos
   * @var integer
   */
  public $id, $descricao, $estado, $user_id;


  /**
   * Método responsável por cadastrar um nova tarefa do usuario no banco de dados
   * @return boolean
   */
  public function cadastrar(){
    
    //INSERIR A TAREFA NO BANCO
    $obDatabase = new Database('tarefas');
    $this->id = $obDatabase->insert([
                                      'descricao'    => $this->descricao,
                                      'user_id'      => $this->user_id
                                    ]);

    //RETORNAR SUCESSO
    return true;
  }

  /**
   * Método responsável por atualizar a tarega como feito
   * @return boolean
   */
  public function marcar_feito(){
    return (new Database('tarefas'))->update('id = '.$this->id,[
                                                                'estado'    => 1
                                                              ]);
  }

    /**
   * Método responsável por atualizar a tarega como pendente
   * @return boolean
   */
  public function marcar_pendente(){
    return (new Database('tarefas'))->update('id = '.$this->id,[
                                                                'estado'    => 0
                                                              ]);
  }

  /**
   * Método responsável por excluir a tarefa do banco
   * @return boolean
   */
  public function excluir(){
    return (new Database('tarefas'))->delete('id = '.$this->id);
  }

  /**
   * Método responsável por obter os usuários
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getTarefas($where = null, $order = null, $limit = null){
    return (new Database('tarefas'))->select($where,$order,$limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * Método responsável por buscar uma tarefa com base em seu ID
   * @param  integer $id
   * @return Tarefa
   */
  public static function getTarefa($id){
    return (new Database('tarefas'))->select('id = '.$id)
                                  ->fetchObject(self::class);
  }

}