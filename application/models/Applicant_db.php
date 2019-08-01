<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Applicant_db extends CI_MODEL
{
    public function serverDate($interval='')
    {
        return $this->db->query('SELECT CURRENT_DATE '.$interval.' AS serverdate')->row()->serverdate;
    }

    public function insert_applicant($data)
    {
        $this->db->trans_start();
        $query = $this->db->insert('applicant', $data);
        $this->db->trans_complete();
    }

    public function delete_applicant($id) {
        $this->db->trans_start();
        $this->db->where('applicant_id', $id);
        $this->db->delete('applicant');
        $this->db->trans_complete();
    }

    public function delete_career($id) {
        $this->db->trans_start();
        $this->db->where('career_id', $id);
        $this->db->delete('career');
        $this->db->trans_complete();
    }

    public function update_career($data, $id) {
        $this->db->trans_start();
        $this->db->where('career_id', $id);
        $this->db->update('career', $data);
        $this->db->trans_complete();
    }

    public function insert_career($data)
    {
        $this->db->trans_start();
        $query = $this->db->insert('career', $data);
        $this->db->trans_complete();
    }

    public function login_user($username)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $data = $this->db->get();
        return $data;
    }
    
    public function view_applicant($field='', $where='', $order_by='', $group_by='', $join='')
    {
        if ($field == '')
            $field = '*';
        $this->db->select($field);
        $this->db->from('applicant');
        if ($join != '')
            $this->db->join('career', 'applicant.posisi = career.kode', 'INNER');
        if ($where != '')
            $this->db->where($where);
        if ($order_by != '')
            $this->db->order_by($order_by);
        if ($group_by != '')
            $this->db->group_by($group_by);
        $data = $this->db->get();
        return $data;
    }

    public function view_career($field='', $where='', $order_by='', $group_by='')
    {
        if ($field == '')
            $field = '*';
        $this->db->select($field);
        $this->db->from('career');
        if ($where != '')
            $this->db->where($where);
        if ($order_by != '')
            $this->db->order_by($order_by);
        if ($group_by != '')
            $this->db->group_by($group_by);
        $data = $this->db->get();
        return $data;
    }


}