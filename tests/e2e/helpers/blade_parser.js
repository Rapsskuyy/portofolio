/**
 * Blade template parser and DOM static analysis engine.
 * Reads and analyzes Blade views, components, layout shells, and anchors.
 */
import fs from 'fs';
import path from 'path';

export class BladeParser {
    constructor(baseDir = process.cwd()) {
        this.baseDir = baseDir;
        this.viewsDir = path.join(baseDir, 'resources', 'views');
    }

    /**
     * Get list of all blade files in resources/views
     */
    getAllBladeFiles() {
        const bladeFiles = [];
        if (!fs.existsSync(this.viewsDir)) return bladeFiles;

        function walk(dir) {
            const entries = fs.readdirSync(dir, { withFileTypes: true });
            for (const entry of entries) {
                const fullPath = path.join(dir, entry.name);
                if (entry.isDirectory()) {
                    walk(fullPath);
                } else if (entry.name.endsWith('.blade.php')) {
                    bladeFiles.push(fullPath);
                }
            }
        }

        walk(this.viewsDir);
        return bladeFiles;
    }

    /**
     * Read content of a specific blade file (relative or absolute)
     */
    getBladeContent(relativePath) {
        const fullPath = path.isAbsolute(relativePath) 
            ? relativePath 
            : path.join(this.viewsDir, relativePath.endsWith('.blade.php') ? relativePath : `${relativePath}.blade.php`);
        
        if (!fs.existsSync(fullPath)) {
            return '';
        }
        return fs.readFileSync(fullPath, 'utf-8');
    }

    /**
     * Get aggregated text of all portfolio-related blade files
     */
    getPortfolioAggregatedContent() {
        const files = this.getAllBladeFiles().filter(file => {
            const rel = path.relative(this.viewsDir, file);
            return rel.startsWith('portfolio') || rel.startsWith('layouts');
        });

        return files.map(file => {
            return `<!-- FILE: ${path.relative(this.baseDir, file)} -->\n` + fs.readFileSync(file, 'utf-8');
        }).join('\n\n');
    }

    /**
     * Extract all element IDs defined in blade files
     */
    extractAllIds(content = null) {
        const text = content || this.getPortfolioAggregatedContent();
        const idRegex = /id=["']([a-zA-Z0-9_\-]+)["']/g;
        const ids = new Set();
        let match;
        while ((match = idRegex.exec(text)) !== null) {
            ids.add(match[1]);
        }
        return Array.from(ids);
    }

    /**
     * Extract all anchor href attributes
     */
    extractAllHrefs(content = null) {
        const text = content || this.getPortfolioAggregatedContent();
        const hrefRegex = /href=["']([^"']+)["']/g;
        const hrefs = [];
        let match;
        while ((match = hrefRegex.exec(text)) !== null) {
            hrefs.push(match[1]);
        }
        return hrefs;
    }

    /**
     * Extract all section anchor targets (e.g. #hero, #honors, etc.)
     */
    extractInternalAnchorTargets(content = null) {
        const hrefs = this.extractAllHrefs(content);
        return hrefs
            .filter(href => href.startsWith('#') && href.length > 1)
            .map(href => href.substring(1));
    }

    /**
     * Extract all image src attributes and asset() references
     */
    extractImageSources(content = null) {
        const text = content || this.getPortfolioAggregatedContent();
        const srcRegex = /(?:src=["']([^"']+)["']|asset\(["']([^"']+)["']\))/g;
        const srcs = new Set();
        let match;
        while ((match = srcRegex.exec(text)) !== null) {
            const raw = match[1] || match[2];
            if (raw && !raw.startsWith('http') && !raw.startsWith('data:') && !raw.startsWith('//')) {
                srcs.add(raw);
            }
        }
        return Array.from(srcs);
    }

    /**
     * Extract all Lucide icon references (e.g. data-lucide="trophy", <i data-lucide="...">, etc.)
     */
    extractLucideIcons(content = null) {
        const text = content || this.getPortfolioAggregatedContent();
        const iconRegex = /(?:data-lucide=["']([a-zA-Z0-9\-]+)["']|lucide:([a-zA-Z0-9\-]+)|lucide-([a-zA-Z0-9\-]+))/g;
        const icons = new Set();
        let match;
        while ((match = iconRegex.exec(text)) !== null) {
            const name = match[1] || match[2] || match[3];
            if (name) icons.add(name.toLowerCase());
        }
        return Array.from(icons);
    }

    /**
     * Check if a specific class or substring exists across views
     */
    hasSubstring(substring, content = null) {
        const text = content || this.getPortfolioAggregatedContent();
        return text.includes(substring);
    }

    /**
     * Check if a specific regex matches across views
     */
    matchesRegex(regex, content = null) {
        const text = content || this.getPortfolioAggregatedContent();
        return regex.test(text);
    }
}
