<?php

if (! class_exists("Central_De_Contatos_Settings")) {
    class Central_De_Contatos_Settings
    {

        public static $options;


        public function __construct()

        {
            self::$options = get_option('contatos_options');
            add_action('admin_init', [$this, 'admin_init']);
        }

        public function admin_init()
        {

           register_setting(
            'contatos_group',
            'contatos_options',
            array( 'sanitize_callback' => array( $this, 'sanitize_options' ) )
             );

            add_settings_section(
                'option_settings_section',
                'Adicione o número do WhatsApp',
                null,
                'central_de_contatos_page',
            );

            add_settings_field(
                'contato_field_phone',
                'Adicione os Contato',
                [$this, 'central_de_contato_input'],
                'central_de_contatos_page',
                'option_settings_section',
            );
        }

        public function sanitize_options( $input ) {
         $output = array();
         $output['contato_field_phone'] = sanitize_text_field( $input['contato_field_phone'] ?? '' );
          return $output;
        }

        public function central_de_contato_input()
        {
            $value = isset(self::$options['contato_field_phone'])
                ? self::$options['contato_field_phone']
                : '';

?>


            <input
                type="text"
                id="contato_field_phone"
                name="contatos_options[contato_field_phone]"
                value="<?php echo esc_attr($value); ?>" >
                <?php
            }
        }
    }
