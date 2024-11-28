document.addEventListener('DOMContentLoaded', function() {
    // Load default page (overview)
    loadDashboardContent('overview');

    // Add click handlers to navigation links
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const page = this.dataset.page;
            loadDashboardContent(page);
            
            // Update active state
            document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
            this.classList.add('active');
        });
    });
});

function loadDashboardContent(page) {
    const contentArea = document.getElementById('dashboardContent');
    
    fetch(`components/dashboard/${page}.php`)
        .then(response => response.text())
        .then(html => {
            contentArea.innerHTML = html;
        })
        .catch(error => {
            console.error('Error loading content:', error);
            contentArea.innerHTML = '<p>Error loading content. Please try again.</p>';
        });
} 