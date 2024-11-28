
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'en', 
                    includedLanguages: 'en,bn', 
                    layout: google.translate.TranslateElement.InlineLayout.SIMPLE
                }, 'google_translate_element');
            }
    
            // Load Google Translate API
            var translateScript = document.createElement('script');
            translateScript.type = 'text/javascript';
            translateScript.src = '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
            document.getElementsByTagName('head')[0].appendChild(translateScript);
    
            // Toggle language functionality
            document.getElementById('translateBtn').addEventListener('click', function() {
                var btn = document.getElementById('translateBtn');
                var currentLang = btn.innerText;
                
                if (currentLang === "বাংলায় দেখুন") {
                    // Switch to Bangla
                    var frame = document.querySelector('.goog-te-menu-frame');
                    if (frame) {
                        var options = frame.contentWindow.document.querySelectorAll('.goog-te-menu2-item span.text');
                        options.forEach(function(option) {
                            if (option.innerText === 'Bengali') {
                                option.click();
                            }
                        });
                    }
                    btn.innerText = "View in English";
                } else {
                    // Switch back to English
                    var frame = document.querySelector('.goog-te-menu-frame');
                    if (frame) {
                        var options = frame.contentWindow.document.querySelectorAll('.goog-te-menu2-item span.text');
                        options.forEach(function(option) {
                            if (option.innerText === 'English') {
                                option.click();
                            }
                        });
                    }
                    btn.innerText = "বাংলায় দেখুন";
                }
            });
  