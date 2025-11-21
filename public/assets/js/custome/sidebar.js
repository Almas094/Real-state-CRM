// Get elements
const openSidebarBtn = document.getElementById('openSidebarBtn');
const closeSidebarBtn = document.getElementById('closeSidebarBtn');
const crmSidebar = document.getElementById('crmSidebar');
const crmOverlay = document.getElementById('crmOverlay');

// Open sidebar
openSidebarBtn.addEventListener('click', () => {
    crmSidebar.classList.add('active');
    crmOverlay.classList.add('active');
});

// Close sidebar
const closeSidebar = () => {
    crmSidebar.classList.remove('active');
    crmOverlay.classList.remove('active');
};

closeSidebarBtn.addEventListener('click', closeSidebar);

// Close sidebar when clicking outside
crmOverlay.addEventListener('click', closeSidebar);