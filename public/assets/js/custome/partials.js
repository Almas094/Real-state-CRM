document.getElementById('actionButton').addEventListener('click', function() {
    const dropdownMenu = document.getElementById('dropdownMenu');
    if (dropdownMenu.style.display === 'none') {
      dropdownMenu.style.display = 'inline';
    } else {
      dropdownMenu.style.display = 'none';
    }
  });
  