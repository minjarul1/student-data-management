document.addEventListener('DOMContentLoaded', () => {
    const startButton = document.getElementById('start-test');
    const durationSelect = document.getElementById('duration');
    const typingTestSection = document.getElementById('typing-test');
    const textContainer = document.getElementById('text-container');
    const inputArea = document.getElementById('input-area');
    const timeLeftDisplay = document.getElementById('time-left');
    const wpmDisplay = document.getElementById('wpm');
    const errorsDisplay = document.getElementById('errors');
    const resultsSection = document.getElementById('results');
    const resultDuration = document.getElementById('result-duration');
    const resultWPM = document.getElementById('result-wpm');
    const resultErrors = document.getElementById('result-errors');
    const restartButton = document.getElementById('restart-test');

    let timer;
    let timeLeft;
    let testText = '';
    let userInput = '';
    let errors = 0;
    let wordCount = 0;

    async function fetchTestText() {
        // Replace with your server API call in the future
        return 'এই বাক্যটি টাইপ করার চেষ্টা করুন।';
    }

    function startTest() {
        const duration = parseInt(durationSelect.value);
        timeLeft = duration * 60;
        errors = 0;
        wordCount = 0;
        userInput = '';
        
        inputArea.disabled = false;
        inputArea.value = '';
        inputArea.focus();

        timeLeftDisplay.textContent = formatTime(timeLeft);
        wpmDisplay.textContent = '0';
        errorsDisplay.textContent = '0';
        resultsSection.style.display = 'none';
        typingTestSection.style.display = 'block';

        fetchTestText().then(text => {
            testText = text;
            textContainer.textContent = testText;
        });

        timer = setInterval(updateTimer, 1000);
    }

    function updateTimer() {
        if (timeLeft > 0) {
            timeLeft--;
            timeLeftDisplay.textContent = formatTime(timeLeft);
            calculateWPM();
        } else {
            endTest();
        }
    }

    function calculateWPM() {
        const wordsTyped = userInput.trim().split(/\s+/).length;
        wordCount = wordsTyped;
        wpmDisplay.textContent = Math.max(0, Math.floor((wordsTyped / ((durationSelect.value * 60) - timeLeft)) * 60));
    }

    function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const secs = seconds % 60;
        return `${minutes}:${secs.toString().padStart(2, '0')}`;
    }

    function endTest() {
        clearInterval(timer);
        inputArea.disabled = true;
        resultsSection.style.display = 'block';
        typingTestSection.style.display = 'none';

        resultDuration.textContent = durationSelect.value;
        resultWPM.textContent = wpmDisplay.textContent;
        resultErrors.textContent = errors;
    }

    inputArea.addEventListener('input', () => {
        userInput = inputArea.value;
        const currentText = testText.slice(0, userInput.length);

        if (userInput !== currentText) {
            errors++;
            errorsDisplay.textContent = errors;
        }
    });

    startButton.addEventListener('click', startTest);
    restartButton.addEventListener('click', () => {
        resultsSection.style.display = 'none';
        typingTestSection.style.display = 'none';
        inputArea.value = '';
    });
});
