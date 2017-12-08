<?php

class Xmlrpc_server extends CI_Controller {

        public function index()
        {
                $config['functions']['Process'] = array('function' => 'Xmlrpc_server.process');
                $this->xmlrpcs->initialize($config);
                $this->xmlrpcs->serve();
        }


        public function process($request)
        {
                $parameters = $request->output_parameters();

                $infos = $this->db->get($parameters[0])->result_array();

                for ($i = 0; $i < sizeof($infos); $i++) {
                        $response = array(
                                
                                array('data' => array($infos[$i],'struct')),
                                
                                'struct'
                        );
                }

                return $this->xmlrpc->send_response($response);
        }
}