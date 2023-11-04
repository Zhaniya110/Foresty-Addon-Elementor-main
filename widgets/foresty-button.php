<?php
class Elementor_Foresty_Button extends \Elementor\Widget_Base {
    public function get_style_depends() {
		return [ 'stylesheet', 'bootstrap-foresty','bootstrap-icons' ];
	}
	public function get_name() {
		return 'foresty_button';
	}

	public function get_title() {
		return esc_html__( 'Foresty Button', 'foresty-addon-elementor' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

    protected function register_controls() {

		$this->start_controls_section(
            'foresty_buttons',
            [
                'label' => __('Foresty Button' ,'foresty-addon-elementor' )
            ]
        );

		$this->add_control(
            'button_text',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' => __('Foresty Button','foresty-addon-elementor'),
                'label_block' => true,
                'placeholder' => __('Button Text','foresty-addon-elementor'),
                'default' =>  __('Submit Quote','foresty-addon-elementor'),
            ]
        );
        $this->add_control(
            'button_link',
            [
                'type' => \Elementor\Controls_Manager::URL,
                'label' => __('Foresty Button','foresty-addon-elementor'),
                'show_external' => true,
                'default' => [
                    'url' =>'#',
                    'is_external' => true,
                    'nofollow' => false,

                ]
            ]
        );

        

        $this->add_control(
            'button_align',
            [
                'label' => __('Alignment','foresty-addon-elementor'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'default' => 'full-button',
                'options' => [
                    'text-start' =>[
                        'label' =>__('Left','foresty-addon-elementor'),
                        'icon' =>'eicon-text-align-left',
                    ],
                    'text-center' =>[
                        'label' =>__('Center','foresty-addon-elementor'),
                        'icon' =>'eicon-text-align-center',
                    ],
                    'text-end' =>[
                        'label' =>__('End','foresty-addon-elementor'),
                        'icon' =>'eicon-text-align-right',
                    ],
                ]
            ]
        );

		$this->end_controls_section();

	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'hello', 'world' ];
	}

	protected function render() {
	
        $settings = $this->get_settings_for_display();
        $nofollow = $settings['button_link']['nofollow'] ? 'rel="nofollow"' : '';
        echo '<div class="link ' . $settings['button_align'] . '">';
        echo '<a href="' . esc_url($settings['button_link']['url']) . '" ' . $nofollow . ' class="foresty-button"><span>' . esc_html($settings['button_text']) . '</span> <i class="fa-solid fa-angles-right"></i></a>';
        echo '</div>';
	}
}