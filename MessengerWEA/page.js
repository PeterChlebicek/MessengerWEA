 // Funkce pro odeslání zprávy
    const messageForm = document.getElementById('message-form');
    const messageInput = document.getElementById('message-input');
    const messagesContainer = document.getElementById('messages');

    const sendMessage = (message) => {
      const messageElement = document.createElement('div');
      messageElement.classList.add('message-item');
      messageElement.innerText = message;
      const messageDisplay = document.getElementById('message-display');
      messageDisplay.appendChild(messageElement);
    };

    messageForm.addEventListener('submit', (event) => {
      event.preventDefault();
      const message = messageInput.value;
      sendMessage(message);
      messageInput.value = '';
    });

