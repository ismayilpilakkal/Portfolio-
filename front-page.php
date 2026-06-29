<?php
/**
 * The main template file for the front page
 *
 * @package Liquid Glass Portfolio
 */

get_header();

// Fetch customizer settings with fallbacks
$hero_img     = get_theme_mod( 'lg_hero_image', 'http://localhost/wordpress/wp-content/uploads/2026/06/ismayil-p.jpeg' );
$resume_url   = get_theme_mod( 'lg_resume_link', '#' );
$phone        = get_theme_mod( 'lg_phone', '+91 8848024298' );
$location     = get_theme_mod( 'lg_location', 'Mannarkkad, Kerala' );
$instagram    = get_theme_mod( 'lg_instagram_url', 'https://www.instagram.com/ismaayyll/' );
$github       = get_theme_mod( 'lg_github_url', '#' );
$linkedin     = get_theme_mod( 'lg_linkedin_url', '#' );
$contact_email = 'ismayilpilakkal00@gmail.com';
?>

<!-- Hero Section -->
<section class="hero" id="home">
  <div class="hero-content" data-aos="zoom-in" data-aos-duration="1000">
    <div class="hero-image">
        <img src="<?php echo esc_url( $hero_img ); ?>" alt="<?php esc_attr_e( 'Muhammed Ismayil P', 'liquid-glass-portfolio' ); ?>">
    </div>
    <div class="hero-text">
       <h1>Hello, I'm <span>MUHAMMED ISMAYIL P</span></h1>
       <h3 class="typing-text">I'm a <span></span></h3>
       <p>Passionate Web Developer creating modern, responsive, and user-friendly websites.</p>
       <a href="#projects" class="btn"><?php esc_html_e( 'View My Work', 'liquid-glass-portfolio' ); ?></a>
    </div>
  </div>
</section>

<!-- About Section -->
<section id="about" data-aos="fade-up">
    <h2 class="section-title"><?php esc_html_e( 'About Me', 'liquid-glass-portfolio' ); ?></h2>
    <div class="about-content">
        <p>I am a BSc Computer Science student at MES Kalladi College, Mannarkkad, passionate about web development and creative design. I have skills in HTML, CSS, React JavaScript, along with experience in video editing and photo editing. I enjoy creating modern, responsive, and user-friendly digital experiences while continuously learning new technologies.</p>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" data-aos="fade-up">
    <h2 class="section-title"><?php esc_html_e( 'Skills', 'liquid-glass-portfolio' ); ?></h2>
    <div class="skills-container">
        <div class="skill-box" data-aos="fade-up" data-aos-delay="100">
            <i class="fab fa-html5"></i>
            <h3>HTML</h3>
        </div>
        <div class="skill-box" data-aos="fade-up" data-aos-delay="200">
            <i class="fab fa-css3-alt"></i>
            <h3>CSS</h3>
        </div>
        <div class="skill-box" data-aos="fade-up" data-aos-delay="300">
            <i class="fab fa-js"></i>
            <h3>JavaScript</h3>
        </div>
        <div class="skill-box" data-aos="fade-up" data-aos-delay="400">
            <i class="fab fa-react"></i>
            <h3>React</h3>
        </div>
        <div class="skill-box" data-aos="fade-up" data-aos-delay="500">
            <i class="fas fa-camera"></i>
            <h3>Photo Editing</h3>
        </div>
        <div class="skill-box" data-aos="fade-up" data-aos-delay="600">
            <i class="fas fa-video"></i>
            <h3>Video Editing</h3>
        </div>
        <div class="skill-box full-width" data-aos="fade-up" data-aos-delay="700">
            <i class="fas fa-laptop-code"></i>
            <h3>Front-End Developer</h3>
        </div>
    </div>
</section> 

<!-- Projects Section -->
<section id="projects" data-aos="fade-up">
    <h2 class="section-title"><?php esc_html_e( 'Projects', 'liquid-glass-portfolio' ); ?></h2>
    <div class="projects-container">
        <?php
        $projects_query = new WP_Query( array(
            'post_type'      => 'lg_project',
            'posts_per_page' => -1, // Get all projects
            'orderby'        => 'date',
            'order'          => 'DESC',
        ) );

        if ( $projects_query->have_posts() ) :
            $delay = 100;
            while ( $projects_query->have_posts() ) : $projects_query->the_post();
                ?>
                <div class="project-card" data-aos="flip-up" data-aos-delay="<?php echo esc_attr( $delay ); ?>">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="project-thumbnail">
                            <?php the_post_thumbnail( 'large', array( 'style' => 'width:100%; height:auto; border-radius:10px; margin-bottom:15px;' ) ); ?>
                        </div>
                    <?php endif; ?>
                    <h3><?php the_title(); ?></h3>
                    <?php the_excerpt(); ?>
                </div>
                <?php
                $delay += 100;
            endwhile;
            wp_reset_postdata();
        else :
            ?>
            <p style="text-align:center; color:#cbd5e1; width:100%;"><?php esc_html_e( 'No projects found. Add some in the WordPress dashboard!', 'liquid-glass-portfolio' ); ?></p>
            <?php
        endif;
        ?>
    </div>
</section>

<!-- Resume Section -->
<section id="resume" class="resume" data-aos="fade-up">
    <h2 class="section-title"><?php esc_html_e( 'Resume', 'liquid-glass-portfolio' ); ?></h2>
    <p style="color: #cbd5e1; margin-bottom: 20px;"><?php esc_html_e( 'Download my resume to know more about my education, skills, and experience.', 'liquid-glass-portfolio' ); ?></p>
    <a href="<?php echo esc_url( $resume_url ); ?>" class="btn" target="_blank" data-aos="zoom-in" data-aos-delay="200">
        <i class="fas fa-download"></i> <?php esc_html_e( 'Download Resume', 'liquid-glass-portfolio' ); ?>
    </a>
</section>

<!-- Contact Section -->
<section class="contact" id="contact" data-aos="fade-up">
    <div class="contact-heading">
        <span><?php esc_html_e( 'CONTACT', 'liquid-glass-portfolio' ); ?></span>
        <h2>Let's Work <span>Together</span></h2>
        <p><?php esc_html_e( 'Have a project in mind or want to collaborate? Feel free to reach out. I\'m always open to discussing new opportunities.', 'liquid-glass-portfolio' ); ?></p>
    </div>

    <div class="contact-container">
        <div class="contact-info" data-aos="fade-right" data-aos-delay="200">
            <h3><?php esc_html_e( 'Get In Touch', 'liquid-glass-portfolio' ); ?></h3>
            <div class="info-box">
                <div class="icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div>
                    <h4><?php esc_html_e( 'Email', 'liquid-glass-portfolio' ); ?></h4>
                    <p><a href="mailto:<?php echo esc_attr( $contact_email ); ?>" style="color:#cbd5e1; text-decoration:none;"><?php echo esc_html( $contact_email ); ?></a></p>
                </div>
            </div>
            <div class="info-box">
                <div class="icon">
                    <i class="fas fa-phone"></i>
                </div>
                <div>
                    <h4><?php esc_html_e( 'Phone', 'liquid-glass-portfolio' ); ?></h4>
                    <p><a href="tel:<?php echo esc_attr( $phone ); ?>" style="color:#cbd5e1; text-decoration:none;"><?php echo esc_html( $phone ); ?></a></p>
                </div>
            </div>
            <div class="info-box">
                <div class="icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div>
                    <h4><?php esc_html_e( 'Location', 'liquid-glass-portfolio' ); ?></h4>
                    <p><?php echo esc_html( $location ); ?></p>
                </div>
            </div>
            <div class="social-links">
                <?php if ( ! empty( $instagram ) ) : ?>
                    <a href="<?php echo esc_url( $instagram ); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                <?php endif; ?>
                <?php if ( ! empty( $github ) ) : ?>
                    <a href="<?php echo esc_url( $github ); ?>" target="_blank"><i class="fab fa-github"></i></a>
                <?php else: ?>
                    <a href="#" target="_blank"><i class="fab fa-github"></i></a>
                <?php endif; ?>
                <?php if ( ! empty( $linkedin ) ) : ?>
                    <a href="<?php echo esc_url( $linkedin ); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                <?php else: ?>
                    <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                <?php endif; ?>
            </div>
        </div>

        <div class="contact-form" data-aos="fade-left" data-aos-delay="400">
            <h3><?php esc_html_e( 'Send Message', 'liquid-glass-portfolio' ); ?></h3>
            <form id="lg-contact-form">
                <!-- Status Container -->
                <div class="form-status" id="lg-form-status"></div>

                <div class="row">
                    <input type="text" id="lg_name" name="name" placeholder="<?php esc_attr_e( 'Your Name', 'liquid-glass-portfolio' ); ?>" required>
                    <input type="email" id="lg_email" name="email" placeholder="<?php esc_attr_e( 'Your Email', 'liquid-glass-portfolio' ); ?>" required>
                </div>
                <input type="text" id="lg_subject" name="subject" placeholder="<?php esc_attr_e( 'Subject', 'liquid-glass-portfolio' ); ?>">
                <textarea id="lg_message" name="message" rows="7" placeholder="<?php esc_attr_e( 'Your Message', 'liquid-glass-portfolio' ); ?>" required></textarea>
                <button type="submit" id="lg_submit_btn">
                    <i class="fas fa-paper-plane"></i>
                    <?php esc_html_e( 'Send Message', 'liquid-glass-portfolio' ); ?>
                </button>
            </form>
        </div>
    </div>
</section>

<?php
get_footer();
