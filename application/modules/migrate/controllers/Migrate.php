<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Migrate extends CI_Controller
{
 
    public function __construct()
    {
        parent::__construct();
        if(!$this->input->is_cli_request()) {
            show_error('You don\'t have permission for this action');
            return;
        }
        $this->load->library('migration');
        $this->load->library('VpxMigration');
    }
 
    /**
    * Migration Version
    *
    * Use this method to apply a new migration as well as rollback from another. 
    *
    * @param string version
    * @return string
    */
    public function version($version='')
    {
        if(!$version)
        {
            echo "Please pick a migration version(e.g. 20170719221315).". PHP_EOL;
            echo "Available Migrations: ". PHP_EOL;
            $this->lists();
            return;
        }
        else {
            $migration = $this->migration->version($version);
            
            if (!$migration) { echo $this->migration->error_string(); }
            else { echo 'Migration done' . PHP_EOL; }
        }
    }
    
    /**
    * Create migrations manually
    *
    * To apply new migration use version.
    *
    * @param string $table_name
    * @return string
    */
    public function create($table_name = false)
    {
        if(!$table_name) {
            echo "Please define migration name". PHP_EOL;
            return;
        }
 
        if (!preg_match('/^[a-z_]+$/i', $table_name)) {
            if (strlen($table_name) < 4) {
                echo "Migration must be at least 4 characters long" . PHP_EOL;
                return;
            }
            echo "Wrong migration name, allowed characters: a-z and _\nExample: first_migration" . PHP_EOL;
            return;
        }

        $filename = date('YmdHis') . '_' . $table_name . '.php';
        
        try {
            $folderPath = APPPATH.'migrations';
            if (!is_dir($folderPath)) {
                try{
                    mkdir($folderPath);
                }
                catch(Exception $e) {
                    echo "Error:\n" . $e->getMessage() . PHP_EOL;
                }
            }

            $filepath = APPPATH . 'migrations/' . $filename;
            if (file_exists($filepath)) {
                echo "File allredy exists:\n" . $filepath . PHP_EOL;
                return;
            }
            
            /*$data['className'] = ucfirst($table_name);*/
            $data['className'] = $table_name;
            $data['dbName'] = $this->db->database;
            $template = $this->load->view('migration_class_template', $data, TRUE);
            
            //Create file
            try{
                $file = fopen($filepath, "w");
                $content = "<?php\n" . $template;
                fwrite($file, $content);
                fclose($file);
            }
            catch(Exception $e) {
                echo "Error:\n" . $e->getMessage() . PHP_EOL;
            }
            
            echo "Migration created successfully!\nLocation: " . $filepath . PHP_EOL;
        }
        catch (Exception $e) {
            echo "Can't create migration file!\nError: " . $e->getMessage() . PHP_EOL;
        }
    }
    
    /**
    * Generate Migrations From Database
    *
    * Generate migration for all the tables or just for a single one. Migrations won't be
    * applied immidietly. Use version to apply migration.
    *
    * @param $table
    * @param $db
    * @return string
    */

    public function generate($table = false) {
        (!$table) ? $this->vpxmigration->generate() : $this->vpxmigration->generate($table);
    }

    /**
    * Lists available migration files
    *
    * @param
    * @return array migration_lists
    */
    public function lists(){
        print_r($this->migration->find_migrations());
    }
}