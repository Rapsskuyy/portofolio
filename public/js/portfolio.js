// Modern Portfolio JavaScript

document.addEventListener('DOMContentLoaded', function() {
    
    // ===== NAVIGATION =====
    const navDots = document.querySelectorAll('.nav-dot');
    const sections = document.querySelectorAll('section[id]');
    
    // Smooth scroll
    navDots.forEach(dot => {
        dot.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetSection = document.querySelector(targetId);
            if (targetSection) {
                targetSection.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
    
    // Active nav on scroll
    function updateActiveNav() {
        const scrollY = window.pageYOffset;
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 100;
            const sectionHeight = section.clientHeight;
            const sectionId = section.getAttribute('id');
            
            if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                navDots.forEach(dot => {
                    dot.classList.remove('active');
                    if (dot.getAttribute('href') === `#${sectionId}`) {
                        dot.classList.add('active');
                    }
                });
            }
        });
    }
    
    window.addEventListener('scroll', updateActiveNav);
    
    // ===== ROLE ROTATOR =====
    const roles = [
        'Web Developer',
        'Backend Enthusiast',
        'Problem Solver',
        'Team Player',
        'MC & Organizer'
    ];
    
    const roleElement = document.getElementById('roleRotator');
    if (roleElement) {
        let currentIndex = 0;
        
        setInterval(() => {
            roleElement.style.opacity = '0';
            
            setTimeout(() => {
                currentIndex = (currentIndex + 1) % roles.length;
                roleElement.textContent = roles[currentIndex];
                roleElement.style.opacity = '1';
            }, 300);
        }, 3000);
    }
    
    // ===== CIRCULAR PROGRESS =====
    const circleProgresses = document.querySelectorAll('.circle-progress');
    
    const progressObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const circle = entry.target;
                const percent = circle.getAttribute('data-percent');
                const progressCircle = circle.querySelector('.progress-circle');
                
                if (progressCircle) {
                    const circumference = 2 * Math.PI * 60;
                    const offset = circumference - (percent / 100) * circumference;
                    
                    setTimeout(() => {
                        progressCircle.style.strokeDashoffset = offset;
                    }, 100);
                }
                
                progressObserver.unobserve(circle);
            }
        });
    }, { threshold: 0.5 });
    
    circleProgresses.forEach(circle => {
        progressObserver.observe(circle);
    });
    
    // ===== TESTIMONIAL SLIDER =====
    const testimonialsTrack = document.querySelector('.testimonials-track');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    
    if (testimonialsTrack && prevBtn && nextBtn) {
        prevBtn.addEventListener('click', () => {
            testimonialsTrack.scrollBy({
                left: -530,
                behavior: 'smooth'
            });
        });
        
        nextBtn.addEventListener('click', () => {
            testimonialsTrack.scrollBy({
                left: 530,
                behavior: 'smooth'
            });
        });
    }
    
    // ===== SCROLL ANIMATIONS =====
    const animateOnScroll = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });
    
    // Animate bento items
    document.querySelectorAll('.bento-item').forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(30px)';
        item.style.transition = `all 0.6s ease ${index * 0.1}s`;
        animateOnScroll.observe(item);
    });
    
    // Animate education cards
    document.querySelectorAll('.education-card-modern').forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateX(-30px)';
        card.style.transition = `all 0.6s ease ${index * 0.1}s`;
        animateOnScroll.observe(card);
    });
    
    // Animate masonry items
    document.querySelectorAll('.masonry-item').forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'scale(0.9)';
        item.style.transition = `all 0.6s ease ${index * 0.05}s`;
        animateOnScroll.observe(item);
    });
    
    // Animate timeline items
    document.querySelectorAll('.timeline-item-h').forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(30px)';
        item.style.transition = `all 0.6s ease ${index * 0.1}s`;
        animateOnScroll.observe(item);
    });
    
    // Animate chat messages
    document.querySelectorAll('.chat-message').forEach((msg, index) => {
        msg.style.opacity = '0';
        msg.style.transform = 'translateX(-20px)';
        msg.style.transition = `all 0.4s ease ${index * 0.05}s`;
        animateOnScroll.observe(msg);
    });
    
    // ===== PARALLAX EFFECT =====
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const heroRight = document.querySelector('.hero-right');
        
        if (heroRight && scrolled < window.innerHeight) {
            heroRight.style.transform = `translateY(${scrolled * 0.3}px)`;
        }
    });
    
    // ===== FLOATING CARDS ANIMATION =====
    const floatingCards = document.querySelectorAll('.floating-card');
    floatingCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.5}s`;
    });
    
    // ===== AUTO-OPEN MODAL IF SUCCESS =====
    if (document.querySelector('.modal-container .alert-success')) {
        openGuestbookModal();
        
        setTimeout(() => {
            const alert = document.querySelector('.modal-container .alert-success');
            if (alert) {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 300);
            }
        }, 5000);
    }
    
    // ===== FORM ENHANCEMENTS =====
    const forms = document.querySelectorAll('.modern-form');
    forms.forEach(form => {
        const inputs = form.querySelectorAll('input, textarea, select');
        
        inputs.forEach(input => {
            // Add focus effect
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
            
            // Character counter for textareas
            if (input.tagName === 'TEXTAREA' && input.hasAttribute('maxlength')) {
                const maxLength = input.getAttribute('maxlength');
                const counter = document.createElement('div');
                counter.className = 'char-counter';
                counter.style.cssText = 'text-align: right; font-size: 12px; color: var(--gray); margin-top: 5px;';
                counter.textContent = `0/${maxLength}`;
                input.parentElement.appendChild(counter);
                
                input.addEventListener('input', function() {
                    const length = this.value.length;
                    counter.textContent = `${length}/${maxLength}`;
                    
                    if (length > maxLength * 0.9) {
                        counter.style.color = '#fbbf24';
                    } else {
                        counter.style.color = 'var(--gray)';
                    }
                });
            }
        });
        
        // Submit button loading state
        form.addEventListener('submit', function() {
            const submitBtn = this.querySelector('.btn-submit');
            if (submitBtn) {
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
                submitBtn.disabled = true;
            }
        });
    });
    
    // ===== SCROLL INDICATOR =====
    const scrollIndicator = document.querySelector('.scroll-indicator');
    if (scrollIndicator) {
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 100) {
                scrollIndicator.style.opacity = '0';
            } else {
                scrollIndicator.style.opacity = '1';
            }
        });
    }
    
    // ===== MASONRY LAYOUT ADJUSTMENT =====
    function adjustMasonry() {
        const masonryGrid = document.querySelector('.masonry-grid');
        if (masonryGrid && window.innerWidth <= 768) {
            masonryGrid.style.columnCount = '1';
        } else if (masonryGrid && window.innerWidth <= 1200) {
            masonryGrid.style.columnCount = '2';
        }
    }
    
    window.addEventListener('resize', adjustMasonry);
    adjustMasonry();
    
    console.log('🚀 Modern Portfolio Loaded!');
});

// ===== MODAL FUNCTIONS =====
function openGuestbookModal() {
    const modal = document.getElementById('guestbookModal');
    if (modal) {
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
}

function closeGuestbookModal() {
    const modal = document.getElementById('guestbookModal');
    if (modal) {
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';
    }
}

// Close modal on overlay click
document.addEventListener('click', function(e) {
    const modal = document.getElementById('guestbookModal');
    if (e.target === modal) {
        closeGuestbookModal();
    }
});

// Close modal on ESC key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeGuestbookModal();
    }
});

// ===== SMOOTH SCROLL FOR ALL LINKS =====
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        const href = this.getAttribute('href');
        if (href !== '#' && href.length > 1) {
            e.preventDefault();
            const target = document.querySelector(href);
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }
    });
});
