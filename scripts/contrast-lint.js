const fs = require('fs');
const path = require('path');

const targets = ['styles/theme.css', 'styles/print-dossier.css'];
const regex = /color\s*:\s*#(?:fff|ffffff)\b/gi;
let hasError = false;

targets.forEach(file => {
  if (!fs.existsSync(file)) return;
  const data = fs.readFileSync(file, 'utf8');
  let match;
  while ((match = regex.exec(data)) !== null) {
    console.error(`[contrast] Low-contrast text detected in ${file} at index ${match.index}`);
    hasError = true;
  }
});

if (hasError) {
  console.error('Contrast lint failed: remove white text on light backgrounds.');
  process.exit(1);
} else {
  console.log('Contrast lint passed.');
}
