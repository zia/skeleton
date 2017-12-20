<?php
/**
 * Client File
 * Dosen't work with CSRF enabled
 * Tried to pass CSRF values with request
 * Tried excluding the controller/method from CSRF
*/
class Xmlrpc extends CI_Controller {

        public function index()
        {
                $server_url = site_url('xmlrpc/xmlrpc_server');

                $this->load->library('xmlrpc');

                $this->xmlrpc->server($server_url, 80);
                $this->xmlrpc->method('Greetings');

                $request = array('How is it going?');
                $this->xmlrpc->request($request);

                if ( ! $this->xmlrpc->send_request())
                {
                        echo $this->xmlrpc->display_error();
                }
                else
                {
                        echo '<pre>';
                        print_r($this->xmlrpc->display_response());
                        echo '</pre>';
                }
        }
}
?>