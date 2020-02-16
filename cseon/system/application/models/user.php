<?php
class User extends Model {
    function  __construct() {
        parent::__construct();
    }
    function authenticate($username, $password) {
        $sql = <<<EOT
            select full_name
            from user
            where username='$username' and password='$password'
EOT;
        $data = $this->db->query($sql);
        if ($data->num_rows() > 0) {
            $res = $data->row();
            return $res->full_name;
        }
        return false;
    }
}
?>
