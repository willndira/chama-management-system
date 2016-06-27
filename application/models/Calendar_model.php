<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Calendar_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function generate_calendar($year, $month) {

        $pref = array(
            'show_next_prev' => TRUE,
            'next_prev_url' => base_url('index.php/My_calendar/showcal')
        );

        $pref['template'] = '
           {table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendar">{/table_open}
           {heading_row_start}<tr>{/heading_row_start}
           {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
           {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
           {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

           {heading_row_end}</tr>{/heading_row_end}

           {week_row_start}<tr>{/week_row_start}
           {week_day_cell}<td>{week_day}</td>{/week_day_cell}
           {week_row_end}</tr>{/week_row_end}

           {cal_row_start}<tr class="calendar_days">{/cal_row_start}
           {cal_cell_start}<td>{/cal_cell_start}

           {cal_cell_content}
                <div class="calendar_day_num">{day}</div>
                <div class="calendar_content">{content}</div>
           {/cal_cell_content}
           {cal_cell_content_today}
                <div class="calendar_day_num calendar_highlight">{day}</div>
                <div class="calendar_content">{content}</div>
           {/cal_cell_content_today}

           {cal_cell_no_content}<div class="calendar_day_num">{day}</div>{/cal_cell_no_content}
           {cal_cell_no_content_today}<div class="calendar_day_num calendar_highlight">{day}</div>{/cal_cell_no_content_today}

           {cal_cell_blank}&nbsp;{/cal_cell_blank}

           {cal_cell_end}</td>{/cal_cell_end}
           {cal_row_end}</tr>{/cal_row_end}

           {table_close}</table>{/table_close}
        ';
        
        $events = $this->get_events($year, $month);
        $this->load->library('calendar', $pref);
        return $this->calendar->generate($year, $month, $events);
    }

    public function get_events($year, $month) {
        $query = $this->db->select('date,event')->from('calendar')->like('date', "$year-$month")->get();
        $events = array();
        $result = $query->result();
        foreach ($result as $row) {
            $days = substr($row->date, 8, 2);
            $events[(int) $days] = $row->event;
        }
        return $events;
    }

    public function add_events($date ,$event) {
        
        $events = array(
            'date' => '2015-07-06',
            'event' => 'pay bills'
        );

        $query = $this->db->get_where('calendar', array('date' => $events['date']));
        if ($query->num_rows() > 0) {
            
        } else {
            $this->db->insert('calendar', $events);
        }
        
    }

    public function java_function(){
        $click_function = " alert('Ok')";
        $function =" $('.field_set').hide();";
        $this->javascript->output($function);
        $this->javascript->click('#addEvent',$click_function);
        $this->javascript->compile();
    }
}
