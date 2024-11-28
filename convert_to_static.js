const fs = require('fs');
const path = require('path');

// Function to convert PHP files to static HTML
function convertToStatic(filePath) {
    const content = fs.readFileSync(filePath, 'utf8');
    
    // Remove PHP tags and basic PHP code
    let staticContent = content
        .replace(/<\?php.*?\?>/gs, '')
        .replace(/\$_SESSION\['.*?'\]/g, '"User"')
        .replace(/include ['"].*?['"];/g, '')
        .replace(/session_start\(\);/g, '');
    
    // Replace .php extensions with .html
    staticContent = staticContent.replace(/href="([^"]+)\.php"/g, 'href="$1.html"');
    staticContent = staticContent.replace(/action="([^"]+)\.php"/g, 'action="$1.html"');
    
    // Save as HTML
    const htmlPath = filePath.replace('.php', '.html');
    fs.writeFileSync(htmlPath, staticContent);
}

// Process all PHP files in directory
function processDirectory(directory) {
    const files = fs.readdirSync(directory);
    
    files.forEach(file => {
        const filePath = path.join(directory, file);
        const stat = fs.statSync(filePath);
        
        if (stat.isDirectory()) {
            processDirectory(filePath);
        } else if (path.extname(file) === '.php') {
            convertToStatic(filePath);
        }
    });
}

// Start conversion
processDirectory('.'); 