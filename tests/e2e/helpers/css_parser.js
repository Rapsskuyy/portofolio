/**
 * CSS static analysis parser for Cyber-Telemetry design tokens, chamfer classes, and HUD animations.
 */
import fs from 'fs';
import path from 'path';

export class CssParser {
    constructor(baseDir = process.cwd()) {
        this.baseDir = baseDir;
        this.appCssPath = path.join(baseDir, 'resources', 'css', 'app.css');
        this.publicCssPath = path.join(baseDir, 'public', 'css', 'portfolio.css');
        this.buildAssetsDir = path.join(baseDir, 'public', 'build', 'assets');
    }

    /**
     * Get aggregated CSS content from resources and public CSS files
     */
    getAggregatedCss() {
        let css = '';
        if (fs.existsSync(this.appCssPath)) {
            css += fs.readFileSync(this.appCssPath, 'utf-8') + '\n';
        }
        if (fs.existsSync(this.publicCssPath)) {
            css += fs.readFileSync(this.publicCssPath, 'utf-8') + '\n';
        }
        if (fs.existsSync(this.buildAssetsDir)) {
            const files = fs.readdirSync(this.buildAssetsDir);
            for (const file of files) {
                if (file.endsWith('.css')) {
                    css += fs.readFileSync(path.join(this.buildAssetsDir, file), 'utf-8') + '\n';
                }
            }
        }
        return css;
    }

    /**
     * Get content of resources/css/app.css
     */
    getAppCss() {
        if (!fs.existsSync(this.appCssPath)) return '';
        return fs.readFileSync(this.appCssPath, 'utf-8');
    }

    /**
     * Check if a CSS custom variable / token is defined
     */
    hasCustomProperty(propName, valuePattern = null) {
        const css = this.getAggregatedCss();
        if (!valuePattern) {
            return css.includes(propName);
        }
        const regex = new RegExp(`${propName}\\s*:\\s*([^;]+);`, 'i');
        const match = regex.exec(css);
        if (!match) return false;
        if (typeof valuePattern === 'string') {
            return match[1].toLowerCase().includes(valuePattern.toLowerCase());
        }
        return valuePattern.test(match[1]);
    }

    /**
     * Check if a CSS class exists
     */
    hasClass(className) {
        const css = this.getAggregatedCss();
        const regex = new RegExp(`\\.${className}\\b`, 'i');
        return regex.test(css);
    }

    /**
     * Check if a clip-path polygon rule is present
     */
    hasClipPathPolygon(content = null) {
        const css = content || this.getAggregatedCss();
        return /clip-path\s*:\s*polygon\([^)]+\)/i.test(css);
    }

    /**
     * Check if a keyframe animation is defined
     */
    hasKeyframes(animationName) {
        const css = this.getAggregatedCss();
        const regex = new RegExp(`@keyframes\\s+${animationName}\\b`, 'i');
        return regex.test(css);
    }
}
