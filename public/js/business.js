// Business Application JavaScript

// Toggle sidebar on mobile
function toggleSidebar() {
    const sidebar = document.getElementById('business-sidebar');
    if (sidebar) {
        sidebar.classList.toggle('open');
    }
}

// Update page title
function updatePageTitle(title, subtitle) {
    const titleEl = document.getElementById('page-title');
    const subtitleEl = document.getElementById('page-subtitle');
    
    if (titleEl) titleEl.textContent = title;
    if (subtitleEl) subtitleEl.textContent = subtitle;
}

// Set active navigation item
function setActiveNav(page) {
    document.querySelectorAll('.nav-item').forEach(item => {
        item.classList.remove('active', 'bg-gray-100', 'text-gray-900');
        const icon = item.querySelector('svg');
        if (icon) {
            icon.classList.remove('text-gray-900');
            icon.classList.add('text-gray-400');
        }
    });
    
    const activeItem = document.querySelector(`a[href*="${page}"]`);
    if (activeItem) {
        activeItem.classList.add('active', 'bg-gray-100', 'text-gray-900');
        const icon = activeItem.querySelector('svg');
        if (icon) {
            icon.classList.remove('text-gray-400');
            icon.classList.add('text-gray-900');
        }
    }
}

// Toast notification
function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `toast-enter fixed top-4 right-4 z-50 px-4 py-3 rounded-lg shadow-lg text-sm font-medium ${
        type === 'success' ? 'bg-green-500 text-white' :
        type === 'error' ? 'bg-red-500 text-white' :
        type === 'warning' ? 'bg-yellow-500 text-white' :
        'bg-gray-800 text-white'
    }`;
    toast.textContent = message;
    
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateX(100%)';
        toast.style.transition = 'all 0.3s ease';
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}

// Format currency
function formatCurrency(amount) {
    return new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD'
    }).format(amount);
}

// Format date
function formatDate(date, format = 'short') {
    const d = new Date(date);
    const options = format === 'long' ?
        { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' } :
        { year: 'numeric', month: 'short', day: 'numeric' };
    
    return new Intl.DateTimeFormat('en-US', options).format(d);
}

// Print receipt
function printReceipt() {
    window.print();
}

// Close modal on escape key
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        const modals = document.querySelectorAll('[role="dialog"]');
        modals.forEach(modal => modal.classList.add('hidden'));
    }
});

// Initialize on page load
document.addEventListener('DOMContentLoaded', () => {
    // Set active nav based on current page
    const currentPage = window.location.pathname.split('/').pop().replace('.html', '');
    setActiveNav(currentPage || 'dashboard');
    
    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', (e) => {
        const sidebar = document.getElementById('business-sidebar');
        const toggleBtn = e.target.closest('[onclick*="toggleSidebar"]');
        
        if (sidebar && !sidebar.contains(e.target) && !toggleBtn && sidebar.classList.contains('open')) {
            sidebar.classList.remove('open');
        }
    });
});

// Loading state
function setLoading(selector, isLoading) {
    const element = document.querySelector(selector);
    if (!element) return;
    
    if (isLoading) {
        element.classList.add('opacity-50', 'pointer-events-none');
        const spinner = document.createElement('div');
        spinner.className = 'spinner w-4 h-4 border-2 border-gray-300 border-t-primary rounded-full';
        spinner.id = 'loading-spinner';
        element.appendChild(spinner);
    } else {
        element.classList.remove('opacity-50', 'pointer-events-none');
        const spinner = element.querySelector('#loading-spinner');
        if (spinner) spinner.remove();
    }
}

// Confirm dialog
function confirmDialog(message, callback) {
    if (confirm(message)) {
        callback();
    }
}

