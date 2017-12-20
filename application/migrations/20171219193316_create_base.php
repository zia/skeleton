<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_base extends CI_Migration {

	public function db_exists {
            $this->load->dbutil();
            $this->load->dbforge();

            if (!$this->dbutil->database_exists('working_db')) {
                if ($this->dbforge->create_database('working_db')) {
                    return TRUE;
                }
                else {
                    return FALSE;
                }
            }
        }

	public function up() {

	if($this->db_exists()) {
		## Create Table keys
		$this->dbforge->add_field("`id` int(11) NOT NULL auto_increment");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`key` varchar(40) NOT NULL ");
		$this->dbforge->add_field("`level` int(2) NOT NULL ");
		$this->dbforge->add_field("`ignore_limits` tinyint(1) NOT NULL ");
		$this->dbforge->add_field("`date_created` int(11) NOT NULL ");
		$this->dbforge->create_table("keys", TRUE);
		$this->db->query('ALTER TABLE  `keys` ENGINE = InnoDB');
	}
	if($this->db_exists()) {
		## Create Table users
		$this->dbforge->add_field("`id` int(11) NOT NULL auto_increment");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`username` varchar(255) NOT NULL ");
		$this->dbforge->add_field("`email` varchar(255) NOT NULL ");
		$this->dbforge->add_field("`password` varchar(255) NOT NULL ");
		$this->dbforge->add_field("`role` int(1) NOT NULL ");
		$this->dbforge->add_field("`active` int(1) NOT NULL ");
		$this->dbforge->add_field("`avatar` varchar(255) NOT NULL DEFAULT 'default.jpg' ");
		$this->dbforge->add_field("`verification_code` varchar(6) NOT NULL ");
		$this->dbforge->add_field("`remember_me` varchar(255) NULL ");
		$this->dbforge->add_field("`last_login` datetime NOT NULL ");
		$this->dbforge->add_field("`created` datetime NOT NULL ");
		$this->dbforge->add_field("`updated` datetime NOT NULL ");
		$this->dbforge->create_table("users", TRUE);
		$this->db->query('ALTER TABLE  `users` ENGINE = InnoDB');
	}
	}

	public function down() {
				## Drop table keys ##
		$this->dbforge->drop_table("keys", TRUE);
		## Drop table users ##
		$this->dbforge->drop_table("users", TRUE);

	}
}