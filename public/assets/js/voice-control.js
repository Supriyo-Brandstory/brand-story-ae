document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('voice-command-btn');
    const speechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

    if (!speechRecognition) {
        console.error('Speech Recognition API not supported in this browser.');
        btn.style.display = 'none'; // Hide button if not supported
        return;
    }

    const recognition = new speechRecognition();
    recognition.continuous = false;
    recognition.lang = 'en-US';
    recognition.interimResults = false;

    // specific check for Chrome on HTTP
    const isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
    const isSecure = window.location.protocol === 'https:' || window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1';

    if (isChrome && !isSecure) {
        console.warn('Chrome requires HTTPS for voice recognition.');
    }

    let isListening = false;

    btn.addEventListener('click', () => {
        if (isChrome && !isSecure) {
            alert('Google Chrome requires a secure (HTTPS) connection to access the microphone. Please reload the page using "https://" or use a different browser.');
            return;
        }

        if (isListening) {
            recognition.stop();
        } else {
            try {
                recognition.start();
            } catch (e) {
                console.error("Recognition start error:", e);
                // In case it was already running or other state issue
                isListening = false;
                btn.classList.remove('listening');
            }
        }
    });

    recognition.onstart = () => {
        isListening = true;
        btn.classList.add('listening');
        console.log('Voice recognition activated. Speak now.');
    };

    recognition.onend = () => {
        isListening = false;
        btn.classList.remove('listening');
        console.log('Voice recognition deactivated.');
    };

    recognition.onerror = (event) => {
        console.error('Speech recognition error detected: ' + event.error);
        isListening = false;
        btn.classList.remove('listening');

        if (event.error === 'not-allowed') {
            alert('Microphone access was denied. Please allow microphone access in your browser settings to use voice commands. If you are on a non-secure connection (HTTP), try using HTTPS or localhost.');
        } else if (event.error === 'no-speech') {
            // Ignore no-speech errors as they just mean silence
            return;
        } else {
            alert('Error: ' + event.error);
        }
    };

    recognition.onresult = (event) => {
        const transcript = event.results[0][0].transcript.toLowerCase().trim();
        console.log('You said: ', transcript);
        handleCommand(transcript);
    };

    function handleCommand(command) {
        const baseUrl = window.location.origin;

        // Navigation Commands
        if (command.includes('navigate home') || command.includes('go to home')) {
            window.location.href = baseUrl + '/';
        } else if (command.includes('navigate about') || command.includes('go to about')) {
            window.location.href = baseUrl + '/about';
        } else if (command.includes('navigate contact') || command.includes('go to contact')) {
            window.location.href = baseUrl + '/contact';
        } else if (command.includes('navigate services') || command.includes('go to services')) {
            window.location.href = baseUrl + '/services';
        } else if (command.includes('navigate blog') || command.includes('go to blog')) {
            window.location.href = baseUrl + '/blog';
        }

        // Action Commands
        else if (command.includes('scroll down')) {
            window.scrollBy({ top: 500, behavior: 'smooth' });
        } else if (command.includes('scroll up')) {
            window.scrollBy({ top: -500, behavior: 'smooth' });
        } else if (command.includes('scroll to bottom')) {
            window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
        } else if (command.includes('scroll to top')) {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        } else if (command.includes('clear cache') || command.includes('clean cache')) {
            fetch(baseUrl + '/clear-cache')
                .then(response => response.json())
                .then(data => {
                    console.log(data.message);
                    location.reload(true);
                })
                .catch(err => {
                    console.error('Error clearing cache:', err);
                    location.reload(true);
                });
        }

        else {
            console.log('Command not recognized.');
            // Optional: Provide visual feedback for unrecognized command
        }
    }
});
