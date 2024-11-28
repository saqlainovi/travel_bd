document.getElementById('chat-icon').addEventListener('click', function() {
  var chatBox = document.getElementById('chat-box');
  chatBox.style.display = chatBox.style.display === 'none' || chatBox.style.display === '' ? 'flex' : 'none';
});

document.getElementById('close-chat').addEventListener('click', function() {
  document.getElementById('chat-box').style.display = 'none';
});

document.getElementById('send-btn').addEventListener('click', function() {
  var inputField = document.getElementById('chat-input');
  var message = inputField.value.trim();

  if (message !== '') {
      var chatBody = document.getElementById('chat-body');
      
      // Append User's Message
      var userMessage = document.createElement('div');
      userMessage.classList.add('chat-message', 'user-message');
      userMessage.textContent = message;
      chatBody.appendChild(userMessage);

      // Clear the input field
      inputField.value = '';

      // Scroll to the bottom of the chat
      chatBody.scrollTop = chatBody.scrollHeight;

      // Auto-reply after a short delay (simulate typing)
      setTimeout(function() {
          var botReply = document.createElement('div');
          botReply.classList.add('chat-message', 'bot-message');
          botReply.textContent = "Thank you for your interest. Our all members are busy now. ASAP we will reply to you. For any Emergency: Call us at 01923638771 or E-mail us at bikkahtobd.blog@gmail.com";
          chatBody.appendChild(botReply);

          // Scroll to the bottom of the chat
          chatBody.scrollTop = chatBody.scrollHeight;
      }, 1000); // 1 second delay before the bot responds
  }
});
