<!-- Chatbot Widget -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="chatbot-widget">
    <div class="chatbot-toggle" id="chatbotToggle">
        <img src="/travel-website-main/images/chatbot.jpg" alt="Chat with us" class="chatbot-icon">
        <span class="notification-badge" id="notificationBadge">1</span>
    </div>

    <div class="chatbot-container" id="chatbotContainer">
        <div class="chatbot-header">
            <div class="chatbot-title">
                <img src="/travel-website-main/images/chatbot.jpg" alt="Chatbot" class="chatbot-avatar">
                <span>BD Adventures Assistant</span>
            </div>
            <button class="close-btn" id="closeChatbot">&times;</button>
        </div>
        <div class="chat-messages" id="chatMessages">
            <div class="message bot-message">
                <p>👋 Hi! I'm your BD Adventures assistant. How can I help you today?</p>
            </div>
        </div>
        <div class="chat-input">
            <input type="text" id="userInput" placeholder="Type your message...">
            <button id="sendMessage">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>
</div>

<style>
.chatbot-widget {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 9999;
}

.chatbot-toggle {
    position: relative;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: #446A46;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    cursor: pointer;
    transition: transform 0.3s ease;
    overflow: hidden;
}

.chatbot-icon {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}

.notification-badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background: #ff4444;
    color: white;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    font-size: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.chatbot-container {
    display: none;
    position: fixed;
    bottom: 90px;
    right: 20px;
    width: 350px;
    height: 500px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 25px rgba(0,0,0,0.1);
    flex-direction: column;
    z-index: 9999;
}

.chatbot-header {
    padding: 15px;
    background: #446A46;
    color: white;
    border-radius: 15px 15px 0 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.chatbot-title {
    display: flex;
    align-items: center;
    gap: 10px;
}

.chatbot-avatar {
    width: 30px;
    height: 30px;
    border-radius: 50%;
}

.chat-messages {
    flex: 1;
    padding: 15px;
    overflow-y: auto;
}

.message {
    margin-bottom: 10px;
    max-width: 80%;
    padding: 10px 15px;
    border-radius: 15px;
}

.bot-message {
    background: #f0f0f0;
    margin-right: auto;
}

.user-message {
    background: #446A46;
    color: white;
    margin-left: auto;
}

.chat-input {
    padding: 15px;
    border-top: 1px solid #eee;
    display: flex;
    gap: 10px;
}

.chat-input input {
    flex: 1;
    padding: 10px 15px;
    border: 1px solid #ddd;
    border-radius: 25px;
    outline: none;
}

.chat-input button {
    background: #446A46;
    color: white;
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}

.close-btn {
    background: none;
    border: none;
    color: white;
    font-size: 24px;
    cursor: pointer;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const chatbotToggle = document.getElementById('chatbotToggle');
    const chatbotContainer = document.getElementById('chatbotContainer');
    const closeChatbot = document.getElementById('closeChatbot');
    const userInput = document.getElementById('userInput');
    const sendMessage = document.getElementById('sendMessage');
    const chatMessages = document.getElementById('chatMessages');
    const notificationBadge = document.getElementById('notificationBadge');

    if (chatbotToggle) {
        chatbotToggle.onclick = function() {
            const isHidden = chatbotContainer.style.display === 'none' || chatbotContainer.style.display === '';
            chatbotContainer.style.display = isHidden ? 'flex' : 'none';
            notificationBadge.style.display = 'none';
        };
    }

    if (closeChatbot) {
        closeChatbot.onclick = function() {
            chatbotContainer.style.display = 'none';
        };
    }

    function sendUserMessage() {
        const message = userInput.value.trim();
        if (message) {
            addMessage(message, 'user');
            userInput.value = '';
            
            setTimeout(() => {
                const botResponse = getBotResponse(message);
                addMessage(botResponse, 'bot');
            }, 1000);
        }
    }

    function addMessage(message, sender) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${sender}-message`;
        messageDiv.innerHTML = `<p>${message}</p>`;
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function getBotResponse(message) {
        message = message.toLowerCase();
        if (message.includes('hello') || message.includes('hi')) {
            return "Hello! How can I help you with your travel plans?";
        } else if (message.includes('booking') || message.includes('book')) {
            return "To make a booking, you can use our booking form above or contact us at booking@bdadventures.com";
        } else if (message.includes('price') || message.includes('cost')) {
            return "Our prices vary by destination and package. Please check specific destinations for detailed pricing.";
        } else if (message.includes('contact')) {
            return "You can reach us at contact@bdadventures.com or call +880 1234567890";
        } else {
            return "I'm not sure about that. Would you like to know about our bookings, prices, or contact information?";
        }
    }

    if (sendMessage) {
        sendMessage.onclick = sendUserMessage;
    }

    if (userInput) {
        userInput.onkeypress = function(e) {
            if (e.key === 'Enter') {
                sendUserMessage();
            }
        };
    }
});
</script> 