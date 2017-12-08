<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_base extends CI_Migration {

	public function db_exists {
            $this->load->dbutil();
            $this->load->dbforge();

            if (!$this->dbutil->database_exists('sample_db')) {
                if ($this->dbforge->create_database('sample_db')) {
                    return TRUE;
                }
                else {
                    return FALSE;
                }
            }
        }

	public function up() {

		if($this->db_exists()) {
			## Create Table books
			$this->dbforge->add_field("`id` int(11) NOT NULL auto_increment");
			$this->dbforge->add_key("id",true);
			$this->dbforge->add_field("`title` varchar(255) NULL ");
			$this->dbforge->create_table("books", TRUE);
			$this->db->query('ALTER TABLE  `books` ENGINE = InnoDB');
		}
	}

	public function down()	{
		### Drop table books ##
		$this->dbforge->drop_table("books", TRUE);

	}
}