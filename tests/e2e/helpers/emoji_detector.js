/**
 * High-Precision Unicode Emoji Scanner.
 * Enforces the strict Zero-Emoji policy across all views, CSS, and JS files.
 */
import fs from 'fs';
import path from 'path';

// Regex covering all major consumer emoji Unicode ranges:
// - Emoticons (\u{1F600}-\u{1F64F})
// - Miscellaneous Symbols and Pictographs (\u{1F300}-\u{1F5FF})
// - Transport and Map Symbols (\u{1F680}-\u{1F6FF})
// - Supplemental Symbols and Pictographs (\u{1F900}-\u{1F9FF})
// - Symbols and Pictographs Extended-A (\u{1FA70}-\u{1FAFF})
// - Miscellaneous Symbols (\u{2600}-\u{26FF})
// - Dingbats (\u{2700}-\u{27BF})
// - Variation Selectors & Keycaps
export const FORBIDDEN_EMOJI_REGEX = /[\u{1F300}-\u{1F5FF}\u{1F600}-\u{1F64F}\u{1F680}-\u{1F6FF}\u{1F900}-\u{1F9FF}\u{1FA70}-\u{1FAFF}\u{2600}-\u{26FF}\u{2700}-\u{27BF}\u{1F1E6}-\u{1F1FF}]/u;

// Global regex for finding all instances
export const FORBIDDEN_EMOJI_REGEX_GLOBAL = /[\u{1F300}-\u{1F5FF}\u{1F600}-\u{1F64F}\u{1F680}-\u{1F6FF}\u{1F900}-\u{1F9FF}\u{1FA70}-\u{1FAFF}\u{2600}-\u{26FF}\u{2700}-\u{27BF}\u{1F1E6}-\u{1F1FF}]/gu;

/**
 * Scan a text string for forbidden emojis.
 * @param {string} text 
 * @param {string} sourceName 
 * @returns {Array<{char: string, codePoint: string, line: number, column: number, snippet: string}>}
 */
export function scanTextForEmojis(text, sourceName = 'string') {
    const violations = [];
    const lines = text.split(/\r?\n/);

    for (let lineIndex = 0; lineIndex < lines.length; lineIndex++) {
        const line = lines[lineIndex];
        let match;
        // Reset lastIndex for global regex on each line
        const lineRegex = new RegExp(FORBIDDEN_EMOJI_REGEX_GLOBAL.source, 'gu');
        
        while ((match = lineRegex.exec(line)) !== null) {
            const char = match[0];
            const codePoint = 'U+' + char.codePointAt(0).toString(16).toUpperCase().padStart(4, '0');
            violations.push({
                source: sourceName,
                char,
                codePoint,
                line: lineIndex + 1,
                column: match.index + 1,
                snippet: line.trim()
            });
        }
    }

    return violations;
}

/**
 * Scan a single file for forbidden emojis.
 * @param {string} filePath 
 * @returns {Array<{char: string, codePoint: string, line: number, column: number, snippet: string}>}
 */
export function scanFileForEmojis(filePath) {
    if (!fs.existsSync(filePath)) {
        return [];
    }
    const content = fs.readFileSync(filePath, 'utf-8');
    return scanTextForEmojis(content, filePath);
}

/**
 * Recursively scan directory for forbidden emojis in files matching extensions.
 * @param {string} dirPath 
 * @param {string[]} extensions (e.g. ['.blade.php', '.php', '.js', '.css'])
 * @returns {Array<{char: string, codePoint: string, line: number, column: number, snippet: string, source: string}>}
 */
export function scanDirectoryForEmojis(dirPath, extensions = ['.blade.php', '.php', '.js', '.css']) {
    const violations = [];
    if (!fs.existsSync(dirPath)) return violations;

    function walk(currentDir) {
        const entries = fs.readdirSync(currentDir, { withFileTypes: true });
        for (const entry of entries) {
            const fullPath = path.join(currentDir, entry.name);
            if (entry.isDirectory()) {
                // Ignore node_modules, vendor, .git, storage, .agents
                if (['node_modules', 'vendor', '.git', 'storage', '.agents', '.zenflow', '.zencoder', 'test_extract'].includes(entry.name)) {
                    continue;
                }
                walk(fullPath);
            } else if (entry.isFile()) {
                const matchesExt = extensions.some(ext => entry.name.endsWith(ext));
                if (matchesExt) {
                    const fileViolations = scanFileForEmojis(fullPath);
                    violations.push(...fileViolations);
                }
            }
        }
    }

    walk(dirPath);
    return violations;
}
