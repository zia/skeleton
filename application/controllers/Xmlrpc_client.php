<?php

class Xmlrpc_client extends CI_Controller {

        public function index()
        {
                // The URL of the server
                $server_url = site_url('xmlrpc_server');
                $this->xmlrpc->server($server_url, 80);
                
                // The method on the server you wish to call
                $this->xmlrpc->method('Process');

                // The request data
                $request = array('users');
                $this->xmlrpc->request($request);

                if (!$this->xmlrpc->send_request()) { echo $this->xmlrpc->display_error(); }
                
                else
                {
                        echo '<pre>';
                        print_r($this->xmlrpc->display_response());
                        echo '</pre>';
                }
        }
}

?>