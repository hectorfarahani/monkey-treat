document.addEventListener("DOMContentLoaded", function () {
  document.getElementById('save_ban_address').addEventListener('click', function(e){
    let address = document.getElementById('ban-address').value;
    let nonce = document.getElementById('_wpnonce').value;
    var formData = new FormData();
    formData.append('action', 'bnnp_validate_address');
    formData.append('nonce', nonce);
    formData.append('address', address);
    fetch(ajaxurl, {
      method: 'post',
      body: formData,
    }).then(res => res.json())
      .then(res => {
        let messageArea = document.getElementById('ban-message-area');
        messageArea.innerHTML = '';
        messageArea.innerHTML = res.data;
        if(!res.success) {
          messageArea.style.color = 'red';
        } else {
          messageArea.style.color = 'green';
          let img = document.createElement('img');
          img.id = 'ban-lovely-monkey';
          img.src = 'https://monkey.banano.cc/api/v1/monkey/' + address;
          document.getElementById('ban-message-area').insertAdjacentElement('beforeBegin', img)
        }

      });
  });
});
