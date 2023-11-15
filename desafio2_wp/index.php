<?php
/*
Plugin Name: Desafio Plugin 2
Author: Luiz Henrique Arruda Lima
Author URI: https://www.linkedin.com/in/luiz-h-lima/
Version: 0.0.1
Description: Plugin que adiciona um comando ao WP-CLI para imprimir um relatório de histórico de registros.
*/

function print_relatorio() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'btn_counter';

    $results = $wpdb->get_results("SELECT * FROM $table_name ORDER BY id DESC LIMIT 30");

    if ($results) {
        foreach ($results as $result) {
            $id = $result -> id;
            $date = $result->date;
            $time = $result->time;
            WP_CLI::line("Id: $id, Data: $date, Hora: $time");
        }
    } else {
        WP_CLI::line("Nenhum registro encontrado.");
    }
}

if (defined('WP_CLI') && WP_CLI) {
    WP_CLI::add_command('exp-relatorio', 'print_relatorio');
}
