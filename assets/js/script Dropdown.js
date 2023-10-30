    var isUserLoggedIn = <?php echo $is_logged_in ? 'true' : 'false'; ?>;
  
  // Referência ao modal
  var modal = document.getElementById('myModalBV');

  if (isUserLoggedIn) {
    modal.style.display = 'block';
  }

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = 'none';
    }
}