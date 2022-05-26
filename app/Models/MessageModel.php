<?php

namespace App\Models;

use CodeIgniter\Model;
class MessageModel extends Model {

    var $table = 'messages';

    public function __construct() {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('messages');
    }

    public function get_all_messages() {
//       $query = $this->db->table('buildings');
       $query = $this->db->query('select * from messages');
//      print_r($query->getResult());
       // $query = $this->db->get();
        return $query->getResult();
    }

    public function get_by_id($id) {
      $sql = 'select * from messages where message_id  ='.$id ;
      $query =  $this->db->query($sql);

      return $query->getRow();
    }

    public function addMessage($data) {

        
        $query = $this->db->table($this->table)->insert($data);

        return $query;
    }

//     public function book_update($where, $data) {
//         $this->db->table($this->table)->update($data, $where);
// //        print_r($this->db->getLastQuery());
//         return $this->db->affectedRows();
//     }

    public function delete_by_id($id) {
        $this->db->table($this->table)->delete(array('building_id ' => $id)); 
    }

}