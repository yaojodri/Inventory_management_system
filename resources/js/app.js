// resources/js/app.js

import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

// Custom JS for interactivity
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll for anchor links
    const scrollLinks = document.querySelectorAll('a[href^="#"]');
    scrollLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Modal trigger example
    const modalTrigger = document.querySelector('#infoModalTrigger');
    if (modalTrigger) {
        modalTrigger.addEventListener('click', function() {
            const infoModal = new bootstrap.Modal(document.getElementById('infoModal'));
            infoModal.show();
        });
    }
});






document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('toggle-btn').addEventListener('click', function() {
        var sidebar = document.getElementById('sidebar');
        var mainContent = document.getElementById('main-content');
        sidebar.classList.toggle('closed');
        if (sidebar.classList.contains('closed')) {
            mainContent.classList.add('full-width');
        } else {
            mainContent.classList.remove('full-width');
        }
    });
});


