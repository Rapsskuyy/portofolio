/**
 * Asset validator helper for Cyber-Telemetry portfolio.
 * Verifies the physical existence and integrity of images, documents, icons, and bundles.
 */
import fs from 'fs';
import path from 'path';

export class AssetValidator {
    constructor(baseDir = process.cwd()) {
        this.baseDir = baseDir;
        this.publicDir = path.join(baseDir, 'public');
    }

    /**
     * Resolve asset path relative to public directory
     */
    resolvePublicPath(assetPath) {
        // Strip leading slash or asset() wrappers
        let clean = assetPath.trim();
        clean = clean.replace(/^asset\(['"]/, '').replace(/['"]\)$/, '');
        clean = clean.replace(/^\/+/, '');
        return path.join(this.publicDir, clean);
    }

    /**
     * Check if a public asset exists and is non-empty
     */
    checkAssetExists(assetPath) {
        const fullPath = this.resolvePublicPath(assetPath);
        if (!fs.existsSync(fullPath)) {
            return { exists: false, size: 0, fullPath };
        }
        const stats = fs.statSync(fullPath);
        return {
            exists: true,
            size: stats.size,
            isFile: stats.isFile(),
            fullPath
        };
    }

    /**
     * Verify all required flagship image assets
     */
    verifyFlagshipAssets() {
        const requiredAssets = [
            'images/profile/profilrappa_original_raw.webp',
            'images/coding-projects/canteensmkn1depok.webp',
            'images/coding-projects/Ptkomari.webp',
            'images/coding-projects/wandekairlines.webp',
            'images/coding-projects/sarpras.webp',
            'images/coding-projects/kelas.webp',
            'images/coding-projects/pedang.webp',
            'files/CV .pdf'
        ];

        const results = {};
        for (const asset of requiredAssets) {
            results[asset] = this.checkAssetExists(asset);
        }
        return results;
    }

    /**
     * Check if Vite build manifest exists
     */
    checkBuildManifest() {
        const manifestPath = path.join(this.publicDir, 'build', 'manifest.json');
        if (!fs.existsSync(manifestPath)) {
            return { exists: false, manifest: null };
        }
        try {
            const content = fs.readFileSync(manifestPath, 'utf-8');
            const manifest = JSON.parse(content);
            return { exists: true, manifest };
        } catch (e) {
            return { exists: true, manifest: null, error: e.message };
        }
    }
}
