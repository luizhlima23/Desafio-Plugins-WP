<?php
/*
Plugin Name: Desafio Plugin 1
Author: Luiz Henrique Arruda Lima
Author URI: https://www.linkedin.com/in/luiz-h-lima/
Version: 0.0.1
Description: Plugin que adicione um shortcode ou widget customizado ao site. Esse shortcode/widget deverá mostrar um botão na página que, quando clicado, adicionará um registro de data e hora no banco de dados wordpress. A tabela utilizada para guardar esse registro é criada como btn_counter, o início depende do prefixo escolhido no seu wordpress.
*/


//Colocar [btn] no seu shortcode!!

function register_plugin() {
    register_setting('btn_counter', 'table_name', [
        'default' => 'btn_counter',
    ]);
}

add_action('plugins_loaded', 'register_plugin');

function btn_shortcode() {
    ob_start();
    ?>
    <button class="btn-counter" id="btn-counter">Clique aqui</button>
    <script>
        document.getElementById('btn-counter').addEventListener('click', function() {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '<?php echo admin_url('admin-ajax.php'); ?>', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    console.log(xhr.responseText);
                }
            };
            xhr.send('action=btn_click');
        });
    </script>
    <?php
    return ob_get_clean();
}

add_shortcode('btn', 'btn_shortcode');

function create_btn_counter_table() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'btn_counter';
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `date` date NOT NULL,
        `time` time NOT NULL,
        PRIMARY KEY (`id`)
    );";

    $wpdb->query($sql);
}

add_action('plugins_loaded', 'create_btn_counter_table');

function btn_counter_enqueue_styles() {
    wp_enqueue_style('btn-counter-style', plugin_dir_url(__FILE__) . '/style.css');
}

add_action('wp_enqueue_scripts', 'btn_counter_enqueue_styles');

function btn_click() {
    echo('A função btn_click está sendo chamada.');
    
    global $wpdb;
    $table_name = $wpdb->prefix . 'btn_counter';
    
    $current_date = current_time('mysql');
    $current_time = current_time('H:i:s');

    $wpdb->insert(
        $table_name,
        array(
            'date' => $current_date,
            'time' => $current_time,
        )
    );

    wp_die();
}

add_action('wp_ajax_btn_click', 'btn_click');
add_action('wp_ajax_nopriv_btn_click', 'btn_click');
