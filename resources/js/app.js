import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

// Custom JavaScript for admin panel
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Initialize popovers
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });

    // Sidebar toggle for mobile
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    
    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('show');
        });
    }

    // Auto-hide alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert:not(.alert-permanent)');
    alerts.forEach(function(alert) {
        setTimeout(function() {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000);
    });

    // Form validation
    const forms = document.querySelectorAll('.needs-validation');
    forms.forEach(function(form) {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    });

    // Dynamic item addition for consignment forms
    let itemIndex = 1;
    const addItemBtn = document.getElementById('addItem');
    const itemsContainer = document.getElementById('itemsContainer');
    
    if (addItemBtn && itemsContainer) {
        addItemBtn.addEventListener('click', function() {
            const firstItem = itemsContainer.querySelector('.item-row');
            if (firstItem) {
                const newItem = firstItem.cloneNode(true);
                
                // Update input names and clear values
                newItem.querySelectorAll('input, select, textarea').forEach(function(input) {
                    const name = input.name;
                    if (name) {
                        input.name = name.replace(/\[0\]/, '[' + itemIndex + ']');
                        input.value = '';
                    }
                });
                
                // Add remove button
                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.className = 'btn btn-danger btn-sm mt-2';
                removeBtn.innerHTML = '<i class="fas fa-trash"></i> Remove';
                removeBtn.addEventListener('click', function() {
                    newItem.remove();
                });
                
                newItem.appendChild(removeBtn);
                itemsContainer.appendChild(newItem);
                itemIndex++;
            }
        });
    }
});
