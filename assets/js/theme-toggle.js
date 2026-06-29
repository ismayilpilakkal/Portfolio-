document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.getElementById('lg-theme-toggle');
    if (!toggleBtn) return;
    
    // Check local storage for preference
    const currentTheme = localStorage.getItem('lg_theme');
    
    if (currentTheme === 'light') {
        document.body.classList.add('light-mode');
        updateToggleIcon(true);
    }
    
    toggleBtn.addEventListener('click', function(e) {
        e.preventDefault();
        document.body.classList.toggle('light-mode');
        
        let theme = 'dark';
        if (document.body.classList.contains('light-mode')) {
            theme = 'light';
            updateToggleIcon(true);
        } else {
            updateToggleIcon(false);
        }
        
        // Save preference
        localStorage.setItem('lg_theme', theme);
    });
    
    function updateToggleIcon(isLight) {
        const icon = toggleBtn.querySelector('i');
        if (!icon) return;
        
        if (isLight) {
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
        } else {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
        }
    }
});
