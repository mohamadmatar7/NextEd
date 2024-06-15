<div id="chat-widget" class="fixed bottom-4 right-4 z-50 rounded-lg pt-1.5 bg-gradient-to-r from-blue-500 to-blue-700 dark:from-gray-700 dark:to-gray-900 hover:from-blue-700 hover:to-blue-900 focus:outline-none focus:shadow-outline flex items-center" title="{{ __('template.Chat with AI') }}">
    <img src="/assets/images/ai/robot.png"
    alt="AI Robot" class="chat-icon w-16 h-16 rounded-full cursor-pointer" id="chat-icon">
    <div id="chat-content" class="hidden absolute bottom-20 right-0 w-72 h-80 bg-white dark:bg-gray-800 shadow-lg rounded-lg p-4 flex-col">
        <h2 class="text-lg font-bold mb-2">{{ __('template.Welcome to NextEd! How can I assist you?') }}</h2>
        <div id="chat-output" class="flex-1 overflow-y-auto mb-2"></div>
        <input type="text" id="user-input" class="w-full border rounded p-2" placeholder="{{ __('template.Type your message...') }}">
        <x-primary-button id="send-btn" class="w-full bg-blue-500 text-white rounded p-2 mt-2">{{ __('template.Send') }}</x-primary-button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const chatIcon = document.getElementById('chat-icon');
        const chatContent = document.getElementById('chat-content');
        const chatOutput = document.getElementById('chat-output');
        const userInput = document.getElementById('user-input');
        const sendButton = document.getElementById('send-btn');
        const openAIApiKey = 'sk-proj-hb1xGuqlzibCFoIV4rxuT3BlbkFJJYPvu6O1BRglrPwpnrlq';

        chatIcon.addEventListener('click', () => {
            chatContent.classList.toggle('hidden');
            chatContent.classList.toggle('flex');
        });

        sendButton.addEventListener('click', () => {
            sendMessage(userInput.value);
        });

        userInput.addEventListener('keypress', function (event) {
            if (event.key === 'Enter') {
                sendMessage(userInput.value);
            }
        });

        async function sendMessage(message) {
            if (message.trim() === '') return;
            appendMessage(message, true);
            userInput.value = '';

            try {
                console.log('Sending request to OpenAI API...');
                const botResponse = await fetchWithRetry(message, 0);
                handleBotResponse(botResponse);
            } catch (error) {
                console.error('Error:', error);
                appendMessage(`Sorry, something went wrong. Please try again later. Error: ${error.message}`, false);
            }
        }

        async function fetchWithRetry(message, attempt) {
            const maxAttempts = 5;
            const delay = (ms) => new Promise(resolve => setTimeout(resolve, ms));
            const retryDelays = [2000, 4000, 8000, 16000, 32000];

            try {
                const response = await fetch('https://api.openai.com/v1/chat/completions', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${openAIApiKey}`
                    },
                    body: JSON.stringify({
                        model: 'gpt-3.5-turbo',
                        messages: [{role: 'user', content: message}],
                        max_tokens: 100
                    })
                });

                if (!response.ok) {
                    if (response.status === 429 && attempt < maxAttempts) {
                        console.warn(`Rate limit hit, retrying in ${retryDelays[attempt]}ms...`);
                        await delay(retryDelays[attempt]);
                        return fetchWithRetry(message, attempt + 1);
                    } else {
                        if (response.status === 401) {
                            throw new Error('You haven\'t signed in yet. Please sign in to continue.');
                        }
                        throw new Error(`HTTP error! Status: ${response.status} - ${response.statusText}`);
                    }
                }

                const responseData = await response.json();
                return responseData.choices[0].message.content.trim();
            } catch (error) {
                if (attempt < maxAttempts) {
                    console.warn(`Error occurred, retrying in ${retryDelays[attempt]}ms...`, error);
                    await delay(retryDelays[attempt]);
                    return fetchWithRetry(message, attempt + 1);
                } else {
                    throw error;
                }
            }
        }

        function appendMessage(content, isUser) {
    const messageElem = document.createElement('div');
    messageElem.className = isUser ? 'text-right my-1' : 'text-left my-1';
    const messageContent = isUser ? content : sanitizeMessage(content);
    messageElem.innerHTML = `<div class="inline-block p-2 rounded ${
        isUser ? 'bg-blue-500 text-white' : 'bg-gray-200 dark:bg-gray-700 text-black dark:text-white'
    }">${messageContent}</div>`;
    chatOutput.appendChild(messageElem);
    chatOutput.scrollTop = chatOutput.scrollHeight;
}

function sanitizeMessage(content) {
    return content.replace(/<[^>]+>/g, '');
}


function handleBotResponse(botResponse) {
    const command = extractCommand(botResponse);
    console.log("Extracted command:", command);

    if (command) {
        switch (command.toLowerCase()) {
            case 'courses':
                appendMessage("You can find courses", false);
                appendLink("https://nexted.school/courses/user/{{ auth()->user()->id }}");
                break;
            case 'classes':
                appendMessage("You can find classes", false);
                appendLink("https://nexted.school/programs/user/{{ auth()->user()->id }}");
                break;
            case 'chat':
                appendMessage("You can find chat", false);
                appendLink("https://nexted.school/messenger");
                break;
            case 'profile':
                appendMessage("Here is your profile", false);
                appendLink("https://nexted.school/profile");
                break;
            default:
                appendMessage(botResponse, false);
        }
    } else {
        appendMessage(botResponse, false);
    }
}


function appendLink(link) {
    const linkElem = document.createElement('a');
    linkElem.href = link;
    linkElem.target = '_blank';
    linkElem.textContent = 'here';
    linkElem.classList.add('text-blue-500', 'underline', 'cursor-pointer');

    const messageElem = document.createElement('div');
    messageElem.className = 'text-left my-1';

    messageElem.style.padding = '8px';
    messageElem.style.borderRadius = '8px';
    messageElem.style.backgroundColor = '#f0f4f8'; 
    messageElem.style.border = '1px solid #cbd5e0';
    messageElem.style.display = 'inline-block';

    messageElem.appendChild(linkElem);
    chatOutput.appendChild(messageElem);
    chatOutput.scrollTop = chatOutput.scrollHeight;
}


function extractCommand(message) {
    const commands = {
        'courses': ['courses', 'lessons', 'grades'],
        'classes': ['classes', 'class', 'lessons', 'programs'],
        'chat': ['chat', 'message', 'communicate'],
        'profile': ['profile', 'account', 'settings']
    };

    for (const [command, keywords] of Object.entries(commands)) {
        for (const keyword of keywords) {
            if (message.toLowerCase().includes(keyword)) {
                return command;
            }
        }
    }

    return null;
}

    });
</script>