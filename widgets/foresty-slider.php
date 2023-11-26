<?php 
// Create a new Elementor widget class
class Elementor_Foresty_Slider extends \Elementor\Widget_Base {
    public function get_style_depends() {
		return [ 'slider'];
	}
    // Widget Name
    public function get_name() {
        return 'slider-widget';
    }

    // Widget Title
    public function get_title() {
        return 'Slider Widget';
    }

    // Widget Icon (optional)
    public function get_icon() {
        return 'fa fa-picture-o';
    }

    // Widget Categories (optional)
    public function get_categories() {
        return ['general'];
    }

    // Widget Controls (options)
    protected function _register_controls() {
        // Add controls for the dynamic images using Elementor's Repeater control
        $this->start_controls_section(
            'section_images',
            [
                'label' => __( 'Slider Images', 'foresty-addon-elementor' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => __( 'Image', 'foresty-addon-elementor' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'slides',
            [
                'label' => __( 'Slides', 'foresty-addon-elementor' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                ],
                'title_field' => '{{{ image.url }}}',
            ]
        );

        $this->end_controls_section();
    }

    // Widget Content Output
    protected function render() {
        $settings = $this->get_settings();

        // Output the slider HTML with dynamic images
        ?>
        <div class="slider">
            <?php foreach ( $settings['slides'] as $slide ) : ?>
                <div class="slide">
                    <div class="overlay"></div>
                    <img src="<?php echo esc_url( $slide['image']['url'] ); ?>" alt="Slide">
                </div>
            <?php endforeach; ?>

            <!-- Add more slides as needed -->

            <div class="dots">
                <?php foreach ( $settings['slides'] as $index => $slide ) : ?>
                    <div class="dot <?php echo ( 0 === $index ) ? 'active' : ''; ?>"></div>
                <?php endforeach; ?>
            </div>

            <div class="arrows">
                <div class="arrow" onclick="prevSlide()">
                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29" fill="none">
            <circle cx="14.5" cy="14.5" r="14.5" fill="#595959"/>
            <path d="M17.364 8.63604L11 15L17.364 21.364" stroke="white" stroke-width="2"/>
          </svg>
                </div>
                <div class="arrow" onclick="nextSlide()">
                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29" fill="none">
            <circle cx="14.5" cy="14.5" r="14.5" transform="rotate(-180 14.5 14.5)" fill="#595959"/>
            <path d="M11.636 20.364L18 14L11.636 7.63604" stroke="white" stroke-width="2"/>
          </svg>
                </div>
            </div>
        </div>

        <script>
          let currentSlide = 0;

function showSlide(index) {
  const slides = document.querySelectorAll('.slide');
  const dots = document.querySelectorAll('.dot');

  slides.forEach((slide, i) => {
    slide.style.transform = `translateX(${(i - index) * 100}%)`;
  });

  dots.forEach((dot, i) => {
    dot.classList.toggle('active', i === index);
  });
}

function nextSlide() {
  currentSlide = (currentSlide + 1) % document.querySelectorAll('.slide').length;
  showSlide(currentSlide);
}

function prevSlide() {
  currentSlide = (currentSlide - 1 + document.querySelectorAll('.slide').length) % document.querySelectorAll('.slide').length;
  showSlide(currentSlide);
}

document.addEventListener('DOMContentLoaded', () => {
  showSlide(currentSlide);
});
        </script>
        <?php
    }
}

