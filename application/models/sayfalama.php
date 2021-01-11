<?php

class Sayfalama extends Controller{

    function __construct()
    {
        parent::Controller();
    }

    function index()
    {
        $this->load->Model('sayfalama_model', 'Model');

        $this->load->library('pagination');

        $data['sayfalama_linkleri'] = $this->sayfalama_linkleri($this->Model->yazilar_adet());
        $data['yazilar'] = $this->Model->yazilar($this->uri->segment(3,0),3);

        $this->load->view('sayfalama_view', $data);
    }

    function sayfalama_linkleri($toplam)
    {
        $config = array(
            'base_url'          => site_url('sayfalama/index'),
            'total_rows'        => $toplam,
            'per_page'          => 3,
            'num_links'         => 2,
            'page_query_string' => FALSE,
            'uri_segment'       => 3,
            'full_tag_open'     => '<div class="pagination">',
            'full_tag_close'    => '</div>',
            'first_link'        => 'İlk Sayfa',
            'first_tag_open'    => '',
            'first_tag_close'   => '',
            'last_link'         => 'Son Sayfa',
            'last_tag_open'     => '',
            'last_tag_close'    => '',
            'next_link'         => 'Sonraki',
            'next_tag_open'     => '',
            'next_tag_close'    => '',
            'prev_link'         => 'Önceki',
            'prev_tag_open'     => '',
            'prev_tag_close'    => '',
            'cur_tag_open'      => '<span class="current">',
            'cur_tag_close'     => '</span>',
            'num_tag_open'      => '',
            'num_tag_close'     => ''
            
        );
        
        $this->pagination->initialize($config);

        return $this->pagination->create_links();
    }

}
