/**
 * Lightweight, robust assertion library for Cyber-Telemetry E2E Test Runner.
 */

export class AssertionError extends Error {
    constructor(message, expected, actual) {
        super(message);
        this.name = 'AssertionError';
        this.expected = expected;
        this.actual = actual;
    }
}

export function assert(condition, message = 'Assertion failed') {
    if (!condition) {
        throw new AssertionError(message, true, false);
    }
}

export function assertTrue(value, message = 'Expected value to be true') {
    if (value !== true) {
        throw new AssertionError(message, true, value);
    }
}

export function assertFalse(value, message = 'Expected value to be false') {
    if (value !== false) {
        throw new AssertionError(message, false, value);
    }
}

export function assertEqual(actual, expected, message) {
    if (actual !== expected) {
        throw new AssertionError(
            message || `Expected ${JSON.stringify(expected)}, but got ${JSON.stringify(actual)}`,
            expected,
            actual
        );
    }
}

export function assertNotEqual(actual, expected, message) {
    if (actual === expected) {
        throw new AssertionError(
            message || `Expected value NOT to equal ${JSON.stringify(expected)}`,
            `not ${expected}`,
            actual
        );
    }
}

export function assertContains(haystack, needle, message) {
    if (typeof haystack !== 'string' && !Array.isArray(haystack)) {
        throw new AssertionError(`Haystack must be a string or array, got ${typeof haystack}`);
    }
    const found = typeof haystack === 'string' 
        ? haystack.includes(needle) 
        : haystack.some(item => item === needle || (typeof item === 'string' && item.includes(needle)));
    if (!found) {
        const preview = typeof haystack === 'string' 
            ? (haystack.length > 200 ? haystack.substring(0, 200) + '...' : haystack)
            : JSON.stringify(haystack).substring(0, 200);
        throw new AssertionError(
            message || `Expected target to contain "${needle}"\nTarget preview: ${preview}`,
            needle,
            preview
        );
    }
}

export function assertNotContains(haystack, needle, message) {
    if (typeof haystack !== 'string' && !Array.isArray(haystack)) {
        throw new AssertionError(`Haystack must be a string or array, got ${typeof haystack}`);
    }
    const found = typeof haystack === 'string' ? haystack.includes(needle) : haystack.includes(needle);
    if (found) {
        throw new AssertionError(
            message || `Expected target NOT to contain "${needle}"`,
            `absence of "${needle}"`,
            `found "${needle}"`
        );
    }
}

export function assertMatches(haystack, regex, message) {
    if (typeof haystack !== 'string') {
        throw new AssertionError(`Haystack must be a string, got ${typeof haystack}`);
    }
    if (!regex.test(haystack)) {
        const preview = haystack.length > 200 ? haystack.substring(0, 200) + '...' : haystack;
        throw new AssertionError(
            message || `Expected string to match pattern ${regex}\nString preview: ${preview}`,
            regex.toString(),
            preview
        );
    }
}

export function assertNotMatches(haystack, regex, message) {
    if (typeof haystack !== 'string') {
        throw new AssertionError(`Haystack must be a string, got ${typeof haystack}`);
    }
    if (regex.test(haystack)) {
        throw new AssertionError(
            message || `Expected string NOT to match pattern ${regex}`,
            `no match for ${regex}`,
            'matched'
        );
    }
}

export function assertGreaterOrEqual(actual, min, message) {
    if (actual < min) {
        throw new AssertionError(
            message || `Expected ${actual} >= ${min}`,
            `>= ${min}`,
            actual
        );
    }
}
